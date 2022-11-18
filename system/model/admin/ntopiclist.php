<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $keyword = CW('get/keyword');
    $where = "name like '%{$keyword}%'";
    $count = $db->get_count('topic',$where,'id');
    $pagecount = ceil($count/PAGESIZE);
    $page = CW('get/page',1);
    
    $page = $page<=0 ? 1 : $page;
    $page = $page>=$pagecount ? $pagecount : $page;
    $page = ($page-1)<0 ? 0 : ($page-1)*PAGESIZE;
    
    
    //
    $topics = $db->query('topic','',$where,'id desc',"{$page},".PAGESIZE);
    $data = '';
    foreach ($topics as $topic){
        $href = INDEX.'/admin.php?mod=topiclist&id='.$topic['id'];
		$data .= "<tr>
            		<td>{$topic['name']}</td>
            		<td>{$topic['desces']}</td>
            		<td>{$topic['hot']}</td>
            		<td>{$topic['tuijian']}</td>
            		
                    <td>
                    	<a class='btn btn2' rel='updatetopic'  href='{$href}'><i class='fa fa-edit'></i>Chỉnh sửa</a>
                    	<a class='btn btn3 del' rel='topic' id='{$topic['id']}' href='javascript:;'><i class='fa fa-trash'></i>Xóa</a>
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
    $tpl->compile('ntopiclist','admin'); 
?>