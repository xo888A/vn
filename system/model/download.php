<?php 
    if(!defined('CW')){exit('Access Denied');}
    $tpl =  new Society();
    $db = functions::db();
    $sets = $db->query('sets','','id=1','',1);
    $tpl->assign('android',$sets[0]['androiddesc']);
    $tpl->assign('ios',$sets[0]['iosdesc']);
    
    if(functions::is_mobile()){
        
        if(strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone')|| strpos($_SERVER['HTTP_USER_AGENT'], 'iPad')){
            $tpl->assign('downloadurl',$sets[0]['ios']);
        }else if(strpos($_SERVER['HTTP_USER_AGENT'], 'Android')){
            $tpl->assign('downloadurl',$sets[0]['android']);
        }
 
        $tpl->compile(basename(__FILE__,'.php'),'wap');
    }else{
        $tpl->compile(basename(__FILE__,'.php'),'');
    }
?>