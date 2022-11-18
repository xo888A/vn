<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $lv0 = CW('post/lv0') ? '0,' : '';
    $lv1 = CW('post/lv1') ? '1,' : '';
    $lv2 = CW('post/lv2') ? '2,' : '';
    $lv3 = CW('post/lv3') ? '3,' : '';
    $lv4 = CW('post/lv4') ? '4,' : '';
    $lv5 = CW('post/lv5') ? '5,' : '';
    $lv6 = CW('post/lv6') ? '6,' : '';
    $level = $lv0.$lv1.$lv2.$lv3.$lv4.$lv5.$lv6;
     $id = CW('post/id');
    if(!$id){
    	msg('ID không chính xác, vui lòng đăng nhập lại','Xác nhận','javascript:location.reload()','error');
    }
    $db = functions::db();
    $position = CW('post/position');
    if($position=='APP视频播放页'){
        $postid = CW('post/postid');
        if(!$postid){
            msg('ID bài đăng video chưa được đặt','Làm mới','','',true);
        }
    }elseif ($position=='APP应用中心') {
        
    }else{
        //msg('Vui lòng chọn lại vị trí quảng cáo!','Làm mới','','',true);
    }
    $tel = CW('post/tel');//ID  bài đăng video
    $postid = CW('post/postid');//ID  bài đăng video
    $remarks = CW('post/remarks');
    if($remarks){
        if(strlen($remarks)>255){
            msg('Ghi chú quảng cáo lên đến 255 ký tự','Làm mới','','',true);
        }
    }
    $imgcover = CW('post/imgcover');
    if(!$imgcover){
        msg('Bìa quảng cáo chưa được tải lên','Làm mới','','',true);
    }
    $endtime = strtotime(CW('post/endtime'));
    
    $select = CW('post/select');
    $field = functions::getfield('sets','vertype','id=1');
    // if($select=='跳出APP到浏览器'){
    //     $content1 = CW('post/content1');
    //     if(!$content1){
    //         msg('请设置外链','Làm mới','','',true);
    //     }
    // }elseif($select=='本APP内打开外链'){
    //     $content2 = CW('post/content2');
    //     if(!$content2){
    //         msg('请设置外链','Làm mới','','',true);
    //     }
    // }elseif($select=='跳到APP内某个帖子'){
    //     $content3 = CW('post/content3');
    //     if(!$content3){
    //         msg('请输入帖子ID','Làm mới','','',true);
    //     }
    // }elseif($select=='跳到APP功能项'){
    //     $content4 = CW('post/content4');
    //     if(!$content4){
    //         msg('请选择功能项','Làm mới','','',true);
    //     }
    // }elseif($select=='跳到APP专题页'){
    //     $content5 = CW('post/content5',5);
    //     if(!$content5){
    //         msg('请设置专题页内容, 支持图片等. 请注意排版','Làm mới','','',true);
    //     }
    //     $content5 = str_replace("\"","'",$content5);
    // }else{
    //     msg('请重新选择广告点击效果!','Làm mới','','',true);
    // }
    if($field){
        $res = $db->exec('adv','u',array(array(
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
        ),array(
            'id'=>$id    
        )));
    }
    if($res){
    	msg('Chỉnh sửa thành công!','Xác nhận','','success');
    }else{
        msg('Dữ liệu không đổi!','Nhập lại','javascript:location.reload()','',true);
    }
?>