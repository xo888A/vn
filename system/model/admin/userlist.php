<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $checkbox = CW('get/checkbox');
    $addparam = CW('get/addparam') ;
    if($addparam){
        $ishow = "addparam='{$addparam}' and ";
    }else{
        $ishow = '';
    }
    if($checkbox){
        $keyword = CW('get/keyword');
        if($keyword){
            $title = "tel='{$keyword}' and ";
        }
        $nickname = CW('get/nickname');
        if($nickname){
            $nickname = "nickname='{$nickname}' and ";
        }
    }else{
        $keyword = CW('get/keyword');
        if($keyword){
            $title = "tel like '%$keyword%' and ";
        }
        $nickname = CW('get/nickname');
        if($nickname){
            $nickname = "nickname like '%$nickname%' and ";
        }
    }
    
    $where = $ishow.$title.$nickname." 1=1";
    $count = $db->get_count('users',$where,'id'); 
    $pagecount = ceil($count/PAGESIZE);
    $page = CW('get/page',1);
    
    $page = $page<=0 ? 1 : $page;
    $page = $page>=$pagecount ? $pagecount : $page;
    $page = ($page-1)<0 ? 0 : ($page-1)*PAGESIZE;
    
 
    $articles = $db->query('users','',$where,'id desc',"{$page},".PAGESIZE);
    $data = '';
    foreach($articles as $article){
        $url2 = INDEX.'/admin.php?mod=user&id='.$article['id'];
        if($article['systemtype']){
            $phonetype = $article['systemtype'].'('.$article['systemversion'].')';
        }else{
            $phonetype = '';
        }
    	$time = date('Y-m-d H:i:s',$article['ftime']);
    	
    	$data .= "<tr>

    	            <td>{$article['nickname']}</td>
                    <td>{$article['tel']}</td>
                    <!--<td>{$phonetype}</td>-->
                    <td>{$article['card']}</td>
                    <td>{$article['diam']}</td>
                    <td>{$article['money']}</td>
                    <td>{$article['sex']}</td>
                    <td>
                        <a class='btn btn2' href='{$url2}'><i class='fa fa-edit'></i>Chỉnh sửa</a>
                        <a class='btn btn3 del' rel='users'  id='{$article['id']}' href='javascript:;'><i class='fa fa-trash'></i>Xóa</a>
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
    $tpl->assign('checkbox',$checkbox ? "checked='on'" : '');
    
    $tpl->compile('userlist','admin'); 
?>