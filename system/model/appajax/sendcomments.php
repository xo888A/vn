<?php 
    if(!defined('CW')){exit('Access Denied');}
    $tel = CW('post/tel',1);
    $id = CW('post/postid',1);
    $message = CW('post/message');
    if(strlen($message)>240){
        echo json_encode(array(
            'state' => 1,
            'err'=>'Bình luận vượt quá giới hạn từ'
        ));return;
    }
    $db = functions::db();
    $isexist = $db->query('post','',"id='{$id}'",'',1);
    if(!$isexist){
        echo json_encode(array(
            'state' =>1,
            'err'=>'Phát hiện lỗi ID bài đăng, không thể bình luận'
        ));return;
    }
    $vipcomments = $db->query('sets','vipcomments','','id asc',1);
    if($vipcomments[0]['vipcomments']){
        $users = $db->query('users','viptime',"tel='{$tel}'",'',1);
        if($users[0]['viptime']<time()){
            echo json_encode(array(
                'state'=>1,
                'notcomment'=>1
            ));return;
        }
    }
    $time = time();
    $res = $db->exec('comments','i',array(
        'postid'=>$id,
        'tel'=>$tel,
        'comments'=>$message,
        'ftime'=>$time,
        'ishow'=>0
    ));
    if($res){
        echo json_encode(array(
            'state'=>1,
            'success'=>1
        ));
    }else{
        echo json_encode(array(
            'state'=>1,
            'err'=>'Bình luận thất bại!'
        ));
    }
?>


