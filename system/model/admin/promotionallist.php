<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $keyword = CW('get/keyword');
    if($keyword){
        $btit = "btit like '%$keyword%' and ";
    }
    $where = $btit.' 1=1';
    $count = $db->get_count('gooddeal',$where,'id'); 
    $pagecount = ceil($count/PAGESIZE);
    $page = CW('get/page',1);
    
    $page = $page<=0 ? 1 : $page;
    $page = $page>=$pagecount ? $pagecount : $page;
    $page = ($page-1)<0 ? 0 : ($page-1)*PAGESIZE;
    $articles = $db->query('gooddeal','',$where,'id desc',"{$page},".PAGESIZE);
    $data = '';
    foreach($articles as $article){
    	$time = date('Y-m-d H:i:s',$article['ftime']);
        $url2 = INDEX.'/admin.php?mod=promotional&id='.$article['id'];
    	$data .= "<tr>
    	            <td>{$article['btit']}</td>
    				<td><img class='cover' src='{$article['cover']}' /></td>
                    <td>{$article['diamond']}</td>
                    <td>{$time}</td>
                    <td>
                        <a class='btn btn2' href='{$url2}'><i class='fa fa-edit'></i>Chỉnh sửa</a>
                        <a class='btn btn3 del' rel='gooddeal'  id='{$article['id']}' href='javascript:;'><i class='fa fa-trash'></i>Xóa</a>
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
    $tpl->compile('promotionallist','admin'); 
?>