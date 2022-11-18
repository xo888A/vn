<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $tel = functions::autocode(CW('cookie/__username'),'-');

    $tpl =  new Society();
    functions::getavatar($tpl);
    $option = '';
    $options = $db->query('topic','id,name');
    foreach ($options as $_option){
        $option .= "<option value='{$_option['id']}'>{$_option['name']}</option>";
    }
    $tpl->assign('option',$option);
    $tpl->assign('tel',$tel);
    $tpl->assign('data',$data);
    $tpl->assign('page',$page);
    //if(isphone()){
    //    $tpl->compile(basename(__FILE__,'.php'),'wap'); 
    //}else{
        $tpl->compile(basename(__FILE__,'.php'),''); 
    //}
?>