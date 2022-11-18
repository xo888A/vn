<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    
    $name = CW('post/name');
    $content = str_replace("\"","'",$_POST['content']);
    $res = $db->exec('html','i',array(
    	'name'=>$name,
    	'content'=>$content
    ));
    if($res){
        msg('Thêm thành công!','Làm mới','javascript:location.reload()','success',true);
    }else{
        msg('Thêm thất bại!','Cài lại','javascript:location.reload()','error',true);
    }
?>