<?php 
    if(!defined('CW')){exit('Access Denied');}
    $id = CW('get/id',1);
    $db = functions::db();
    $tu = IMG;
    $post = $db->query('post','',"id='{$id}'",'',1);
    $user = $db->query('users','',"tel='{$post[0]['userid']}'",'',1);
    $user_level = $user[0]['mylevel'];
    $tpl =  new Society();
    $tpl->assign('usertel',functions::autocode($user[0]['tel']));
    $tpl->assign('videocover',$post[0]['videocover']);
    $tpl->assign('videourl',$post[0]['videourl']);
    // $tpl->assign('videourl',str_replace("\\","",$post[0]['videourl']));
    // print_r( $post );die;
    // echo str_replace("\\","",$post[0]['videourl']);die;
    $js = "<script> 
 	    var dplayer = document.getElementById('dplayer');
        if(dplayer){
            new DPlayer({
                container: dplayer,
                video: {
                    url: '{$post[0]['videourl']}',
                    pic:'{$post[0]['videocover']}',
                    type: 'auto',
                }
            });
        }</script>";
    $tpl->assign('title',$post[0]['title']);
    
    $adv1 = functions::get_contents(INDEX.'/webajax.php?mod=getadv&position=视频详情页-右侧2广告&pos=right&num=2&level='.getlevel());
    $tpl->assign('adv1',$adv1);
    $tpl->assign('like',functions::hot($post[0]['likes']));
    $pinglun = $db->get_count('comments',"postid='{$id}' and ishow=1");
    $tpl->assign('pinglun',functions::hot($pinglun));
    $tpl->assign('time',date('Y-m-d',$post[0]['ftime']));
    $tpl->assign('look',functions::hot($post[0]['hot']));
    $tpl->assign('user_avatar',$user[0]['avatar']);
    $tpl->assign('user_nickname',$user[0]['nickname'] ? $user[0]['nickname'] : 'Người dùng chưa xác định');
    //$tpl->assign('user_descs',$user[0]['descs'] ? $user[0]['descs'] : 'Dữ liệu người dùng không tồn tại');
    //$count = $db->get_count('follow',"tel2='{$user[0]['tel']}'");
    $count = functions::hot($user[0]['flonum']);
    $tpl->assign('user_follow',$count);
    $tpl->assign('user_sex',$user[0]['sex']=='Nam' ? 'nan' : 'nv');
    $topices = explode(',',$post[0]['topic']);
    $topic = '';$index = INDEX;//
    foreach ($topices as $topice){
        $topicname = $db->query('topic','name',"id='{$topice}'");
        $topic .= "<li><a href='{$index}/index.php?mod=topiclist&id={$topice}'>#{$topicname[0]['name']}</a></li>";
    }
    $tpl->assign('topic',$topic."<li class='alltopiclist'><a href='{$index}/index.php?mod=alltopiclist'>Toàn bộ+</a></li>");
    functions::follow($post[0]['userid'],$tpl);
    $data2 = functions::get_contents(INDEX.'/webajax.php?mod=gettiezi&order=rand&isright=1&num=15&type=video&orderby=hot');
    $tpl->assign('data2',$data2);
    $filesize = $post[0]['filesize'] ? $post[0]['filesize'] : '0M';
    $addparam = $post[0]['addparam'] ? $post[0]['addparam'] : '00:00';

    $tpl->assign('filesize',$filesize);
    $tpl->assign('addparam',$addparam);

    $diam = $post[0]['diamond'];
    $vipdiam = $post[0]['vipdiam'];
    //Xác định xem có nên mua hay không, bỏ qua nếu mua
    $us = functions::autocode(CW('cookie/__username'),'-');
    $isbuy = $db->query('sellvideo','',"tel='{$us}' and vidid='{$id}'");
    $curuser = $db->query('users','',"tel='{$us}'",'',1);
    $isvip = $curuser[0]['viptime']>time() ? 'isvip' : 'notvip';
    $index = INDEX;
    if($isvip=='isvip' && $vipdiam){
        $jinbi = $vipdiam;$append='';
    }else{
        $jinbi = $diam;
        $append = "<a href='{$index}/index.php?mod=vip' class='a'>Mở xem VIP</a>";
    }
//  	if($vipdiam){
//         //Phải mua
//     }elseif (!$vipdiam && $diam) {
//         //Miễn phí VIP
//     }else{
//         //Miễn phí
//     }
    $loginuser = functions::autocode(CW('cookie/__username'),'-');
 	$look =  $looktime = $curr = $db->query('users','look,looktime,mylevel',"tel='{$loginuser}'",'',1);
 	$part = "<div class='maincontent'>
                    <div class='rel h100'>
                        <img class='w100 h100' src='{$post[0]['videocover']}' />
                        <div class='mask'></div>
                        <div class='abs'>
                            <p class='tit'>Video này có tổng cộng<span>{$addparam}</span>phút, tệp nén<span>{$filesize}</span>Xem / tải phim gốc trực tuyến ngay sau khi mua</p>
                            <p class='btn'>{$append}<a class='b buyvideo' href='javascript:;' rel='{$id}'>Mỗi lần mua{$jinbi}Số tiền</a></p>
                        </div>
                    </div>
                </div>";
                
    $download = $post[0]['downloadurl'] ? $post[0]['downloadurl'] : 'http://www.baidu.com';
    $target = "target='_blank'";
    $_a = "<a href='javascript:;' class='c'>Sao chép liên kết tải về</a>";
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
    
    //////////////////
    if($stop){
        $js = '';
    }
    
    
 	if($isbuy){
 	    functions::history($id);
 	    $look++;
 	    $db->exec('users','u',"look='{$look}',tel='{$loginuser}'");
 	    $html = "<div class='maincontent'><div id='dplayer'></div></div>";
 	    $tpl->assign('js',$js);
 	}elseif(!$vipdiam && $isvip=='isvip'){
 	    functions::history($id);
 	    $look++;$tpl->assign('js',$js);
 	    $db->exec('users','u',"look='{$look}',tel='{$loginuser}'");
 	  //  if(isphone()){
 	  //      $html = "<div class='maincontent' id='maincontent'>
 	  //          <video style='height:220px' controls poster='{$post[0]['videocover']}'>
    //             <source src='{$post[0]['videourl']}' type='video/mp4'>
    //             <source type='application/vnd.apple.mpegurl' src='{$post[0]['videourl']}'>
    //         </video>
 	  //      </div>";
 	  //  }else{
 	        $html = "<div class='maincontent' ><div id='dplayer'></div></div>";
 	    //}
 	    
 	}elseif(!$vipdiam && !$diam){
 	    $tpl->assign('js',$js);
 	    functions::history($id);$look++;$db->exec('users','u',"look='{$look}',tel='{$loginuser}'");
 	    $html = "<div class='maincontent'><div id='dplayer'></div></div>";
 	}else{
 	    
 	    $html = $part;
 	    $target = '';
 	    $download = "javascript:alert('Vui lòng mở VIP');";
 	    $_a = "<a href='javascript:alert(\"Vui lòng mở VIP\")' class='cc'>Sao chép liên kết tải về</a>";
 	}
 	if($curuser){
 	    $tpl->assign('reg',"style='display:none'");
 	}else{
 	    $tpl->assign('reg',"style='display:block'");
 	}
 	/////////////////////////2022-03-01加
 	$tu = TU;
 	if($stop){
 	    $html = "<div class='maincontent'>
                    <div class='rel h100'>
                        <img class='w100 h100' src='{$post[0]['videocover']}' />
                        <div class='mask'></div>
                        <div class='abs'>
                            <p class='tit'>Xin lỗi, giới hạn xem ngày hôm nay đã được sử dụng hết, vui lòng quay lại sau 24 giờ!</p>
                        <p class='tit' style='margin-top:10px'>Đẳng cấp của tôi<img class='lookimg' src='{$tu}/{$curr[0]['mylevel']}.png' /> Giới hạn xem mỗi ngày: {$looknum}video</p>
                            <p class='btn'><a href='{$index}/index.php?mod=vip' class='a'>Thăng cấp VIP</a><a class='b openinstro' href='javascript:;' rel='{$id}'>Thuyết minh giới hạn xem hình</a></p>
                        </div>
                    </div>
                </div>";
 	}
 	
 	$tpl->assign('maincontent',$html);
 	$tpl->assign('a',$_a);
 	$tpl->assign('target',$target);
 	$tpl->assign('downloadurl',$download);
 	
 	
 	
 	
 	$comments = $db->query('comments','',"postid='{$id}'  and ishow=1",'ftime desc');
    $cms = '';
    if($comments){
    foreach ($comments as $comment){
        
        $comments2 = $db->query('comment2','',"commentid='{$comment['id']}'  and ishow=1");
        if($comments2){
            //$addcomment = '';
            foreach ($comments2 as $comment2){
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
        //$addlevel1 = functions::isadmin($comuser[0]['nickname'],$addlevel1);
        if(functions::isadmin($comuser[0]['tel'])){
            $addlevel2 = "<img class='addlevel2' src='{$tu}/admin1.png'>";
            $addlevel1 = "<img class='addlevel1' src='{$tu}/admin2.png'>";
        }

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
        $tu = TU;
        $cms = "<div class='center'><img class='nodata ' src='{$tu}/nodata.png'><p class='center nd'>Chưa có bình luận~</p></div>";
    }
    //var_dump($cms);return;
    $tpl->assign('cms',$cms);
 	$tpl->assign('id',$id);
 	
 	$tu = TU;
    $isliked = $db->query('likes','',"tel='{$us}' and postid='{$id}'");
 	$nlike = functions::hot($post[0]['likes']);
 	
 	
 	
 	$islogin = functions::autocode(CW('cookie/__username'),'-');
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
 	$tpl->assign('rel',functions::autocode($id.'-'.$islogin));
 	
 	
 	
 	$table = "<tr>
 	            <td>LV1Giới hạn xem mỗi ngày</td>
 	            <td><span>{$lv1}</span>Video lẻ / Bộ</td>
 	         </tr>
 	         <tr>
 	            <td>LV2Giới hạn xem mỗi ngày</td>
 	            <td><span>{$lv2}</span>Video lẻ / Bộ</td>
 	         </tr>
 	         <tr>
 	            <td>LV3Giới hạn xem mỗi ngày</td>
 	            <td><span>{$lv3}</span>Video lẻ / Bộ</td>
 	         </tr>
 	         <tr>
 	            <td>LV4Giới hạn xem mỗi ngày</td>
 	            <td><span>{$lv4}</span>Video lẻ / Bộ</td>
 	         </tr>
 	         <tr>
 	            <td>LV5Giới hạn xem mỗi ngày</td>
 	            <td><span>{$lv5}</span>Video lẻ / Bộ</td>
 	         </tr>
 	         <tr>
 	            <td>LV6Giới hạn xem mỗi ngày</td>
 	            <td><span>{$lv6}</span>Video lẻ / Bộ</td>
 	         </tr>";
 	         $table2 = "<tr>
 	            <td>LV1Giới hạn xem mỗi ngày</td>
 	            <td><span>{$set[0]['downlv1']}</span>Video lẻ / Bộ</td>
 	         </tr>
 	         <tr>
 	            <td>LV2Giới hạn xem mỗi ngày</td>
 	            <td><span>{$set[0]['downlv2']}</span>Video lẻ / Bộ</td>
 	         </tr>
 	         <tr>
 	            <td>LV3Giới hạn xem mỗi ngày</td>
 	            <td><span>{$set[0]['downlv3']}</span>Video lẻ / Bộ</td>
 	         </tr>
 	         <tr>
 	            <td>LV4Giới hạn xem mỗi ngày</td>
 	            <td><span>{$set[0]['downlv4']}</span>Video lẻ / Bộ</td>
 	         </tr>
 	         <tr>
 	            <td>LV5Giới hạn xem mỗi ngày</td>
 	            <td><span>{$set[0]['downlv5']}</span>Video lẻ / Bộ</td>
 	         </tr>
 	         <tr>
 	            <td>LV6Giới hạn xem mỗi ngày</td>
 	            <td><span>{$set[0]['downlv6']}</span>Video lẻ / Bộ</td>
 	         </tr>";
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
 	$tpl->assign('table',$table);
 	$tpl->assign('table2',$table2);
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




            $where = " and find_in_set(0,level)";
            if(STARTADV){
                $level = getlevel();
                if($level){
                    //$where = " and level like '%{$level}%'";
                    $where1 = " and find_in_set($level,level)";
                }
            }    
            $adv4 = '';
            $advs = $db->query('adv','',"position='视频播放页-文字广告'".$where1,'');
            foreach ($advs as $adv){
                //////////////////////////
                    $url = $adv['content1'];
                    $url1 = substr($url,0,strrpos($url,'_'));
                    $at = substr($url,strrpos($url,'_')+1);
                    if($at=='@@'){
                        $add = "target='_blank'";
                    }else{
                        $add = '';
                    }
                    //////////////////////////
                 $adv4 .= "<li>
                                    <a href='{$url1}' $add>{$adv['remarks']}</a>
                                </li>";
            }
                //$adv4 = functions::get_contents(INDEX.'/webajax.php?mod=getphoneadv&position=Trang Phát Video - Quảng cáo Văn bản&iswenzi=true&level='.getlevel());
                $tpl->assign('adv4',$adv4);
                $data1 = functions::get_contents(INDEX.'/webajax.php?mod=getphonetiezi&order=rand&num=10&type=video');
                $tpl->assign('data',$data1);
//                $tpl->assign('data',functions::data('video','h5'));
                $tpl->assign('user_descs',$user[0]['descs'] ? functions::cuts($user[0]['descs'],10) : 'Dữ liệu người dùng không tồn tại');




            if($isliked){
                $tpl->assign('liked',"<img src='../image/m1_.png' class='liked2' rel='{$id}' /><p class='liked_num2'>{$nlike}</p>");
            }else{
                $tpl->assign('liked',"<img src='../image/y1.png' class='liked2' rel='{$id}' /><p class='liked_num2'>{$nlike}</p>");
            }
 	    
 	    
 	    
 	    $tpl->compile(basename(__FILE__,'.php'),'wap'); 
 	}else{
 	    
 	    if($isliked){
              $tpl->assign('liked',"<img src='{$tu}/m1_.png' class='liked2' rel='{$id}' /><span class='liked_num2'>{$nlike}</span>");
            }else{
                $tpl->assign('liked',"<img src='{$tu}/vv1.png' class='liked2' rel='{$id}' /><span class='liked_num2'>{$nlike}</span>");
            }


            $data1 = functions::get_contents(INDEX.'/webajax.php?mod=gettiezi&order=rand&num=8&type=video&orderby=hot');
            $tpl->assign('data',$data1);
//            $tpl->assign('data',functions::data('video','pc'));
            $tpl->assign('user_descs',$user[0]['descs'] ? functions::cuts($user[0]['descs'],20) : 'Dữ liệu người dùng không tồn tại');
 	    $tpl->compile(basename(__FILE__,'.php'),'');     
 	}
    
?>