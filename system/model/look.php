<?php 
    if(!defined('CW')){exit('Access Denied');}
    $tel = getuser();
    $db = functions::db();
    $user = $db->query('users','',"tel='{$tel}'",'',1);
    $tpl =  new Society();
    $tpl->assign('username',$tel ? $tel : 'Khách ghé thăm');
    $tpl->assign('diam',$user[0]['diam'] ? $user[0]['diam'] : 0);
    $tpl->assign('mylevel',$user[0]['mylevel'] ? $user[0]['mylevel'].'Đẳng cấp hội viên' : 'Hội viên phổ thông');
    $tpl->assign('level',$user[0]['mylevel']);
    $tpl->assign('sex',$user[0]['sex']=='Nữ' ? 'nv' : 'nan');
    $tu = TU;
    $tpl->assign('nick',$user[0]['nickname']);
    $tpl->assign('money',$user[0]['money']);
    if($user[0]['viptime']>time()){
        $tpl->assign('isshow','display:none');
    }else{
        $tpl->assign('isshow','');
    }
    $postids = $db->query('history','vid',"dev='{$tel}'");
    $implode = '';
    foreach ($postids as $postid){
        $implode .= $postid['vid'].',';
    }
    $implode = rtrim($implode,',');
    $where = "  id in($implode)";
    $count = $db->get_count('post',$where,'id'); 
    $pagecount = ceil($count/PAGESIZE);
    $page = CW('get/page',1);
    
    $page = $page<=0 ? 1 : $page;
    $page = $page>=$pagecount ? $pagecount : $page;
    $page = ($page-1)<0 ? 0 : ($page-1)*PAGESIZE;
    $articles = $db->query('post','',$where,'id desc',"{$page},".PAGESIZE);
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
        }else if($article['shortvidcover']!=''){
            continue;
        }
        $tips = functions::getnewtips($article['vipdiam'],$article['diamond']);
        if($isright){
            $hot = functions::hot($article['hot']);
            $like = functions::hot($article['likes']);
            $usr = $db->query('users','',"tel='{$article['userid']}'");
            $nickname =$usr[0]['nickname'] ? $usr[0]['nickname'] : 'Người dùng chưa xác định';
            $tu = TU;
            $url = INDEX."/index.php?mod={$istype}&id=".$article['id'];
            $hrefs = INDEX.'/index.php?mod=author&id='.functions::autocode($article['userid']);
            $data .= "<li>
                        <a class='d4' href='{$url}'><img src='{$cover}' class='fl'></a>
                        <div class='fr rel'>
                            <p class='d1'>{$title}</p>
                            <p class='ts'><img src='{$tu}/b.png' class='b'>{$hot}<img class='c' src='{$tu}/c.png'>{$like}</p>
                            <a href='{$hrefs}'><img src='{$tu}/up.png' class='b rimg'><span>{$nickname}</span></a>
                        </div>
                    </li>";
        }else{
            $data .= "<li>
                    <div class='rel'>
                        <a href='{$href}'><img class='cover' src='{$cover}' /></a>
                        {$tips}
                        <p class='tag2 abs'>{$tag}</p>
                        {$v}
                    </div>
                    <p class='overhid t'>{$title}</p>
                    <p class='ts'><img src='{$a}' />{$time}<img class='c' src='{$c}' />{$likes}</p>
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
    $tpl->assign('page',$page);
    $tpl->assign('data',$data);
    $adv = functions::get_contents(INDEX.'/webajax.php?mod=getadv&position=用户模块-3广告&pos=user&num=3&level='.getlevel());
    $tpl->assign('adv',$adv);
    $tpl->assign('avatar',$user[0]['avatar'] ? $user[0]['avatar'] : TU.'/default.jpg');
    if(isphone()){
        if(intval($user[0]['mylevel'])>0){
             $levelavatar = "<img src='../image/T{$user[0]['mylevel']}.png' class='level' />";
            $tpl->assign('levelavatar',$levelavatar);
        }
        $phoneadv = functions::get_contents(INDEX.'/webajax.php?mod=getphoneadv&position=用户模块-3广告&num=6&level='.getlevel());
        $tpl->assign('phoneadv',$phoneadv);
        $tpl->compile(basename(__FILE__,'.php'),'wap'); 
    }else{
        $tpl->compile(basename(__FILE__,'.php'),''); 
    }
?>