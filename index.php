<?php

	require "config.inc.php";
    require "system/runtime.php";
    
    // $ip = functions::get_real_ip();
    // if($ip!='27.213.55.29'){
    //     exit('');
    // }
   
    $card = CW('get/card');
    if($card){
        functions::set_cookie('card',$card);
    }
    $mod = CW('get/mod',2);
    if(!$mod){
        
        $mod = 'index';
        if(functions::is_mobile()){
            $mod = 'shortvideo';
        }
        
    }
    file::import('system-model-'.$mod);
?>