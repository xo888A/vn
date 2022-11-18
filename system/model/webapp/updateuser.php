<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $id = CW('post/id');
    $db = functions::db();
	if(!$id){
		msg('ID không tồn tại, vui lòng quay lại danh sách thao tác lại','Làm mới','','',true);
	}
    $nickname = CW('post/nickname');
    if(strlen($nickname)>30 || strlen($nickname)<3){
    	//msg('Tên nick tối đa 10 ký tự','Làm mới','','',true);
    }
    $tel = CW('post/tel');
    // if(strlen($tel)!=11){
    // 	msg('Số điện thoại phải có 11 chữ số','Làm mới','','',true);
    // }
    
    $days = CW('post/days');
    if($days>7 || $days<0){
    	msg('Phạm vi số ngày đăng nhập1-7','Làm mới','','',true);
    }
    $card = CW('post/card');
    $diam = CW('post/diam');
    $money = CW('post/money');
    $viptime = CW('post/viptime');
    $sex = CW('post/sex');
    $withdrawalspass = CW('post/withdrawalspass');
    $lockpass = CW('post/lockpass');
    $desc = CW('post/descs');
    $freeze = CW('post/freeze');
    $strtime = strtotime($viptime);
    $mylevel = intval(CW('post/mylevel'));
    if($mylevel>7){
        msg('Cài đặt sao lỗi!','Làm mới','javascript:location.reload()','notice',true);
    }
    if($strtime>time()){
        $level = 1;
    }else{
        $level = 0;
    }
    if($mylevel){
        $level = $mylevel;
    }
    if($level>0 && $strtime<time()){
        msg('Sau khi cài đặt sao, thời gian VIP phải lớn hơn thời điểm hiện tại!','Làm mới','javascript:location.reload()','notice',true);
    }
    
    $update = array(
    	'nickname'=>$nickname,
    	'tel'=>$tel,
    	'card'=>$card,
    	'diam'=>$diam ? intval($diam) : 0,
    	'money'=>$money ? intval($money) : 0,
    	'viptime'=>$viptime ? strtotime($viptime) : 0,
    	'sex'=>$sex,
    	'mylevel'=>$level,
    	'withdrawalspass'=>$withdrawalspass ? $withdrawalspass : '',
    	'lockpass'=>$lockpass ? $lockpass : '',
    	'days'=>$days,
    	'addparam'=>CW('post/addparam'),
    	'miaoshu'=>CW('post/miaoshu'),
    	'descs'=>$desc,
    	'man'=>CW('post/man'),
    	'kouliang'=>CW('post/kouliang'),
    	'freeze'=>$freeze=='冻结' ? '1' : '0',
    	'password'=>functions::autocode(CW('post/password')),
    	'cover'=>CW('post/cover'),
    	'avatar'=>CW('post/avatar'),
    	'email'=>CW('post/email'),
    	'flonum'=>intval(CW('post/flonum'))
    );

    $res = $db->exec('users','u',array($update,array(
    	'id'=>$id	
    )));
    
   
    if($res){
        msg('Hoàn thành cập nhật!','Làm mới','javascript:location.reload()','success',true);
    }else{
        msg('Dữ liệu không thay đổi!','Cài đặt lại','javascript:location.reload()','error',true);
    }
?>