<?php 
    if(!defined('CW')){exit('Access Denied');}

    $tel = CW('post/tel');
	//$yzm = CW('post/yzm');
    $email = CW('post/email');
    $reg = '#^\w{3,50}@\w{1,64}\.\w{2,5}$#';
    
    if(!preg_match($reg,$email)){
        echo json_encode(array(
            'state'=>2,
            'err'=>'Qui cách Email bị sai!'
        ));return;
    }
    $y = functions::autocode(CW('cookie/yzm'),'-');
    if(!$email){
        echo json_encode(array(
            'state'=>2,
            'err'=>'Hạng mục bắt buộc điền!'
        ));return;
    }
    //验证码验证
    // if($yzm!=$y){
    //     echo json_encode(array(
    //         'err'=>'验证码错误!'
    //     ));return;
    // }
    $db = functions::db();
    $res = $db->exec('users','u',"email='{$email}',tel='{$tel}'");
    
   
    if($res){
        echo json_encode(array(
            'state'=>1,
            'data'=>'Liên kết thành công!',
            'do'=>'reload'
        ));return;
    }else{
        echo json_encode(array(
            'state'=>2,
            'err'=>'Số liệu không biến động!'
        ));return;
    }
?>