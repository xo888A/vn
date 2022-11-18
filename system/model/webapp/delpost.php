<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $tel = CW('post/tel');
    $postid = CW('post/id');
    $res = $db->exec('post','d',"userid='{$tel}'and id='{$postid}'");
   
    echo  json_encode(array(
        'do'=>'delid',    
        'res'=>$res ? 'success' : 'fail',
        'data'=>1
    ));

?>