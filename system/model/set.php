<?php 
    if(!defined('CW')){exit('Access Denied');}

    $us = getuser();
    $db = functions::db();
    $user = $db->query('users','',"tel='{$us}'",'',1);
    $tpl =  new Society();
    $tpl->assign('nickname',$user[0]['nickname']);
    $tpl->assign('sex',$user[0]['sex']);
    $tpl->assign('descs',$user[0]['descs']);
    $tpl->assign('avatar',$user[0]['avatar']  ? $user[0]['avatar'] : TU.'/default.jpg');
   
    if($user[0]['withdrawalspass']){
        $html = "Mật khẩu rút tiền của bạn đã được đặt, nếu cần sửa đổi, vui lòng liên hệ với quản trị viên!";
        $tpl->assign('ishide',"style='display:none'");
        $tpl->assign('html',$html);
    }
    if($user[0]['email']){
        $html2 = "Email của bạn đã được thiết lập, nếu cần sửa đổi, vui lòng liên hệ với quản trị viên!!";
        $tpl->assign('ishide2',"style='display:none'");
        $tpl->assign('html2',$html2);
    }
    $listava = '';
    $tu = TU;
    for($i=1;$i<=32;$i++){
        $listava .= "<li><img src='{$tu}/avatar/{$i}.jpg'></li>";
    }
    $tpl->assign('listava',$listava);
    $img = IMG;
    for($i=1;$i<=120;$i++){
        $li1 .= "<li><img src='{$img}/avatar/o1/{$i}.jpg' /></li>";
        $li2 .= "<li><img src='{$img}/avatar/o2/{$i}.gif' /></li>";
        $li3 .= "<li><img src='{$img}/avatar/o3/{$i}.jpg' /></li>";
        $li4 .= "<li><img src='{$img}/avatar/o4/{$i}.jpg' /></li>";
    }
    $tpl->assign('li1',$li1);
    $tpl->assign('li2',$li2);
    $tpl->assign('li3',$li3);
    $tpl->assign('li4',$li4);
    if(isphone()){
        $tpl->compile(basename(__FILE__,'.php'),'wap'); 
    }else{
        $tpl->compile(basename(__FILE__,'.php'),''); 
    }
    
?>