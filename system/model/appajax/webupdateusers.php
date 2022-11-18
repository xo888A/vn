<?php 
    if(!defined('CW')){exit('Access Denied');}

    $db = functions::db();
    $descs = CW('post/descs');
    $us = CW('post/tel');
    $img = CW('post/simg');
    $file = CW("file/file");
    if($descs){
        if(strlen($descs)>255 || strlen($descs)<10){
        	echo json_encode(array(
        	    'state'=>2,
                'err'=>'Độ dài tên phải từ 10 đến 255 ký tự'
            ));return;
        }
    }
    

    $res = false;
    
    if($img){
        // $res = $db->exec('users','u',array(array(
        //     'avatar'=>$img
        // ),array(
        //     'tel'=>$us
        // )));
        $res = $db->query("update users set avatar='{$img}' where tel='{$us}'");
    }else{
        
        // $res = $db->exec('users','u',array(array(
        //     'descs'=>$descs,
         
        // ),array(
        //     'tel'=>$us
        // )));
        $res = $db->query("update users set descs='{$descs}' where tel='{$us}'");
    }
    
    
    
    
    
    
    if($res){
        
        echo json_encode(array(
            'state'=>1,
            'data'=>'Cập nhật thành công',
        ));
    }else{
        echo json_encode(array(
            'state'=>2,
            'err'=>'Cập nhật thành công!'
        ));
    }
?>