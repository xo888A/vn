<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    $c = CW('post/card',3);
    if(!$c){
        echo json_encode(array(
            'err'=>'Vui lòng điền số thẻ trước!'
        ));return;
    }
    $card = $db->query('card','',"card='{$c}'",'',1);
    if(!$card){
        echo json_encode(array(
            'err'=>'Số thẻ sai!'
        ));return;
    }
    if($card[0]['ishow']){
        echo json_encode(array(
            'err'=>'Thẻ đổi thưởng đã được sử dụng'
        ));return;
    }
    //////////////////////////
    $tel = getuser();
    $user = $db->query('users','',"tel='{$tel}'");
    $user_diam = $user[0]['diam'];
    $viptime = $user[0]['viptime'];
    $cardtype = intval($card[0]['cardtype']);
    $res1 = $res2 = '';
    if($cardtype==1){//+Tiền vàng
        $ndiam = $user_diam + $card[0]['cardnum'];
        //$res1 = $db->exec("update users set diam='{$ndiam}' where tel='{$tel}'");
        $res1 = $db->exec('users','u',"diam='{$ndiam}',tel='{$tel}'");
        if($res1){
            //$db->exec('card','u',"ishow=1,card='{$card[0]['card']}'");
            $db->exec('card','u',array(array(
                'ishow'=>1,
                'user'=>$tel,
                'ftime'=>time()
            ),array(
                'card'=>$card[0]['card']
            )));
        }
        $res2 = $db->exec('message','i',array(
            'tel'=>$tel,
            'ftime'=>time(),
            'mtype'=>'Đổi thẻ',
            'desces'=>'Đổi tiền vàng'.$card[0]['cardnum'].'个'
        ));
        $data = "Đổi thành công{$card[0]['cardnum']}tiền vàng";
    }elseif ($cardtype==2) {
        if(!$viptime){//Chưa là thành viên
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
            $add2 = ',Nâng cấp lên cấp VIP'.$mylevel;
        }else{
            $mylevel = $user[0]['mylevel'];
            $add2 = '';
        }
        if($card[0]['jinbinum']){
            $diam_ = $card[0]['jinbinum']+$user_diam;
            $add1 = ',Cho tiền vàng'.$diam_.'đồng';
        }else{
            $diam_ = $user_diam;
            $add1 = '';
        }
        $res1 = $db->exec("update users set diam='{$diam_}',viptime='{$viptime}',mylevel='{$mylevel}' where tel='{$tel}'");
        if($res1){
            //$db->exec('card','u',"ishow=1,card='{$card[0]['card']}'");
            $db->exec('card','u',array(array(
                'ishow'=>1,
                'user'=>$tel,
                'ftime'=>time()
            ),array(
                'card'=>$card[0]['card']
            )));
        }
        $res2 = $db->exec('message','i',array(
            'tel'=>$tel,
            'ftime'=>time(),
            'mtype'=>'Đổi thẻ',
            //'mylevel'=>1,
            'desces'=>'Đổi VIP'.$card[0]['cardnum'].'ngày'.$add1.$add2
        ));
        $data = "Đổi thành công{$card[0]['cardnum']}ngày VIP".$add1.$add2;
    }
    echo json_encode(array(
        'data'=>$data,
        'do'=>'covert'
    ));
?>