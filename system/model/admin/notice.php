<?php 
    if(!defined('CW')){exit('Access Denied');}
    $tpl =  new Society();
    $id = CW('get/id');
    $db = functions::db();
    if($id){
        $button = "<a href='javascript:;' class='btn submit' rel='updatemessagesss'><i class='fa fa-plus-square-o'></i>Chỉnh sửa</a>";
        $sysmessage = $db->query('sysmessage','',"id='{$id}'",'',1);
        $tpl->assign('content',$sysmessage[0]['content']);
        $tpl->assign('ftime',$sysmessage[0]['ftime']);
        $tpl->assign('mtype',$sysmessage[0]['mtype']);$tpl->assign('id',$id);
    }else{
        $button = "<a href='javascript:;' class='btn submit' rel='addmessage'><i class='fa fa-plus-square-o'></i>Phát hành</a>";
    }
    $tpl->assign('button',$button);
    $tpl->compile('notice','admin'); 
?>