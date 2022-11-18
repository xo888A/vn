<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $iswhere = CW('get/where');
    $where = '';
    if($iswhere=='video'){
        $where = " ishow=1 and videocover!='' and";
    }elseif($iswhere=='organ'){
        $where = " ishow=1 and imglist!='' and";   
    }else{
        $where = " istuijian='是' and ishow=1 and shortvidcover='' and";
    }
    $id = CW('get/id');
    if($where && $id){
        $where .= "  instr(topic,'{$id}') and";
    }elseif($id){
        $where .= " ishow=1 and shortvidcover='' and instr(topic,'{$id}') and";
    }
    $where = $where.'  1=1';
    $articles = $db->query('post','',$where,'ftime desc',50);
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
        $href = $cover = $v = $tag = '';
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
            $nm = $article['addparam'] ? $article['addparam'] : 0;
            $tag = "<img src='{$i}'>{$nm}";
            $href = INDEX.'/index.php?mod=organ&id='.$article['id'];
        }
        $tips = functions::getnewtips($article['vipdiam'],$article['diamond']);
        $user = $db->query('users','',"tel='{$article['userid']}'",'',1);
    	$user = $user[0];
    	$topic = explode(',',$article['topic']);
    	$tu1 = INDEX.'/index.php?mod=topiclist&id='.$topic[0];
    	$tu2 = INDEX.'/index.php?mod=topiclist&id='.$topic[1];
    	$tu3 = INDEX.'/index.php?mod=topiclist&id='.$topic[2];
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
    	
        $userurl = INDEX."/index.php?mod=author&id=".functions::autocode($article['userid']);
    	$nickname = $user['nickname'] ? $user['nickname'] : 'Người dùng không xác định';
        $data .= "<li>
                    <div class='scover overhid'>
                        <a href='{$userurl}'><img  src='{$user['avatar']}' />
                        <p class='stit abs'>{$nickname}</p></a>
                        <p class='stype abs '>{$topi1}{$topi2}{$topi3}</p>
                    </div>
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
    echo $data;
?>