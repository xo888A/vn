<?php 
    if(!defined('CW')){exit('Access Denied');}
    $tel = getuser();
    $db = functions::db();
    $user = $db->query('users','',"tel='{$tel}'",'',1);
    $tpl =  new Society();
    functions::getavatar($tpl);
    $tpl->assign('money',$user[0]['money']);
    $tpl->assign('diam',$user[0]['diam']);
    $withdrawalses = $db->query('withdrawals','',"tel='{$tel}'");
    $w = '';
    foreach ($withdrawalses as $withdrawals){
        if($withdrawals['state']==0){
            $state = 'Đang đăng ký';
        }else if($withdrawals['state']==1){
            $state = 'Đã thanh toán';
        }
        $time = date('Y-m-d H:i:s',$withdrawals['ftime']);
        $w .= "<li>{$time} Rút tiền {$withdrawals['money']}VNĐ 【{$state}】<li>";   
    }
    $tpl->assign('w',$w);
    if(isphone()){
        $tpl->compile(basename(__FILE__,'.php'),'wap'); 
    }else{
        $tpl->compile(basename(__FILE__,'.php'),''); 
    }
?>