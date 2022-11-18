<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    $look = CW('post/look');
    $greenhorn = CW('post/greenhorn');
    $customer = CW('post/customer');
    $pay = CW('post/pay');
    $withdrawals = CW('post/withdrawals');
    $onlyvip = CW('post/onlyvip');
    $vipcomments = CW('post/vipcomments');
    
    $r1 = CW('post/r1');
    $r2 = CW('post/r2');
    $r3 = CW('post/r3');
    $scaletype = CW('post/scaletype');
    $f1 = CW('post/f1');
    $f2 = CW('post/f2');
    $f3 = CW('post/f3');
    $p1 = CW('post/p1');
    $p2 = CW('post/p2');
    $p3 = CW('post/p3');
    $p4 = CW('post/p4');
    $p5 = CW('post/p5');
    $diamcharge = CW('post/diamcharge');
    if($r1>1 || $r1<0){
    	msg('Lỗi cài đặt tỷ lệ nghịch,điền bằng các số thập phân','Làm mới','javascript:location.reload()','',true);
    }
    if($r2>1 || $r2<0){
    	msg('Lỗi cài đặt tỷ lệ nghịch,điền bằng các số thập phân','Làm mới','javascript:location.reload()','',true);
    }
    if($r3>1 || $r3<0){
    	msg('Lỗi cài đặt tỷ lệ nghịch,điền bằng các số thập phân','Làm mới','javascript:location.reload()','',true);
    }
    if($f1>1 || $f1<0){
    	msg('Lỗi cài đặt tỷ lệ giảm giá,điền bằng các số thập phân','Làm mới','javascript:location.reload()','',true);
    }
    if($f2>1 || $f2<0){
    	msg('Lỗi cài đặt tỷ lệ giảm giá,điền bằng các số thập phân','Làm mới','javascript:location.reload()','',true);
    }
    if($f3>1 || $f3<0){
    	msg('Lỗi cài đặt tỷ lệ giảm giá,điền bằng các số thập phân','Làm mới','javascript:location.reload()','',true);
    }
    if($p2<$p1 || $p3<$p2 || $p4<$p3 || $p5<$p4){
        msg('Tỷ lệ giảm giá của người dùng được đặt không chính xác, vui lòng chú ý đến sự phù hợp của số tiền bắt đầu và số tiền cuối cùng','Làm mới','javascript:location.reload()','',true);
    }
    $inviteday1 = CW('post/inviteday1');
    $inviteday2 = CW('post/inviteday2');
    $inviteday3 = CW('post/inviteday3');
    $inviteday4 = CW('post/inviteday4');
    //file_put_contents(ROOT_URL.'/static/file/ip.data',CW('post/geturl'));
    $inviteuser1 = CW('post/inviteuser1');
    $inviteuser2 = CW('post/inviteuser2');
    $inviteuser3 = CW('post/inviteuser3');
    $inviteuser4 = CW('post/inviteuser4');

    $res = $db->exec('sets','u',array(
        array(
            "look"=>$look,
            "greenhorn"=>$greenhorn,
            "customer"=>$customer,
            "pay"=>$pay,
            "withdrawals"=>$withdrawals,
            "onlyvip"=>$onlyvip,
            "r1"=>$r1,
            "r2"=>$r2,
            "r3"=>$r3,
            "p1"=>$p1,
            "p2"=>$p2,
            "p3"=>$p3,
            "p4"=>$p4,
            "p5"=>$p5,
            "f1"=>$f1,
            "f2"=>$f2,
            "vipcomments"=>$vipcomments,
            "f3"=>$f3,
            "diamcharge"=>$diamcharge,
            "inviteday1"=>$inviteday1,
            "inviteday2"=>$inviteday2,
            "inviteday3"=>$inviteday3,
            "inviteday4"=>$inviteday4,
            "inviteuser1"=>$inviteuser1,
            "inviteuser2"=>$inviteuser2,
            "inviteuser3"=>$inviteuser3,
            "inviteuser4"=>$inviteuser4,
            "scaletype"=>$scaletype,
            'keywordslist'=>CW('post/keywordslist'),
            'tuijianid'=>CW('post/tuijianid'),
            'geturl'=>CW('post/geturl'),
            'ios'=>CW('post/ios'),
            'android'=>CW('post/android'),
            'iosdesc'=>str_replace("\"","'",$_POST['iosdesc']),
            'androiddesc'=>str_replace("\"","'",$_POST['androiddesc']),
            'kefu1'=>CW('post/kefu1'),
            'kefu2'=>CW('post/kefu2'),
            'selectuser'=>CW('post/selectuser'),
            'hl1'=>CW('post/hl1'),
            'hl2'=>CW('post/hl2'),
            'smtp1'=>CW('post/smtp1'),
            'smtp2'=>CW('post/smtp2'),
            'smtp3'=>CW('post/smtp3'),
            'smtp4'=>CW('post/smtp4'),
            'smtp5'=>CW('post/smtp5'),
            'weijinci'=>CW('post/weijinci'),
            'tougao'=>CW('post/tougao'),
            'miaoshu1'=>CW('post/miaoshu1'),
            'miaoshu2'=>CW('post/miaoshu2'),
            'jiaocheng'=>CW('post/jiaocheng'),
        ),array(
            "id"=>1
        )));
   
    //if($res){
    	msg('Cài đặt thành công!','Xác nhận','','success');
    //}else{
    //    msg('Dữ liệu không thay đổi!','Cài lại','javascript:location.reload()','',true);
    //}
?>