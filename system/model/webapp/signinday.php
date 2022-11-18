<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $tel = getuser();
    $users = $db->query('users','money,diam,days,daystime',"tel='{$tel}'",'',1);
    $money = $users[0]['money'];
    $diam = $users[0]['diam'];
    $daystime = $users[0]['daystime'];
    
    if(date('Ymd',time())==date('Ymd',$daystime)){
        echo json_encode(array(
            'err'=>'Bạn đã điểm danh hôm nay, vui lòng quay lại vào ngày mai!',
        ));return;
    }
    $days = $users[0]['days']+1;
    $days = $days>7 ? 1: $days;
    $signinset = $db->query('signinset','',"day='{$days}'");
    
    
    
    if($signinset[0]['rewardtype']=='1'){//Kim cương
        $_diam = $signinset[0]['reward'];
        $_money = 0;
        $text = 'Số tiền thu được'.$_diam.'VNĐ';
    }elseif ($signinset[0]['rewardtype']=='2') {//Tiền thưởng
        $_money = $signinset[0]['reward'];
        $_diam = 0;
        $text = 'Phong bì thu được'.$_money.'cái';
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
            'mtype'=>'Điểm danh hằng ngày',
            'desces'=>'Điểm danh hằng ngày, '.$text
        ));
        echo json_encode(array(
            'success'=>1,
            'allmoney'=>$allmoney,
            'alldiam'=>$alldiam,
            'data'=>$text,
            'do'=>'qiandao'
        ));
    }else{
        echo json_encode(array(
            'err'=>'Điểm danhh thất bại, vui lòng thử lại!'
        ));
    }
?>