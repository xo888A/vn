<?php 
    if(!defined('CW')){exit('Access Denied');}

    $db = functions::db();

    $us = CW('post/tel');

    $file = CW("file/file");
    

    
    if(!file_exists(VIDEO)){
        file::mk_dir(VIDEO);
    }

    if(($file['type']=='image/jpeg' || $file['type']=='image/png'  || $file['type']=='image/pjpeg' || $file['type']=='video/mp4') && ($file["size"] < 5*1024*1024) && $file["size"]>0){
        $filename = md5(uniqid()).strstr($file['name'],'.');
  
        if(move_uploaded_file($file['tmp_name'], VIDEO.$filename)) {   
            
            // $res = $db->exec('users','u',array(array(
            //     'avatar'=>VIDEOURL.$filename,
            //     //'descs'=>$descs
            // ),array(
            //     'tel'=>$us
            // )));
            
            
            $_img = VIDEOURL.$filename;
            $res = $db->query("update users set avatar='{$_img}' where tel='{$us}'");
            
            if($res){
                
                echo json_encode(array(
                    'data'=>'Cập nhật thành công',
                    'state'=>1
                ));
            }else{
                echo json_encode(array(
                    'state'=>2,
                    'err'=>'Cập nhật thành công!'
                ));
            }
            
            
        } else {
            echo json_encode(array(
                'state'=>2,
                    'err'=>'Tải lên thất bại'
            ));
        }
    }else{
        echo json_encode(array(
            'state'=>2,
                    'err'=>'Văn bản không phù hợp qui cách hoặc dung lượng không phù hợp yêu cầu'
            ));
       
    }
    


    
?>