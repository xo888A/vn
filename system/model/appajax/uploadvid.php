<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $tel = CW('post/tel');
    $vidtype = CW('post/vidtype');
    $isshenhe = $db->query('post','',"userid='{$tel}' and ishow=2");
    if($isshenhe){
        echo  json_encode(array(
            'state' => 2,
    	    'err'=>"您有未审核的视频，请等待审核完成后再继续发布!"
    	));return;
    }
    $user = $db->query('users','id,freeze',"tel='{$tel}'",'',1);
    if(!$user[0]['id']){
        echo json_encode(array(
            'state' => 2,
            'err'=>'当前用户异常, 不允许上传'
        ));return;
    }
    if($user[0]['freeze']){
        echo json_encode(array(
            'state' => 2,
            'err'=>'账号已被冻结, 不允许上传'
        ));return;
    }
    $textarea = CW('post/textarea');
    if(strlen($textarea)>255){
        echo json_encode(array(
            'state' => 2,
            'err'=>'标题字数超过限制, 请重新填写'
        ));return;
    }
    $topiclist = CW('post/topiclist');
    
    $videourl = CW('file/videourl');
    $videocover = CW('file/videocover');
    
    $videocover_error = $videocover['error'];
    $videourl_error = $videourl['error'];
    if ($videocover_error > 0){
        if($videocover_error==1){
            $err = '上传的文件超过了服务器限制的最高值';
        }elseif ($videocover_error==2) {
            $err = '上传文件的大小超过了前端指定的最高值';
        }elseif ($videocover_error==3) {
            $err = '文件上传不完整';
        }elseif ($videocover_error==4) {
            $err = '没有文件被上传';
        }elseif ($videocover_error==6) {
            $err = '找不到临时文件夹';
        }elseif ($videocover_error==7) {
            $err = '文件写入失败';
        }
        echo json_encode(array(
            'state' => 2,
            'err'=>$err
        ));return;
    }
    if ($videourl_error > 0){
        if($videourl_error==1){
            $err = '上传的文件超过了服务器限制的最高值';
        }elseif ($videourl_error==2) {
            $err = '上传文件的大小超过了前端指定的最高值';
        }elseif ($videourl_error==3) {
            $err = '文件上传不完整';
        }elseif ($videourl_error==4) {
            $err = '没有文件被上传';
        }elseif ($videourl_error==6) {
            $err = '找不到临时文件夹';
        }elseif ($videourl_error==7) {
            $err = '文件写入失败';
        }
        echo json_encode(array(
            'state' => 2,
            'err'=>$err
        ));return;
    }

    $videocover_type = $videocover['type'];
    $videocover_size = $videocover["size"];
    $videocover_name = $videocover['name'];
    $videocover_tmpname = $videocover['tmp_name'];
    
    $videourl_type = $videourl['type'];
    $videourl_size = $videourl["size"];
    $videourl_name = $videourl['name'];
    $videourl_tmpname = $videourl['tmp_name'];
    
    $imgname_upload_success = false;
    
    if(!file_exists(VIDEO)){
        file::mk_dir(VIDEO);
    }
    $imgname = '';
    if(($videourl_type=='video/mp4' || $videourl_type=='video/quicktime' ) && ($videourl_size < VIDEOSIZE*1024*1024) && $videourl_size>0){
        if($videocover_size){
          if(($videocover_type=='image/jpeg' || $videocover_type=='image/png' || $videocover_type=='image/gif' || $videocover_type==='image/pjpeg') && ($videocover_size < COVERSIZE*1024*1024) && $videocover_size>0){
              $imgname = md5(uniqid()).strstr($videocover_name,'.');
              $imgurl = VIDEO.$imgname;
              if(move_uploaded_file($videocover_tmpname, $imgurl)){
                  $imgname_upload_success = true;
              }
          }
        }
        $videoname = md5(uniqid()).strstr($videourl_name,'.');
        $videourl = VIDEO.$videoname;
        if(move_uploaded_file($videourl_tmpname, $videourl)){
            
            if($vidtype=='long'){
                $videocover = VIDEOURL.$imgname;
                $videourl = VIDEOURL.$videoname;
                $shortvidcover = $shortvidurl = '';
            }else if($vidtype=='short'){
                $shortvidcover = VIDEOURL.$imgname;
                $shortvidurl = VIDEOURL.$videoname;
                $videocover = $videourl = '';
            }
            
            
            $array = array(
                'userid'=>$tel,
            	'title'=>$textarea,
            	'videocover'=>$videocover,
            	'videourl'=>$videourl,
            	'shortvidurl'=>$shortvidurl,
            	'shortvidcover'=>$shortvidcover,
            	'diamond'=>0,
            	'vipdiam'=>0,
            	'hot'=>0,
            	'likes'=>0,
            	'topic'=>$topiclist,
            	'istuijian'=>0,
            	'flag'=>'',
                'ftime'=>time(),
                'filesize'=>'',
                'addparam'=>'',
                'downloadurl'=>'',
            	'ishow'=>2
            );
            
            //file::debug(json_encode($array));
            $res = $db->exec('post','i',$array);
            if($res){
                echo json_encode(array(
                    'state'=>1
                ));
            }else{
                echo json_encode(array(
                    'state'=>2,
                    'err'=>'数据库异常,上传失败!!'
                ));
            }
        }else{
          echo json_encode(array(
              'state' => 2,
              'err'=>'视频文件上传失败!'
          ));
        }    
    }else{
        echo json_encode(array(
          'state' =>2,
          'err'=>'视频文件类型错误或大小不符要求!'
        ));
    }
    
?>


