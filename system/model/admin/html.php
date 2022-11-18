<?php 
    if(!defined('CW')){exit('Access Denied');}
    
    $db = functions::db();


    $tpl =  new Society();
    $id = CW('get/id');
	if($id){
		$html = $db->query('html','',"id='{$id}'",'',1);
		$tpl->assign('name',$html[0]['name']);
		$tpl->assign('content',$html[0]['content']);
		$button = "<a href='javascript:;' class='btn submit' rel='updatehtml'><i class='fa fa fa-edit'></i>Cập nhật</a>";
	}else{
	    $button = "<a href='javascript:;' class='btn submit' rel='addhtml'><i class='fa fa-plus-square-o'></i>Thêm</a>";
	}
    $tpl->assign('button',$button);
    $tpl->assign('data',$data);
    $tpl->compile('html','admin'); 
?>