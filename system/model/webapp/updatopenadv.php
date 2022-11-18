<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $openadvimg = CW('post/openadvimg');
    $openadvremarks = CW('post/openadvremarks');
    $openadvurl = CW('post/openadvurl');
    $openadvishow = CW('post/openadvishow');
    $db = functions::db();
	$res = $db->exec('sets','u',array(array(
		'openadvimg'=>$openadvimg,
		'openadvremarks'=>$openadvremarks,
		'openadvurl'=>$openadvurl,
		'openadvishow'=>$openadvishow,
	),array(
		'id'=>1
	)));
   
    if($res){
        msg('Cài đặt thành công!','Xác nhận','','success');
    }else{
        msg('Dữ liệu không đổi!','Làm mới','javascript:location.reload()','',true);
    }
?>