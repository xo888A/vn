<?php 
    if(!defined('CW')){exit('Access Denied');}
    $adv1 = functions::get_contents(INDEX.'/webajax.php?mod=getadv&position=排行榜-轮播图&isswiper=1');
    $adv2 = functions::get_contents(INDEX.'/webajax.php?mod=getadv&position=排行榜-右侧2广告&num=2');
    $db = functions::db();
    
    $tjhs = $db->query('sets','tjh','id=1');$_tjhs = '';
    $tjhs = explode(',',$tjhs[0]['tjh']);
    foreach ($tjhs as $tjh){
        $cover = $db->query('topic','cover,id',"name='{$tjh}'",'',1);
        $url = INDEX.'/index.php?mod=topiclist&id='.$cover[0]['id'];

        $_tjhs .= "<li><a href='{$url}'><img src='{$cover[0]['cover']}' /><span>{$tjh}</span></a></li>";
    }
    $tpl =  new Society();
    $tpl->assign('adv1',$adv1);
    $tpl->assign('adv2',$adv2);
    $tpl->assign('tuijian',$_tjhs);
    $data = functions::get_contents(INDEX.'/webajax.php?mod=gettuijian&page=1&where=organ');
    $tpl->assign('data',$data);
    $tpl->compile(basename(__FILE__,'.php'),''); 
?>