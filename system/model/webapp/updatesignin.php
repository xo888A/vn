<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    $rewardtype = CW('post/rewardtype');
    $reward = CW('post/reward');
    $id = CW('post/id',1);

   
    $res = $db->exec('signinset','u',array(
        array(
        'rewardtype'=>$rewardtype,
    	'reward'=>$reward
        ),array(
            "id"=>$id
        )));
   
    if($res){
    	msg('Thay đổi thành công!','Xác nhận','','success');
    }else{
        msg('Dữ liệu không đổi!','Nhập lại','javascript:location.reload()','',true);
    }
?>