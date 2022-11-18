<?php 
    if(!defined('CW')){exit('Access Denied');}

    $tpl =  new Society();
    
    $db = functions::db();
    $id = CW('get/id',1);
    if(!$id){
        functions::url(INDEX);exit;
    }
    $where = "topic like '%{$id}%' and";
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
            $pos = stripos($article['imglist'],'|');
            $v = '';
            if($pos){
                $cover = substr($article['imglist'],0,$pos);
            }else{
                $cover = $article['imglist'];
            }
            
            $i = TU.'/t.png';
            $addparam = $article['addparam'] ? $article['addparam'] : 0;
            $tag = "<img src='{$i}'>{$addparam}";
            $href = INDEX.'/index.php?mod=organ&id='.$article['id'];
        }
        $tips = functions::getnewtips($article['vipdiam'],$article['diamond']);
        if($isright){
            $hot = functions::hot($article['hot']);
            $like = functions::hot($article['likes']);
            $usr = $db->query('users','',"tel='{$article['userid']}'");
            $nickname =$usr[0]['nickname'] ? $usr[0]['nickname'] : '未知用户';
            $tu = TU;
            $url = INDEX.'/index.php?mod=video&id='.$article['id'];
            $data .= "<li>
                        <a class='d4' href='{$url}'><img src='{$cover}' class='fl'></a>
                        <div class='fr rel'>
                            <p class='d1'>{$title}</p>
                            <p class='ts'><img src='{$tu}/b.png' class='b'>{$hot}<img class='c' src='{$tu}/c.png'>{$like}</p>
                            <img src='{$tu}/up.png' class='b rimg'><span>{$nickname}</span>
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
                    <p class='ts'><img src='{$a}' />{$time}<img src='{$b}' class='b' />{$hot}<img class='c' src='{$c}' />{$likes}</p>
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
    $html =  "<img class='nodata' src='{$tu}/nodata.png'><p class='center nd'>暂无内容哦~</p>";
    $tpl->assign('data',$data ? $data : $html);
    $tpl->assign('page',$page);
    
    $name = $db->query('topic','name',"id='{$id}'",'',1);$name = $name[0]['name'];
    $tpl->assign('name',$name);
    
    
    
    
    
    $tpl->compile(basename(__FILE__,'.php'),''); 
?>