<?php 
    if(!defined('CW')){exit('Access Denied');}

    $pinglun = str_replace("\"","'",strip_tags($_POST['pinglun'],'<img>'));
    if(!trim($pinglun)){
        echo json_encode(array(
            'err'=>'Vui lòng nhập nội dung!'
        ));return;
    }
    $postid = CW('post/postid',1);
    $commentid = CW('post/commentid',1);
    $tel1 = getuser();

    
    $tel2 = CW('post/tel2',1);
    if($tel1==$tel2){
        echo json_encode(array(
            'err'=>'Không thể tự phản hồi!'
        ));return;
    }
    if(!$tel1){
        echo json_encode(array(
            'err'=>'Vui lòng đăng nhập'
        ));return;
    }
    $db = functions::db();
    $sendtime = $db->query('htmlcomments','ftime',"tel='{$tel1}'",'ftime desc',1);
    if(($sendtime[0]['ftime']+60)>time()){
        echo json_encode(array(
            'err'=>'Đã quá lâu kể từ nhận xét cuối cùng, vui lòng thử lại sau!'
        ));return;
    }
    
    $viptime = $db->query('users','viptime',"tel='{$tel1}'",'',1);
    // if($viptime[0]['viptime']<time()){
    //     echo json_encode(array(
    //         'err'=>'Chỉ người dùng VIP mới có thể bình luận~'
    //     ));return;
    
    // }
    $res = false;
    if($tel2){
        $res = $db->exec('htmlcomment2','i',array(
            'tel1'=>$tel1,
            'tel2'=>$tel2,
            'ftime'=>time(),
            'comment'=>$pinglun,
            'commentid'=>$commentid
        ));
    }else{
        $res = $db->exec('htmlcomments','i',array(
            'postid'=>$postid,
            'tel'=>$tel1,
            'comments'=>$pinglun,
            'ftime'=>time(),
        ));
    }
    if($res){
        echo json_encode(array(
            'data'=>'Bình luận thành công, vui lòng đợi quản trị viên xem xét!'
        ));
    }else{
        echo json_encode(array(
            'err'=>'Bình luận thất bại!'
        ));
    }
?>