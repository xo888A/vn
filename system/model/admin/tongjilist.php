<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $tpl =  new Society();
    $tpl->compile(basename(__FILE__,'.php'),'admin');
?>