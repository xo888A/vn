<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $me = $us =  CW('post/tel');
    $id = CW('post/id');
    $tu = TU;
    $pinglunnum = $db->get_count('comments',"postid='{$id}' and ishow=1");
    $post = $db->query('post','',"id='{$id}'");
    $user =  $db->query('users','',"tel='{$post[0]['userid']}'",'',1);
    
    $tel = $user[0]['tel']; 
    $isfollow = $db->query('follow','',"tel1='{$me}' and tel2='{$tel}'",'',1);
    if($isfollow){
        $guanzhu = "<a href='javascript:;' onclick='cancelguanzhu(\"{$tel}\")' class='followuser user_{$tel}' user='{$tel}'  style='background:#ccc'>Đã theo dõi</a>";
    }else{
        $guanzhu = "<a href='javascript:;' onclick='guanzhu(\"{$tel}\")'  class='followuser user_{$tel}' user='{$tel}'>Theo dõi</a>";
    }
    $topices = explode(',',$post[0]['topic']);
 	$topic = '';
 	foreach ($topices as $topice){
 	    $topicname = $db->query('topic','name',"id='{$topice}'");
 	    if(!$topicname){continue;}
 	    $topic .= "<li><a href='javascript:;' onclick='opentopic(\"{$topicname[0]['name']}\")'>#{$topicname[0]['name']}</a></li>";
 	}
 	$topic = $topic."<li class='alltopiclist'><a href='javascript:;' onclick='openwin(\"alltopiclist\")'>Tất cả+</a></li>";
    $biaoqing = $tietu = '';;
    for($i=0;$i<=49;$i++){
        $url = TU.'/img1/'.$i.'.png';
        $biaoqing.= "<li><img src='{$url}'/></li>";
    }
    for($i=0;$i<=29;$i++){
        $url = TU.'/img2/a'.$i.'.png';
        $tietu.= "<li><img src='{$url}'/></li>";
    }
    
    
    
    
    
    $filesize = $post[0]['filesize'] ? $post[0]['filesize'] : '0M';
 	$addparam = $post[0]['addparam'] ? $post[0]['addparam'] : '00:00';
    $diam = $post[0]['diamond'];
 	$vipdiam = $post[0]['vipdiam'];
 	//判断是否购买，如果购买跳过
 	$isbuy = $db->query('sellvideo','',"tel='{$us}' and vidid='{$id}'");
 	$curuser = $db->query('users','',"tel='{$us}'",'',1);
 	$isvip = $curuser[0]['viptime']>time() ? 'isvip' : 'notvip';
 	$index = INDEX;
 	if($isvip=='isvip' && $vipdiam){
 	    $jinbi = $vipdiam;$append='';
 	}else{
 	    $jinbi = $diam;
 	    $append = "<a href='javascript:;' onclick='openwin(\"vip\")' class='a'>Mở tài khoản VIP</a>";
 	}
//  	if($vipdiam){
//         //需要购买
//     }elseif (!$vipdiam && $diam) {
//         //VIP免费
//     }else{
//         //免费
//     }
    $loginuser = $me;
 	$look =  $looktime = $curr = $db->query('users','look,looktime,mylevel',"tel='{$loginuser}'",'',1);
 	$part = "<div class='maincontent'>
                    <div class='rel h100'>
                        <img class='w100 h100' src='{$post[0]['videocover']}' />
                        <div class='mask'></div>
                        <div class='abs'>
                            <p class='tit'>Video này có thời lượng<span>{$addparam}</span> phút,Tệp nén<span>{$filesize}</span>Sau khi mua VIP có thể xem trực tiếp/Tải phim gốc</p>
                            <p class='btn'>{$append}<a class='b buyvideo' href='javascript:;' rel='{$id}'>Mua một lần{$jinbi}Tiền Vàng</a></p>
                        </div>
                    </div>
                </div>";
                
    $download = $post[0]['downloadurl'] ? $post[0]['downloadurl'] : 'http://www.baidu.com';
    $target = "target='_blank'";
    $_a = "<a href='javascript:;' class='c'>Sao chép link tải về</a>";
    $stop = false;
    
    $set = $db->query('sets','lv1,lv2,lv3,lv4,lv5,lv6,downlv1,downlv2,downlv3,downlv4,downlv5,downlv6','id=1','',1);
 	$lv1 = $set[0]['lv1'];
 	$lv2 = $set[0]['lv2'];
 	$lv3 = $set[0]['lv3'];
 	$lv4 = $set[0]['lv4'];
 	$lv5 = $set[0]['lv5'];
 	$lv6 = $set[0]['lv6'];
 	$user_level = $curr[0]['mylevel'];
 	$look = $look[0]['look'];
 	$looktime = $looktime[0]['looktime'];
 	
 	if(date('Ymd',time())!=date('Ymd',$looktime)){
 	    $db->exec('users','u',array(array(
 	        'look'=>0,
 	        'looktime'=>time()
 	    ),array(
 	        'tel'=>$loginuser
 	    )));
 	    $look = $db->query('users','look',"tel='{$loginuser}'",'',1);
 	    $look = $look[0]['look'];
 	}
 	
 	if($user_level==1){
 	    if($look>=$lv1){
 	        $stop = true;
 	    }
 	    $looknum = $lv1;
 	}elseif($user_level==2){
 	    if($look>=$lv2){
 	        $stop = true;
 	    }$looknum = $lv2;
 	}elseif($user_level==3){
 	    if($look>=$lv3){
 	        $stop = true;
 	    }$looknum = $lv3;
 	}elseif($user_level==4){
 	    if($look>$lv4){
 	        $stop = true;
 	    }$looknum = $lv4;
 	}elseif($user_level==5){
 	    if($look>=$lv5){
 	        $stop = true;
 	    }$looknum = $lv5;
 	}elseif($user_level==6){
 	    
 	    if($look>=$lv6){
 	        $stop = true;
 	    }$looknum = $lv6;
 	}

    
 	if($isbuy){
 	    functions::history2($id,$me);
 	    $look++;
 	    $db->exec('users','u',"look='{$look}',tel='{$loginuser}'");
 	    $html = "playershow";
 	}elseif(!$vipdiam && $isvip=='isvip'){
 	    functions::history2($id,$me);
 	    $look++;
 	    $db->exec('users','u',"look='{$look}',tel='{$loginuser}'");
 	    $html = "playershow";
 	}elseif(!$vipdiam && !$diam){
 	    functions::history2($id,$me);$look++;$db->exec('users','u',"look='{$look}',tel='{$loginuser}'");
 	    $html = "playershow";
 	}else{
 	    $html = $part;
 	    $target = '';
 	    $download = "javascript:alert('Vui lòng kích hoạt VIP trước');";
 	    $_a = "<a href='javascript:alert(\"Vui lòng kích hoạt VIP trước\")' class='cc'>Sao chép link tải về</a>";
 	}

 	/////////////////////////2022-03-01加
 	$tu = TU;
 	if($stop){
 	    $html = "<div class='maincontent'>
                    <div class='rel h100'>
                        <img class='w100 h100' src='{$post[0]['videocover']}' />
                        <div class='mask'></div>
                        <div class='abs'>
                            <p class='tit'>Xin lỗi, bạn đã sử dụng hết hạn mức xem hôm nay, vui lòng quay lại sau 24 giờ! </p>
                        <p class='tit' style='margin-top:10px'>Cấp độ của tôi<img class='lookimg' src='{$tu}/{$curr[0]['mylevel']}.png' style='height:25px;vertical-align:middle' /> Hạn ngạch hàng ngày : {$looknum}个</p>
                            <p class='btn'><a href='javascript:;' onclick='openwin(\"vip\")' class='a'>Nâng cấp VIP </a><a class='b openinstroee' href='javascript:;' rel='{$id}'>Mô tả hạn ngạch xem phim</a></p>
                        </div>
                    </div>
                </div>";
 	}
    
    
    
    
    
    
    
    
    
    
    
    $table1 = "<tr>
 	            <td>LV1Số lượt xem hằng ngày</td>
 	            <td><span>{$lv1}</span>Mỗi video/Kho ảnh</td>
 	         </tr>
 	         <tr>
 	            <td>LV2Số lượt xem hằng ngày</td>
 	            <td><span>{$lv2}</span>Mỗi video/Kho ảnh</td>
 	         </tr>
 	         <tr>
 	            <td>LV3Số lượt xem hằng ngày</td>
 	            <td><span>{$lv3}</span>Mỗi video/Kho ảnh</td>
 	         </tr>
 	         <tr>
 	            <td>LV4Số lượt xem hằng ngày</td>
 	            <td><span>{$lv4}</span>Mỗi video/Kho ảnh</td>
 	         </tr>
 	         <tr>
 	            <td>LV5Số lượt xem hằng ngày</td>
 	            <td><span>{$lv5}</span>Mỗi video/Kho ảnh</td>
 	         </tr>
 	         <tr>
 	            <td>LV6Số lượt xem hằng ngày</td>
 	            <td><span>{$lv6}</span>Mỗi video/Kho ảnh</td>
 	         </tr>";
    $table2 = "<tr>
 	            <td>LV1Hạn mức tải về</td>
 	            <td><span>{$set[0]['downlv1']}</span>Mỗi video/Kho ảnh</td>
 	         </tr>
 	         <tr>
 	            <td>LV2Hạn mức tải về</td>
 	            <td><span>{$set[0]['downlv2']}</span>Mỗi video/Kho ảnh</td>
 	         </tr>
 	         <tr>
 	            <td>LV3Hạn mức tải về</td>
 	            <td><span>{$set[0]['downlv3']}</span>Mỗi video/Kho ảnh</td>
 	         </tr>
 	         <tr>
 	            <td>LV4Hạn mức tải về</td>
 	            <td><span>{$set[0]['downlv4']}</span>Mỗi video/Kho ảnh</td>
 	         </tr>
 	         <tr>
 	            <td>LV5Hạn mức tải về</td>
 	            <td><span>{$set[0]['downlv5']}</span>Mỗi video/Kho ảnh</td>
 	         </tr>
 	         <tr>
 	            <td>LV6Hạn mức tải về</td>
 	            <td><span>{$set[0]['downlv6']}</span>Mỗi video/Kho ảnh</td>
 	         </tr>";
 	$level = $db->query('users','mylevel',"tel='{$me}'",'',1);
    $level = $level[0]['mylevel'];
    // <div class="swiper-slide">
    //     <a href="#">这里是视频播放上面的单排滚动文字</a>
    // </div>
    
    
    $where = " and find_in_set(0,level)";
    if(STARTADV){
        if($level){
            //$where = " and level like '%{$level}%'";
            $where = " and find_in_set($level,level)";
        }
    }    
    $adv4 = '';
    $advs = $db->query('appadv','',"positionabs='Trang phát video-Quảng cáo'".$where,'');
    foreach ($advs as $adv){
         $onclick ="openadv(\"{$adv['id']}\")";
         $adv4 .= "<li>
                            <a href='javascript:;' onclick='{$onclick}'>{$adv['remarks']}</a>
                        </li>";
    }
    
 
 	//$adv4 = functions::get_contents(INDEX.'/webajax.php?mod=getphoneadv&dev=app&position=Trang phát video-Quảng cáo&iswenzi=true&level='.$level);
 	$isliked = $db->query('likes','',"tel='{$us}' and postid='{$id}'");
    echo json_encode(array(
        'state'=>1,
        'adv4'=>$adv4,
        'biaoqing'=>$biaoqing,
        'tietu'=>$tietu,
        'topic'=>$topic,
        'title'=>$post[0]['title'],
        'time'=>date('Y-m-d',$post[0]['ftime']),
        'look'=>functions::hot($post[0]['hot']),
        'like'=>functions::hot($post[0]['likes']),
        'pinglunnum'=>functions::hot($pinglunnum),
        'nickname'=>$user[0]['nickname'],
        'avatar'=>$user[0]['avatar'],
        'guanzhu'=>$guanzhu,
        'godown'=>functions::autocode($id.'-'.$me),
        'user_follow'=>functions::hot($user[0]['flonum']),
        'user_descs'=>$user[0]['descs'] ? functions::cut2s($user[0]['descs'],10) : 'Người dùng lười biếng và không viết gì cả~',
        'html'=>$html,
        'table1'=>$table1,
        'table2'=>$table2,
        'videocover'=>$post[0]['videocover'],
        // 'videourl'=>$post[0]['videourl'],
        'videourl'=>str_replace("\\","",$post[0]['videourl']),
        'tel'=>$post[0]['userid'],
        'liked'=>$isliked ? '../image/m1_.png' : '../image/y1.png'
    ),JSON_UNESCAPED_SLASHES);
?>