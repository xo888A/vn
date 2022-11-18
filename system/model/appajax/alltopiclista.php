<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $page = intval(abs(CW('get/page',1)));
    $where = "";
    $where = $where." 1=1";
    $count = $db->get_count('topic',$where,'id'); 
    $pagecount = ceil($count/PAGESIZE);
  
    $page = ($page-1)<0 ? 0 : ($page-1)*PAGESIZE;
    
 
    $articles = $db->query('topic','',$where,'num desc',"{$page},".PAGESIZE);
    $data = '';
    foreach($articles as $article){
    	//$num = $db->get_count('post',"instr(topic,'{$article['id']}')");
    	$a = INDEX."/index.php?mod=topiclist&id=".$article['id'];
    	$data .= "<li>
                <div  onclick='opentopic(\"{$article['name']}\")'>
                    <a href='javascript:;'><img src='{$article['cover']}'></a>
                    <p class='p1 abs'>#{$article['name']}</p>
                    <p class='p2 abs overhid'>{$article['desces']}</p>
                    <p class='p3 abs'>{$article['num']}Nội dung</p>
                </div>
            </li>";
    }
    echo json_encode(array(
        'state'=>1,
        'data'=>$data
    ));
    
    
?>