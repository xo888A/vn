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
    $userid = CW('post/userid');
    // if(strlen($userid)!=11){
    // 	msg('Số điện thoại di động phải có 11 chữ số','Làm mới','','',true);
    // }
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
    /////////////////////////
    
    if(strlen($title)>500 || strlen($title)<3){
    	msg('Các ký tự tiêu đề bắt buộc phải là 3~500','Làm mới','','',true);
    }
    $img1 = CW('post/img1') ? CW('post/img1').'|' : '';
    $img2 = CW('post/img2') ? CW('post/img2').'|' : '';
    $img3 = CW('post/img3') ? CW('post/img3').'|' : '';
    $img4 = CW('post/img4') ? CW('post/img4').'|' : '';
    $img5 = CW('post/img5') ? CW('post/img5').'|' : '';
    $img6 = CW('post/img6') ? CW('post/img6').'|' : '';
    $img7 = CW('post/img7') ? CW('post/img7').'|' : '';
    $img8 = CW('post/img8') ? CW('post/img8').'|' : '';
    $img9 = CW('post/img9') ? CW('post/img9').'|' : '';
    $img = $img1.$img2.$img3.$img4.$img5.$img6.$img7.$img8.$img9;
    $img = substr($img,0,-1);
    $ftime = CW('post/ftime') ? strtotime(CW('post/ftime')) : time();
    $update = array(
        'userid'=>$userid,
    	'title'=>$title,
    	'imglist'=>$img,
    	'diamond'=>$diamond,
    	'shikan'=>CW('post/shikan'),
    	'vipdiam'=>$vipdiam,
    	'hot'=>$hot,
    	'ftime'=>$ftime,
    	'updatetime'=>time(),
    	'organcover'=>CW('post/organcover'),
    	'likes'=>$like,
    	'istuijian'=>CW('post/istuijian'),
    	'filesize'=>CW('post/filesize') ? CW('post/filesize') : '',
        'addparam'=>CW('post/addparam'),
        'downloadurl'=>CW('post/downloadurl'),
    	'topic'=>$_ids,
    	'imgcontent'=>str_replace("\"","'",$_POST['imgcontent']),
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
        msg('Dữ liệu không đổi!','Cài đặt lại','javascript:location.reload()','error',true);
    }
?>