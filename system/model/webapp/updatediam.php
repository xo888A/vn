<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $diamcardid = CW('post/diamcardid');
    if(!$diamcardid){
    	msg('ID không chính xác, vui lòng đăng nhập lại','Xác nhận','javascript:location.reload()','error');
    }

    $diamnum = CW('post/diamnum');
    $give = CW('post/give');
    $descs = CW('post/descs');
    $price = CW('post/price');
    $tag = $_POST['tag'];
    $db = functions::db();

    if(strlen($descs)>30 || strlen($descs)<3){
    	msg('Ký tự mô tả được yêu cầu từ 3-30 ký tự, tối đa 30 ký tự','làm mới','javascript:location.reload()','',true);
    }
    if($tag){
        if(strlen($tag)>30 || strlen($tag)<3){
        	msg('Các ký tự nhãn nhỏ được yêu cầu từ 3-30 ký tự, tối đa 5 từ','làm mới','javascript:location.reload()','',true);
        }
    }
    
    
    $res = $db->exec('diamcard','u',array(
        array(
            "diamnum"=>intval($diamnum),
            "give"=>intval($give),
            "descs"=>$descs,
            "price"=>intval($price),
            "tag"=>$tag,
            'address1'=>CW('post/address1'),
        ),array(
            "id"=>$diamcardid
        )));
   
    if($res){
    	msg('Chỉnh sửa thành công!','Xác nhận','','success');
    }else{
        msg('Dữ liệu không đổi!','Nhập lại','javascript:location.reload()','',true);
    }
?>