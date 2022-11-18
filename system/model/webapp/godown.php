<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    $id = CW('post/id');
    $id = functions::autocode($id,'-');
    $tid = substr($id,0,strrpos($id,'-'));
    $user = $tel = substr($id,strripos($id,'-')+1);
    $post = $db->query('post','',"id='{$id}'",'',1);
    $tu = TU;
    if(!$user){
        // $html = "<div class='rel h100'>
        //                 <img class='w100 h100' src='{$post[0]['videocover']}' />
        //                 <div class='mask'></div>
        //                 <div class='abs'>
        //                     <img style='width:50px' src='{$tu}/nodata.png' />
        //                     <p class='tit'>Vui lòng đăng nhập trước!</p>
        //                 </div>
        //             </div>";
        echo json_encode(array(
            'err'=>'Vui lòng đăng nhập trước',
            //'do'=>'download'
        ));return;
    }
    $curuser = $db->query('users','',"tel='{$tel}'",'',1);
    $isbuy = $db->query('sellvideo','',"tel='{$user}' and vidid='{$tid}'");
    $isvip = $curuser[0]['viptime']>time() ? 'isvip' : 'notvip';
    $diam = $post[0]['diamond'];
 	$vipdiam = $post[0]['vipdiam'];
    if($isbuy || (!$vipdiam && $isvip=='isvip') || (!$vipdiam && !$diam)){
 	    
 	}else{
 	    echo json_encode(array(
            'err'=>'Không đáp ứng quyền hạn, vui lòng mua và tải xuống!',
            //'do'=>'download'
        ));return;
 	}
    
    
    
    $set = $db->query('sets','jiaocheng,downlv1,downlv2,downlv3,downlv4,downlv5,downlv6','id=1','',1);
    $jiaocheng = $set[0]['jiaocheng'];
    $lv1 = $set[0]['downlv1'];
 	$lv2 = $set[0]['downlv2'];
 	$lv3 = $set[0]['downlv3'];
 	$lv4 = $set[0]['downlv4'];
 	$lv5 = $set[0]['downlv5'];
 	$lv6 = $set[0]['downlv6'];
    $user = $db->query('users','',"tel='{$user}'",'',1);
    $downloadtime = $user[0]['downloadtime'];
    $downloadnum = $user[0]['downloadnum'];
    if(date('Ymd',time())!=date('Ymd',$downloadtime)){
 	    $db->exec('users','u',array(array(
 	        'downloadnum'=>0,
 	        'downloadtime'=>time()
 	    ),array(
 	        'tel'=>$tel
 	    )));
 	    $downloadnum = $db->query('users','downloadnum',"tel='{$tel}'",'',1);
 	    $downloadnum = $downloadnum[0]['downloadnum'];
 	}
 	$user_level = $user[0]['mylevel'];
 	$user_level = intval($user_level);
 	$stop = false;
 	if($user_level==1){
 	    if($downloadnum>=$lv1){
 	        $stop = true;
 	    }
 	    $downloadnums = $lv1;
 	}elseif($user_level==2){
 	    if($downloadnum>=$lv2){
 	        $stop = true;
 	    }$downloadnums = $lv2;
 	}elseif($user_level==3){
 	    if($downloadnum>=$lv3){
 	        $stop = true;
 	    }$downloadnums = $lv3;
 	}elseif($user_level==4){
 	    if($downloadnum>$lv4){
 	        $stop = true;
 	    }$downloadnums = $lv4;
 	}elseif($user_level==5){
 	    if($downloadnum>=$lv5){
 	        $stop = true;
 	    }$downloadnums = $lv5;
 	}elseif($user_level==6){
 	    if($downloadnum>=$lv6){
 	        $stop = true;
 	    }$downloadnums = $lv6;
 	}
 	$index = INDEX;
 	$filesize = $post[0]['filesize'] ? $post[0]['filesize'] : '0M';
 	//Cấp bậc của tôi$user_level
 	//Cấp dữ liệu$post[0]['downlevel']
 	$exist = false;
    if(strstr($post[0]['downlevel'],"{$user_level}")){
        $exist = true;
    }
    $foreachs = explode(',',rtrim($post[0]['downlevel'],','));
    foreach ($foreachs as $foreach){
        //if($foreach=='0'){continue;}
        $addlevel .= 'LV'.$foreach.',';
    }
 	if($stop){
 	    $html = "<div class='fix downloadzip'>
                <div class='w rel'>
                    <img src='{$tu}/close.png' class='closezip abs' />
                    <div class='padding'>
                        <p class='t'>Thông tin tải xuống tệp đính kèm</p>
                        <img src='{$tu}/zip.png' />
                        <div class='r abs'>
                            <p>Kích thước tập tin:<span>{$filesize}</span></p>
                            <p class='m'>Định dạng tệp:<span>Nén tệp ZIP</span></p>
                            <p class='color'><a href='{$jiaocheng}' target='_blank'>Hướng dẫn tải xuống và giải nén điện thoại di động?</a></p>
                        </div>
                        <p style='margin-top:10px'>Hạn ngạch tải xuống ngày hôm nay đã được sử dụng hết, vui lòng quay lại sau 24 giờ</p>
                        <p style='margin-top:5px'>Cấp độ của tôi<img class='dlelvl' src='{$tu}/{$user[0]['mylevel']}.png'> Hạn ngạch hàng ngày: {$downloadnums}lượt</p>
                        <a href='{$index}/index.php?mod=vip' class='d' >Nâng cấp lên cấp VIP</a>
                        <a href='javascript:;' class='c openinstros' >Hướng dẫn tải xuống hạn ngạch</a>
                    </div>
                </div>
            </div>";
 	}elseif(!$stop && !$exist){
 	    $html = "<div class='fix downloadzip'>
                <div class='w rel'>
                    <img src='{$tu}/close.png' class='closezip abs' />
                    <div class='padding'>
                        <p class='t'>Thông tin tải xuống tệp đính kèm</p>
                        <img src='{$tu}/zip.png' />
                        <div class='r abs'>
                            <p>Kích thước tập tin:<span>{$filesize}</span></p>
                            <p class='m'>Định dạng tệp:<span>Nén tệp ZIP</span></p>
                            <p class='color'><a href='{$jiaocheng}' target='_blank'>Hướng dẫn tải xuống và giải nén điện thoại di động?</a></p>
                        </div>
                        <p style='margin-top:10px;line-height: 25px;'>Xin lỗi, do hạn chế về bản quyền, video này giới hạn <span style='color:#FF7AA5'>{$addlevel}</span>Tải xuống cấp thành viên</p>
                        <p style='margin-top:5px'>Cấp độ của tôi<img class='dlelvl' src='{$tu}/{$user[0]['mylevel']}.png'></p>
                        <a href='{$index}/index.php?mod=vip' class='d' >Nâng cấp lên cấp VIP</a>
                    </div>
                </div>
            </div>";
 	}else{
 	    $downloadnum++;
 	    $downloadurl = $post[0]['downloadurl'];
 	    $db->exec('users','u',"downloadnum='{$downloadnum}',tel='{$tel}'");
 	    $html = "<div class='fix downloadzip'>
                <div class='w rel'>
                    <img src='{$tu}/close.png' class='closezip abs' />
                    <div class='padding'>
                        <p class='t'>Thông tin tải xuống tệp đính kèm</p>
                        <img src='{$tu}/zip.png' />
                        <div class='r abs'>
                            <p>Kích thước tập tin:<span>{$filesize}</span></p>
                            <p class='m'>Định dạng tệp:<span>Nén tệp ZIP</span></p>
                            <p class='color'><a href='{$jiaocheng}' target='_blank'>Hướng dẫn tải xuống và giải nén điện thoại di động?</a></p>
                        </div>
                        <a href='{$downloadurl}' class='d' target='_blank'>Bắt đầu tải</a>
                        <a href='javascript:;' class='c'>Sao chép liên kết tải xuống</a>
                    </div>
                </div>
            </div>
            <script>
            var clipboard = new Clipboard('.downloadzip .c', {
                text: function() {
                    return '{$downloadurl}';
                }
            });
            clipboard.on('success',
            function(e) {
                $('.downloadzip').hide();
                alert('Đã sao chép thành công liên kết tải xuống');
            });
            </script>
            ";
 	}

 	echo json_encode(array(
 	    'do'=>'download',
 	    'data'=>$html
 	));
?> 