<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $tel = CW('post/tel');
    $level = $db->query('users','mylevel',"tel='{$tel}'",'',1);
    $level = $level[0]['mylevel'];
    $adv1 = functions::get_contents(INDEX.'/webajax.php?mod=getadv&dev=app&position=推荐-轮播图&isswiper=1&level='.$level);
    $adv2 = functions::get_contents(INDEX.'/webajax.php?mod=getphoneadv&dev=app&position=推荐-右侧2广告&num=6&level='.$level);
    $tjc = $db->query('sets','tjc','id=1');$_tjc = '';
    $tjcs = explode(',',$tjc[0]['tjc']);
    foreach ($tjcs as $tjc){
        $cover = $db->query('users','',"tel='{$tjc}'",'',1);
        $url = INDEX.'/index.php?mod=author&id='.functions::autocode($cover[0]['tel']);
        $_tjc .= "<li onclick='openuserindex(\"{$tjc}\")'>
                        
                            <img src='{$cover[0]['avatar']}' />
                            <span>{$cover[0]['nickname']}</span>
                       
                    </li>";
    }
    $img = TU.'/99.png';
    $html = "<li onclick='openwin(\"userlist\")'>
                    <img src='{$img}' />
                    <span>Thêm+</span>
            </li>";
    $exist = $db->query('users','',"tel='{$tel}'",'',1);
    if($exist){
        $ttt = "<a href='javascript:;' onclick='openwin(\"user\",\"reload\")'><img class='avatar' src='{$exist[0]['avatar']}' class='u' /></a>";
    }else{
        $ttt = "<a href='javascript:;' onclick=\"openwin('login','reload')\"><img class='avatar'  src='../image/default.jpg' class='u' /></a>";
    }
    echo json_encode(array(
        'adv1'=>$adv1,
        'adv2'=>$adv2,
        'ttt'=>$ttt,
        'data1'=>$data1,
        'tjc'=>$_tjc.$html,
        'state'=>1
    ));

?>