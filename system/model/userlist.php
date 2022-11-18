
<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();

    $where = "addparam='作者'";
    $counts = $db->get_count('users',$where,'id'); 
    $pagecount = ceil($counts/PAGESIZE);
    $page = CW('get/page',1);
    
    $page = $page<=0 ? 1 : $page;
    $page = $page>=$pagecount ? $pagecount : $page;
    $page = ($page-1)<0 ? 0 : ($page-1)*PAGESIZE;

    $articles = $db->query('users','',$where,'flonum desc',"{$page},".PAGESIZE);

    $data = '';
    foreach($articles as $article){

    	$nickname = $article['nickname'] ? $article['nickname'] : 'Người dùng chưa xác định';
    	
    	$curdatas = $db->query('post','',"userid='{$article['tel']}' and ishow=1 and shortvidcover='' ",'ftime desc',3);
    	$data1 = $data2 ='';$userurl = INDEX."/index.php?mod=author&id=".functions::autocode($article['tel']);
    	foreach ($curdatas as $curdata){
    	
    	    if($curdata['videocover'] ){
    	        $u = INDEX.'/index.php?mod=video&id='.$curdata['id'];
    	        
    	        if(functions::is_mobile()){
                    $data1 .= "<p><a href='{$userurl}'><img src='{$curdata['videocover']}' /></a></p>"; 
                }else{
                    $data1 .= "<li><a href='{$userurl}'><img src='{$curdata['videocover']}'></a></li>";
                }
    	    }elseif($curdata['imglist']){
    	        $u = INDEX.'/index.php?mod=organ&id='.$curdata['id'];
    	        $pos = stripos($curdata['imglist'],'|');
                if($pos){
                    $cover = substr($curdata['imglist'],0,$pos);
                }else{
                    $cover = $curdata['imglist'];
                }
    	        
    	        if(functions::is_mobile()){
                    $data1 .= "<p><a href='{$userurl}'><img src='{$cover}' /></a></p>"; 
                }else{
                    $data1 .= "<li><a href='{$userurl}'><img src='{$cover}'></a></li>";
                }
    	    }
    	    
    	}

    	$count = $db->get_count('follow',"tel2='{$article['tel']}'");
    	$count = functions::hot($count);
    	
    	
    	$us = functions::autocode(CW('cookie/__username'),'-');
    	$isfollow = $db->query('follow','',"tel1='{$us}' and tel2='{$article['tel']}'",'',1);
        if($isfollow){
            $follow = "<a href='javascript:;' class='followuser user_{$article['tel']}' user='{$article['tel']}'  style='background:#ccc'>Đã theo dõi</a>";
        }else{
            $follow = "<a href='javascript:;' class='followuser user_{$article['tel']}' user='{$article['tel']}'   >Theo dõi</a>";
        }
    	
    	$flonum = functions::hot($article['flonum']);
    	if(functions::is_mobile()){
    	    if(!$data1){
    	        continue;
    	    }
    	}else{
    	    if(!$data1){
        	    $img = IMG;
        	    $data1 = "<li><a href='javascript:;'><img src='{$img}/bg.png' /></a></li><li><a href='javascript:;'><img src='{$img}/bg.png' /></a></li><li><a href='javascript:;'><img src='{$img}/bg.png' /></a></li>";
        	    
        	}
    	}
    	
    	if(functions::is_mobile()){
    	    $data .= "<li>
                        <div class='rel'>
                            <a href='{$userurl}'><img class='a' src='{$article['avatar']}'></a>
                            <p class='stit2 abs'><a href='{$userurl}'>{$nickname}</a><span>{$flonum}</span>Người hâm mộ</p>
                            <p class='desc2 abs overhid'>{$article['descs']}</p>
                            <p class='gz2 abs' rel='{$article['id']}'>{$follow}</p>
                            <div class='overflow'>
                                {$data1}
                            </div>
                        </div>
                    </li>";
                    
    	}else{
    	    $data .= "<li>
                    <div class='rel'>
                        <a href='{$userurl}'><img src='{$article['avatar']}'></a>
                        <p class='stit2 abs'><a href='{$userurl}' style='color: #000;'>{$nickname}</a><span>{$flonum}</span>Người hâm mộ</p>
                        <p class='desc2 abs overhid'>{$article['descs']}</p>
                        <p class='gz2 abs' rel='{$article['id']}'>{$follow}</p>
                        <ul class='overflow'>
                            {$data1}
                        </ul>
                    </div>
                </li>";
    	}
    	
    }
    $allurl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    if(stripos($allurl ,"&page=")){
    	$nallurl = substr($allurl,0,stripos($allurl ,"&page="));
    }else{
    	$nallurl = $allurl;
    }
    $pageurl = $nallurl.'&page=';
    $page = functions::page($counts,$pagecount,$pageurl);

    $tpl =  new Society();
    $tpl->assign('data',$data);
    $tpl->assign('page',$page);
    if(functions::is_mobile()){
        $tpl->compile(basename(__FILE__,'.php'),'wap'); 
    }else{
        $tpl->compile(basename(__FILE__,'.php'),''); 
    }
   
    
?>