<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
     $id = CW('post/id');
    $db = functions::db();
    $tel = CW('post/tel');
    $title = CW('post/title');
    if(!CW('post/topic')){
        msg('Thêm ít nhất một chủ đề','Làm mới','','',true);
    }
    $topic = explode('|',CW('post/topic'));
    $db = functions::db();
	foreach ($topic as $val){
	    
	    $_exist = $db->query('topic','id',"name='{$val}'",'',1);
	    if(!$_exist){
		    $db->exec('topic','i',array(
		        'name'=>$val,
		        'cover'=>TU.'/defaultcover.png',
		        'tuijian'=>'',
		        'desces'=>'Không có mô tả cho chủ đề này~~',
		        'hot'=>mt_rand(1000,98888),
		        'num'=>0,
		        'beijingtu'=>TU.'/beijingtu.jpg'
		    ));
		}
	    
	    
	    
		$_id = $db->query('topic','id',"name='{$val}'",'',1);
		$_ids .= $_id[0]['id'].',';
	}
	$_ids = substr($_ids,0,strlen($_ids)-1);
    $shortvidcover = CW('post/shortvidcover');
    $shortvidurl = CW('post/shortvidurl');
    $likes = intval(CW('post/likes'));
    $ishow = CW('post/ishow');
    if(strlen($title)>500 || strlen($title)<6){
    	msg('Số ký tự tiêu đề phải là 6-500','Làm mới','','',true);
    }
    if(strlen($tel)!=11){
    	//msg('Số điện thoại di động phải có 11 chữ số','Làm mới,'','',true);
    }
    if(CW('post/diamond')=='VIP'){
	    $diamond = 1;
	}else{
	    $diamond = 0;
	}
    $ftime = CW('post/ftime') ? strtotime(CW('post/ftime')) : time();
    $res = $db->exec('post','u',array(array(
        'userid'=>$tel,
    	'title'=>$title,
    	'shortvidcover'=>$shortvidcover,
    	'shortvidurl'=>$shortvidurl,
    	'likes'=>$likes,
    	'topic'=>$_ids,
    	'diamond'=>$diamond,
        'ftime'=>$ftime,
    	'ishow'=>$ishow=='公开' ? 1 : 0
    ),array(
        'id'=>$id
    )));
   
    if($res){
        msg('Cập nhật thành công!','Làm mới','javascript:location.reload()','success',true);
    }else{
        msg('Dữ liệu không đổi!','Cài đặt lại','javascript:location.reload()','error',true);
    }
?>