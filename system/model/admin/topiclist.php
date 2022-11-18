<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $id = CW('get/id');
    $tpl =  new Society();
    $topic = $db->query('topic','',"id='{$id}'",'',1);
    if($topic){
        $btn = "<a href='avascript:;' class='btn1 updatetopic' ><i class='fa fa-plus-square-o'></i> Cập nhật</a>";
        
        $tpl->assign('name',$topic[0]['name']);
        $tpl->assign('desces',$topic[0]['desces']);
        $tpl->assign('tuijian',$topic[0]['tuijian']);
        $tpl->assign('hot',$topic[0]['hot']);
        $tpl->assign('cover',$topic[0]['cover']);
        $tpl->assign('beijingtu',$topic[0]['beijingtu']);
    }else{
        $btn = "<a href='avascript:;' class='btn1' rel='addtopic'><i class='fa fa-plus-square-o'></i> Thêm</a>";
    }
    
    $tpl->assign('btn',$btn);
    $tpl->compile('topiclist','admin'); 
?>