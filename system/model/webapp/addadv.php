<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();

    $lv0 = CW('post/lv0') ? '0,' : '0,';
    $lv1 = CW('post/lv1') ? '1,' : '';
    $lv2 = CW('post/lv2') ? '2,' : '';
    $lv3 = CW('post/lv3') ? '3,' : '';
    $lv4 = CW('post/lv4') ? '4,' : '';
    $lv5 = CW('post/lv5') ? '5,' : '';
    $lv6 = CW('post/lv6') ? '6,' : '';
    $level = $lv0.$lv1.$lv2.$lv3.$lv4.$lv5.$lv6;
    $position = CW('post/position');
    if($position=='APP帖子详情页'){
        $postid = CW('post/postid');
        if(!$postid){
            msg('ID bài đăng video chưa được cài đặt','Làm mới','','',true);
        }
    }
    // elseif ($position=='Trung tâm ứng dụng APP') {
        
    // }else{
    //     msg('Vui lòng chọn lại vị trí quảng cáo!','Làm mới','','',true);
    // }
    $tel = CW('post/tel');//ID bài đăng video
    $postid = CW('post/postid');//ID bài đăng video
    $remarks = CW('post/remarks');
    if($position=='APP会员-会员' && !$remarks){
        msg('Thành viên VIP - thành viên, quảng cáo ở đây phải điền chú thích quảng cáo','Làm mới','','',true);
    }
    if($position=='APP会员-钻石' && !$remarks){
        msg('Thành viên VIP-kim cương, quảng cáo ở đây phải điền chú thích quảng cáo','Làm mới','','',true);
    }
    if($remarks){
        if(strlen($remarks)>255){
            msg('Ghi chú quảng cáo lên đến 255 ký tự','Làm mới','','',true);
        }
    }
    $imgcover = CW('post/imgcover');
    if(!$imgcover){
        //msg('Ảnh bìa quảng cáo chưa được tải lên','Làm mới','','',true);
    }
    //$endtime = strtotime(CW('post/endtime'));
    
    
    // $select = CW('post/select');
    
    // if($select=='Mở cửa sổ mới'){
    //     $content1 = $content1.'_@@';
    // }elseif($select=='Mở cửa sổ hiện tại'){
    //     $content1 = $content1.'_@';
    // }
    $db = functions::db();
    $res = $db->exec('adv','i',array(
        'tel'=>$tel,
        'position'=>$position,
        'postid'=>$postid,
        'cover'=>$imgcover,
        'remarks'=>$remarks,
        'endtime'=>$endtime,
        'click'=>$select,
        'content1'=>CW('post/content1'),
        'content2'=>$content2,
        'content3'=>$content3,
        'content4'=>$content4,
        'content5'=>$content5,
        'level'=>$level
    ));
    if($res){
        msg('Thêm thành công!','Làm mới','javascript:location.reload()','success',true);
    }else{
        msg('Thêm thất bại!','Cài lại','javascript:location.reload()','error',true);
    } 
?>