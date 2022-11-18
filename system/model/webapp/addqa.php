<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    $q = CW('post/q');
    $a = CW('post/a');

    $res = $db->exec('question','i',array(
    	'question'=>$q,
    	'answer'=>$a
    ));
    if($res){
        msg('Thêm thành công!','Làm mới','javascript:location.reload()','success',true);
    }else{
        msg('Thêm thất bại!','Cài đặt','javascript:location.reload()','error',true);
    }
?>