<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $user = CW('post/user',1);

    $db = functions::db(); 

    $us = functions::autocode(CW('cookie/__username'),'-');
    if(!$us){
        echo json_encode(array(
            'err'=>'Vui lòng đăng nhập trước!'
        ));return;
    }
    $isfollow = $db->query('follow','',"tel1='{$us}' and tel2='{$user}'",'',1);
    $uodateflonum = $db->query('users','flonum',"tel='{$user}'",'',1);
    $uodateflonum = intval($uodateflonum[0]['flonum']);
    if($isfollow){
        $res =  $db->exec('follow','d',"tel1='{$us}' and tel2='{$user}'");
        $follow = 'removefollow';
        $uodateflonum = $uodateflonum-1;
        $db->exec('users','u',"flonum='{$uodateflonum}',tel='{$user}'");
    }else{
        $res = $db->exec('follow','i',array(
            'tel1'=>$us,
            'tel2'=>$user
        ));
        $uodateflonum = $uodateflonum+1;
        $db->exec('users','u',"flonum='{$uodateflonum}',tel='{$user}'");
        $follow = 'follow';
    }
    
    if($res){
        echo json_encode(array(
            'do'=>'follow',
            'data'=>$follow
        ));
    }else{
        echo json_encode(array(
            'err'=>''
        ));
    }
    
?>