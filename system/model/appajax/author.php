<?php 
    if(!defined('CW')){exit('Access Denied');}
    $usertel = CW('post/usertel');
    $us = CW('post/us');
    $db =functions::db();
    $tuser = $db->query('users','',"tel='{$usertel}'",'',1);
    $sdata1 = functions::hot($tuser[0]['flonum']);
    
    $type = CW('get/type',2);
    $where = "userid='{$usertel}'";

    $tu = TU;
    $count = $db->get_count('post',$where); 

    
    $isfollow = $db->query('follow','',"tel1='{$us}' and tel2='{$usertel}'",'',1);
	        if($isfollow){
                $guanzhu = "<a href='javascript:;' onclick='cancelguanzhu(\"{$usertel}\")' class='wfollowuser user_{$usertel}' user='{$usertel}'  style='background:#ccc'>Đã theo dõi</a>";
            }else{
                $guanzhu = "<a href='javascript:;' onclick='guanzhu(\"{$usertel}\")' class='followuser user_{$usertel}' user='{$usertel}'>Theo dõi</a>";
            }
    
    
    echo json_encode(array(
        'sdata1'=>$sdata1,
        'avatar'=>$tuser[0]['avatar'] ? $tuser[0]['avatar']  : '../image/default.jpg',
        'dfs'=>$tuser[0]['cover'] ? $tuser[0]['cover'] : '../image/beijingtu.jpg' ,
        'sex'=>$tuser[0]['sex']=='Nam' ? '../image/nan.png' : '../image/nv.png',
        'sdata2'=>functions::hot($count),
        'descs'=>$tuser[0]['descs'] ? functions::cut2($tuser[0]['descs'],10) :  'Người dùng lười biếng và không có gì cả',
        'nickname'=>$tuser[0]['nickname'] ? $tuser[0]['nickname'] : 'Người dùng',
        'miaoshu'=>$tuser[0]['miaoshu'] ? "<img src='{$tu}/desc.png'>{$tuser[0]['miaoshu']}" : '',
        'guanzhu'=>$guanzhu,
        'state'=>1
    ));

?>