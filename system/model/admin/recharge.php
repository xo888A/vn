<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
   
    $keyword = CW('get/keyword');
    if($keyword){
        $tel = "payorder like '%$keyword%' and ";
    }
 
 
    $t = CW('get/tel');
    if($t){
        $t = "tel='{$t}' and ";
    }
 
    $select = CW('get/select');
    if($select=='0'){
        $select = "state='0' and ";
    }else if($select=='1'){
        $select = "state='1' and ";
    }else{
        $select = '';
    }


    $where = $select.$t.$tel.' 1=1';
    $count = $db->get_count('pays',$where,'id'); 
    $pagecount = ceil($count/PAGESIZE);
    $page = CW('get/page',1);
    
    $page = $page<=0 ? 1 : $page;
    $page = $page>=$pagecount ? $pagecount : $page;
    $page = ($page-1)<0 ? 0 : ($page-1)*PAGESIZE;
    
 
    $articles = $db->query('pays','',$where,'id desc',"{$page},".PAGESIZE);
    $data = '';
    foreach($articles as $article){
    	$time = date('Y-m-d H:i:s',$article['ftime']);
    	$name = $article['mchorderno'];
    	if($article['paytype']=='vip'){
    	    $name = $db->query('vipcard','descs',"id='{$name}'",'',1);$name = $name[0]['descs'];
    	}else{
    	    $name = $db->query('diamcard','descs',"id='{$name}'",'',1);$name = $name[0]['descs'];
    	}
    	$state = intval($article['state']);
    	if($state==0){
    	    $btn = "<a class='btn btn1 dakuan'  rel='{$article['id']}' href='javascript:;'><i class='fa fa-bell'></i>Chưa thanh toán</a>";
    	}elseif($state==1){
    	    $btn = "<a class='btn btn1 '  style='background:#ccc' href='javascript:;'><i class='fa fa-bell'></i>Đã thanh toán</a>";
    	}
    	$data .= "<tr>
    	            <td>{$article['tel']}</td>
    				<td>{$name}</td>
    				<td>{$article['pay']}</td>
    				<td>{$article['payorder']}</td>
    				<td>{$time}</td>
                     <td>
                        {$btn}
                         <a class='btn btn3 del' rel='pays'  id='{$article['id']}' href='javascript:;'><i class='fa fa-trash'></i>Xóa</a>
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
    $tpl->compile('recharge','admin'); 
?>
