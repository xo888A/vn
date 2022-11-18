<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $hot = CW('post/hot');
    if(!$hot){
        msg('ID video là bắt buộc!','Nhập lại','javascript:location.reload()','',true);
    }
   
    $db = functions::db();
    $array = explode(',',$hot);
    foreach ($array as $val){
        
        $accord = $db->query('post','',"id='{$val}' and videocover!=''",'',1);
        if(!$accord){
             msg('ID:'.$val.' không phải video','Nhập lại','javascript:location.reload()','',true);
            
        }
    }
	$res = $db->exec('recommend','u',array(array(
		'hot'=>$hot
	),array(
		'id'=>1
	)));
   
    if($res){
        msg('Cài đặt thành công!','Xác nhận','','success');
    }else{
        msg('Dữ liệu không đổi!','Làm mới','javascript:location.reload()','',true);
    }
?>