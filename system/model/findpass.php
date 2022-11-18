<?php 
    if(!defined('CW')){exit('Access Denied');}
    $tpl =  new Society();
    $db = functions::db();
    $tougao = $db->query('sets','tougao','id=1','',1);
    $tpl->assign('tougao',$tougao[0]['tougao']);
    if(isphone()){
         $tpl->compile(basename(__FILE__,'.php'),'wap'); 
    }else{
        $tpl->compile(basename(__FILE__,'.php'),''); 
    }
?>