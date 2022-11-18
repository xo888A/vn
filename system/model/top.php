<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
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
    $t .= "<li class='special'><a href='{$index}/index.php?mod=alltopiclist'>Xem tất cả các danh mục+</a></li>";
    $tpl =  new Society();
    $tpl->assign('topic',$t);
    $name = CW('get/mod');
    if($name=='user' || $name=='look'){
        $tname = 'Trung tâm hội viên';
    }elseif($name=='set'){
        $tname = 'Cài đặt tài khoản';
    }elseif($name=='wallet'){
        $tname = 'Ví của tôi';
    }elseif($name=='vip'){
        $tname = 'Nạp tiền hội viên';
    }elseif($name=='money'){
        $tname = 'Nạp tiền';
    }elseif($name=='card'){
        $tname = 'Đổi mật khẩu thẻ';
    }elseif($name=='concern'){
        $tname = 'Theo dõi của tôi';
    }elseif($name=='albuy'){
        $tname = 'Video đã mua';
    }elseif($name=='customer'){
        $tname = 'Trung tâm chăm sóc khách hàng';
    }elseif($name=='message'){
        $tname = 'Trung tâm thông tin';
    }elseif($name=='shares'){
        $tname = 'Quảng cáo kiếm tiền';
    }elseif($name=='activity'){
        $tname = 'Hoạt động chính thức';
    }elseif($name=='app'){
        $tname = 'APP gợi ý';
    }elseif($name=='msga'){
        $tname = 'Thông tin của tôi';
    }elseif($name=='login'){
        $tname = 'Đăng nhập';
    }elseif($name=='reg'){
        $tname = 'Đăng ký';
    }elseif($name=='findpass'){
        $tname = 'T2im lại mật khẩu';
    }
    $tpl->assign('tname',$tname);
    
    
    
    $curname = functions::autocode(CW('cookie/__username'),'-');
    //$num = $db->get_count('comment2',"tel2='{$curname}' and state=0 and ishow=1");
    $num1 = $db->get_count('comment2',"tel2='{$curname}' and state=0 and ishow=1");
    $num2 = $db->get_count('htmlcomment2',"tel2='{$curname}' and state=0 and ishow=1");
    $num = intval($num1)+intval($num2);
    if(intval($num)>0){
        $sw = "<script>
                $(function(){
                    $('.b11').text({$num1});
                    $('.b22').text({$num2});
                    $('.overflow.message.width1 li:nth-child(3)').attr('class','rel');
                    $('.overflow.message.width1 li:nth-child(3)').append(\"<span class='abs msgnumber'>{$num}</span>\");
                });
            </script>";
    $tpl->assign('sw',$sw);
    }
    
    
    
    
    
    
    
    
    $tpl->compile(basename(__FILE__,'.php'),'wap'); 

    
?>