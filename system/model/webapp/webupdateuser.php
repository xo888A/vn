<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    
    $type = CW('post/type',2);
    $val = CW('post/val');
    $img = CW('post/img');
    $us = getuser();
    if(!$us){
        echo json_encode(array(
                'err'=>'Vui lòng đăng nhập trước!'
            ));return;
    }
    if(!$val){
        echo json_encode(array(
                'err'=>'Nội dung trống'
            ));return;
    }
    if($type=='nickname'){
        if(strlen($val)>30 || strlen($val)<3){
        	echo json_encode(array(
                'err'=>'Tên yêu cầu tối đa 10 từ hoặc 30 ký tự'
            ));return;
        }
        $weijincis = $db->query('sets','weijinci','id=1');
        $weijincis = explode(',',$weijincis[0]['weijinci']);
        foreach ($weijincis as $weijinci){
            if(strpos($val,$weijinci) !== false){ 
             echo json_encode(array(
                'err'=>'Tên chứa các từ bị cấm, vui lòng sửa đổi!'
            ));return;
            }
        }
        
        //$res = $db->exec('users','u',"nickname='{$val}',tel='{$us}'");
        $res = $db->query("update users set nickname='{$val}' where tel='{$us}'");
        $data = 'Đã cập nhật tên thành công';
    }elseif($type=='sex'){
        if($val!='男' && $val!='女'){
            echo json_encode(array(
                'err'=>'Nhập sai giới tính'
            ));return;
        }
        //$res = $db->exec('users','u',"sex='{$val}',tel='{$us}'");
        $res = $db->query("update users set sex='{$val}' where tel='{$us}'");
        $data = 'Cập nhật giới tính thành công';
    }elseif($type=='descs'){
        if(!$img){
        	echo json_encode(array(
                'err'=>'Hình đại diện sai, vui lòng tải lại!'
            ));return;
        }
        if(strlen($val)>255 || strlen($val)<10){
        	echo json_encode(array(
                'err'=>'Chữ ký yêu cầu 10-255 ký tự'
            ));return;
        }
        
        // $res = $db->exec('users','u',array(array(
        //     'descs'=>$val,
        //     'avatar'=>$img
        // ),array(
        //     'tel'=>$us
        // )));
        $res = $db->query("update users set descs='{$val}',avatar='{$img}' where tel='{$us}'");
        $data = 'Cập nhật thành công';
    }elseif($type=='withdrawalspass'){
        if(!is_numeric($val)){
            echo json_encode(array(
                'err'=>'Mật khẩu rút tiền ở dạng số'
            ));return;
        }
        if(strlen($val)!=6){
        	echo json_encode(array(
                'err'=>'Mật khẩu rút tiền là 6 số'
            ));return;
        }
        //$res = $db->exec('users','u',"withdrawalspass='{$val}',tel='{$us}'");
        $res = $db->query("update users set withdrawalspass='{$val}' where tel='{$us}'");
        $data = 'Mật khẩu rút tiền thay đổi thành công';
    }
    
    
   echo json_encode(array(
            'data'=>$data,
            'do'=>'updateuser'
        ));
?>