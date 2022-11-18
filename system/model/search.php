<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    
    $where = $keyword = strip_tags(CW('get/keyword'));
    $where = "title like '%{$where}%' and";
    $type = CW('get/type',2);
    $a1 = $a2 = $a3 = '';
    if($type=='video'){
        $where = $where." ishow=1 and shortvidcover='' and videourl!=''";$a2 = 'selected';
    }else if($type=='organ'){
        $where = $where." ishow=1 and shortvidcover='' and imglist!=''";$a3 = 'selected';
    }else{
        $where = $where." ishow=1 and shortvidcover=''";$a1 = 'selected';
    }
    

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
        if($isright){
            $hot = functions::hot($article['hot']);
            $like = functions::hot($article['likes']);
            $usr = $db->query('users','',"tel='{$article['userid']}'");
            $nickname =$usr[0]['nickname'] ? $usr[0]['nickname'] : 'Người dùng chưa xác định';
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
                        <a href='{$href}'><img class='cover' src='{$cover}' />
                        {$tips}
                        <p class='tag2 abs'>{$tag}</p>
                        {$v}</a>
                    </div>
                    <p class='overhid t'>{$title}</p>
                    <p class='ts'><img src='{$b}' class='b' />{$hot}<img class='c' src='{$c}' />{$likes}</p>
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
    $tpl =  new Society();
    $tu = TU;
    $html =  "<div class='center'><img class='nodata' src='{$tu}/nodata.png'><p class='center nd'>Chưa có nội dung~</p></div>";
    $tpl->assign('data',$data ? $data : $html);
    $tpl->assign('page',$page);
    $index = INDEX;
    $ul = "<ul class='add8 publictag' style='margin-bottom:20px'>
                <li  class='{$a1}'><p class='abs'></p><a href='{$index}/index.php?mod=search&keyword={$keyword}'>Tất cả hoạt động</a></li>
                <li  class='{$a2}'><p class='abs'></p><a href='{$index}/index.php?mod=search&type=video&keyword={$keyword}'>Video</a></li>
                <li  class='{$a3}'><p class='abs'></p><a href='{$index}/index.php?mod=search&type=organ&keyword={$keyword}'>Cộng đồng</a></li>
            </ul>";
    $tpl->assign('ul',$ul);
    if(isphone()){
        $tpl->compile(basename(__FILE__,'.php'),'wap'); 
    }else{
        $tpl->compile(basename(__FILE__,'.php'),''); 
    }
    
?>