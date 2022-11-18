<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $lv0 = CW('post/lv0') ? '0,' : '';
    $lv1 = CW('post/lv1') ? '1,' : '';
    $lv2 = CW('post/lv2') ? '2,' : '';
    $lv3 = CW('post/lv3') ? '3,' : '';
    $lv4 = CW('post/lv4') ? '4,' : '';
    $lv5 = CW('post/lv5') ? '5,' : '';
    $lv6 = CW('post/lv6') ? '6,' : '';
    $level = $lv0.$lv1.$lv2.$lv3.$lv4.$lv5.$lv6;
    $id = CW('post/id');
	if(!$id){
		msg('ID không tồn tại, vui lòng quay lại danh sách thao tác lại','Làm mới','','',true);
	}
    $title = CW('post/title');
    $videocover = CW('post/videocover');
    $videourl = CW('post/videourl');
    $diamond = intval(CW('post/diamond'));
    $vipdiam = intval(CW('post/vipdiam'));
    if($vipdiam>$diamond){
        msg('Giá kim cương thành viên phải thấp hơn giá kim cương thông thường','Làm mới','','',true);
    }
    $hot = CW('post/hot');
    $like = CW('post/like');
    // $ftime = CW('post/ftime');
    ///////////////////////
    $topic = CW('post/topic');
    if(!$topic){
        msg('Thêm ít nhất một chủ đề','Làm mới','','',true);
    }
    $topic = explode('|',$topic);
    $db = functions::db();
	foreach ($topic as $val){
	    
	    $_exist = $db->query('topic','id',"name='{$val}'",'',1);
	    if(!$_exist){
		    $db->exec('topic','i',array(
		        'name'=>$val,
		        'cover'=>TU.'/defaultcover.png',
		        'tuijian'=>'',
		        'desces'=>'Không có mô tả cho chủ đề này~~',
		        'hot'=>0,
		        'num'=>0,
		        'beijingtu'=>TU.'/beijingtu.jpg'
		    ));
		}
		$_id = $db->query('topic','id',"name='{$val}'",'',1);
		$_ids .= $_id[0]['id'].',';
	}
	$_ids = substr($_ids,0,strlen($_ids)-1);
    /////////////////////////
    
    if(strlen($title)>500 || strlen($title)<3){
    	msg('Yêu cầu ký tự tiêu đề là 3 ~ 500','Làm mới','','',true);
    }
    $userid = CW('post/userid');
    // if(!preg_match("/^1[3|4|5|8][0-9]\d{8}$/",$userid)){    
    //     msg('Định dạng sai số điện thoại di động','Làm mới','','',true);
    // }
    $ftime = CW('post/ftime') ? strtotime(CW('post/ftime')) : time();
    $update = array(
        'userid'=>$userid,
    	'title'=>$title,
    	'videocover'=>$videocover,
    	'videourl'=>$videourl,
    	'diamond'=>$diamond,
    	'vipdiam'=>$vipdiam,
    	'addparam'=>CW('post/addparam'),
    	'hot'=>$hot,
    	'ftime'=>$ftime,
    	'likes'=>$like,
    	'topic'=>$_ids,
    	'istuijian'=>CW('post/istuijian'),
    	'flag'=>CW('post/flag'),
    	'updatetime'=>time(),
    	'filesize'=>CW('post/filesize') ? CW('post/filesize') : '',
    	'downloadurl'=>CW('post/downloadurl'),
    	'downlevel'=>$level,
    // 	'ftime'=>CW('post/ftime') ? strtotime(CW('post/ftime')) : time(),
    	'ishow'=>CW('post/ishow')=='公开' ? 1 : 0
    );
    

    
    $res = $db->exec('post','u',array($update,array(
    	'id'=>$id	
    )));
    
   
    if($res){
        msg('Hoàn thành cập nhật!','Làm mới','javascript:location.reload()','success',true);
    }else{
        msg('Dữ liệu không thay đổi!','Cài đặt lại','javascript:location.reload()','error',true);
    }
?>