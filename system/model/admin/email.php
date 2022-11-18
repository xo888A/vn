<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $email = $db->query('email','','id=1');
    if(!$email){
        $db->exec('email','i',array(
            'param1'=>''
        ));
        $email = $db->query('email','','id=1');
    }
    $tpl =  new Society();
    $tpl->assign('param1',$email[0]['param1']);
    $tpl->assign('param2',$email[0]['param2']);
    $tpl->assign('param3',$email[0]['param3']);
    $tpl->assign('param4',$email[0]['param4']);
    $tpl->assign('param5',$email[0]['param5']);

    
    $tpl->compile('email','admin'); 
?>