<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $keyword = CW('get/keyword');
    if($keyword){
        $content = "content like '%$keyword%' and ";
    }
    $mtype = CW('get/mtype');
    if($mtype=='Tất cả' || !$mtype){
        $mtype = '';
    }else {
        $mtype = "mtype='$mtype' and ";
    }
    $where = $mtype.$content." 1=1";
    $count = $db->get_count('sysmessage',$where,'id'); 
    $pagecount = ceil($count/PAGESIZE);
    $page = CW('get/page',1);
    
    $page = $page<=0 ? 1 : $page;
    $page = $page>=$pagecount ? $pagecount : $page;
    $page = ($page-1)<0 ? 0 : ($page-1)*PAGESIZE;
    
 
    $articles = $db->query('sysmessage','',$where,'id desc',"{$page},".PAGESIZE);
    $data = '';
    foreach($articles as $article){
    	$time = $article['ftime'];
    	$con = strip_tags($article['content']);
    	$url2 = INDEX.'/admin.php?mod=notice&id='.$article['id'];
    	$data .= "<tr>
    	            <td>{$article['mtype']}</td>
                    <td>{$con}</td>
                    <td>{$time}</td>
                    <td>
                        <a class='btn btn2' href='{$url2}'><i class='fa fa-edit'></i>Chỉnh sửa</a>
                        <a class='btn btn3 del' rel='sysmessage'  id='{$article['id']}' href='javascript:;'><i class='fa fa-trash'></i>Xóa</a>
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
    $tpl->compile('noticelist','admin'); 
?>