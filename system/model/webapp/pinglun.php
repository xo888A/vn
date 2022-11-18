<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $pinglun = str_replace("\"","'",strip_tags($_REQUEST['pinglun'],'<img>'));
    if(!trim($pinglun)){
        echo json_encode(array(
            'err'=>'Vui lòng nhập nội dung!'
        ));return;
    }
    $idd = CW('post/idd');
    $postid = CW('post/postid',1);
    $commentid = CW('post/commentid',1);
    $tel1 = getuser();

    
    $tel2 = CW('post/tel2',3);
    if($tel1==$tel2){
        echo json_encode(array(
            'err'=>'không thể tự trả lời cho mình!'
        ));return;
    }
    if(!$tel1){
        echo json_encode(array(
            'err'=>'Vui lòng đăng nhập trước!'
        ));return;
    }
    $db = functions::db();
    $sendtime = $db->query('comments','ftime',"tel='{$tel1}'",'ftime desc',1);
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
        $sendtime2 = $db->query('comment2','ftime',"tel1='{$tel1}'",'ftime desc',1);
        if(($sendtime2[0]['ftime']+60)>time()){
            echo json_encode(array(
                'err'=>'Đã quá lâu kể từ nhận xét cuối cùng, vui lòng thử lại sau!'
            ));return;
        }
        $res = $db->exec('comment2','i',array(
            'tel1'=>$tel1,
            'tel2'=>$tel2,
            'ftime'=>time(),
            'comment'=>$pinglun,
            'commentid'=>$commentid
        ));
        if($res && $idd){
            $db->exec('comment2','u',"state=3,id='{$idd}'");
        }
    }else{
        $res = $db->exec('comments','i',array(
            'postid'=>$postid,
            'tel'=>$tel1,
            'comments'=>$pinglun,
            'ftime'=>time(),
        ));
    }
    if($res){
        echo json_encode(array(
            'data'=>'Bình luận thành công, vui lòng đợi quản trị viên duyệt!'
        ));
    }else{
        echo json_encode(array(
            'err'=>'Bình luận thất bại!'
        ));
    }
?>