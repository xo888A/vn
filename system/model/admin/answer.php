<?php 
    if(!defined('CW')){exit('Access Denied');}
    $id = CW('get/id');
    $tpl =  new Society();
    $db = functions::db();
    if($id){
        $answer = $db->query('answer','',"id='{$id}'");
        $tpl->assign('title',$answer[0]['title']);$tpl->assign('id',$id);
        $tpl->assign('content',$answer[0]['content']);
        $tpl->assign('wtype',$answer[0]['wtype']);
        $tpl->assign('btn',"<a href='javascript:;' class='btn submit' rel='updateanswer'><i class='fa fa fa-edit'></i> Chỉnh sửa</a>");
    }else{
        $tpl->assign('btn',"<a href='javascript:;' class='btn submit' rel='addanswer'><i class='fa fa-plus-square-o'></i> Thêm</a>");
    }
    

    $tpl->compile('answer','admin'); 
?>