<?php 
    if(!defined('CW')){exit('Access Denied');}
    $adv1 = functions::get_contents(INDEX.'/webajax.php?mod=getadv&position=社区-轮播图&isswiper=1&level='.getlevel());
    $isphone = functions::is_mobile();
    $tpl =  new Society();
    $tpl->assign('adv1',$adv1);
   
    $data1 = functions::get_contents(INDEX.'/webajax.php?mod=getorganlist&page=1');
    $tpl->assign('data',$data1);
    
    
    
    $db = functions::db();
    
    $where = $where."  ishow=1 and imglist!=''";
    $count = $db->get_count('post',$where); 
    $pagecount = ceil($count/PAGESIZE);
    $page = CW('get/page',1);
    
    $page = $page<=0 ? 1 : $page;
    $page = $page>=$pagecount ? $pagecount : $page;
    $page = ($page-1)<0 ? 0 : ($page-1)*PAGESIZE;

    $articles = $db->query('post','',$where,'ftime desc',"{$page},".PAGESIZE);
    $data = '';$tu = TU;
    foreach($articles as $article){
    	$time = date('Y-m-d',$article['ftime']);
        $cover = $article['videocover'];
    	$title = $article['title'];
    	$likes = functions::hot($article['likes']);
    	$hot = functions::hot($article['hot']);
        $a = TU.'/a.png';
        $b = TU.'/b.png';
        $c = TU.'/c.png';
 
        $tips = functions::getnewtips($article['vipdiam'],$article['diamond']);
        $i = TU.'/t.png';
        $nm = $article['addparam'] ? $article['addparam'] : 0;
        $tag = "<img src='{$i}'>{$nm}";
        $href = INDEX.'/index.php?mod=organ&id='.$article['id'];
        
        $tips = functions::getnewtips($article['vipdiam'],$article['diamond']);
        $user = $db->query('users','',"tel='{$article['userid']}'",'',1);
    	$user = $user[0];
    	$topic = explode(',',$article['topic']);
    	$tu1 = INDEX.'/index.php?mod=topiclist&id='.$topic[0];
    	$tu2 = INDEX.'/index.php?mod=topiclist&id='.$topic[1];
    	$tu3 = INDEX.'/index.php?mod=topiclist&id='.$topic[2];
    	$tu4 = INDEX.'/index.php?mod=topiclist&id='.$topic[3];
    	if($topic[0]){
    	    $topi1 = "<a href='{$tu1}'>#".functions::getTopicName($topic[0]).'</a>';
    	}else{
    	    $topi1 = '';
    	}
    	
    	if($topic[1]){
    	    $topi2 = "<a href='{$tu2}'>#".functions::getTopicName($topic[1]).'</a>';
    	}else{
    	    $topi2 = '';
    	}if($topic[2]){
    	    $topi3 = "<a href='{$tu3}'>#".functions::getTopicName($topic[2]).'</a>';
    	}else{
    	    $topi3 = '';
    	}
    	if($topic[3]){
    	    $topi4 = "<a href='{$tu4}'>#".functions::getTopicName($topic[3]).'</a>';
    	}else{
    	    $topi4 = '';
    	}
    	$imglist = explode('|',$article['imglist']);
        
    	$nickname = $user['nickname'] ? $user['nickname'] : 'Người dùng chưa xác định';
    	$url = INDEX.'/index.php?mod=organ&id='.$article['id'];
    	$userurl = INDEX."/index.php?mod=author&id=".functions::autocode($article['userid']);
    	if(!$isphone){
        $data .= "<li>
                    <div class='scover overhid'>
                        <a href='{$userurl}'><img  src='{$user['avatar']}' />
                        <p class='stit abs'>{$nickname}</p></a>
                        <p class='stype abs '>{$topi1}{$topi2}{$topi3}</p>
                    </div>
                    <div class='rel section4 '>
                        <div class='imglist rel'>
                            {$tips}
                            <a href='{$url}'>
                                <p class='fl'>
                                    <img  src='{$imglist[0]}'>
                                </p>
                                <p class='fr'>
                                    <span><img  src='{$imglist[1]}'></span>
                                    <span><img  src='{$imglist[2]}'></span>
                                </p>
                                <p class='clear'></p>
                            </a>
                            <p class='abs pabs'><img class='si2' src='{$tu}/t.png'>{$nm}</p>
                        </div>
                    </div>
                    <p class='overhid t'>{$title}</p>
                    <p class='ts'><img src='{$a}' />{$time}<img src='{$b}' class='b' />{$hot}<img class='c' src='{$c}' />{$likes}</p>
                </li>";
    	}else{
    	        $miaoshu =  $user['miaoshu'] ? $user['miaoshu'] : 'Chưa có mô tả';
                $_imglists = explode('|',$article['imglist']);$_='';
                foreach ($_imglists as $_imglist){
                    $_.= "<p><img src='{$_imglist}'></p>";
                }
                $data .="<li>
                            <div class='wrap'>
                                <div class='avatar'>
                                    <a href='{$userurl}'><img class='avatar' src='{$user['avatar']}'></a>
                                    <span>{$nickname}</span>
                                 <span class='m'><img src='{$tu}/desc.png'>{$miaoshu}</span>
                                </div>
                                <div class='img rel'>
                                    <div class='coverlist overflow'>
                                        <a href='{$href}'>
                                    {$_}</a>
                                        
                                    </div>
                                   {$v}{$tips}
                                <p class='tag2 abs'>{$tag}</p>
                                </div>
                                <p class='overhid t'>{$title}</p>
                                <p class='stype overhid '>{$topi1}{$topi2}{$topi3}{$topi4}</p>
                                <p class='ts'><img src='{$a}' />{$time}<img src='{$b}' class='b' />{$hot}<img class='c' src='{$c}' />{$likes}</p>
                            </div>
                            <p class='line'></p>
                        </li>";
                
    	}
    }
    $allurl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    if(stripos($allurl ,"&page=")){
    	$nallurl = substr($allurl,0,stripos($allurl ,"&page="));
    }else{
    	$nallurl = $allurl;
    }
    $pageurl = $nallurl.'&page=';
    $page = functions::page($count,$pagecount,$pageurl);
    $tu = TU;
    //$html =  "<div class='center'><img class='nodata' src='{$tu}/nodata.png'><p class='center nd'>Chưa có nội dung~</p></div>";
    $html = '';
    $tpl->assign('data',$data ? $data : $html);
    $tpl->assign('page',$page);
    
    
    if(functions::is_mobile()){
        $adv2 = functions::get_contents(INDEX.'/webajax.php?mod=getphoneadv&position=社区-右侧6广告&num=6&level='.getlevel());
        $adv3 = functions::get_contents(INDEX.'/webajax.php?mod=getphoneadv&position=社区-右侧4广告&num=4&part=add&level='.getlevel());
        $tpl->assign('adv2',$adv2);
         $tpl->assign('adv3',$adv3);
         
         
         
         $set = $db->query('sets','','id=1','',1);  
    $vlists = explode(',',$set[0]['ilist']);
    $_vlist = '';
    foreach ($vlists as $vlist){
        
        $_id = $db->query('topic','id',"name='{$vlist}'",'',1);
        if(!$_id){
            continue;
        }
        $u = INDEX.'/index.php?mod=topiclist&id='.$_id[0]['id'];
        $_vlist .= "<div class='swiper-slide'><a href='{$u}'>#{$vlist}</a></div>";
    }
  $tpl->assign('vlist',$_vlist);  
        
         
         
         
         
         
         
         
        $tpl->compile(basename(__FILE__,'.php'),'wap'); 
    }else{
        $adv2 = functions::get_contents(INDEX.'/webajax.php?mod=getadv&position=社区-右侧6广告&num=6&level='.getlevel());
        $adv3 = functions::get_contents(INDEX.'/webajax.php?mod=getadv&position=社区-右侧4广告&num=4&part=add&level='.getlevel());
        $tpl->assign('adv2',$adv2);
        $tpl->assign('adv3',$adv3);
        $tpl->compile(basename(__FILE__,'.php'),''); 
    }
    
    
    
    
?>