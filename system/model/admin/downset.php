<?php 
    if(!defined('CW')){exit('Access Denied');}
    $tpl =  new Society();
    $db = functions::db();
    $data = $db->query('sets','','id=1','',1);
    $tpl->assign('lv1',$data[0]['lv1']);
    $tpl->assign('lv2',$data[0]['lv2']);
    $tpl->assign('lv3',$data[0]['lv3']);
    $tpl->assign('lv4',$data[0]['lv4']);
    $tpl->assign('lv5',$data[0]['lv5']);
    $tpl->assign('lv6',$data[0]['lv6']);
    $tpl->assign('downlv1',$data[0]['downlv1']);
    $tpl->assign('downlv2',$data[0]['downlv2']);
    $tpl->assign('downlv3',$data[0]['downlv3']);
    $tpl->assign('downlv4',$data[0]['downlv4']);
    $tpl->assign('downlv5',$data[0]['downlv5']);
    $tpl->assign('downlv6',$data[0]['downlv6']);
    $tpl->compile(basename(__FILE__,'.php'),'admin'); 
?>