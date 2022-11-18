<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();

    $db = functions::db();

    $nickname = CW('post/nickname');
    if(strlen($nickname)>18 || strlen($nickname)<3){
    	//msg('Yêu cầu ký tự tiêu đề là 3 ~ 18','Làm mới','','',true);
    }
    $tel = CW('post/tel');
    if(strlen($tel)!=11){
    	//msg('Số điện thoại phải có 11 chữ số','Làm mới','','',true);
    }
    
    $days = CW('post/days');
    if($days>7 || $days<0){
    	msg('Phạm vi số ngày đăng nhập','Làm mới','','',true);
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
        msg('Cài đặt sai!','Làm mới','javascript:location.reload()','notice',true);
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
        msg('Sau khi cài đặt, thời gian VIP phải lớn hơn thời điểm hiện tại!','Làm mới','javascript:location.reload()','notice',true);
    }
    
    $add = array(
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
    	'email'=>CW('post/email'),
    	'miaoshu'=>CW('post/miaoshu'),
    	'addparam'=>CW('post/addparam'),
    	'descs'=>$desc,
    	'man'=>CW('post/man'),
    	'kouliang'=>CW('post/kouliang'),
    	'freeze'=>$freeze=='冻结' ? '1' : '0',
    	'password'=>functions::autocode(CW('post/password')),
    	'cover'=>CW('post/cover'),
    	'avatar'=>CW('post/avatar'),
    	'flonum'=>intval(CW('post/flonum'))
    );

    $res = $db->exec('users','i',$add);
    
   
    if($res){
        msg('Thêm thành công!','Làm mới','javascript:location.reload()','success',true);
    }else{
        msg('Không có thay đổi về dữ liệu!','Cài lại','javascript:location.reload()','error',true);
    }
?>