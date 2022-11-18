<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $tel = functions::autocode(CW('cookie/__username'),'-');
    $type = CW('get/type');

    if($type=='all' || !$type){
        $where = "videocover!='' and userid='{$tel}' and ";
        $state_p = "<span style='color:yellowgreen;font-size:15px;font-weight:bold'>Trạng thái : thành công</span>";
    }else if($type=='success'){
        $where = "ishow=1 and videocover!='' and userid='{$tel}' and ";
        $state_p = "<span style='color:yellowgreen;font-size:15px;font-weight:bold'>Trạng thái : thành công</span>";
    }else if($type=='on'){
        $where = "ishow=2 and videocover!='' and userid='{$tel}' and ";
        $state_p = "<span style='color:red;font-size:15px;font-weight:bold'>Trạng thái : đang kiểm duyệt</span>";
    }
    $where = $where.'  1=1';
    $count = $db->get_count('post',$where,'id'); 
    $pagecount = ceil($count/PAGESIZE);
    $page = CW('get/page',1);
    
    $page = $page<=0 ? 1 : $page;
    $page = $page>=$pagecount ? $pagecount : $page;
    $page = ($page-1)<0 ? 0 : ($page-1)*PAGESIZE;
    
    
    $articles = $db->query('post','',$where,'id desc',"{$page},".PAGESIZE);
    $data = '';
    foreach($articles as $article){
        $time = date('Y-m-d',$article['ftime']);
        $cover = $article['videocover'];
    	$title = $article['title'];
    	$likes = functions::hot($article['likes']);
    	$hot = functions::hot($article['hot']);
        $a = TU.'/a.png';
        $b = TU.'/b.png';
        $c = TU.'/c.png';
        $cover = $v = '';
        if($article['videocover']!=''){
            $v = "<img class='vimg abs' src='".TU."/video.png' />";
            $cover = $article['videocover'];
            $tag = "{$article['addparam']}";
            $href = INDEX.'/index.php?mod=video&id='.$article['id'];
        }else if($article['imglist']!=''){
            $pos = stripos($article['imglist'],'|');
            $v = '';
            if($pos){
                $cover = substr($article['imglist'],0,$pos);
            }else{
                $cover = $article['imglist'];
            }
            
            $i = TU.'/t.png';
            $addparam = $article['addparam'] ? $article['addparam'] : 0;
            $tag = "<img src='{$i}'>{$addparam}";
            $href = INDEX.'/index.php?mod=organ&id='.$article['id'];
        }
        
    	$data .= "<li>
    	            <p style='margin-bottom:5px'>
    	                <span>{$state_p}</span>
    	                <span class='fr delid'rel='{$article['id']}'tel='{$tel}' style='cursor:pointer;font-weight:bold;color:#f00;font-size:14px;'>Xóa bỏ</span>
    	            </p>
                    <div class='rel'>
                        <a href='{$href}'><img class='cover' src='{$cover}' /></a>
                        
                        <p class='tag2 abs'>{$tag}</p>
                    </div>
                    <p class='overhid t'>{$title}</p>
                    <p class='ts ts3 ts4'><img src='{$a}' />{$time}<span class='phonehide'><img src='{$b}' class='b' />{$hot}</span><img class='c' src='{$c}' />{$likes}</p>
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
    functions::getavatar($tpl);

    $tpl->assign('tel',$tel);
    $tpl->assign('data',$data);
    $tpl->assign('page',$page);
    //if(isphone()){
    //    $tpl->compile(basename(__FILE__,'.php'),'wap'); 
    //}else{
        $tpl->compile(basename(__FILE__,'.php'),''); 
    //}
?>