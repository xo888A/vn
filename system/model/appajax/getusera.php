<?php 
    if(!defined('CW')){exit('Access Denied');}
 
    $db = functions::db();
    $tel = CW('post/tel');
    $level = $db->query('users','mylevel',"tel='{$tel}'",'',1);
    $level = $level[0]['mylevel'];
    $user = $db->query('users','',"tel='{$tel}'",'',1);
    $phoneadv = functions::get_contents(INDEX.'/webajax.php?mod=getphoneadv&dev=app&position=用户模块-3广告&num=6&level='.$level);

    if($user[0]['mylevel']>0){
        $levelurl = "<img src='../image/T{$user[0]['mylevel']}.png' class='level' />";
    }else{
        $levelurl =  '';
    }
    if($user[0]['viptime']>time()){
        $style = "display:none";
    }else{
        $style = '';
    }
    echo json_encode(array(
        'style'=>$style,
        'phoneadv'=>$phoneadv,
        'username'=>$tel ? $tel : 'Khách ghé thăm',
        'levelurl'=>$levelurl,
        'sex'=>$user[0]['sex']=='女' ? '../image/nv.png' : '../image/nan.png',
        'avatar'=>$user[0]['avatar'],
        'nickname'=>$user[0]['nickname'] ? $user[0]['nickname'] : 'Người dùng',
        'diam'=>$user[0]['diam'] ? $user[0]['diam'] : 0,
        'mylevel'=>$user[0]['mylevel'] ? $user[0]['mylevel'].'Đẳng cấp hội viên' : 'Hội viên phổ thông',
        'level'=>$user[0]['mylevel'] ? $user[0]['mylevel'] : 0,
        'diam'=>$user[0]['diam'] ? 'Số dư:'.$user[0]['diam'] : 'Số dư:0',
        'money'=>$user[0]['money'] ? 'Số dư:'.$user[0]['money'].'VNĐ' : 'Số dư:0VNĐ',
        'state'=>1
    ));

?>