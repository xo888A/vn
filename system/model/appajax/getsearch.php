<?php
    $db =functions::db();
    $tel = CW('post/tel');
    $postids = $db->query('history','vid',"dev='{$tel}'",'ftime desc');
    foreach ($postids as $postid){
        $article = $db->query('post','',"id='{$postid['vid']}'",'',1);$article = $article[0];
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
            $href = INDEX.'/index.php?mod=organ&id='.$article['id'];$_t ='organ';
        }
        $tips = functions::getnewtips($article['vipdiam'],$article['diamond']);
        if($article['shortvidurl']!=''){
            $_t= 'shortvideo';
        }
        $data .= "<li>
                <div class='rel'>
                    <a href='javascript:;' onclick='openvideo(\"{$article['id']}\",\"$_t\")'><img class='cover' src='{$cover}' />
                    {$tips}
                    <p class='tag2 abs'>{$tag}</p>
                    {$v}</a>
                </div>
                <p class='overhid t'  onclick='openvideo(\"{$article['id']}\",\"$_t\")'>{$title}</p>
                <p class='ts'><img src='{$a}' />{$time}<span class='phonehide'><img src='{$b}' class='b' />{$hot}</span><img class='c' src='{$c}' />{$likes}</p>
            </li>";
    }
    $sets = $db->query('sets','keywordslist,tuijianid','id=1','',1);
    $keywordslists = explode(',',$sets[0]['keywordslist']);
    $num=1;
    foreach ($keywordslists as $val){
        if($num<=3){
            $data2 .="<li onclick='searchkey(\"{$val}\")'><span><img src='../image/level{$num}.png' /></span>{$val}</li>";
        }else{
            $data2 .= "<li onclick='searchkey(\"{$val}\")'><span>{$num}</span>{$val}</li>";
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
                    <a href='javascript:;' onclick='openvideo(\"{$article['id']}\",\"$_t\")'><img class='cover' src='{$cover}' />
                    {$tips}
                    <p class='tag2 abs'>{$tag}</p>
                    {$v}</a>
                </div>
                <p class='overhid t'>{$title}</p>
                <p class='ts'><img src='{$b}' class='b' />{$hot}<img class='c' src='{$c}' />{$likes}</p>
            </li>";
        
    	
    }
    if(!$tel){
        $data = '';
    }
    
    
    echo json_encode(array(
        'data1'=>$data,
        'data2'=>$data2,
        'data3'=>$data3,
        'state'=>1,
    ));
?>