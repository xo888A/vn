<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    $id = CW('post/id');
    $content = str_replace("\"","'",$_POST['content']);
    $mtype = CW('post/mtype');
    $ftime = CW('post/ftime');
    
    $res = $db->exec('sysmessage','u',array(array(
    	'content'=>$content,
    	'mtype'=>$mtype,
    	'ftime'=>CW('post/ftime')
    ),array(
        'id'=>$id    
    )));
    
   
    if($res){
        msg('Chỉnh sửa thành công!','Làm mới','javascript:location.reload()','success',true);
    }else{
        msg('Dữ liệu không đổi!','Cài đặt lại','javascript:location.reload()','error',true);
    }
?>