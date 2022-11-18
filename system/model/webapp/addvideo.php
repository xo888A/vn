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
//  require_once  ROOT_URL.'/system/model/autoload.php';
// 	use Qiniu\Auth;
// 	use Qiniu\Storage\UploadManager;
// 	$auth = new Auth('GcjjSafVyxPrVGuTiDj4SMgZbRj8YEG7ewnw5KeI', 'pmJsVaB01lKeKlrLmJNYkFW-O7M_VgRmGjXnyrd9');
// 	$token = $auth->uploadToken(QJN);
// 	$uploadMgr = new UploadManager();
    
    
    
    $db = functions::db();
    $title = CW('post/title',5);
    $videocover = CW('post/videocover');
    $videourl = CW('post/videourl');
    $diamond = intval(CW('post/diamond'));
    $vipdiam = intval(CW('post/vipdiam'));
    if($vipdiam>$diamond){
        msg('Giá kim cương thành viên phải thấp hơn giá kim cương phổ thông','Làm mới','','',true);
    }
    $hot = CW('post/hot') ? CW('post/hot') : mt_rand(2000,50000);
    $like = CW('post/like') ? CW('post/like') : mt_rand(2000,50000);
    // $ftime = CW('post/ftime');
    ///////////////////////
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
    //     msg('Định dạng sai số điện thoại','Làm mới','','',true);
    // }
    $ishow = CW('post/ishow')=='公开' ? 1 : 0;
    $ftime = CW('post/ftime') ? strtotime(CW('post/ftime')) : time();
    $res = $db->exec('post','i',array(
        'userid'=>$userid,
    	'title'=>$title,
    	'videocover'=>$videocover,
    	'videourl'=>$videourl,
    	'diamond'=>$diamond,
    	'vipdiam'=>$vipdiam,
    	'hot'=>$hot,
    	'likes'=>$like,
    	'topic'=>$_ids,
    	'istuijian'=>CW('post/istuijian'),
    	'flag'=>CW('post/flag'),
        'ftime'=>$ftime,
        'filesize'=>CW('post/filesize') ? CW('post/filesize') : '',
        'addparam'=>CW('post/addparam'),
        'downloadurl'=>CW('post/downloadurl'),
    	'ishow'=>$ishow,
    	'downlevel'=>$level
    ));
    
   
    if($res){
        if($ishow){
            $array = explode(',',$_ids);
            foreach ($array as $val){
                $num = $db->query('topic','num',"id='{$val}'",'',1);
                $num = intval($num[0]['num'])+1;
                $db->exec('topic','u',"num='{$num}',id='{$val}'");
            }
        }
        msg('Thêm thành công!','Làm mới','javascript:location.reload()','success',true);
    }else{
        msg('Thêm thất bại!','Cài lại','javascript:location.reload()','error',true);
    }
?>