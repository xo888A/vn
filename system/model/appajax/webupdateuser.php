<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    
    $type = CW('post/type',2);
    $val = CW('post/val');
    $img = CW('post/img');
    $us = CW('post/tel');
    if(!$us){
        echo json_encode(array(
            'state'=>2,
                'err'=>'Vui lòng đăng nhập!'
            ));return;
    }
    if(!$val){
        echo json_encode(array(
            'state'=>2,
                'err'=>'Không có nội dung'
            ));return;
    }
    if($type=='nickname'){
        if(strlen($val)>30 || strlen($val)<3){
        	echo json_encode(array(
        	    'state'=>2,
                'err'=>'Tên (ít hơn 30 ký tự)'
            ));return;
        }
        $weijincis = $db->query('sets','weijinci','id=1');
        $weijincis = explode(',',$weijincis[0]['weijinci']);
        foreach ($weijincis as $weijinci){
            if(strpos($val,$weijinci) !== false){ 
             echo json_encode(array(
                 'state'=>2,
                'err'=>'Tên có chứa ký tự không phù hợp, vui lòng sửa lại!'
            ));return;
            }
        }
        //$res = $db->exec('users','u',"nickname='{$val}',tel='{$us}'");
        $res = $db->query("update users set nickname='{$val}' where tel='{$us}'");
        $data = 'Đổi tên thành công';
    }elseif($type=='sex'){
        if($val!='Nam' && $val!='Nữ'){
            echo json_encode(array(
                'state'=>2,
                'err'=>'Giới tính bị sai'
            ));return;
        }
        //$res = $db->exec('users','u',"sex='{$val}',tel='{$us}'");
        $res = $db->query("update users set sex='{$val}' where tel='{$us}'");
        $data = 'Cập nhật giới tính thành công';
    }elseif($type=='descs'){
        if(!$img){
        	echo json_encode(array(
        	    'state'=>2,
                'err'=>'Ảnh tải lên bị sai, xin vui lòng làm lại !'
            ));return;
        }
        if(strlen($val)>255 || strlen($val)<10){
        	echo json_encode(array(
        	    'state'=>2,
                'err'=>'Độ dài tên phải từ 10 đến 255 ký tự'
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
                'state'=>2,
                'err'=>'Mật khẩu rút tiền là ký tự số'
            ));return;
        }
        if(strlen($val)!=6){
        	echo json_encode(array(
        	    'state'=>2,
                'err'=>'Mật khẩu rút tiền là 6 con số'
            ));return;
        }
        //$res = $db->exec('users','u',"withdrawalspass='{$val}',tel='{$us}'");
        $res = $db->query("update users set withdrawalspass='{$val}' where tel='{$us}'");
        $data = 'Mật khẩu rút tiền sửa đổi thành công';
    }
    
    
    if($res){
        
        echo json_encode(array(
            'state'=>1,
            'data'=>$data,
            
        ));
    }else{
        echo json_encode(array(
            'state'=>2,
            'err'=>'Cập nhật thành công!'
        ));
    }
?>