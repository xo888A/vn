<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    $accesskey = CW('post/accesskey');
    $secretkey = CW('post/secretkey');
    $spacename = CW('post/spacename');
    $url = CW('post/url');
    $ishow = CW('post/ishow');

    $res = $db->exec('apimessage','u',array(
        array(
            "accesskey"=>$accesskey,
            "secretkey"=>$secretkey,
            "url"=>$url,
            "spacename"=>$spacename,
            "ishow"=>$ishow,
        ),array(
            "id"=>1
        )));
   
    if($res){
    	msg('Cài đặt thành công đối tượng lưu trữ!','Xác nhận','','success');
    }else{
        msg('Dữ liệu không đổi!','Cài đặt lại','javascript:location.reload()','',true);
    }
?>