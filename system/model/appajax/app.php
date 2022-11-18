<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $count = $db->get_count('app',"");
    $pagecount = ceil($count/PAGESIZE);
    $page = intval(abs(CW('get/page',1)));
    $page = ($page-1)<0 ? 0 : ($page-1)*PAGESIZE;
    
    $articles = $db->query('app','','','id desc',"{$page},".PAGESIZE);
    $data = '';
    $tu = TU;
    foreach($articles as $article){

        $data .= "<li>
                        <a class='tag' href='javascript:;' onclick='openurl(\"{$article['downloadurl']}\")'>Tải về</a>
                        <img src='{$article['cover']}' />
                        <div>
                            <p class='p1'>{$article['name']}</p>
                            <p class='p2'>{$article['num']}.00 Trăm lần tải</p>
                            <p class='p3 hide2'>{$article['desces']}</p>
                        </div>
                    </li>";

    	
    }
    echo json_encode(array(
        'state'=>1,
        'data'=>$data
    ));
?>