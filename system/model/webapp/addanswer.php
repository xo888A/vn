<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    
    $title = CW('post/title');
    $wtype = CW('post/wtype');
    
    $content = str_replace("\"","'",$_POST['content']);
    if(!$title || !$content){
        msg('Mỗi mục đều cần điền!','Điền lại','javascript:location.reload()','',true);
    }
    
    $res = $db->exec('answer','i',array(
    	'title'=>$title,
    	'content'=>$content,
    	'wtype'=>$wtype
    ));
    if($res){
        msg('Thêm thành công!','Làm mới','javascript:location.reload()','success',true);
    }else{
        msg('Thêm thất bại!','Cài lại','javascript:location.reload()','error',true);
    }
?>