
<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $isphone = functions::is_mobile();
    $id = functions::autocode(CW('get/id'),'-');
    $tpl =  new Society();
    $type = CW('get/type',2);
    $tuser = $db->query('users','',"tel='{$id}'",'',1);
    $cover_ = $tuser[0]['cover'];
    $where = "userid='{$id}' and";
    if(!$type){
        $where .= " ishow=1 and shortvidcover=''";
        $css1 = "selected";
    }elseif($type=='video'){
        $where .= " ishow=1 and videocover!='' ";
        $css2 = "selected";
    }elseif($type=='organ'){
        $where .= " ishow=1 and imglist!='' ";
        $css3 = "selected";
    }
    $tu = TU;
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
            $miaoshu =  $user['miaoshu'] ? $user['miaoshu'] : 'Chưa có mô tả';$nickname = $user['nickname'] ? $user['nickname'] : 'Người dùng không xác định';
            $userurl = INDEX."/index.php?mod=author&id=".functions::autocode($article['userid']);
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
    $tu = TU;
    $html =  "<div class='center'><img class='nodata' src='{$tu}/nodata.png'><p class='center nd'>Chưa có nội dung~</p></div>";
    $tpl->assign('data',$data ? $data : $html);
    $tpl->assign('page',$page);
    $tpl->assign('count',$count);

    functions::follow($tuser[0]['tel'],$tpl);
    $tpl->assign('nickname',$tuser[0]['nickname']);
    $tpl->assign('avatar',$tuser[0]['avatar'] ? $tuser[0]['avatar'] : TU.'/default.jpg');
    $tpl->assign('miaoshu',$tuser[0]['miaoshu']);
    $tpl->assign('sex',$tuser[0]['sex']=='Nam' ? 'nan' : 'nv');
    $tpl->assign('descs',$tuser[0]['descs'] ? functions::cut($tuser[0]['descs']) : 'Người này thật lười biếng, chẳng viết bất cứ điều gì~');
    //$follow = $db->get_count('follow',"tel2='{$article['userid']}'");
    $follow = functions::hot($tuser[0]['flonum']);
    $tpl->assign('follow',$follow);
    $tpl->assign('cover',$tuser[0]['cover'] ? $tuser[0]['cover'] : './image/beijingtu.jpg');
     $tpl->assign('tu',TU);
    $tpl->assign('a1',INDEX.'/index.php?mod=author&id='.CW('get/id'));
    $tpl->assign('a2',INDEX.'/index.php?mod=author&type=video&id='.CW('get/id'));
    $tpl->assign('a3',INDEX.'/index.php?mod=author&type=organ&id='.CW('get/id'));
    $tpl->assign('css1',$css1);$tpl->assign('css2',$css2);$tpl->assign('css3',$css3);
    if(functions::is_mobile()){
        $tpl->compile(basename(__FILE__,'.php'),'wap');
    }else{
        $tpl->compile(basename(__FILE__,'.php'),'');
    }
     
?>