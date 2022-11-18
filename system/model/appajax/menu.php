<?php 
    if(!defined('CW')){exit('Access Denied');}
    echo json_encode(array(
        'menu'=>functions::gettopiclist(),
        'state'=>1
    ));

?>