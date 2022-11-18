<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $advid = CW('post/advid');
    $adv = $db->query('appadv','',"id='{$advid}'",'',1);
    echo json_encode(array(
        'state'=>1,
        'data'=>$adv
    ));
?>