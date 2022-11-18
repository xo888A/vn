<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $pinglun = str_replace("\"","'",strip_tags($_POST['pinglun'],'<img>'));
    if(!trim($pinglun)){
        echo json_encode(array(
            'err'=>'Vui lòng nhập nội dung!'
        ));return;
    }
    $postid = CW('post/postid',1);
    $commentid = CW('post/commentid',1);
    $tel1 = getuser();
    $idd = CW('post/idd');
    
    $tel2 = CW('post/tel2',1);
    if($tel1==$tel2){
        echo json_encode(array(
            'err'=>'Không thể trả lời!'
        ));return;
    }
    if(!$tel1){
        echo json_encode(array(
            'err'=>'vui lòng đăng nhập trước'
        ));return;
    }
    $db = functions::db();
    $sendtime = $db->query('htmlcomments','ftime',"tel='{$tel1}'",'ftime desc',1);
    if(($sendtime[0]['ftime']+60)>time()){
        echo json_encode(array(
            'err'=>'Cách một thời gian ngắn kể từ lần nhận xét cuối cùng, vui lòng thử lại sau!'
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
        $sendtime2 = $db->query('htmlcomment2','ftime',"tel1='{$tel1}'",'ftime desc',1);
        
        if(($sendtime2[0]['ftime']+60)>time()){
            echo json_encode(array(
                'err'=>'Cách một thời gian ngắn kể từ lần nhận xét cuối cùng, vui lòng thử lại sau!'
            ));return;
        }
        
        $res = $db->exec('htmlcomment2','i',array( 
            'tel1'=>$tel1,
            'tel2'=>$tel2,
            'ftime'=>time(),
            'comment'=>$pinglun,
            'commentid'=>$commentid
        ));
        if($res && $idd){
            $db->exec('htmlcomment2','u',"state=3,id='{$idd}'");
        }
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
            'data'=>'Bình luận thành công, vui lòng đợi quản trị viên duyệt!'
        ));
    }else{
        echo json_encode(array(
            'err'=>'Không bình luận được!'
        ));
    }
?>