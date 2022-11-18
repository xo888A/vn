<?php 
    if(!defined('CW')){exit('Access Denied');}
   
    $db = functions::db();
    $page = intval(abs(CW('get/page',1)));
    $where = $where."  ishow=1 and imglist!=''";
    $count = $db->get_count('post',$where); 
    $pagecount = ceil($count/PAGESIZE);
    
    $page = ($page-1)<0 ? 0 : ($page-1)*PAGESIZE;

    $articles = $db->query('post','',$where,'ftime desc',"{$page},".PAGESIZE);
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
 
        $tips = functions::getnewtips($article['vipdiam'],$article['diamond']);
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
    	$tu4 = INDEX.'/index.php?mod=topiclist&id='.$topic[3];
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
    	$imglist = explode('|',$article['imglist']);
        
    	$nickname = $user['nickname'] ? $user['nickname'] : 'Người dùng chưa xác định';
    	$url = INDEX.'/index.php?mod=organ&id='.$article['id'];
    	$userurl = INDEX."/index.php?mod=author&id=".functions::autocode($article['userid']);

    	        $miaoshu =  $user['miaoshu'] ? $user['miaoshu'] : 'Chưa có mô tả';
                $_imglists = explode('|',$article['imglist']);$_='';
                foreach ($_imglists as $_imglist){
                    $_.= "<p><img src='{$_imglist}'></p>";
                }
                $data .="<li>
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
                                   {$v}{$tips}
                                <p class='tag2 abs'>{$tag}</p>
                                </div>
                                <p class='overhid t'>{$title}</p>
                                <p class='stype overhid '>{$topi1}{$topi2}{$topi3}{$topi4}</p>
                                <p class='ts'><img src='{$a}' />{$time}<img src='{$b}' class='b' />{$hot}<img class='c' src='{$c}' />{$likes}</p>
                            </div>
                            <p class='line'></p>
                        </li>";
                
    	
    }
    echo json_encode(array(
        'state'=>1,
        'data'=>$data
    )); 
    
    
?>