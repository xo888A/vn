<?php 
    if(!defined('CW')){exit('Access Denied');}
    $isphone = functions::is_mobile();
    $adv1 = functions::get_contents(INDEX.'/webajax.php?mod=getadv&position=推荐-轮播图&isswiper=1&level='.getlevel());
    
    $tpl =  new Society();
    $tpl->assign('adv1',$adv1);
    $tu = TU;
    $db = functions::db();
    $tjc = $db->query('sets','tjc','id=1');$_tjc = '';
    $tjcs = explode(',',$tjc[0]['tjc']);
    foreach ($tjcs as $tjc){
        $cover = $db->query('users','',"tel='{$tjc}'",'',1);
        $url = INDEX.'/index.php?mod=author&id='.functions::autocode($cover[0]['tel']);
        $_tjc .= "<li>
                        <a href='{$url}'>
                            <img src='{$cover[0]['avatar']}' />
                            <span>{$cover[0]['nickname']}</span>
                        </a>
                    </li>";
    }
    $img = TU.'/99.png';
    $u = INDEX.'/index.php?mod=userlist';
    $html = "<li>
                <a href='{$u}'>
                    <img src='{$img}' />
                    <span>Thêm+</span>
                </a>
            </li>";
    $tpl->assign('tjc',$_tjc.$html);
    
    
    
    
    $where = " istuijian='是' and ishow=1 and shortvidcover='' and";
    $where = $where.'  1=1';
    $count = $db->get_count('post',$where); 
    $pagecount = ceil($count/PAGESIZE);
    $page = CW('get/page',1);
    
    $page = $page<=0 ? 1 : $page;
    $page = $page>=$pagecount ? $pagecount : $page;
    $page = ($page-1)<0 ? 0 : ($page-1)*PAGESIZE;

    $articles = $db->query('post','',$where,'ftime desc',"{$page},".PAGESIZE);
    $data = '';
    foreach($articles as $article){
    	$time = date('Y-m-d',$article['ftime']);
        $cover = $article['videocover'];
    	$title = $article['title'];
    	$likes = functions::hot($article['likes']);
    	$hot = functions::hot($article['hot']);
        $a = TU.'/a.png';
        $b = TU.'/b.png';
        $c = TU.'/c.png';
        $cover = $v = '';
        if($article['videocover']!=''){
            $v = "<img class='vimg abs' src='".TU."/video.png' />";
            $cover = $article['videocover'];
            $tag = "{$article['addparam']}";
            $href = INDEX.'/index.php?mod=video&id='.$article['id'];
        }else if($article['imglist']!=''){
            $cover = $article['organcover'];
            
            $i = TU.'/t.png';
            $addparam = $article['addparam'] ? $article['addparam'] : 0;
            $tag = "<img src='{$i}'>{$addparam}";
            $href = INDEX.'/index.php?mod=organ&id='.$article['id'];
        }
        $tips = functions::getnewtips($article['vipdiam'],$article['diamond']);
        
            $user = $db->query('users','nickname,avatar,miaoshu,tel',"tel='{$article['userid']}'",'',1);$user = $user[0];
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
        	}
        	if($topic[2]){
        	    $topi3 = "<a href='{$tu3}'>#".functions::getTopicName($topic[2]).'</a>';
        	}else{
        	    $topi3 = '';
        	}
        	
        	if($topic[3]){
        	    $topi4 = "<a href='{$tu4}'>#".functions::getTopicName($topic[3]).'</a>';
        	}else{
        	    $topi4 = '';
        	}
            $nickname = $user['nickname'] ? $user['nickname'] : 'Người dùng chưa xác định';
            $userurl = INDEX."/index.php?mod=author&id=".functions::autocode($article['userid']);
            if(!$isphone){
                $data .= "<li>
                            <div class='scover overhid'>
                                        <a href='{$userurl}'><img  src='{$user['avatar']}' />
                                        <p class='stit abs'>{$nickname}</p></a>
                                        <p class='stype abs '>{$topi1}{$topi2}{$topi3}</p>
                                    </div>
                                    <div class='rel'>
                                        <a href='{$href}'><img class='cover' src='{$cover}' />
                                        {$tips}
                                        <p class='tag2 abs'>{$tag}</p>
                                        {$v}</a>
                                    </div>
                                    <p class='overhid t'>{$title}</p>
                                    <p class='ts'><img src='{$a}' />{$time}<img src='{$b}' class='b' />{$hot}<img class='c' src='{$c}' />{$likes}</p>
                            </li>";
            }else{
                $miaoshu =  $user['miaoshu'] ? $user['miaoshu'] : 'Chưa có mô tả';
                if($article['videocover']!=''){
                    $data  .= "<li>
                                <div class='wrap'>
                                    <div class='avatar'>
                                        <a href='{$userurl}'><img class='avatar' src='{$user['avatar']}'>
                                        <span>{$nickname}</span></a>
                                        <span class='m'><img src='{$tu}/desc.png'>{$miaoshu}</span>
                                    </div>
                                    <div class='img rel'>
                                        <a href='{$href}'><img class='cover' src='{$cover}' />
                                        {$tips}
                                        <p class='tag2 abs'>{$tag}</p>
                                        {$v}</a>
                                    </div>
                                    <p class='overhid t'>{$title}</p>
                                    <p class='stype overhid '>{$topi1}{$topi2}{$topi3}{$topi4}</p>
                                    <p class='ts'><img src='{$a}' />{$time}<img src='{$b}' class='b' />{$hot}<img class='c' src='{$c}' />{$likes}</p>
                                </div>
                                <p class='line'></p>
                            </li>";
                }else if($article['imglist']!=''){
                    $_imglists = explode('|',$article['imglist']);$_='';
                    foreach ($_imglists as $_imglist){
                        $_.= "<p><img src='{$_imglist}'></p>";
                    }
                    
                    $data .= "<li>
                <div class='wrap'>
                <div class='avatar'>
                    <a href='{$userurl}'><img class='avatar' src='{$user['avatar']}'></a>
                    <span>{$nickname}</span>
                     <span class='m'><img src='{$tu}/desc.png'>{$miaoshu}</span>
                </div>
                <div class='img rel'>
                    <div class='coverlist overflow'>
                    <a href='{$href}'>
                        {$_}
                    </div>
                    {$v}{$tips}</a>
                    <p class='tag2 abs'>{$tag}</p>
                </div>
                <p class='overhid t'>{$title}</p>
                <p class='stype overhid '>{$topi1}{$topi2}{$topi3}</p>
                <p class='ts'><img src='{$a}' />{$time}<img src='{$b}' class='b' />{$hot}<img class='c' src='{$c}' />{$likes}</p>
            </div>
            <p class='line'></p>
        </li>";
                }
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
 
    $html =  "<div class='center'><img class='nodata' src='{$tu}/nodata.png'><p class='center nd'>Chưa có nội dung~</p></div>";
    $tpl->assign('data',$data ? $data : $html);
    $tpl->assign('page',$page);
    
    if(functions::is_mobile()){
        $adv2 = functions::get_contents(INDEX.'/webajax.php?mod=getphoneadv&position=推荐-右侧2广告&num=6&level='.getlevel());
        $tpl->assign('adv2',$adv2);
        $tpl->compile(basename(__FILE__,'.php'),'wap'); 
    }else{
        $adv2 = functions::get_contents(INDEX.'/webajax.php?mod=getadv&position=推荐-右侧2广告&num=2&level='.getlevel());
        $tpl->assign('adv2',$adv2);
        $tpl->compile(basename(__FILE__,'.php'),''); 
    }
    
    
    
    
    
    
    
    
?>