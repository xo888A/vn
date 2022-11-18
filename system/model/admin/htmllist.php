<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    
    $keyword = CW('get/keyword');
    if($keyword){
        $title = "name like '%$keyword%' and ";
    }
    $where = $title." 1=1";
    $count = $db->get_count('html',$where,'id'); 
    $pagecount = ceil($count/PAGESIZE);
    $page = CW('get/page',1);
    
    $page = $page<=0 ? 1 : $page;
    $page = $page>=$pagecount ? $pagecount : $page;
    $page = ($page-1)<0 ? 0 : ($page-1)*PAGESIZE;
    
 
    $articles = $db->query('html','',$where,'id desc',"{$page},".PAGESIZE);
    $data = '';
    foreach($articles as $article){
    	$href= INDEX.'/admin.php?mod=html&id='.$article['id'];
    	$url = INDEX.'/index.php?mod=html&id='.$article['id'];
    	$data .= "<tr>
    	            <td>{$article['name']}</td>
                    <td>
                        <a class='btn btn1' href='{$url}' target='_blank'><i class='fa fa-edit'></i>Kiểm tra</a>
                        <a class='btn btn2' href='{$href}'><i class='fa fa-edit'></i>Chỉnh sửa</a>
                        <a class='btn btn3 del' rel='html'  id='{$article['id']}' href='javascript:;'><i class='fa fa-trash'></i>Xóa</a>
                    </td>
                </tr>";
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
    $tpl->compile('htmllist','admin'); 
?>