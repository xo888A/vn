<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    
    $hotsearch = CW('post/hotsearch');
    
    $db = functions::db();
    $res = $db->exec('sets','u',array(array(
       'hotsearch'=>$hotsearch
    ),array(
        'id'=>1 
    )));
    
   
    if($res){
    	msg('Cập nhật từ khóa thành công!','Xác nhận','','success');
    }else{
        msg('Dữ liệu không đổi!','Nhập lại','javascript:location.reload()','',true);
    }
?>