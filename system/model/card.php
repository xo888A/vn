<?php 
    if(!defined('CW')){exit('Access Denied');}
    $tpl =  new Society();
    functions::getavatar($tpl);
    if(isphone()){
        $tpl->compile(basename(__FILE__,'.php'),'wap'); 
    }else{
        $tpl->compile(basename(__FILE__,'.php'),''); 
    }
?>