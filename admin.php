<?php
	require "config.inc.php";
    require "system/runtime.php";
    $mod = CW('get/mod',2);

    // $ip = functions::get_real_ip();
    // if($ip!='27.213.55.29'){
    //     exit('');
    // }
    if(!$mod){
        functions::url(INDEX);
    }

    if($mod!='login'){
        logincheck();
    }
   
    file::import('system-model-admin-'.$mod);
?>