<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $tel = functions::autocode(CW('cookie/__username'),'-');
    $tpl =  new Society();
    functions::getavatar($tpl);
    $tpl->assign('tel',$tel);
    $topics = $db->query('topic','id,name');
    $option = '';
    foreach ($topics as $_topic){
        $option .= "<option value='{$_topic['id']}'>{$_topic['name']}</option>";
    }
    $tpl->assign('option',$option);
    $tpl->compile(basename(__FILE__,'.php'),'');exit;

?>