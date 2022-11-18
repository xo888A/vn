<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $tel = getuser();
	//$yzm = CW('post/yzm');
    $email = CW('post/email');
    $reg = '#^\w{3,50}@\w{1,64}\.\w{2,5}$#';
    
    if(!preg_match($reg,$email)){
        echo json_encode(array(
            'err'=>'Định dạng email sai!'
        ));return;
    }
    $y = functions::autocode(CW('cookie/yzm'),'-');
    if(!$email){
        echo json_encode(array(
            'err'=>'Mỗi trang cần điền!'
        ));return;
    }
    //Lỗi mã xác minh
    // if($yzm!=$y){
    //     echo json_encode(array(
    //         'err'=>'Lỗi mã xác minh!'
    //     ));return;
    // }
    $db = functions::db();
    $res = $db->exec('users','u',"email='{$email}',tel='{$tel}'");
    
   
    if($res){
        echo json_encode(array(
            'data'=>'Ràng buộc thành công!',
            'do'=>'reload'
        ));return;
    }else{
        echo json_encode(array(
            'err'=>'Dữ liệu không đổi!'
        ));return;
    }
?>