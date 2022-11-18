<?php 
    if(!defined('CW')){exit('Access Denied');}
    $tel = CW('get/tel');
    $page = intval(abs(CW('get/page',1)));
    $db = functions::db();
    $user = $db->query('users','',"tel='{$tel}'",'',1);
    $tpl =  new Society();
   
    $tu = TU;
    $data ='';
    $postids = $db->query('likes','postid',"tel='{$tel}'",'ftime desc');

    foreach ($postids as $postid){
        if(!$postid['postid']){
            continue;
        }
        $article = $db->query('post','',"id='{$postid['postid']}'",'',1);$article = $article[0];
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
        }else if($article['shortvidcover']!=''){
            $cover = $article['shortvidcover'];
            $i = '../image/dsp.png';
            $tag = "<img src='{$i}' style='vertical-align: middle;'>Video ngắn";
            $_t= 'shortvideo';
        }
        $tips = functions::getnewtips($article['vipdiam'],$article['diamond']);
  
        $data .= "<li>
                <div class='rel'>
                    <a href='javascript:;' onclick='openvideo(\"{$article['id']}\",\"$_t\")'><img class='cover' src='{$cover}' />
                    {$tips}
                    <p class='tag2 abs'>{$tag}</p>
                    {$v}</a>
                </div>
                <p class='overhid t'>{$title}</p>
                <p class='ts'><img src='{$a}' />{$time}<span class='phonehide'><img src='{$b}' class='b' />{$hot}</span><img class='c' src='{$c}' />{$likes}</p>
            </li>";
    }
    

    echo json_encode(array(
        'state'=>1,
        'data'=>$data
    )); 
?>