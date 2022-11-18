<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    $id = CW('post/id');
    $name = CW('post/name');
    $content = str_replace("\"","'",$_POST['content']);
    $res = $db->exec('html','u',array(array(
        'name'=>$name,
        'content'=>$content
    ),array(
        'id'=>$id    
    )));
    if($res){
        msg('Thêm thành công!','Làm mới','javascript:location.reload()','success',true);
    }else{
        msg('Thêm thất bại!','Cài đặt lại','javascript:location.reload()','error',true);
    }
?>