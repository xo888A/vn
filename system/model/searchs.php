<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $sets = $db->query('sets','keywordslist,tuijianid','id=1','',1);
    $keywordslists = explode(',',$sets[0]['keywordslist']);
    $num=1;
    foreach ($keywordslists as $val){
        if($num<=3){
            $url = INDEX."/searchs.html?mod=search&keyword=".$val;
            $data2 .="<li><a href='{$url}'><span><img src='../image/level{$num}.png' /></span>{$val}</a></li>";
        }else{
            $data2 .= "<li><a href='{$url}'><span>{$num}</span>{$val}</a></li>";
        }
        $num++;
    }
    $articles3 = $db->query('post','',"id in({$sets[0]['tuijianid']})",'id desc');

    foreach($articles3 as $article){
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
            $href = INDEX.'/index.php?mod=video&id='.$article['id'];$_t ='video';
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
            $href = INDEX.'/index.php?mod=organ&id='.$article['id'];$_t= 'organ';
        }
        $tips = functions::getnewtips($article['vipdiam'],$article['diamond']);

        if($article['shortvidurl']!=''){
            $_t= 'shortvideo';
        }
        
        $data3 .= "<li>
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
    $tpl =  new Society();
    $tpl->assign('data2',$data2);
    $tpl->assign('data3',$data3);
    $tpl->compile(basename(__FILE__,'.php'),'wap'); 
?>