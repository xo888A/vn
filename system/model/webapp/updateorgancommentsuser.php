<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    $organcommentsuser = CW('post/organcommentsuser');
     
    $res = $db->exec("update organcommentsuser set organcommentsuser='{$organcommentsuser}' where 1=1");
   
    if($res){
        msg('Cài đặt thành công!','Làm mới','javascript:location.reload()','success',true);
    }else{
        msg('Cài đặt thất bại!','Cài đặt lại','javascript:location.reload()','error',true);
    }
?>