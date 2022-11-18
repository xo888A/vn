<?php 
    if(!defined('CW')){exit('Access Denied');}
    $adv1 = functions::get_contents(INDEX.'/webajax.php?mod=getadv&position=排行榜-轮播图&isswiper=1&level='.getlevel());
    $isphone = functions::is_mobile();
    $db = functions::db();
    
    $tjhs = $db->query('sets','tjh','id=1');$_tjhs = '';
    $tjhs = explode(',',$tjhs[0]['tjh']);
    foreach ($tjhs as $tjh){
        $cover = $db->query('users','',"tel='{$tjh}'",'',1);
        $url = INDEX.'/index.php?mod=author&id='.functions::autocode($cover[0]['tel']);
        $_tjhs .= "<li><a href='{$url}'><img src='{$cover[0]['avatar']}' /><span>{$cover[0]['nickname']}</span></a></li>";
    }
    $tu = TU;
    $tpl =  new Society();
    $tpl->assign('adv1',$adv1);
    $index = INDEX;
    $html = "<li>
                <a href='{$index}/index.php?mod=userlist'>
                    <img src='{$tu}/99.png' />
                    <span>Thêm+</span>
                </a>
            </li>";
    $tpl->assign('tuijian',$_tjhs.$html);
    
    $type = CW('get/type',2);
    $a1 = $a2 = $a3 = '';
    if($type=='video'){
        $where = $where." ishow=1 and shortvidcover='' and videourl!=''";
        $a2 = 'selected';
    }else if($type=='organ'){
        $where = $where." ishow=1 and shortvidcover='' and imglist!=''";
        $a3 = 'selected';
    }else{
        $where = $where." ishow=1 and shortvidcover=''";
        $a1 = 'selected';
    }
    

    $count = $db->get_count('post',$where); 
    $pagecount = ceil($count/PAGESIZE);
    $page = CW('get/page',1);
    
    $page = $page<=0 ? 1 : $page;
    $page = $page>=$pagecount ? $pagecount : $page;
    $page = ($page-1)<0 ? 0 : ($page-1)*PAGESIZE;

    $articles = $db->query('post','',$where,'hot desc',"{$page},".PAGESIZE);
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
            // $pos = stripos($article['imglist'],'|');
            // $v = '';
            // if($pos){
            //     $cover = substr($article['imglist'],0,$pos);
            // }else{
            //     $cover = $article['imglist'];
            // }
            $cover = $article['organcover'];
            $i = TU.'/t.png';
            $addparam = $article['addparam'] ? $article['addparam'] : 0;
            $tag = "<img src='{$i}'>{$addparam}";
            $href = INDEX.'/index.php?mod=organ&id='.$article['id'];
        }
        $tips = functions::getnewtips($article['vipdiam'],$article['diamond']);
        if(!$isphone){
            $data .= "<li>
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
            $user = $db->query('users','nickname,avatar,miaoshu,tel',"tel='{$article['userid']}'",'',1);$user = $user[0];
            $miaoshu =  $user['miaoshu'] ? $user['miaoshu'] : 'Chưa có mô tả';$nickname = $user['nickname'] ? $user['nickname'] : 'Người dùng chưa xác định';
            $userurl = INDEX."/index.php?mod=author&id=".functions::autocode($article['userid']);
                if($article['videocover']!=''){
                    $data  .= "<li>
                                <div class='wrap'>
                                    <div class='avatar'>
                                        <a href='{$userurl}'><img class='avatar' src='{$user['avatar']}'>
                                        <span>{$nickname}</span></a>
                                        <span class='m'><img src='{$tu}/desc.png'>{$miaoshu}</span>
                                    </div>
                                    <div class='img rel'>
                                        <a href='{$href}'><img class='cover' src='{$cover}' /></a>
                                        {$tips}
                                        <p class='tag2 abs'>{$tag}</p>
                                        {$v}
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
                    {$v}</a>
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
    $tu = TU;
    $html =  "<img class='nodata' src='{$tu}/nodata.png'><p class='center nd'>Chưa có nội dung~</p>";
    $tpl->assign('data',$data ? $data : $html);
    $tpl->assign('page',$page);
    
    $index = INDEX;
    $ul = "<li class='{$a1}'><p class='abs'></p><a href='{$index}/index.php?mod=rank'>Tất cả hoạt động</a></li>
                    <li  class='{$a2}'><p class='abs'></p><a href='{$index}/index.php?mod=rank&type=video'>Video</a></li>
                    <li class='{$a3}'><p class='abs'></p><a href='{$index}/index.php?mod=rank&type=organ'>Cộng đồng</a></li>";
    $tpl->assign('ul',$ul);
    if(functions::is_mobile()){
        $adv2 = functions::get_contents(INDEX.'/webajax.php?mod=getphoneadv&position=排行榜-右侧2广告&num=6&level='.getlevel());
        $tpl->assign('adv2',$adv2);
        $tpl->compile(basename(__FILE__,'.php'),'wap'); 
    }else{
        $adv2 = functions::get_contents(INDEX.'/webajax.php?mod=getadv&position=排行榜-右侧2广告&num=2&level='.getlevel());
        $tpl->assign('adv2',$adv2);
        $tpl->compile(basename(__FILE__,'.php'),''); 
    }
    
    
?>