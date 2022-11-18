<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    $content = str_replace("\"","'",$_POST['content']);
    $mtype = CW('post/mtype');
    
    $res = $db->exec('sysmessage','i',array(
    	'content'=>$content,
    	'mtype'=>$mtype,
    	'ftime'=>CW('post/ftime')
    ));
    
   
    if($res){
        msg('Thêm thành công!','Làm mới','javascript:location.reload()','success',true);
    }else{
        msg('Thêm thất bại!','Cài lại','javascript:location.reload()','error',true);
    }
?>