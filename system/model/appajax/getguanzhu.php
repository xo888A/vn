
<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $user = CW('get/tel');
    $where = "tel1='{$user}'";
    $page = intval(abs(CW('get/page',1)));
    $count = $db->get_count('follow',$where,'id'); 
    $pagecount = ceil($count/PAGESIZE);
    
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
        $userurl = INDEX."/index.php?mod=author&id=".$article['tel2'];
    	$nickname = $tel2['nickname'] ? $tel2['nickname'] : 'Người dùng chưa xác định';
    	$avatar = $tel2['avatar'] ? $tel2['avatar'] : TU.'/default.jpg';
    	$sex = $tel2['sex']=='Nam' ? 'nan' : 'nv';
    	
    	$isfollow = $db->query('follow','',"tel1='{$user}' and tel2='{$article['tel2']}'",'',1);
    	if($isfollow){
            $guanzhu = "<a href='javascript:;' onclick='guanzhu(\"{$article['tel2']}\")' class='followuser user_{$article['tel2']}' user='{$article['tel2']}'  style='background:#ccc'>Đã theo dõi</a>";
        }else{
            $guanzhu = "<a href='javascript:;' onclick='cancelguanzhu(\"{$article['tel2']}\")' class='followuser user_{$article['tel2']}' user='{$article['tel2']}'>Theo dõi</a>";
        }
    	
    	$flonum = functions::hot($ui[0]['flonum']);
        $data .= "<li>
                        <a href='javascript:;' onclick='openuserindex(\"{$tel2['tel']}\")'><img src='{$avatar}' /></a>
                        <div class='abs'>
                            <p class='p1'>{$nickname}<img src='{$tu}/{$sex}.png' /></p>
                            <p class='p2'><span class='fs'>{$flonum}</span>Người hâm mộ<strong>|</strong><span>{$zp}</span>Thao tác</p>
                        </div>
                        <p class='guanzhu abs'>{$guanzhu}</p>
                    </li>";
    }
    
    echo json_encode(array(
        'state'=>1,
        'data'=>$data
    ));
?>
