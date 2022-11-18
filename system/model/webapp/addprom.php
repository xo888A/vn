<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    
    $btit = CW('post/btit');
    $descs = CW('post/descs');
    $stit = CW('post/stit');
    $db = functions::db();
    if(strlen($btit)>30 || strlen($btit)<1){
    	msg('Tiêu đề lớn tối đa 30 ký tự, 10 từ','Làm mới','','',true);
    }
    if(strlen($descs)>180 || strlen($descs)<1){
    	msg('Mô tả lên đến 180 ký tự, 60 từ','Làm mới','','',true);
    }
    if(strlen($stit)>21 || strlen($stit)<1){
    	msg('Mô tả lên đến 21 ký tự, 7 ký tự','Làm mới','','',true);
    }
    $res = $db->exec('gooddeal','i',array(
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
    ));
    
   
    if($res){
        msg('Thêm thành công!','Làm mới','javascript:location.reload()','success',true);
    }else{
        msg('Thêm thất bại!','Cài lại','javascript:location.reload()','error',true);
    }
?>