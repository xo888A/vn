<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $selecttime = CW('post/selecttime');
    $vid = intval(CW('post/vid'));
    $num = intval(CW('post/num'));
    if($num<0 || $num>1000){
        msg('Phạm vi số lượng bài đăng dao động 1-1000!','Làm mới','javascript:location.reload()','notice',true);
    }
    $pricediamond = intval(CW('post/pricediamond'));
    if(!$selecttime){
        msg('Vui lòng chọn thời gian đặt hàng!','Làm mới','javascript:location.reload()','notice',true);
    }
    $db = functions::db();
    $res = $db->exec('seckill','i',array(
    	'selecttime'=>$selecttime,
    	'vid'=>$vid,
    	'pricediamond'=>$pricediamond,
    	'num'=>$num
    ));
    
   
    if($res){
        msg('Thêm thành công!','Làm mới','javascript:location.reload()','success',true);
    }else{
        msg('Thêm thất bại!','Cài lại','javascript:location.reload()','error',true);
    }

?>