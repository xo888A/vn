<?php 
    if(!defined('CW')){exit('Access Denied');}
    $tel = CW('post/tel',1);
    $c = CW('post/card',3);
    if(!$c){
        echo json_encode(array(
            'err'=>'Vui lòng điền số thẻ!',
            'state'=>2
        ));return;
    }
    $db =functions::db();
    $card = $db->query('card','',"card='{$c}'",'',1);
    if(!$card){
        echo json_encode(array(
            'state'=>2,
            'err'=>'Số thẻ không hợp lệ!'
        ));return;
    }
    if($card[0]['ishow']){
        echo json_encode(array(
            'state'=>2,
            'err'=>'Thẻ đổi thưởng đã được sử dụng'
        ));return;
    }
    $issuccess= 0;
    //////////////////////////
    $user = $db->query('users','',"tel='{$tel}'");
    $user_diam = $user[0]['diam'];
    $viptime = $user[0]['viptime'];
    $cardtype = intval($card[0]['cardtype']);
    $res1 = $res2 = '';
    if($cardtype==1){//+kim cương
        $ndiam = $user_diam + $card[0]['cardnum'];
        //$res1 = $db->exec("update users set diam='{$ndiam}' where tel='{$tel}'");
        $res1 = $db->exec('users','u',"diam='{$ndiam}',tel='{$tel}'");
        if($res1){
            $db->exec('card','u',"ishow=1,card='{$card[0]['card']}'");
        }
        $res2 = $db->exec('message','i',array(
            'tel'=>$tel,
            'ftime'=>time(),
            'mtype'=>'Đổi thẻ',
            'desces'=>'Đổi kim cương'.$card[0]['cardnum'].'kim cương'
        ));
        $issuccess = 1;
        $data = "Đổi thành công{$card[0]['cardnum']}kim cương";
    }elseif ($cardtype==2) {
        if(!$viptime){//Chưa từng là thành viên
            $viptime = time()+$card[0]['cardnum']*24*60*60;
        }else{
            if($viptime>time()){
                $viptime = $viptime+$card[0]['cardnum']*24*60*60;
            }else{
                $viptime = time()+$card[0]['cardnum']*24*60*60;
            }
        }
        if($card[0]['mylevel']){
            $mylevel = $card[0]['mylevel'];
            $add2 = ',Thăng cấp lên VIP'.$mylevel;
        }else{
            $mylevel = $user[0]['mylevel'];
            $add2 = '';
        }
        if($card[0]['jinbinum']){
            $diam_ = $card[0]['jinbinum']+$user_diam;
            $add1 = ',Tặng tiền'.$diam_.'VNĐ';
        }else{
            $diam_ = $user_diam;
            $add1 = '';
        }
        $res1 = $db->exec("update users set diam='{$diam_}',viptime='{$viptime}',mylevel='{$mylevel}' where tel='{$tel}'");
        if($res1){
            $db->exec('card','u',"ishow=1,card='{$card[0]['card']}'");
        }
        $res2 = $db->exec('message','i',array(
            'tel'=>$tel,
            'ftime'=>time(),
            'mtype'=>'Đổi thẻ',
            //'mylevel'=>1,
            'desces'=>'Đổi VIP'.$card[0]['cardnum'].'ngày'.$add1.$add2
        ));
        $data = "Đổi thánh công{$card[0]['cardnum']}Ngày VIP".$add1.$add2;$issuccess=1;
    }
    echo json_encode(array(
        'data'=>$data,
        'issuccess'=>$issuccess,
        'state'=>1,
    ));
?>