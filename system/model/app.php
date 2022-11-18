<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $count = $db->get_count('app',"");
    $pagecount = ceil($count/PAGESIZE);
    $page = CW('get/page',1);
    
    $page = $page<=0 ? 1 : $page;
    $page = $page>=$pagecount ? $pagecount : $page;
    $page = ($page-1)<0 ? 0 : ($page-1)*PAGESIZE;
    
    $articles = $db->query('app','','','id desc',"{$page},".PAGESIZE);
    $data = '';
    $tu = TU;
    foreach($articles as $article){

        $data .= "<li>
                        <a class='tag' href='{$article['downloadurl']}' target='_blank'>Tải về</a>
                        <img src='{$article['cover']}' />
                        <div>
                            <p class='p1'>{$article['name']}</p>
                            <p class='p2'>{$article['num']}.00Triệu lượt tải xuống</p>
                            <p class='p3 hide2'>{$article['desces']}</p>
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
    $html =  "<img class='nodata' src='{$tu}/nodata.png'><p class='center nd'>Chưa có lượt theo dõi~</p>";
    $tpl->assign('data',$data ? $data : $html);
    $tpl->assign('page',$page);
    $tel = functions::autocode(CW('cookie/__username'),'-');
    $user = $db->query('users','avatar',"tel='{$tel}'",'',1);
    $tpl->assign('avatar',$user[0]['avatar'] ? $user[0]['avatar'] : TU.'/default.jpg');
   if(isphone()){
        $tpl->compile(basename(__FILE__,'.php'),'wap'); 
    }else{
        $tpl->compile(basename(__FILE__,'.php'),''); 
    }
?>