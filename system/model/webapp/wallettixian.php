<?php 
    if(!defined('CW')){exit('Access Denied');}
    $wtype = CW('post/wtype');
    $money = intval(CW('post/wallet'));
    $tel = getuser();
    $pass = CW('post/pass');
    $db = functions::db();
    $user = $db->query('users','money,withdrawalspass',"tel='{$tel}'",'',1);
    $minmoney = functions::getfield('sets','withdrawals','id=1');
    if(!$user){
        echo json_encode(array(
            'err'=>'Tài khoản sai, vui lòng đăng nhập lại'
        ));return;
    }
    if(!$user[0]['money']){
        echo json_encode(array(
            'err'=>'Số dư của bạn là 0 không thể rút được'
        ));return;
    }
    if($user[0]['money']<$money){
        echo json_encode(array(
            'err'=>'Số tiền đã nhập quá lớn'
        ));return;
    }
    if(!$user[0]['withdrawalspass']){
        echo json_encode(array(
            'err'=>'Vui lòng đặt mật khẩu rút tiền trước'
        ));return;
    }
    if($user[0]['withdrawalspass']!=$pass){
        echo json_encode(array(
            'err'=>'Lỗi mật khẩu rút tiền'
        ));return;
    }
    if($money<$minmoney){
        echo json_encode(array(
            'err'=>"Rút tiền tối thiểu{$minmoney}đồng"
        ));return;
    }
    $minpay = functions::getfield('sets','pay','id=1');
    $userpay = $db->query("select sum(pay) from pays where tel='{$tel}'");

    if(intval($userpay[0]['sum(pay)'])<$minpay){
        echo json_encode(array(
            'err'=>"Nạp tiền tối thiểu{$minpay}đồng,mới được rút"
        ));return;
    }
    $bankcard = CW('post/bankcard');
    $bankcardname = CW('post/bankcardname');
    $bankcardtype = CW('post/bankcardtype');
    $numberaddress = CW('post/numberaddress');
    $alipayname = CW('post/alipayname');
    $alipay = CW('post/alipay');
    
    
    if($wtype=='bank'){
        if(!$bankcard || !$bankcardtype || !$bankcardname){
            echo json_encode(array(
                'err'=>'Các mục cần nhập'
            ));return;
        }
        $res = $db->exec('withdrawals','i',array(
            'tel'=>$tel,
            'ftime'=>time(),
            'money'=>$money,
            'wtype'=>'bank',
            'bankcard'=>$bankcard,
            'bankcardname'=>$bankcardname,
            'bankcardtype'=>$bankcardtype,
            'myorder'=>md5(uniqid())
        ));
        $newmoney = $user[0]['money'] - $money;
        $res2 = $db->exec('users','u',"money='{$newmoney}',tel='{$tel}'");
        if($res && $res2){
            echo json_encode(array(
                'data'=>"Rút tiền thành công",
                'do'=>'tx'
            ));
        }else{
            echo json_encode(array(
                'err'=>'Rút tiền không thành công, vui lòng thử lại'
            ));
        };
    }elseif ($wtype=='number') {
        if(!$numberaddress){
            echo json_encode(array(
                'err'=>'Vui lòng nhập địa chỉ coin'
            ));return;
        }
        $res = $db->exec('withdrawals','i',array(
            'tel'=>$tel,
            'ftime'=>time(),
            'money'=>$money,
            'wtype'=>'number',
            'numberaddress'=>$numberaddress,
            'myorder'=>md5(uniqid())
        ));
        $newmoney = $user[0]['money'] - $money;
        $res2 = $db->exec('users','u',"money='{$newmoney}',tel='{$tel}'");
        if($res && $res2){
            echo json_encode(array(
                'data'=>"Rút tiền thành công",
                'do'=>'tx'
            ));
        }else{
            echo json_encode(array(
                'err'=>'Rút tiền không thành công, vui lòng thử lại'
            ));
        };
    }elseif ($wtype=='alipay') {
        if(!$alipayname || !$alipay){
            echo json_encode(array(
                'err'=>'Mỗi trang đều cần nhập'
            ));return;
        }
        $res = $db->exec('withdrawals','i',array(
            'tel'=>$tel,
            'ftime'=>time(),
            'money'=>$money,
            'wtype'=>'alipay',
            'alipayname'=>$alipayname,
            'alipay'=>$alipay,
            'myorder'=>md5(uniqid())
        ));
        $newmoney = $user[0]['money'] - $money;
        $res2 = $db->exec('users','u',"money='{$newmoney}',tel='{$tel}'");
        if($res && $res2){
            echo json_encode(array(
                'data'=>"Rút tiền thành công",
                'do'=>'tx'
            ));
        }else{
            echo json_encode(array(
                'err'=>'Rút tiền không thành công, vui lòng thử lại'
            ));
        };
    }
?>