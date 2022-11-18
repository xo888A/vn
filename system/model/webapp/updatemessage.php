<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    $apiid = CW('post/apiid');
    $apikey = CW('post/apikey');

    $res = $db->exec('apimessage','u',array(
        array(
            "apiid"=>$apiid,
            "apikey"=>$apikey,
        ),array(
            "id"=>1
        )));
   
    if($res){
    	msg('Cài đặt SMS  thành công!','Xác nhận','','success');
    }else{
        msg('Dữ liệu không đổi!','Nhập lại','javascript:location.reload()','',true);
    }
?>