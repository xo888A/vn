<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();

    $where = '';
    $where = $where."  ishow=1 and imglist!=''";
    
    
    $db = functions::db();
    $articles = $db->query('post','',$where,'ftime desc',50);
    $data = '';$tu = TU;
    foreach($articles as $article){
    	$time = date('Y-m-d',$article['ftime']);
        $cover = $article['videocover'];
    	$title = $article['title'];
    	$likes = functions::hot($article['likes']);
    	$hot = functions::hot($article['hot']);
        $a = TU.'/a.png';
        $b = TU.'/b.png';
        $c = TU.'/c.png';
 
        
        $i = TU.'/t.png';
        $nm = $article['addparam'] ? $article['addparam'] : 0;
        $tag = "<img src='{$i}'>{$nm}";
        $href = INDEX.'/index.php?mod=organ&id='.$article['id'];
        
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
    	    $topi2 = "<a href='{$tu1}'>#".functions::getTopicName($topic[1]).'</a>';
    	}else{
    	    $topi2 = '';
    	}if($topic[2]){
    	    $topi3 = "<a href='{$tu1}'>#".functions::getTopicName($topic[2]).'</a>';
    	}else{
    	    $topi3 = '';
    	}
    	$imglist = explode('|',$article['imglist']);
        
    	$nickname = $user['nickname'] ? $user['nickname'] : 'Người dùng không xác định';
    	$url = INDEX.'/index.php?mod=organ&id='.$article['id'];
    	$userurl = INDEX."/index.php?mod=author&id=".$article['userid'];
        $data .= "<li>
                    <div class='scover overhid'>
                        <a href='{$userurl}'><img  src='{$user['avatar']}' />
                        <p class='stit abs'>{$nickname}</p></a>
                        <p class='stype abs '>{$topi1}{$topi2}{$topi3}</p>
                    </div>
                    <div class='rel section4 '>
                        <div class='imglist rel'>
                            <a href='{$url}'>
                                <p class='fl'>
                                    <img  src='{$imglist[0]}'>
                                </p>
                                <p class='fr'>
                                    <span><img  src='{$imglist[1]}'></span>
                                    <span><img  src='{$imglist[2]}'></span>
                                </p>
                                <p class='clear'></p>
                            </a>
                            <p class='abs pabs'><img class='si2' src='{$tu}/t.png'>{$nm}</p>
                        </div>
                    </div>
                    <p class='overhid t'>{$title}</p>
                    <p class='ts'><img src='{$a}' />{$time}<img src='{$b}' class='b' />{$hot}<img class='c' src='{$c}' />{$likes}</p>
                </li>";
    }
    echo $data;
?>