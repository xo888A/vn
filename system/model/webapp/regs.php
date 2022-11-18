<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $tel = CW('post/tel',3);
    $pass = CW('post/pass',3);
    $passt = CW('post/passt',3);
    $ip = functions::get_real_ip();
    $db = functions::db();
    $isover = $db->query('users','ftime',"ip='{$ip}'",'',1);
    $regtime = $isover[0]['ftime'];
    if(date('Ymd',$regtime)==date('Ymd',time())){
         echo json_encode(array(
             'err'=>'Mỗi người chỉ được đăng ký 1 tài khoản mỗi ngày'
         ));return;
    }
    if(!$tel || !$pass || !$passt){
        echo json_encode(array(
            'err'=>'Bắt buộc điền cho mỗi trang!'
        ));return;
    }
    if($pass!=$passt){
        echo json_encode(array(
            'err'=>'Mật khẩu xác nhận không nhất quán!'
        ));return;
    }
    $db = functions::db();
    $exist = $db->query('users','',"tel='{$tel}'",'id asc',1);
    if($exist){
        echo json_encode(array(
            'err'=>'Tài khoản đã được đăng ký!'
        ));return;
    }

    $code = CW('cookie/card');

    // if(!is_numeric($tel)){
    //     echo json_encode(array(
    //         'err'=>'tài khoản vui lòng điền số điện thoại hoặc số!'
    //     ));return;
    // }
    if(strlen($tel)<8 || strlen($pass)<8){
        echo json_encode(array(
            'err'=>'Số tài khoản hoặc mật khẩu không được ít hơn 8 chữ số!'
        ));return;
    }
    if(strlen($tel)>11 || strlen($pass)>20){
        echo json_encode(array(
            'err'=>'Số tài khoản hoặc mật khẩu không được vượt quá 20 chữ số!'
        ));return;
    }
    $isexist = false;
	$card = '';
	do {
		$card = chr(rand(97,122)).mt_rand(100000000,999999999);
		$isexist = $db->query('users','id',"card='{$card}'");
	} while ($isexist);
    $user = $db->query('sets','desces,nickname','id=1');
    $array = explode('|',$user[0]['nickname']);
    $nickname = $array[array_rand($array,1)];
    $avatar = IMG.'/avatar/o1/'.mt_rand(1,120).'.jpg';
    $descs = $user[0]['desces'];
    $time = time();
    $res = $db->exec('users','i',array(
        'nickname'=>$nickname,
        'tel'=>$tel,
        'password'=>functions::autocode($pass),
        'avatar'=>$avatar,
        'card'=>$card,
        'descs'=>$descs,
        'ftime'=>$time,
        'ip'=>$ip
    ));

    if($res){
        $append = '';
        if($code){
            $prevtel = $db->query('users','tel',"card='{$code}'",'',1);
            $prevtel = $prevtel[0]['tel']; 
            if($prevtel){
                
                functions::intobroker($prevtel,$tel,$time,0,$code);
            }
            
        }
        functions::set_cookie('__username',functions::autocode($tel));
        echo json_encode(array(
            'do'=>'goindex',
            'data'=>'Đăng ký thành công'
        ));
    }else{
        echo json_encode(array(
            'err'=>'Đăng ký không thành công, vui lòng thử lại sau!'
        ));
    }
?>