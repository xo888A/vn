<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $set = $db->query('sets','tjd','id=1');
    $tuijiantopic = explode(',',$set[0]['tjd']);
    $tuijian = '';
    $a = TU.'/a.png';
    $b = TU.'/b.png';
    $c = TU.'/c.png';$isphone = functions::is_mobile();
    foreach ($tuijiantopic as $val){
        $topicid = $db->query('topic','id',"name='{$val}'",'',1);$topicid =  $topicid[0]['id'];
        if(!$topicid){continue;}
        if($isphone){
            $css = 'mt15  wrap';
            $data = functions::get_contents(INDEX.'/webajax.php?mod=gettiezi&topic='.$topicid.'&order=id&num=10&orderby=hot');
        }else{
            $css = '';
            $data = functions::get_contents(INDEX.'/webajax.php?mod=gettiezi&topic='.$topicid.'&order=id&num=10&orderby=hot');
        }
        
        $url = INDEX.'/index.php?mod=topiclist&id='.$topicid;
        $img = IMG;
        $tuijian .= "<section class='public {$css}'><p class='tit'>{$val}<span class='fr mores'><a href='{$url}'>Thêm<img src='{$img}/rrr.png' /></a></span></p><ul class='overflow width1'>{$data}</ul></section>";
        if($isphone){$tuijian=$tuijian."<p class='line'></p>";}
    }
    $adv1 = functions::get_contents(INDEX.'/webajax.php?mod=getadv&position=话题-轮播图&isswiper=1&level='.getlevel());
    
    $adv4 = functions::get_contents(INDEX.'/webajax.php?mod=getadv&isphone=is1&position=话题-右侧2广告&num=10&level='.getlevel());
    $tpl =  new Society();
    $tpl->assign('adv1',$adv1);
    
    $tpl->assign('adv4',$adv4);
    $tpl->assign('tuijian',$tuijian);
    $tje = $db->query('sets','tje','id=1');$_tje = '';
    $tjes = explode(',',$tje[0]['tje']);
    foreach ($tjes as $tje){
        $cover = $db->query('topic','cover,id',"name='{$tje}'",'',1);
        $url = INDEX.'/index.php?mod=topiclist&id='.$cover[0]['id'];
        $_tje .= "<li>
                        <a href='{$url}'>
                            <img src='{$cover[0]['cover']}' />
                            <span>{$tje}</span>
                        </a>
                    </li>";
    }
    $tu = TU;
    $index = INDEX;
    $html = "<li>
                <a href='{$index}/index.php?mod=alltopiclist'>
                    <img src='{$tu}/more.png' />
                    <span>Thêm+</span>
                </a>
            </li>";
    $tpl->assign('tje',$_tje.$html);
    if(functions::is_mobile()){
        $adv2 = functions::get_contents(INDEX.'/webajax.php?mod=getphoneadv&position=话题-右侧2广告&num=6&level='.getlevel());
        $tpl->assign('adv2',$adv2);
        $tpl->compile(basename(__FILE__,'.php'),'wap'); 
    }else{
        $adv2 = functions::get_contents(INDEX.'/webajax.php?mod=getadv&position=话题-右侧2广告&num=2&level='.getlevel());
        $tpl->assign('adv2',$adv2);
        $tpl->compile(basename(__FILE__,'.php'),''); 
    }
    
?>