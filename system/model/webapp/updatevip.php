<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $vipcardid = CW('post/vipcardid');
    if(!$vipcardid){
    	msg('ID không chính xác, vui lòng đăng nhập lại','Xác nhận','javascript:location.reload()','error');
    }
    $stit = CW('post/stit');
    $btit = CW('post/btit');
    $oldprice = CW('post/oldprice');
    $nowprice = CW('post/nowprice');
    $descs = CW('post/descs');
    $adddiam = CW('post/adddiam');
    $days = CW('post/days');
    $ucard = CW('post/ucard');
    $db = functions::db();
    if(strlen($stit)>60 || strlen($stit)<6){
    	msg('Các ký tự của khẩu hiệu ở góc trên bên trái bắt buộc phải từ 6-60 ký tự, tối đa là 8 từ','Làm mới','javascript:location.reload()','',true);
    }
    if(strlen($btit)>60 || strlen($btit)<6){
    	msg('Ký tự tên thẻ hội viên bắt buộc phải từ 6-60 ký tự, tối đa 6 từ','Làm mới','javascript:location.reload()','',true);
    }
    if(strlen($descs)>66 || strlen($descs)<6){
    	msg('Các ký tự mô tả được yêu cầu từ 6-66 ký tự, tối đa 12 từ','Làm mới','javascript:location.reload()','',true);
    }
    
    $res = $db->exec('vipcard','u',array(
        array(
            "stit"=>$stit,
            "btit"=>$btit,
            "oldprice"=>$oldprice,
            "nowprice"=>$nowprice,
            "descs"=>$descs,
            "adddiam"=>intval($adddiam),
            "days"=>intval($days),
            "ucard"=>intval($ucard),
            'state'=>CW('post/state'),
            'address1'=>CW('post/address1'),
            'address2'=>CW('post/address2')
        ),array(
            "id"=>$vipcardid
        )));
   
    if($res){
    	msg('Sửa thành công!','Xác nhận','','success');
    }else{
        msg('Dữ liệu không thay đổi!','Nhập lại','javascript:location.reload()','',true);
    }
?>