<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    $descs = CW('post/descs');
    $us = getuser();
    $img = CW('post/simg');
    $file = CW("file/file");
    // if(strlen($descs)>255 || strlen($descs)<10){
    // 	echo json_encode(array(
    //         'err'=>'Chữ ký yêu cầu 10-255 ký tự'
    //     ));return;
    // }

    $res = false;
    
    //if($img){
        // $res = $db->exec('users','u',array(array(
        //     'avatar'=>$img
        // ),array(
        //     'tel'=>$us
        // )));
        $res = $db->query("update users set avatar='{$img}' where tel='{$us}'");
    // }else{
        
    //     $res = $db->exec('users','u',array(array(
    //         'descs'=>$descs,
         
    //     ),array(
    //         'tel'=>$us
    //     )));
    
    //}
    
    
    
    
    
   echo json_encode(array(
            'data'=>'Cập nhật thành công',
            'do'=>'updateuser'
        ));
?>