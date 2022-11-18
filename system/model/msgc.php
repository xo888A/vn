<?php 
    if(!defined('CW')){exit('Access Denied');}
    $tpl =  new Society();
    $tpl->compile(basename(__FILE__,'.php'),''); 
?>