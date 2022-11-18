<?php 
    if(!defined('CW')){exit('Access Denied');}
    $id = CW('post/vid');
    $tel = CW('post/tel');
    $db = functions::db();
    $viptime = $db->query('users','viptime',"tel='{$tel}'",'',1);
    $post = $db->query('post','',"id='{$id}'",'id desc',1);
    $data = $post[0]['diamond']>0 ? 'vip': 'normal';
    if($viptime[0]['viptime']>time()){
        $data = 'normal';
    }
    echo json_encode(array(
        'data'=>$data,
        'state'=>1
    ));
?>