
<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $page = intval(abs(CW('get/page',1)));
    $where = "addparam='作者'";
    $counts = $db->get_count('users',$where,'id'); 
    $pagecount = ceil($counts/PAGESIZE);
   
    $page = ($page-1)<0 ? 0 : ($page-1)*PAGESIZE;

    $articles = $db->query('users','',$where,'flonum desc',"{$page},".PAGESIZE);

    $data = '';
    foreach($articles as $article){

    	$nickname = $article['nickname'] ? $article['nickname'] : 'Người dùng chưa xác định';
    	
    	$curdatas = $db->query('post','',"userid='{$article['tel']}' and ishow=1 and shortvidcover='' ",'ftime desc',3);
    	$data1 = $data2 ='';
    	foreach ($curdatas as $curdata){
    	
    	    if($curdata['videocover'] ){
    	        $u = INDEX.'/index.php?mod=video&id='.$curdata['id'];
    	        
    	        $data1 .= "<p  onclick='openvideo(\"{$curdata['id']}\",\"video\")'><img src='{$curdata['videocover']}' /></p>"; 
    	    }elseif($curdata['imglist']){
    	        $u = INDEX.'/index.php?mod=organ&id='.$curdata['id'];
    	        $pos = stripos($curdata['imglist'],'|');
                if($pos){
                    $cover = substr($curdata['imglist'],0,$pos);
                }else{
                    $cover = $curdata['imglist'];
                }
    	        
    	        $data1 .= "<p ><img src='{$cover}' /></p>"; 
    	    }
    	    
    	}

    	$count = $db->get_count('follow',"tel2='{$article['tel']}'");
    	$count = functions::hot($count);
    	$userurl = INDEX."/index.php?mod=author&id=".functions::autocode($article['tel']);
    	
    	$us = CW('get/tel');
    	$isfollow = $db->query('follow','',"tel1='{$us}' and tel2='{$article['tel']}'",'',1);
        if($isfollow){
            $follow = "<a href='javascript:;' onclick='cancelguanzhu(\"{$article['tel']}\")' class='followuser user_{$article['tel']}' user='{$article['tel']}'  style='background:#ccc'>Đã theo dõi</a>";
        }else{
            $follow = "<a href='javascript:;' onclick='guanzhu(\"{$article['tel']}\")' class='followuser user_{$article['tel']}' user='{$article['tel']}'   >Theo dõi</a>";
        }
    	
    	$flonum = functions::hot($article['flonum']);
    	if(!$data1){continue;}
    
    	    $data .= "<li>
                        <div class='rel'>
                            <a href='javascript:;' onclick='openuserindex(\"{$article['tel']}\")'><img class='a' src='{$article['avatar']}'></a>
                            <p class='stit2 abs'><a  onclick='openuserindex(\"{$article['tel']}\")'>{$nickname}</a><span>{$flonum}</span>Người hâm mộ</p>
                            <p class='desc2 abs overhid'>{$article['descs']}</p>
                            <p class='gz2 abs' rel='{$article['id']}'>{$follow}</p>
                            <div class='overflow' onclick='openuserindex(\"{$article['tel']}\")'>
                                {$data1}
                            </div>
                        </div>
                    </li>";
                    
    
    	
    }
    
    echo json_encode(array(
        'state'=>1,
        'data'=>$data
    )); 
    
?>