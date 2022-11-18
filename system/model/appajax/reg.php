<?php 
    if(!defined('CW')){exit('Access Denied');}
 
    $tel = CW('post/tel',3);
    $pass = CW('post/pass',3);
    $passt = CW('post/passt',3);
    $ip = CW('post/ip');
    $db = functions::db();
    $isover = $db->query('users','ftime',"ip='{$ip}'",'',1);
    $regtime = $isover[0]['ftime'];
    if(date('Ymd',$regtime)==date('Ymd',time())){
         echo json_encode(array(
             'state'=>2,
             'err'=>'Một người mỗi ngày chỉ được đăng ký 1 tài khoản'
         ));return;
    }
    if(!$tel || !$pass || !$passt){
        echo json_encode(array(
            'state'=>2,
            'err'=>'Vui lòng điền tất cả các mục!'
        ));return;
    }
    if($pass!=$passt){
        echo json_encode(array(
            'state'=>2,
            'err'=>'Mật khẩu xác nhận sai!'
        ));return;
    }
    $db = functions::db();
    $exist = $db->query('users','',"tel='{$tel}'",'id asc',1);
    if($exist){
        echo json_encode(array(
            'state'=>2,
            'err'=>'Tên tài khoản đã có người đăng ký!'
        ));return;
    }
    
    $code = CW('post/card');
    // if(!is_numeric($tel)){
    //     echo json_encode(array(
    //         'state'=>2,
    //         'err'=>'用户名请填写电话号码或者数字!'
    //     ));return;
    // }
    if(strlen($tel)<8 || strlen($pass)<8){
        echo json_encode(array(
            'state'=>2,
            'err'=>'Tài khoản hoặc mật khẩu không được ít hơn 8 ký tự!'
        ));return;
    }
    if(strlen($tel)>11 || strlen($pass)>20){
        echo json_encode(array(
            'state'=>2,
            'err'=>'Tài khoản hoặc mật khẩu không được nhiều hơn 20 ký tự!'
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
                functions::intobroker($prevtel,$tel,$time,1,$code);
            }
            
        }

        echo json_encode(array(
            'do'=>'goindex',
            'tel'=>$tel,
            'level'=>0,
            'data'=>'注Đăng ký thành công, vui lòng lưu lại tài khoản và mật khẩu của bạn, kiến nghị chụp lại màn hình và lưu trữ!'."Tài khoản:{$tel} Mật khẩu: {$pass}",
            'state'=>1
        ));
    }else{
        echo json_encode(array(
            'state'=>2,
            'err'=>'Đăng ký thất bại, vui lòng thử lại sau!'
        ));
    }
?>
