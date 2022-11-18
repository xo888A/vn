<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $msgid = CW('post/msgid');
    $msg = $db->query('sysmessage','',"id='{$msgid}'",'',1);
    
    echo json_encode(array(
        'state'=>1,
        'data'=>$msg[0]['content']
    ));
?>