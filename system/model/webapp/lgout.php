<?php
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    functions::set_cookie('__username','',time()-3600);
    
?>