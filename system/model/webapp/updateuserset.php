<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    $nickname = CW('post/nickname');
    $desces = CW('post/desces');
    if(strlen($desces)>255){
        msg('Chữ ký cá nhân mặc định của người dùng không được vượt quá 255 ký tự!','Xác nhận','','');
    }
    

    
    $res = $db->exec('sets','u',array(
        array(
            "nickname"=>$nickname,
            "desces"=>$desces,
        ),array(
            "id"=>1
        )));
   
    if($res){
    	msg('Cài đặt thành công!','Làm mới','','success');
    }else{
        msg('Dữ liệu không thay đổi!','Cài đặt lại','javascript:location.reload()','',true);
    }
?>