<?php 
    if(!defined('CW')){exit('Access Denied');}
    return;
    $db = functions::db();
    $curname = CW('get/tel',1);
    $num1 = $db->get_count('comment2',"tel2='{$curname}' and state=0 and ishow=1");$num1 = $num1 ? $num1 : '';
    $num2 = $db->get_count('htmlcomment2',"tel2='{$curname}' and state=0 and ishow=1");$num2 = $num2 ? $num2 : '';
    $num = intval($num1)+intval($num2);
    echo json_encode(array(
        'state'=>1,
        'b11'=>$num1,
        'b22'=>$num2,
        'all'=>$num
    ));
?>