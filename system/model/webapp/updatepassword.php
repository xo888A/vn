<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    
    echo json_encode(array(
            'err'=>'Thanh niên đừng nói võ mồm, nếu bạn đổi mật khẩu thì người khác làm sao thử?'
        ));return;
    

    $db = functions::db();
    $pass1 = CW('post/pass1',3);
    $pass2 = CW('post/pass2',3);
    $pass3 = CW('post/pass3',3);
    $us = getuser();
    if(!$us){
        echo json_encode(array(
            'err'=>'vui lòng đăng nhập trước!'
        ));return;
    }
    
    if(strlen($pass1)>11 || strlen($pass2)>11 || strlen($pass3)>11){
        echo json_encode(array(
            'err'=>'Mật khẩu không được quá 11 chữ số!'
        ));return;
    }
    if(strlen($pass1)<5 || strlen($pass2)<5 || strlen($pass3)<5){
        echo json_encode(array(
            'err'=>'Mật khẩu không được ít hơn 5 chữ số!'
        ));return;
    }
    
    
    if($pass2==$pass1){
        echo json_encode(array(
            'err'=>'Mật khẩu mới không được giống với mật khẩu cũ!'
        ));return;
    }
    if($pass2!=$pass3){
        echo json_encode(array(
            'err'=>'Mật khẩu mới không giống nhau!'
        ));return;
    }
    $password = $db->query('users','password',"tel='{$us}'",'',1);
    if(functions::autocode($password[0]['password'],'-')!=$pass1){
        echo json_encode(array(
            'err'=>'Mật khẩu cũ sai!'
        ));return;
    }
    $pass2 = functions::autocode($pass2);
    $res = $db->exec('users','u',"password='{$pass2}',tel='{$us}'");
    if($res){
        
        echo json_encode(array(
            'data'=>'Đã cập nhật mật khẩu thành công',
            'do'=>'updateuserpass'
        ));
    }else{
        echo json_encode(array(
            'err'=>'Dữ liệu Không thay đổi!'
        ));
    }
?>