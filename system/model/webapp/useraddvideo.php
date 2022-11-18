<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    $title = CW('post/title');
    
    $vidtype = CW('post/vidtype');
    if($vidtype=='长视频'){
        $videocover = CW('post/videocover');
        $videourl = CW('post/videourl');
        $shortvidcover = $shortvidurl = '';
    }else if($vidtype=='短视频'){
        $shortvidcover = CW('post/videocover');
        $shortvidurl = CW('post/videourl');
        $videocover = $videourl = '';
    }
    //var_dump($vidtype);return;
    $userid = CW('post/userid');
    $exist_user = $db->query('users','',"tel='{$userid}'",'',1);
    if(!$exist_user){
        echo  json_encode(array(
    	    'data'=>"Người dùng này không tồn tại!"
    	));return;
    }
    $isshenhe = $db->query('post','',"userid='{$userid}' and ishow=2");
    if($isshenhe){
        echo  json_encode(array(
    	    'data'=>"Các bạn có video chưa được duyệt, vui lòng đợi duyệt xong rồi mới tiếp tục đăng!"
    	));return;
    }
    if(!CW('post/topic')){
        echo  json_encode(array(
    	    'data'=>"Vui lòng chọn chủ đề"
    	));return;
    }
    $topic = CW('post/topic');
    
    $exist_topic = $db->query('topic','',"id='{$topic}'",'',1);
    if(!$exist_topic){
        echo  json_encode(array(
    	    'data'=>"Phân loại này không tồn tại"
    	));return;
    }
    if(strlen($title)>500 || strlen($title)<3){
    	echo  json_encode(array(
    	    'data'=>"Yêu cầu ký tự tiêu đề là 3 ~ 500 ký tự"
    	));return;
    }
    if($videocover){
        if(strlen($videocover)>500 || strlen($videocover)<20){
    	echo  json_encode(array(
    	    'data'=>"Độ dài liên kết ảnh bìa video là 20-500"
    	));return;
    }
    }
    if($videourl){
        if(strlen($videourl)>500 || strlen($videourl)<20){
    	echo  json_encode(array(
    	    'data'=>"Độ dài liên kết video là 20-500"
    	));return;
    }
    }
    if($shortvidurl){
        if(strlen($shortvidurl)>500 || strlen($shortvidurl)<20){
    	echo  json_encode(array(
    	    'data'=>"Độ dài liên kết video ngắn là 20-500"
    	));return;
    }
    }
    if($shortvidcover){
        if(strlen($shortvidcover)>500 || strlen($shortvidcover)<20){
    	echo  json_encode(array(
    	    'data'=>"Độ dài liên kết ảnh bìa video ngắn là 20-500"
    	));return;
    }
    }
    
    // if(!preg_match("/^1[3|4|5|8][0-9]\d{8}$/",$userid)){    
    //     msg('Định dạng số điện thoại sai ','Làm mới','','',true);
    // }
    $array = array(
        'userid'=>$userid,
    	'title'=>$title,
    	'videocover'=>$videocover,
    	'videourl'=>$videourl,
    	'shortvidurl'=>$shortvidurl,
    	'shortvidcover'=>$shortvidcover,
    	'diamond'=>0,
    	'vipdiam'=>0,
    	'hot'=>0,
    	'likes'=>0,
    	'topic'=>$topic,
    	'istuijian'=>0,
    	'flag'=>'',
        'ftime'=>time(),
        'filesize'=>'',
        'addparam'=>'',
        'downloadurl'=>'',
    	'ishow'=>2
    );

    $res = $db->exec('post','i',$array);
    
   
    if($res){
        echo  json_encode(array(
    	    'data'=>"Đã đăng thành công, vui lòng đợi quản trị viên duyệt",
    	    'state'=>'success'
    	));return;
    }else{
        echo  json_encode(array(
    	    'data'=>"Không đăng được, vui lòng thử lại sau!"
    	));return;
    }
?>