<?php 
    if(!defined('CW')){exit('Access Denied');}
    $tel = CW('post/tel');
    $db =functions::db();
    $exist = $db->query('users','',"tel='{$tel}'",'',1);
    if($exist){
        $ttt = "<a href='javascript:;' onclick='openwin(\"user\",\"reload\")'><img class='avatar' src='{$exist[0]['avatar']}' class='u' /></a>";
    }else{
        $ttt = "<a href='javascript:;' onclick='openwin(\"login\",\"reload\")'><img class='avatar'  src='../image/default.jpg' class='u' /></a>";
    }
    echo json_encode(array(
        'ttt'=>$ttt,
        'state'=>1
    ));
?>