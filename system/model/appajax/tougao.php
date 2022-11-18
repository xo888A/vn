<?php
    $db = functions::db();
    $tougao = $db->query('sets','tougao','id=1','',1);
    echo  json_encode(array(
        'state'=>1,
        'data'=>$tougao[0]['tougao']
    ));
?>