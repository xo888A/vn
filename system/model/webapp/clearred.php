<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $user = getuser();
    $db = functions::db();
    $res = $db->exec('history','d',"dev='{$user}'");
    echo json_encode(array(
        'data'=>'Đã xóa thành công',
        'do'=>'reload'
    ));
?>