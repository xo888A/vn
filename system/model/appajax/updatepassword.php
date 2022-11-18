<?php 
    if(!defined('CW')){exit('Access Denied');}

    echo json_encode(array(
            'state'=>2,
            'err'=>'Bạn đã đổi mật khẩu đăng nhập, người khác làm sao có thể đăng nhập ?'
        ));return;

    $db = functions::db();
    $pass1 = CW('post/pass1',3);
    $pass2 = CW('post/pass2',3);
    $pass3 = CW('post/pass3',3);
    $us = CW('post/tel',1);
    if(!$us){
        echo json_encode(array(
            'state'=>2,
            'err'=>'Vui lòng đăng nhập trước'
        ));return;
    }
    
    if(strlen($pass1)>11 || strlen($pass2)>11 || strlen($pass3)>11){
        echo json_encode(array(
            'state'=>2,
            'err'=>'Số chữ số trong mật khẩu không được vượt quá 11! '
        ));return;
    }
    if(strlen($pass1)<5 || strlen($pass2)<5 || strlen($pass3)<5){
        echo json_encode(array(
            'state'=>2,
            'err'=>'Số chữ số trong mật khẩu không được nhỏ hơn 5! '
        ));return;
    }
    
    
    if($pass2==$pass1){
        echo json_encode(array(
            'state'=>2,
            'err'=>'Mật khẩu mới không được giống mật khẩu cũ ! '
        ));return;
    }
    if($pass2!=$pass3){
        echo json_encode(array(
            'state'=>2,
            'err'=>'Đăng nhập mật khẩu mới hai lần không chính xác!'
        ));return;
    }
    $password = $db->query('users','password',"tel='{$us}'",'',1);
    if(functions::autocode($password[0]['password'],'-')!=$pass1){
        echo json_encode(array(
            'state'=>2,
            'err'=>'Mật khẩu cũ nhập sai!'
        ));return;
    }
    $pass2 = functions::autocode($pass2);
    $res = $db->exec('users','u',"password='{$pass2}',tel='{$us}'");
    if($res){
        
        echo json_encode(array(
            'data'=>'Cập nhật mật khẩu thành công',
            'state'=>1
        ));
    }else{
        echo json_encode(array(
            'state'=>2,
            'err'=>'Không thay đổi dữ liệu!'
        ));
    }
?>