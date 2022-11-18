<?php 
    if(!defined('CW')){exit('Access Denied');}

    $tel = CW('post/tel');
    $db =functions::db();
    $level = $db->query('users','mylevel',"tel='{$tel}'",'',1);
    $level = $level[0]['mylevel'];
    echo json_encode(array(
        'state'=>1,
        'level'=>$level
    ));
?>