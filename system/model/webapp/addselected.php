<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    
    $vid = CW('post/vid');
    $star1 = CW('post/star1');
    $star2= CW('post/star2');


    if(!$vid){
        msg('Vui lòng đặt ID video','Làm mới','','',true);
    }

    
    $db = functions::db();
    $res = $db->exec('selected','i',array(
        'vid'=>$vid,
        'star1'=>$star1,
        'star2'=>$star2
    ));
    if($res){
        msg('Thêm thành công!','Làm mới','javascript:location.reload()','success',true);
    }else{
        msg('Thêm thất bại!','Cài lại','javascript:location.reload()','error',true);
    } 
?>