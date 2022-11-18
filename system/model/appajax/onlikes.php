<?php 
    if(!defined('CW')){exit('Access Denied');};
    $db = functions::db();
    $id = CW('post/id',1);
    $us = CW('post/tel',1);
    if(!$us){
        echo json_encode(array(
            'state'=>2,
            'err'=>'Vui lòng đăng nhập'
        ));return;
    }
   
    $islike = $db->query('likes','',"tel='{$us}' and postid='{$id}'");
    $post_like = $db->query('post','likes',"id='{$id}'",'',1);
    if($islike){
        $db->exec('likes','d',"tel='{$us}' and postid='{$id}'");
        
        $post_like = $post_like[0]['likes']-1;
        $db->exec('post','u',"likes='{$post_like}',id='{$id}'");
        echo json_encode(array(
            'state'=>1,
            'data'=>'cancel',
            'do'=>'like2'
        ));
    }else{
        $db->exec('likes','i',array(
            'tel'=>$us,
            'posttype'=>'video',
            'postid'=>$id,
            'ftime'=>time()
        ));
        $post_like = $post_like[0]['likes']+1;
        $db->exec('post','u',"likes='{$post_like}',id='{$id}'");
        echo json_encode(array(
            'data'=>'add',
            'do'=>'like2',
            'state'=>1,
        ));
    }
?>