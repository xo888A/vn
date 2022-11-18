<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
   
    $where = "";
    $where = $where." 1=1";
    $count = $db->get_count('topic',$where,'id'); 
    $pagecount = ceil($count/PAGESIZE);
    $page = CW('get/page',1);
    
    $page = $page<=0 ? 1 : $page;
    $page = $page>=$pagecount ? $pagecount : $page;
    $page = ($page-1)<0 ? 0 : ($page-1)*PAGESIZE;
    
 
    $articles = $db->query('topic','',$where,'num desc',"{$page},".PAGESIZE);
    $data = '';
    foreach($articles as $article){
    	//$num = $db->get_count('post',"instr(topic,'{$article['id']}')");
    	$a = INDEX."/index.php?mod=topiclist&id=".$article['id'];
    	$data .= "<li>
                <div>
                    <a href='{$a}'><img src='{$article['cover']}'></a>
                    <p class='p1 abs'>#{$article['name']}</p>
                    <p class='p2 abs overhid'>{$article['desces']}</p>
                    <p class='p3 abs'>{$article['num']}Nội dung</p>
                </div>
            </li>";
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
    $tpl->assign('data',$data);
    $tpl->assign('page',$page);
    if(functions::is_mobile()){
    $topics = $db->query('sets','tuijianlist','id=1');
    $topics = $topics[0]['tuijianlist'];
    $topics = explode(',',$topics);
    $t = '';
    foreach ($topics as $topic){
        $ts = $db->query('topic','',"name='{$topic}'");
        $url = INDEX.'/index.php?mod=topiclist&id='.$ts[0]['id'];
        $t .= "<li><a href='{$url}'>{$topic}</a></li>";
    }
    $index = INDEX;
    $t .= "<li class='special'><a href='{$index}/index.php?mod=alltopiclist'>Kiểm tra toàn bộ nội dung+</a></li>";
    $tpl->assign('topic',$t);
        $tpl->compile(basename(__FILE__,'.php'),'wap'); 
    }else{
        $tpl->compile(basename(__FILE__,'.php'),''); 
    }
    
?>