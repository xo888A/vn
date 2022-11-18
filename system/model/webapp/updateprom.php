<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $id = CW('post/id');
    if(!$id){
    	msg('ID không chính xác, vui lòng đăng nhập lại','Xác nhận','javascript:location.reload()','error');
    }
    $btit = CW('post/btit');
    $descs = CW('post/descs');
    $stit = CW('post/stit');
    $db = functions::db();
    if(strlen($btit)>30 || strlen($btit)<1){
    	msg('Dòng tiêu đề tối đa 30 ký tự, 10 từ','Làm mới','','',true);
    }
    if(strlen($descs)>180 || strlen($descs)<1){
    	msg('Mô tả tối đa 180 ký tự, 60 từ','Làm mới','','',true);
    }
    if(strlen($stit)>21 || strlen($stit)<1){
    	msg('Nhãn có thể lên đến 21 ký tự, 8 từ','Làm mới','','',true);
    }
    $res = $db->exec('gooddeal','u',array(array(
    	'btit'=>$btit,
    	'descs'=>$descs,
    	'cover'=>CW('post/cover'),
    	'diamond'=>intval(CW('post/diamond')),
    	'stit'=>$stit,
    	'hot'=>intval(CW('post/hot')),
    	'star1'=>CW('post/star1'),
    	'star2'=>CW('post/star2'),
    	'star3'=>CW('post/star3'),
    	'ftime'=>time(),
    	'vidlist'=>CW('post/vidlist')
    ),array(
        'id'=>$id    
    )));
   
    if($res){
        msg('Cập nhật thành công!','Xác nhận','','success');
    }else{
        msg('Thao tác thất bại!','Làm mới','javascript:location.reload()','error',true);
    }
?>