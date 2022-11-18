<?php 
    if(!defined('CW')){exit('Access Denied');}
    $tel = CW('post/tel');
    $db = functions::db();
    $user = $db->query('users','',"tel='{$tel}'",'',1);
    
    
    // $listava = '';
    // $tu = TU;
    // for($i=1;$i<=32;$i++){
    //     $listava .= "<li><img src='{$tu}/avatar/{$i}.jpg'></li>";
    // }
    
    if($user[0]['withdrawalspass']){
        $html = "Mật khẩu rút tiền của bạn đã được cài đặt, nếu cần sửa đổi, vui lòng liên hệ với quản trị viên!";
        $ishide = 'display:none';
    }else{
        $html = $ishide = '';
    }
    if($user[0]['email']){
        $html2 = "Email của bạn đã được thiết lập, nếu bạn cần sửa đổi nó, vui lòng liên hệ với quản trị viên!";
        $ishide2 = 'display:none';
    }else{
        $html2 = $ishide2 = '';
    }
    $img = IMG;
    for($i=1;$i<=120;$i++){
        $li1 .= "<li><img src='{$img}/avatar/o1/{$i}.jpg' /></li>";
        $li2 .= "<li><img src='{$img}/avatar/o2/{$i}.gif' /></li>";
        $li3 .= "<li><img src='{$img}/avatar/o3/{$i}.jpg' /></li>";
        $li4 .= "<li><img src='{$img}/avatar/o4/{$i}.jpg' /></li>";
    }

    echo json_encode(array(
        'state'=>1,
        'nickname'=>$user[0]['nickname'],
        'sex'=>$user[0]['sex'],
        'descs'=>$user[0]['descs'],
        'avatar'=>$user[0]['avatar'],
        'o1'=>$li1,
        'o2'=>$li2,
        'o3'=>$li3,
        'o4'=>$li4,
        'html'=>$html,
        'ishide'=>$ishide,
        'html2'=>$html2,
        'ishide2'=>$ishide2
    ));
?>