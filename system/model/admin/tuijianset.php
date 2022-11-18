<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $set = $db->query('sets','','id=1');
    if(!$set){
        $db->exec('sets','i',array(
            "tja"=>'',
            "tjb"=>''
        ));
        $set = $db->query('sets','','id=1');
    }
    $tpl =  new Society();
    $tpl->assign('vlist',$set[0]['vlist']);
    $tpl->assign('ilist',$set[0]['ilist']);
    
    
    $tpl->assign('tja',$set[0]['tja']);
    $tpl->assign('tjb',$set[0]['tjb']);
    $tpl->assign('tjc',$set[0]['tjc']);
    $tpl->assign('tjd',$set[0]['tjd']);
    $tpl->assign('tje',$set[0]['tje']);
    $tpl->assign('tjf',$set[0]['tjf']);
    $tpl->assign('tjg',$set[0]['tjg']);
    $tpl->assign('tjh',$set[0]['tjh']);
    
    $tpl->assign('add1',$set[0]['add1']);
    $tpl->assign('add2',$set[0]['add2']);
    $tpl->assign('add3',$set[0]['add3']);
    
    $tpl->assign('tuijianlist',$set[0]['tuijianlist']);
    $tpl->compile('tuijianset','admin'); 
?>