<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    $id = CW('post/id',1);
    $us = functions::autocode(CW('cookie/__username'),'-');
    if(!$us){
        echo json_encode(array(
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
            'data'=>'cancel',
            'do'=>'like'
        ));
    }else{
        $db->exec('likes','i',array(
            'tel'=>$us,
            'posttype'=>'organ',
            'postid'=>$id,
            'ftime'=>time()
        ));
        $post_like = $post_like[0]['likes']+1;
        $db->exec('post','u',"likes='{$post_like}',id='{$id}'");
        echo json_encode(array(
            'data'=>'add',
            'do'=>'like'
        ));
    }
?>