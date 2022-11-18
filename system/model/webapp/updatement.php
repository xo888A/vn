<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $ment1 = CW('post/ment1');
    $ment2 = CW('post/ment2');
    
    if(!$ment1 || !$ment2){
        msg('Điền vào ít nhất một trang!','Nhập lại','javascript:location.reload()','',true);
    }
    $db = functions::db();
	$res = $db->exec('sets','u',array(array(
		'ment1'=>$ment1,
		'ment2'=>$ment2
	),array(
		'id'=>1
	)));
   
    if($res){
        msg('Cài đặt thành công!','Xác nhận','','success');
    }else{
        msg('Dữ liệu Không thay đổi!','Làm mới','javascript:location.reload()','error',true);
    }
?>