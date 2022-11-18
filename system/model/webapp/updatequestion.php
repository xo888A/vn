<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    $q = CW('post/q');
    $a = CW('post/a');
    $qaid = CW('post/qaid',1);

   
    $res = $db->exec('question','u',array(
        array(
        'question'=>$q,
    	'answer'=>$a
        ),array(
            "id"=>$qaid
        )));
   
    if($res){
    	msg('Thay đổi thành công!','Xác nhận','','success');
    }else{
        msg('Dữ liệu Không thay đổi!','Nhập lại','javascript:location.reload()','',true);
    }
?>