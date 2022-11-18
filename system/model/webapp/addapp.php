<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $num = intval(CW('post/num'));
    $name = CW('post/name');
    $cover = CW('post/cover');
    $desces = CW('post/desces');
    $downloadurl = CW('post/downloadurl');
    $db = functions::db();
    if(strlen($name)>24 || strlen($name)<6){
    	msg('Yêu cầu ký tự tên ứng dụng APP là 6 ~ 24 ký tự, nhiều nhất 8 chữ hán ','Làm mới','','',true);
    }
	if(strlen($cover)>255 || strlen($cover)<5){
    	msg('Địa chỉ ứng dụng APP là 5 ~ 255 kí tự','Làm mới','','',true);
    }
    if($num>50 || $num<1){
    	msg('Phạm vi số lượng tải xuống 1-50','Làm mớis','','',true);
    }
    if(strlen($desces)>36 || strlen($desces)<18){
    	msg('Các ký tự mô tả bắt buộc phải là 18-36 ký tự','Làm mới','','',true);
    }
	$exist = $db->query('app','id',"name='{$name}'",'',1);
	if($exist){
		msg('Tên này đã tồn tại','Làm mới','','',true);
	}
	if(strlen($downloadurl)>255 || strlen($downloadurl)<5){
    	msg('Yêu cầu địa chỉ trang tải xuống APP là 5 ~ 255 kí tự','Làm mới','','',true);
    }
    $res = $db->exec('app','i',array(
    	'name'=>$name,
    	'cover'=>$cover,
    	"downloadurl"=>$downloadurl,
    	'desces'=>$desces,
    	'num'=>$num
    ));
    if($res){
        msg('Thêm thành công!','Làm mới','javascript:location.reload()','success',true);
    }else{
        msg('Thêm thất bại!','Cài lại','javascript:location.reload()','error',true);
    }
?>