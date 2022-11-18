<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    
    $title = CW('post/title');
    $wtype = CW('post/wtype');
    
    $content = str_replace("\"","'",$_POST['content']);
    if(!$title || !$content){
        msg('Mỗi trang cần nhập!','Nhập lại','javascript:location.reload()','',true);
    }
    
    $res = $db->exec('answer','u',array(array(
    	'title'=>$title,
    	'content'=>$content,
    	'wtype'=>$wtype
    ),array(
        'id'=>CW('post/id')    
    )));
    if($res){
        msg('Chỉnh sửa thành công!','Làm mới','javascript:location.reload()','success',true);
    }else{
        msg('Dữ liệu thay đổi!','Cài đặt lại','javascript:location.reload()','error',true);
    }
?>