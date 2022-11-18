<?php 
    if(!defined('CW')){exit('Access Denied');}
    $page = intval(abs(CW('get/page',1)));
    $db = functions::db();
    $tel = CW('get/tel');
    $ids = $db->query('sellvideo','vidid',"tel='{$tel}'");
    $list = '';
    foreach ($ids as $id){
        $list .= $id['vidid'].',';
    }
    $list = rtrim($list, ",");
    $where = "id in ($list)";
    $count = $db->get_count('post',$where,'id'); 
    $pagecount = ceil($count/PAGESIZE);
   
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
            $href = INDEX.'/index.php?mod=video&id='.$article['id'];$_s='video';
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
            $href = INDEX.'/index.php?mod=organ&id='.$article['id'];$_s='organ';
        }elseif($article['shortvidcover']!=''){
            $_s='shortvideo';
        }
        
    	$data .= "<li>
                    <div class='rel'>
                        <a href='javascript:;' onclick='openvideo(\"{$article['id']}\",\"$_s\")'><img class='cover' src='{$cover}' /></a>
                        
                        <p class='tag2 abs'>{$tag}</p>
                    </div>
                    <p class='overhid t'>{$title}</p>
                    <p class='ts ts3 ts4'><img src='{$a}' />{$time}<span class='phonehide'><img src='{$b}' class='b' />{$hot}</span><img class='c' src='{$c}' />{$likes}</p>
                </li>";
    }
    echo json_encode(array(
        'state'=>1,
        'data'=>$data
    ));
?>