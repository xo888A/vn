<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $id = CW('post/id');
    $db = functions::db();
	if(!$id){
		msg('ID không tồn tại, vui lòng quay lại danh sách và thao tác lại','Làm mới','','',true);
	}
    $title = CW('post/title');
    if(strlen($title)>90 || strlen($title)<3){
    	msg('ký tự tiêu đề bắt buộc phải là3~90','Làm mới','','',true);
    }
    $time1 = strtotime(CW('post/time1'));
    $time2 = strtotime(CW('post/time2'));
    if($time1>$time2){
        msg('Thời gian hoạt động bị sai, thời gian kết thúc phải lớn hơn thời gian bắt đầu','Làm mới','','',true);
    }
    $content5 = str_replace("\"","'",$_POST['content5']);
    $update = array(
    	'title'=>$title,
    	'cover'=>CW('post/activitycover'),
    	'time1'=>strtotime(CW('post/time1')),
    	'time2'=>strtotime(CW('post/time2')),
    	'click'=>CW('post/select'),
    	'content1'=>CW('post/content1'),
    	'content2'=>CW('post/content2'),
    	'content3'=>CW('post/content3'),
    	'content4'=>CW('post/content4'),
    	'content5'=>$content5 ? $content5 : 'Không có nội dung'
    );

    $res = $db->exec('activity','u',array($update,array(
    	'id'=>$id	
    )));
    
   
    if($res){
        msg('Chỉnh sửa thành công!','Làm mới','javascript:location.reload()','success',true);
    }else{
        msg('Dữ liệu thay đổi!','Cài đặt lại','javascript:location.reload()','error',true);
    }
?>