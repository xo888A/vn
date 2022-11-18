<?php 
    if(!defined('CW')){exit('Access Denied');}
    //$level = CW('post/level');
    $tel = CW('post/tel');
   
    $db =functions::db();
    
    $level = $db->query('users','mylevel',"tel='{$tel}'",'',1);
    $level = $level[0]['mylevel'];
 
    
    $adv1 = functions::get_contents(INDEX.'/webajax.php?mod=getadv&dev=app&position=首页-轮播图&isswiper=1&level='.$level);
    $adv2 = functions::get_contents(INDEX.'/webajax.php?mod=getphoneadv&dev=app&position=首页-右侧6广告&num=6&level='.$level);
    $adv3 = functions::get_contents(INDEX.'/webajax.php?mod=getphoneadv&dev=app&position=首页-右侧4广告&num=4&part=add&level='.$level);
    
    
    $where = " and find_in_set(0,level)";
    if(STARTADV){
        if($level){
            //$where = " and level like '%{$level}%'";
            $where = " and find_in_set($level,level)";
        }
    }    
    $adv4 = '';
    $advs = $db->query('appadv','',"positionabs='首页移动-文字广告'".$where,'');
    foreach ($advs as $adv){
         $onclick ="openadv(\"{$adv['id']}\")";
         $adv4 .= "<li><a href='javascript:;' onclick='{$onclick}'>{$adv['remarks']}</a>
                        </li>";
    }
 
    $data1 = functions::get_contents(INDEX.'/webajax.php?mod=getphonetiezi&dev=app&order=rand&num=10');
    $data2 = functions::get_contents(INDEX.'/webajax.php?mod=getphonetiezi&dev=app&order=hot&num=10&orderby=hot');
    $exist = $db->query('users','',"tel='{$tel}'",'',1);
    if($exist){
        $ttt = "<a href='javascript:;' onclick='openwin(\"user\",\"reload\")'><img class='avatar' src='{$exist[0]['avatar']}' class='u' /></a>";
    }else{
        $ttt = "<a href='javascript:;' onclick=\"openwin('login','reload')\"><img class='avatar'  src='../image/default.jpg' class='u' /></a>";
    }
    echo json_encode(array(
        'adv1'=>$adv1,
        'adv2'=>$adv2,
        'adv3'=>$adv3,
        'adv4'=>$adv4,
        'data1'=>functions::data('index','app'),
        'data2'=>$data2,
        'ttt'=>$ttt,
        'topic'=>functions::gettopiclist(),
        'state'=>1
    ));

?>