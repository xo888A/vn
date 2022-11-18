<?php 
    if(!defined('CW')){exit('Access Denied');}
    $type = CW('post/type');
    $db = functions::db();
    $set = $db->query('sets','','id=1','',1);  
    if($type=='vlist'){
        $vlists = explode(',',$set[0]['vlist']);
    }else{
        $vlists = explode(',',$set[0]['ilist']);
    }
    
    $_vlist = '';
    foreach ($vlists as $vlist){
        
        $_id = $db->query('topic','id',"name='{$vlist}'",'',1);
        if(!$_id){
            continue;
        }
    
        $_vlist .= "<div class='swiper-slide'><a href='javascript:;' onclick='opentopic(\"{$vlist}\")'>#{$vlist}</a></div>";
    }
    echo json_encode(array(
        'state'=>1,
        'data'=>$_vlist
    ));
?>