<?php 
    if(!defined('CW')){exit('Access Denied');}
    
    $tel = CW('post/tel');
    $db =functions::db();
    $level = $db->query('users','mylevel',"tel='{$tel}'",'',1);
    $level = $level[0]['mylevel'];
    $adv1 = functions::get_contents(INDEX.'/webajax.php?mod=getadv&dev=app&position=社区-轮播图&isswiper=1&level='.getlevel());
    $adv2 = functions::get_contents(INDEX.'/webajax.php?mod=getphoneadv&dev=app&position=社区-右侧6广告&num=6&level='.getlevel());
        $adv3 = functions::get_contents(INDEX.'/webajax.php?mod=getphoneadv&dev=app&position=社区-右侧4广告&num=4&part=add&level='.getlevel());
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
        'ttt'=>$ttt,
        'state'=>1
    ));

?>