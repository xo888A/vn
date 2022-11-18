<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $num = intval(CW('post/num'));
    $name = CW('post/name');
    $appid = CW('post/appid');
    $cover = CW('post/cover');
    $desces = CW('post/desces');
    $downloadurl = CW('post/downloadurl');
    $db = functions::db();
    if(strlen($name)>24 || strlen($name)<6){
    	msg('Ký tự tên ứng dụng APP được yêu cầu từ 6 ~ 24 ký tự, tối đa 8 từ','Làm mới','','',true);
    }
	if(strlen($cover)>255 || strlen($cover)<5){
    	msg('Yêu cầu ký tự địa chỉ ứng dụng APP là 5~255','Làm mới','','',true);
    }
    if($num>50 || $num<1){
    	msg('Phạm vi số lượt tải 1-50','Làm mới','','',true);
    }
    if(strlen($desces)>36 || strlen($desces)<18){
    	msg('Ký tự mô tả bắt buộc phải là 18-36 từ','Làm mới','','',true);
    }

	if(strlen($downloadurl)>255 || strlen($downloadurl)<5){
    	msg('Yêu cầu ký tự địa chỉ trang tải xuống APP là5~255','Làm mới','','',true);
    }
    $res = $db->exec('app','u',array(array("name"=>$name,"cover"=>$cover,"desces"=>$desces,"num"=>$num,"downloadurl"=>$downloadurl,),array("id"=>$appid)));
   
    if($res){
    	msg('Thay đổi thành công!','Xác nhận','','success');
    }else{
        msg('Dữ liệu không đổi!','Nhập lại','javascript:location.reload()','',true);
    }
?>