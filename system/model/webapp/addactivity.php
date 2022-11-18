<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    
    $title = CW('post/title');
    if(strlen($title)>90 || strlen($title)<3){
    	msg('Yêu cầu ký tự tiêu đề là 3 ~ 90','Làm mới','','',true);
    }
    $time1 = strtotime(CW('post/time1'));
    $time2 = strtotime(CW('post/time2'));
    if($time1>$time2){
        msg('Thời gian hoạt động bị sai, thời gian kết thúc phải lớn hơn thời gian bắt đầu','Làm mới','','',true);
    }
    $content5 = str_replace("\"","'",$_POST['content5']);
    $res = $db->exec('activity','i',array(
    	'title'=>$title,
    	'cover'=>CW('post/activitycover'),
    	'time1'=>$time1,
    	'time2'=>$time2,
    	'ftime'=>time(),
    	'click'=>CW('post/select'),
    	'content1'=>CW('post/content1'),
    	'content2'=>CW('post/content2'),
    	'content3'=>CW('post/content3') ? CW('post/content3') : 1,
    	'content4'=>CW('post/content4'),
    	'content5'=>$content5 ? $content5 : 'Không có nội dung'
    ));
    if($res){
        msg('Thêm thành công!','Làm mới','javascript:location.reload()','success',true);
    }else{
        msg('Thêm thất bại!','Cài lại','javascript:location.reload()','error',true);
    }
?>