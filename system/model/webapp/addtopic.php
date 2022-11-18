<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $hot = intval(CW('post/hot'));
    $name = CW('post/name');
    $cover = CW('post/cover');
    $desces = CW('post/desces');
    $db = functions::db();
    // if(strlen($name)>12 || strlen($name)<1){
    // 	msg('Tên chủ đề bắt buộc phải có từ 1 đến 12 ký tự, tối đa 4 chữ','Làm mới','','',true);
    // }
	if(strlen($cover)>255 || strlen($cover)<11){
    	msg('Yêu cầu ký tự địa chỉ trang bìa là 11 ~ 255','Làm mới','','',true);
    }
    if($hot>100000){
    	msg('Số lượng nhập vào quá lớn','Làm mới','','',true);
    }
    // if(strlen($desces)>255 || strlen($desces)<15){
    // 	msg('Các ký tự mô tả bắt buộc phải là 3-85 ký tự','Làm mới','','',true);
    // }
	$exist = $db->query('topic','id',"name='{$name}'",'',1);
	if($exist){
		msg('Tên này đã tồn tại','Làm mới','','',true);
	}
    $res = $db->exec('topic','i',array(
    	'name'=>$name,
    	'cover'=>$cover,
    	"hot"=>$hot,
    	'desces'=>$desces,
    	'tuijian'=>CW('post/tuijian'),
    	'beijingtu'=>CW('post/beijingtu'),
    	'num'=>0
    ));
    
   
    if($res){
        msg('Thêm thành công!','Làm mới','javascript:location.reload()','success',true);
    }else{
        msg('Thêm thất bại!','Cài lại','javascript:location.reload()','error',true);
    }
?>