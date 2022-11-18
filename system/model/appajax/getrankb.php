<?php 
    if(!defined('CW')){exit('Access Denied');}
    
    $db = functions::db();
    $page = intval(abs(CW('get/page',1)));


    $type = CW('get/type');

    if($type=='video'){
        $where = " ishow=1 and  videourl!=''";

    }else if($type=='organ'){
        $where = " ishow=1 and  imglist!=''";

    }else if($type=='shortvideo'){
        $where = " ishow=1 and shortvidurl!=''";

    }else{
        $where = " ishow=1";

    }


    $tu = TU;
    $count = $db->get_count('post',$where); 
    $pagecount = ceil($count/PAGESIZE);
   
    $page = ($page-1)<0 ? 0 : ($page-1)*PAGESIZE;

    $articles = $db->query('post','',$where,'hot desc',"{$page},".PAGESIZE);
    $data = '';
    foreach($articles as $article){
        $topic = explode(',',$article['topic']);
        	if($topic[0]){
        	    $n1 =functions::getTopicName($topic[0]);
        	    $topi1 = "<a href='javascript:;' tapmode onclick='opentopic(\"$n1\")'>#".$n1.'</a>';
        	}else{
        	    $topi1 = '';
        	}
        	if($topic[1]){
        	    $n2 =functions::getTopicName($topic[1]);
        	    $topi2 = "<a  href='javascript:;' tapmode onclick='opentopic(\"$n2\")'>#".$n2.'</a>';
        	}else{
        	    $topi2 = '';
        	}
        	if($topic[2]){
        	    $n3 = functions::getTopicName($topic[2]);
        	    $topi3 = "<a   href='javascript:;' tapmode onclick='opentopic(\"$n3\")'>#".$n3.'</a>';
        	}else{
        	    $topi3 = '';
        	}
        	if($topic[3]){
        	    $n4 = functions::getTopicName($topic[3]);
        	    $topi4 = "<a href='javascript:;' tapmode onclick='opentopic(\"$n4\")'>#".$n4.'</a>';
        	}else{
        	    $topi4 = '';
        	}
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
            $user = $db->query('users','nickname,avatar,miaoshu,tel',"tel='{$article['userid']}'",'',1);$user = $user[0];
            $miaoshu =  $user['miaoshu'] ? $user['miaoshu'] : 'Chưa có môt tả';$nickname = $user['nickname'] ? $user['nickname'] : 'Người dùng chưa xác định';
            //$userurl = INDEX."/index.php?mod=author&id=".functions::autocode($article['userid']);
                if($article['videocover']!=''   || $article['shortvidcover']!=''){
                    if($article['shortvidcover']){
                        $cover = $article['shortvidcover'];
                        $img = TU.'/dsp.png';
                        $tag = "<img src='{$img}' />".'Video ngắn';
                        $_t = 'shortvideo';
                    }else{
                        $_t = 'video';
                        $cover = $cover;
                    }
                    $data  .= "<li>
                                <div class='wrap'>
                                    <div class='avatar'>
                                        <a href='javascript:;'  onclick='openuserindex(\"{$article['userid']}\")'><img class='avatar' src='{$user['avatar']}'>
                                        <span>{$nickname}</span></a>
                                        <span class='m'><img src='{$tu}/desc.png'>{$miaoshu}</span>
                                    </div>
                                    <div class='img rel'>
                                        <a href='javascript:;' onclick='openvideo(\"{$article['id']}\",\"{$_t}\")'><img class='cover' src='{$cover}' />
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
                     <a href='javascript:;' onclick='openuserindex(\"{$article['userid']}\")'><img class='avatar' src='{$user['avatar']}'></a>
                    <span>{$nickname}</span>
                     <span class='m'><img src='{$tu}/desc.png'>{$miaoshu}</span>
                </div>
                <div class='img rel'>
                    <div class='coverlist overflow'>
                    <a href='javascript:;' onclick='openvideo(\"{$article['id']}\",\"organ\")'>
                        {$_}</a>
                    </div>
                    {$v}
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
echo json_encode(array(
        'state'=>1,
        'data'=>$data
    )); 
    
?>