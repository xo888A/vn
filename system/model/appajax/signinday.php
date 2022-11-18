<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $tel = CW('post/tel');
    $users = $db->query('users','money,diam,days,daystime',"tel='{$tel}'",'',1);
    $money = $users[0]['money'];
    $diam = $users[0]['diam'];
    $daystime = $users[0]['daystime'];
    
    if(date('Ymd',time())==date('Ymd',$daystime)){
        echo json_encode(array(
            'state'=>2,
            'err'=>'Hôm nay bạn đã nhận, xin mời bạn ngày mai quay lại!',
        ));return;
    }
    $days = $users[0]['days']+1;
    $days = $days>7 ? 1: $days;
    $signinset = $db->query('signinset','',"day='{$days}'");
    
    
    
    if($signinset[0]['rewardtype']=='1'){//金币
        $_diam = $signinset[0]['reward'];
        $_money = 0;
        $text = 'Nhận tiền'.$_diam.'Mỗi';
    }elseif ($signinset[0]['rewardtype']=='2') {//红包
        $_money = $signinset[0]['reward'];
        $_diam = 0;
        $text = 'Nhận thưởng'.$_money.'VND';
    }else{
        $_money = $_diam = 0;
        $text = '';
    }
    $allmoney = $money+$_money;
    $alldiam = $diam+$_diam;
    $res = $db->exec('users','u',array(array(
        'money'=>$allmoney,
        'diam'=>$alldiam,
        'days'=>$days,
        'daystime'=>time()
    ),array(
        'tel'=>$tel
    )));
    if($res){
        $db->exec('message','i',array(
            'tel'=>$tel,
            'ftime'=>time(),
            'mtype'=>'Nhận thưởng mỗi ngày',
            'desces'=>'Nhận thưởng mỗi ngày, '.$text
        ));
        echo json_encode(array(
            'state'=>1,
            'data'=>$text.', Thông tin chi tiết vui lòng tham khảo tại điều trung tâm hội viên'
        ));
    }else{
        echo json_encode(array(
            'state'=>2,
            'err'=>'Nhận thưởng thất bại, vui lòng thử lại sau!'
        ));
    }
?>