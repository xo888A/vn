<?php 
    if(!defined('CW')){exit('Access Denied');}
  
    $db = functions::db();
    $tel = CW('post/tel');
    $level = $db->query('users','mylevel',"tel='{$tel}'",'',1);
    $level = $level[0]['mylevel'];
    $adv1 = functions::get_contents(INDEX.'/webajax.php?mod=getadv&dev=app&position=话题-轮播图&isswiper=1&level='.$level);
    $adv2 = functions::get_contents(INDEX.'/webajax.php?mod=getphoneadv&dev=app&position=话题-右侧2广告&num=6&level='.getlevel());

    $exist = $db->query('users','',"tel='{$tel}'",'',1);
    if($exist){
        $ttt = "<a href='javascript:;' onclick='openwin(\"user\",\"reload\")'><img class='avatar' src='{$exist[0]['avatar']}' class='u' /></a>";
    }else{
        $ttt = "<a href='javascript:;' onclick=\"openwin('login','reload')\"><img class='avatar'  src='../image/default.jpg' class='u' /></a>";
    }
    
    
    $tje = $db->query('sets','tje','id=1');$_tje = '';
    $tjes = explode(',',$tje[0]['tje']);
    foreach ($tjes as $tje){
        $cover = $db->query('topic','cover,id',"name='{$tje}'",'',1);
        $url = INDEX.'/index.php?mod=topiclist&id='.$cover[0]['id'];
        $_tje .= "<li>
                        <a href='javascript:;' onclick='opentopic(\"{$tje}\")'>
                            <img src='{$cover[0]['cover']}' />
                            <span>{$tje}</span>
                        </a>
                    </li>";
    }
    $tu = TU;
    $index = INDEX;
    $html = "<li>
                <a href='javascript:;' onclick='openwin(\"alltopiclist\")'>
                    <img src='{$tu}/more.png' />
                    <span>Thêm+</span>
                </a>
            </li>";
    
    
    echo json_encode(array(
        'adv1'=>$adv1,
        'adv2'=>$adv2,
        'tje'=>$_tje.$html,
        'ttt'=>$ttt,
        'state'=>1
    ));

?>