<?php 
    if(!defined('CW')){exit('Access Denied');}
    $adv1 = functions::get_contents(INDEX.'/webajax.php?mod=getadv&position=微社区详情页-右侧2广告&pos=right&num=2&level='.getlevel());
    $id = CW('get/id',1);
    $db = functions::db();
    $post = $db->query('post','',"id='{$id}'",'',1);
    $user = $db->query('users','',"tel='{$post[0]['userid']}'",'',1);
    $user_level = $user[0]['mylevel'];
    $tpl =  new Society();
    $tpl->assign('usertel',functions::autocode($user[0]['tel']));
    $tpl->assign('adv1',$adv1);
    $tpl->assign('organcover',$post[0]['organcover']);
    
    $tpl->assign('title',$post[0]['title']);
    
    $tpl->assign('imgcontent',$post[0]['imgcontent']);
    
    $tpl->assign('like',functions::hot($post[0]['likes']));
    $pinglun = $db->get_count('comments',"postid='{$id}' and ishow=1");
    $tpl->assign('pinglun',functions::hot($pinglun));
    $tpl->assign('time',date('Y-m-d',$post[0]['ftime']));
    $tpl->assign('look',functions::hot($post[0]['hot']));
    $tpl->assign('user_avatar',$user[0]['avatar']);
    $tpl->assign('user_nickname',$user[0]['nickname'] ? $user[0]['nickname'] : 'Người dùng chưa xác định');
    
    //$count = $db->get_count('follow',"tel2='{$user[0]['tel']}'");
	//$count = functions::hot($count);
	$count = functions::hot($user[0]['flonum']);
	$tpl->assign('user_follow',$count);
	$tpl->assign('user_sex',$user[0]['sex']=='Nam' ? 'nan' : 'nv');
 	$topices = explode(',',$post[0]['topic']);
 	$topic = '';$index = INDEX;
 	foreach ($topices as $topice){
 	    $topicname = $db->query('topic','name',"id='{$topice}'");
 	    if(!$topicname){continue;}
 	    $topic .= "<li><a href='{$index}/index.php?mod=topiclist&id={$topice}'>#{$topicname[0]['name']}</a></li>";
 	}
 	$tpl->assign('topic',$topic."<li class='alltopiclist'><a href='{$index}/index.php?mod=alltopiclist'>Toàn bộ+</a></li>");
    $data2 = functions::get_contents(INDEX.'/webajax.php?mod=gettiezi&order=rand&isright=1&num=15&type=organ&orderby=hot');
    $tpl->assign('data2',$data2);
    functions::follow($post[0]['userid'],$tpl);
    $diam = $post[0]['diamond'];
 	$vipdiam = $post[0]['vipdiam'];
 	//Xác định xem có nên mua hay không, bỏ qua nếu mua
 	$us = functions::autocode(CW('cookie/__username'),'-');
 	$isbuy = $db->query('sellvideo','',"tel='{$us}' and vidid='{$id}'");
 	$curuser = $db->query('users','',"tel='{$us}'",'',1);
 	$isvip = $curuser[0]['viptime']>time() ? 'isvip' : 'notvip';
 	if($isvip=='isvip' && $vipdiam){
 	    $jinbi = $vipdiam;$append='';
 	}else{
 	    $jinbi = $diam;
 	    $append = "<a href='{$index}/index.php?mod=vip' class='a'>Mở xem VIP</a>";
 	}
//  	if($vipdiam){
//         //Nên mua
//     }elseif (!$vipdiam && $diam) {
//         //VIP miễn phí
//     }else{
//         //miễn phí
//     }
    $stop = false;
    $loginuser = functions::autocode(CW('cookie/__username'),'-');
 	$look =  $looktime = $curr =  $db->query('users','look,looktime,mylevel',"tel='{$loginuser}'",'',1);
    $set = $db->query('sets','lv1,lv2,lv3,lv4,lv5,lv6,downlv1,downlv2,downlv3,downlv4,downlv5,downlv6','id=1','',1);
 	$lv1 = $set[0]['lv1'];
 	$lv2 = $set[0]['lv2'];
 	$lv3 = $set[0]['lv3'];
 	$lv4 = $set[0]['lv4'];
 	$lv5 = $set[0]['lv5'];
 	$lv6 = $set[0]['lv6'];
 	
 	$look = $look[0]['look'];
 	$looktime = $looktime[0]['looktime'];
 	$user_level = $curr[0]['mylevel'];
 	if(date('Ymd',time())!=date('Ymd',$looktime)){
 	    
 	    $db->exec('users','u',array(array(
 	        'look'=>0,
 	        'looktime'=>time()
 	    ),array(
 	        'tel'=>$loginuser
 	    )));
 	    $look = $test = $db->query('users','',"tel='{$loginuser}'",'',1);
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


    $target = "target='_blank'";
    $downloadurl = $post[0]['downloadurl'] ? $post[0]['downloadurl'] : 'http://www.baidu.com';
    $_a = "<a href='javascript:;' class='c'>Sao chép liên kết tải về</a>";
 	if($isbuy){
 	    functions::history($id);
 	    $look++;
 	    $db->exec('users','u',"look='{$look}',tel='{$loginuser}'");
 	    $html = "{$post[0]['imgcontent']}";
 	}elseif(!$vipdiam && $isvip=='isvip'){
 	    functions::history($id);
 	    $look++;
 	    $db->exec('users','u',"look='{$look}',tel='{$loginuser}'");
 	    $html = "{$post[0]['imgcontent']}";
 	}elseif(!$vipdiam && !$diam){
 	    functions::history($id);
 	    $look++;
 	    $db->exec('users','u',"look='{$look}',tel='{$loginuser}'");
 	    $html = "{$post[0]['imgcontent']}";
 	}else{
 	    $target = '';
 	    $downloadurl = "javascript:alert('Vui lòng mở VIP');";
 	    $_a = "<a href='javascript:alert(\"Vui lòng mở VIP\")' class='cc'>Sao chép liên kết tải về</a>";
 	    $index = INDEX;
 	    $imglist = explode('|',$post[0]['shikan']);
 	    $filesize = $post[0]['filesize'] ? $post[0]['filesize'] : 'Chưa xác định';
 	    $tpl->assign('filesize',$filesize);
 	    $addparam = $post[0]['addparam'] ? $post[0]['addparam'] : '';
 	    $part = "<div class='buy-wrap'>
                    <div class='abs'>
                        <p class='tit'>Bài đăng này chứa<span>{$addparam}</span>Ảnh, tệp nén<span>{$filesize}</span>Xem / tải phim gốc trực tuyến sau khi mua</p>
                        <p class='btn'>{$append}<a class='b buyvideo' href='javascript:;' rel='{$id}'>Mua 1 lần{$jinbi}Số tiền</a></p>
                    </div>
                </div>";
 	    
 	    $img1 = $imglist[0] ? "<img  src='{$imglist[0]}'>" : '';
 	    $img2 = $imglist[1] ? "<img  src='{$imglist[1]}'>" : '';
 	    $img3 = $imglist[2] ? "<img  src='{$imglist[2]}'>" : '';
 	    $img4 = $imglist[3] ? "<img  src='{$imglist[3]}'>" : '';
 	    $img5 = $imglist[4] ? "<img  src='{$imglist[4]}'>" : '';
 	    $img6 = $imglist[5] ? "<img  src='{$imglist[5]}'>" : '';
 	    $html = "<div class='rel'>
 	                {$img1}{$img2}{$img3}{$img4}{$img5}{$img6}
                    $part
                </div>";
 	}
 	$tpl->assign('target',$target);
 	$tpl->assign('downloadurl',$downloadurl);
 	
 	
 	if($stop){
 	    $imglist = explode('|',$post[0]['shikan']);
 	    $img1 = $imglist[0] ? "<img  src='{$imglist[0]}'>" : '';
 	    $img2 = $imglist[1] ? "<img  src='{$imglist[1]}'>" : '';
 	    $img3 = $imglist[2] ? "<img  src='{$imglist[2]}'>" : '';
 	    $img4 = $imglist[3] ? "<img  src='{$imglist[3]}'>" : '';
 	    $img5 = $imglist[4] ? "<img  src='{$imglist[4]}'>" : '';
 	    $img6 = $imglist[5] ? "<img  src='{$imglist[5]}'>" : '';
 	    $tu = TU;
 	    $html = "<div class='rel'>
 	                {$img1}{$img2}{$img3}{$img4}{$img5}{$img6}
                    <div class='buy-wrap'>
                    <div class='abs'>
                        <p class='tit'>Xin lỗi, giới hạn xem ngày hôm nay đã được sử dụng hết, vui lòng quay lại sau 24 giờ!</p>
                        <p class='tit' style='margin-top:10px'>Đẳng cấp của tôi<img class='lookimg' src='{$tu}/{$curr[0]['mylevel']}.png' /> Giới hạn mỗi ngày: {$looknum}个</p>
                        <p class='btn'><a href='{$index}/index.php?mod=vip' class='a'>Thăng cấp VIP</a><a class='b openinstro' href='javascript:;' rel='{$id}'>Thuyết minh giới hạn xem</a></p>
                    </div>
                    </div>
                </div>";
 	}
 	
 	
    $tpl->assign('imgcontent',$html);
    $tpl->assign('a',$_a);
    if($curuser){
 	    $tpl->assign('reg',"style='display:none'");
 	}else{
 	    $tpl->assign('reg',"style='display:block'");
 	}
    
    $tu = TU;
    
    
    $comments = $db->query('comments','',"postid='{$id}' and ishow=1",'ftime desc');
    $cms = '';
    if($comments){
    foreach ($comments as $comment){
        
        $comments2 = $db->query('comment2','',"commentid='{$comment['id']}'  and ishow=1",'ftime desc');
        if($comments2){
            foreach ($comments2 as $comment2){
                //////////////////////////////
                $addlevel1 = $addlevel2 = $_addlevel1 ='';
                $tel1 = $db->query('users','mylevel,tel,avatar,nickname',"tel='{$comment2['tel1']}'");
                $tel2 = $db->query('users','mylevel,tel,nickname',"tel='{$comment2['tel2']}'");
                if($tel1[0]['mylevel']){
                    $tu = IMG;
                    $addlevel1 = "<img class='addlevel1' src='{$tu}/{$tel1[0]['mylevel']}.png'>";
                    $addlevel2 = "<img class='addlevel3' src='{$tu}/T{$tel1[0]['mylevel']}.png'>";
                }
                if($tel2[0]['mylevel']){
                    $_addlevel1 = "<img class='addlevel1' src='{$tu}/{$tel2[0]['mylevel']}.png'>";
                }
                $avatarurl2 = INDEX.'/index.php?mod=author&id='.functions::autocode($tel1[0]['tel']);
                $time2 = date('Y-m-d H:i:s',$comment2['ftime']);//<img src='../image/T6.png' class='level' />
                $n1 = functions::getnickname($tel1[0]['nickname']);
                $n2 = functions::getnickname($tel2[0]['nickname']);
                
                if(functions::isadmin($tel1[0]['tel'])){
                    $addlevel2 = "<img class='addlevel3' src='{$tu}/admin1.png'>";
                    $addlevel1 = "<img class='addlevel1' src='{$tu}/admin2.png'>";
                }
                if(functions::isadmin($tel2[0]['tel'])){
                    $_addlevel1 = "<img class='addlevel1' src='{$tu}/admin2.png'>";
                   
                }
               ///////////////////////
               
                $avatarurl2 = INDEX.'/index.php?mod=author&id='.functions::autocode($tel1[0]['tel']);
                $time2 = date('Y-m-d H:i:s',$comment2['ftime']);
                $addcomment .= "<li>
                                    <a href='javascript:;' class='ipblock'><img class='fl i2' src='{$tel1[0]['avatar']}' />{$addlevel2}</a>
                                    <div class='fl sh'>
                                        <p class='tt'>{$n1}{$addlevel1}<span>Phản hồi</span>{$n2}{$_addlevel1}<a href='javascript:;' class='fr hfnow' postid='{$id}' tel1='{$us}' tel2='{$comment2['tel1']}'   nickname='{$tel1[0]['nickname']}' commentid='{$comment['id']}'>Phản hồi</a></p>
                                        <p class='dd'>{$comment2['comment']}</p>
                                        <p class='ii'>{$time2}</p>
                                    </div>
                                    <div class='clear'></div>
                                </li>";
            }
            $addcommentsss = "<ul class='overflow h'>".$addcomment.'</ul>';
        }else{
            $addcommentsss = '';
        }
        /////////////////////
        $time = date('Y-m-d H:i:s',$comment['ftime']);
        $comuser = $db->query('users','',"tel='{$comment['tel']}'");
        $avatarurl = INDEX.'/index.php?mod=author&id='.functions::autocode($comment['tel']);
        $nick = $comuser[0]['nickname'] ? $comuser[0]['nickname'] : 'Người dùng chưa xác định';
        $addlevel1 = $addlevel2 = '';
        if($comuser[0]['mylevel']){
            $tu = IMG;
            $addlevel1 = "<img class='addlevel1' src='{$tu}/{$comuser[0]['mylevel']}.png'>";
            $addlevel2 = "<img class='addlevel2' src='{$tu}/T{$comuser[0]['mylevel']}.png'>";
        }
        $n3 = functions::getnickname($comuser[0]['nickname']);
        if(functions::isadmin($comuser[0]['tel'])){
            $addlevel2 = "<img class='addlevel2' src='{$tu}/admin1.png'>";
            $addlevel1 = "<img class='addlevel1' src='{$tu}/admin2.png'>";
        }
        ////////////////////////
        $cms .= "<div class='overflow m'>
                        <a href='javascript:;'  class='ipblock'><img class='fl i1' src='{$comuser[0]['avatar']}' />{$addlevel2}</a>
                        <ul class='fl overflow add'>
                            <li>
                                <p class='t'>{$n3}{$addlevel1}<a href='javascript:;' class='fr hfnow' postid='{$id}' tel1='{$us}' tel2='{$comment['tel']}' nickname='{$nick}' commentid='{$comment['id']}'>Phản hồi</a></p>
                                <p class='d'>{$comment['comments']}</p>
                                <p class='i'>{$time}</p>
                                {$addcommentsss}
                            </li>
                        </ul>
                    </div>";
    }
    }else{
        
        $cms = "<div class='center'><img class='nodata' src='{$tu}/nodata.png'><p class='center nd'>Chưa có bình luận~</p></div>";
    }
    $tpl->assign('cms',$cms);
    $tpl->assign('id',$id);

    $isliked = $db->query('likes','',"tel='{$us}' and postid='{$id}'");
 	$nlike = functions::hot($post[0]['likes']);
 	if($isliked){
 	    $tpl->assign('liked',"<img class='m1 liked' src='{$tu}/m1_.png' rel='{$id}' /><span class='liked_num2'>{$nlike}</span>");
 	}else{
 	    $tpl->assign('liked',"<img class='m1 liked' src='{$tu}/m1.png' rel='{$id}' /><span class='liked_num2'>{$nlike}</span>");
 	}
 	
    $islogin = functions::autocode(CW('cookie/__username'),'-');;
 	if(!$islogin){
 	    $index = INDEX;
 	    $notlogin = "<div class='center' style='margin-top:35px'>Ưu tiên<a href='{$index}/index.php?mod=login' style='background: #FF7AA5;cursor: pointer;color: #fff;font-size: 15px;padding: 3px 10px;border-radius: 4px;margin: 0 2px'>Đăng nhập</a>Tiếp tục bình luận</div>";
 	    $tpl->assign('notlogin',$notlogin);
 	    $tpl->assign('notlogins','false');
 	    
 	}else{
 	    $tpl->assign('notlogins','true');
 	}
 	$newhot = $post[0]['hot']+1;
 	$db->exec('post','u',"hot='{$newhot}',id='{$id}'");
 	
 	$biaoqing = $tietu = '';;
    for($i=0;$i<=49;$i++){
        $url = TU.'/img1/'.$i.'.png';
        $biaoqing.= "<li><img src='{$url}'/></li>";
    }
    for($i=0;$i<=29;$i++){
        $url = TU.'/img2/a'.$i.'.png';
        $tietu.= "<li><img src='{$url}'/></li>";
    }
 	$tpl->assign('biaoqing',$biaoqing);
 	$tpl->assign('tietu',$tietu);
 	
 	
 	
 	$table = "<tr>
 	            <td>LV1Giới hạn xem mỗi ngày</td>
 	            <td><span>{$lv1}</span>Video lẻ / bộ</td>
 	         </tr>
 	         <tr>
 	            <td>LV2Giới hạn xem mỗi ngày</td>
 	            <td><span>{$lv2}</span>Video lẻ / bộ</td>
 	         </tr>
 	         <tr>
 	            <td>LV3Giới hạn xem mỗi ngày</td>
 	            <td><span>{$lv3}</span>Video lẻ / bộ</td>
 	         </tr>
 	         <tr>
 	            <td>LV4Giới hạn xem mỗi ngày</td>
 	            <td><span>{$lv4}</span>Video lẻ / bộ</td>
 	         </tr>
 	         <tr>
 	            <td>LV5Giới hạn xem mỗi ngày</td>
 	            <td><span>{$lv5}</span>Video lẻ / bộ</td>
 	         </tr>
 	         <tr>
 	            <td>LV6Giới hạn xem mỗi ngày</td>
 	            <td><span>{$lv6}</span>Video lẻ / bộ</td>
 	         </tr>";
    $table2 = "<tr>
 	            <td>LV1Giới hạn xem mỗi ngày</td>
 	            <td><span>{$set[0]['downlv1']}</span>Video lẻ / bộ</td>
 	         </tr>
 	         <tr>
 	            <td>LV2Giới hạn xem mỗi ngày</td>
 	            <td><span>{$set[0]['downlv2']}</span>Video lẻ / bộ</td>
 	         </tr>
 	         <tr>
 	            <td>LV3Giới hạn xem mỗi ngày</td>
 	            <td><span>{$set[0]['downlv3']}</span>Video lẻ / bộ</td>
 	         </tr>
 	         <tr>
 	            <td>LV4Giới hạn xem mỗi ngày</td>
 	            <td><span>{$set[0]['downlv4']}</span>Video lẻ / bộ</td>
 	         </tr>
 	         <tr>
 	            <td>LV5Giới hạn xem mỗi ngày</td>
 	            <td><span>{$set[0]['downlv5']}</span>Video lẻ / bộ</td>
 	         </tr>
 	         <tr>
 	            <td>LV6Giới hạn xem mỗi ngày</td>
 	            <td><span>{$set[0]['downlv6']}</span>Video lẻ / bộ</td>
 	         </tr>";
 	$tpl->assign('rel',functions::autocode($id.'-'.$islogin));
 	$tpl->assign('table',$table);$tpl->assign('table2',$table2);
    if(functions::is_mobile()){
        $islogin = functions::autocode(CW('cookie/__username'),'-');
     	if(!$islogin){
     	    $index = INDEX;
     	    $notlogin = "<div class='center'><p>Ưu tiên<a style='margin:0 5px;background: #FF7AA5;color:#fff;padding:2px 5px;border-radius: 4px;' href='{$index}/index.php?mod=login' class='newlogin'>Đăng nhập</a>Tiếp tục bình luận</p></div>";
     	    $tpl->assign('notlogin',$notlogin);
     	    $tpl->assign('notlogins','false');
     	    
     	}else{
     	    $tpl->assign('notlogins','true');
     	}
        $topics = $db->query('sets','tuijianlist','id=1');
    $topics = $topics[0]['tuijianlist'];
    $topics = explode(',',$topics);
    $t = '';
    foreach ($topics as $topic){
        $ts = $db->query('topic','',"name='{$topic}'");
        $url = INDEX.'/index.php?mod=topiclist&id='.$ts[0]['id'];
        $t .= "<li><a href='{$url}'>{$topic}</a></li>";
    }
    $index = INDEX;
    $t .= "<li class='special'><a href='{$index}/index.php?mod=alltopiclist'>Toàn bộ+</a></li>";
    //$tpl->assign('topic',$t);
 	    //$data1 = functions::get_contents(INDEX.'/webajax.php?mod=getphonetiezi&order=rand&num=10&type=organ');
 	    $tpl->assign('data',functions::data('organ','h5'));
 	    $tpl->assign('user_descs',$user[0]['descs'] ? functions::cuts($user[0]['descs'],10) : 'Dữ liệu người dùng không tôn tại');
 	    $tpl->compile(basename(__FILE__,'.php'),'wap'); 
 	}else{
 	    //$data1 = functions::get_contents(INDEX.'/webajax.php?mod=gettiezi&order=rand&num=8&type=organ&orderby=hot');
        $tpl->assign('data',functions::data('organ','pc'));
        $tpl->assign('user_descs',$user[0]['descs'] ? functions::cuts($user[0]['descs'],20) : 'Dữ liệu người dùng không tôn tại');
 	    $tpl->compile(basename(__FILE__,'.php'),'');     
 	}
?>