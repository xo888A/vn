<?php 
    if(!defined('CW')){exit('Access Denied');}
    $ip = CW('post/ip');
    $cid = CW('post/cid');
    $cname = CW('post/cname');
    $card = CW('post/card');
    $db = functions::db();
    $exist = $db->query('share','',"ip='{$ip}' and cid='{$cid}' and cname='{$cname}' and card='{$card}'",'',1);
    if(!$exist){
        if($card && $card!='nodata'){
            $res = $db->exec('share','i',array(
                'ip'=>$ip,
                'cid'=>$cid,
                'cname'=>$cname,
                'card'=>$card,
                'ftime'=>time()
            ));
        }else{
            $res= 1;
        }
        
        if($res){
            echo 'true';
        }else{
            echo 'false';
        }
    }else{
        echo 'false';
    }
    
?>