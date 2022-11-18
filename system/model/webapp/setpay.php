<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $id = CW('post/id');
    $tel = CW('post/tel');
    $money = CW('post/money');
    $db = functions::db();
    $res = $db->exec('withdrawals','u',array(
        array(
            "state"=>1
        ),array(
            "id"=>$id
        )));
    if($res){
    	msg('Thiết lập thanh toán thành công!','Xác nhận','javascript:location.reload()','success');
    }else{
        msg('Cài đặt không thành công, vui lòng liên hệ với kỹ thuật viên để kiểm tra!','Hủy bỏ','','',true);
    }
?>