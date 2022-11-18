<?php 
    if(!defined('CW')){exit('Access Denied');}
    $user = CW('post/user');
    $us = CW('post/tel');
    $db =functions::db();
    if($user==$us){
         echo json_encode(array(
            'err'=>'Không thể tự theo dõi',
            'state'=>2
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
    
    
    echo json_encode(array(
        'do'=>$follow,
        'state'=>1
    ));

?>