<?php
	if(!defined('CW')){exit('Access Denied');}logincheck();
    $size = SIZE;
    $file = CW("file/file");

    if($file['error']==1){
    	echo 'Tệp được tải lên vượt quá  giá trị giới hạn tùy chọn php.ini trong  upload_max_filesize';
    	return;
    }elseif ($file['error']==2) {
    	echo 'Kích thước tệp tải lên không đáp ứng giá trị chỉ định';
    	return;
    }elseif ($file['error']==3) {
    	echo 'Tệp tải lên không hoàn chỉnh';
    	return;
    }elseif ($file['error']==4) {
    	echo 'Vui lòng chọn một tệp';
    	return;
    }
    
    if(!file_exists(VIDEO)){
        file::mk_dir(VIDEO);
    }
    if(($file['type']=='image/jpeg' || $file['type']=='image/png'  || $file['type']=='image/pjpeg' || $file['type']=='video/mp4') && ($file["size"] < SIZE*1024*1024) && $file["size"]>0){
        $filename = md5(uniqid()).strstr($file['name'],'.');
  
        if(move_uploaded_file($file['tmp_name'], VIDEO.$filename)) {   
            echo VIDEOURL.$filename;
        } else {
            echo 'Tải lên thất bại!';
        }
    }else{
        echo 'Định dạng tệp không chính xác hoặc kích thước tệp không phù hợp';
    }
?>
