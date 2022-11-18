
<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $user = getuser();
    $where = "tel1='{$user}'";

    $count = $db->get_count('follow',$where,'id'); 
    $pagecount = ceil($count/PAGESIZE);
    $page = CW('get/page',1);
    
    $page = $page<=0 ? 1 : $page;
    $page = $page>=$pagecount ? $pagecount : $page;
    $page = ($page-1)<0 ? 0 : ($page-1)*PAGESIZE;
    $count = functions::hot($count);
    $articles = $db->query('follow','',$where,'id desc',"{$page},".PAGESIZE);
    $data = '';
    $tu = TU;
    foreach($articles as $article){
    	$tel2 = $ui = $db->query('users','',"tel='{$article['tel2']}'");
    	$zp = $db->get_count('post',"userid='{$article['tel2']}'");
    	$zp = functions::hot($zp);
    	$tel2 = $tel2[0];
        $userurl = INDEX."/index.php?mod=author&id=".functions::autocode($article['tel2']);
    	$nickname = $tel2['nickname'] ? $tel2['nickname'] : 'Người dùng chưa xác định';
    	$avatar = $tel2['avatar'] ? $tel2['avatar'] : TU.'/default.jpg';
    	$sex = $tel2['sex']=='Nam' ? 'nan' : 'nv';
    	
    	$isfollow = $db->query('follow','',"tel1='{$user}' and tel2='{$article['tel2']}'",'',1);
    	if($isfollow){
            $guanzhu = "<a href='javascript:;' class='followuser user_{$article['tel2']}' user='{$article['tel2']}'  style='background:#ccc'>Đã theo dõi</a>";
        }else{
            $guanzhu = "<a href='javascript:;' class='followuser user_{$article['tel2']}' user='{$article['tel2']}'>Theo dõi</a>";
        }
    	
    	$flonum = functions::hot($ui[0]['flonum']);
        $data .= "<li>
                        <a href='{$userurl}'><img src='{$avatar}' /></a>
                        <div class='abs'>
                            <p class='p1' style='margin-top: 10px;'>{$nickname}<img src='{$tu}/{$sex}.png' /></p>
                            <!--<p class='p2'><span class='fs'>{$flonum}</span>Người hâm mộ<strong>|</strong><span>{$zp}</span>Tác phẩm</p>-->
                        </div>
                        <p class='guanzhu abs'>{$guanzhu}</p>
                    </li>";
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
    $hml =  "<div class='center'><img class='nodata' src='{$tu}/nodata.png'><p class='center nd'>Chưa có lượt theo dõi~</p></div>";
    $tpl->assign('data',$data ? $data : $hml);

    $tpl->assign('page',$page);
    functions::getavatar($tpl);
    if(isphone()){
        $tpl->compile(basename(__FILE__,'.php'),'wap'); 
    }else{
        $tpl->compile(basename(__FILE__,'.php'),''); 
    }
?>
