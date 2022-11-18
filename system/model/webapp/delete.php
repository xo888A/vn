<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $id = CW('post/id');
    $table = CW('post/table');
    $db = functions::db();

    if(!$id){
    	msg('ID không chính xác, vui lòng đăng nhập lại','Xác nhận','javascript:location.reload()','error');
    }else{
        $res = $db->exec($table,'d',array(
	    	'id'=>$id
	    ));
    }
    if($res){
        msg('Xóa thành công!','Xác nhận ','','success');
    }else{ 
        msg('Xóa thất bại!','Làm mới','javascript:location.reload()','error',true);
    }
?>