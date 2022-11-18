<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    
    $ishow = CW('get/ishow');
    if($ishow=='1'){
        $ishow = 'ishow=1 and ';
    }elseif ($ishow=='0') {
        $ishow = 'ishow=0 and ';
    }else{
        $ishow = '';
    }
    $keyword = CW('get/keyword');
    if($keyword){
        $title = "htmlcomment2 like '%$keyword%' and ";
    }
    $where = $ishow.$title." 1=1";
    $count = $db->get_count('htmlcomment2',$where,'id'); 
    $pagecount = ceil($count/PAGESIZE);
    $page = CW('get/page',1);
    
    $page = $page<=0 ? 1 : $page;
    $page = $page>=$pagecount ? $pagecount : $page;
    $page = ($page-1)<0 ? 0 : ($page-1)*PAGESIZE;
    $articles = $db->query('htmlcomment2','',$where,'id desc',"{$page},".PAGESIZE);
    $data = '';
    foreach($articles as $article){
    	$time = date('Y-m-d H:i:s',$article['ftime']);
    	if($article['ishow']){
    	    $checked = "<p class='isall'>Đã kiểm tra</p>";
    	}else{
    	    $checked = "<input  rel='{$article['id']}' type='checkbox' />";
    	}
    	
    	
    	
    	
    	$newid = $db->query('htmlcomments','postid',"id='{$article['commentid']}'");
    	$newid = $newid[0]['postid'];

    	$url = INDEX.'/index.php?mod=html&id='.$newid;
    	
    	
    	
    	
    	
    	$data .= "<tr>
    	            <td>{$checked}</td>
    	            <td>{$article['tel1']}</td>
    	            <td>{$article['tel2']}</td>
                    <td>{$article['comment']}</td>
                  <td><a href='{$url}'  target='_blank' style='color:#3FCF7F'>{$newid}</a></td>
                    <td>{$time}</td>
                    <td>
                        <a class='btn btn3 del' rel='htmlcomment2'  id='{$article['id']}' href='javascript:;'><i class='fa fa-trash'></i>删除</a>
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
    $tpl->compile('htmlcommentslists','admin'); 
?>