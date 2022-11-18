<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    $tja = CW('post/tja');
    $tjb = CW('post/tjb');
    $tjc = CW('post/tjc');
    $tjd = CW('post/tjd');
    $tje = CW('post/tje');
    $tjf = CW('post/tjf');
    $tjg = CW('post/tjg');
    $tjh = CW('post/tjh');
    // if($p2<$p1 || $p3<$p2 || $p4<$p3 || $p5<$p4){
    //     msg('Lỗi cài đặt tỷ lệ chiết khấu của người dùng, Hãy chú ý đến sự phù hợp của số tiền bắt đầu và số tiền cuối cùng','Làm mới','javascript:location.reload()','',true);
    // }
    

    $res = $db->exec('sets','u',array(
        array(
            "tja"=>$tja,
            "tjb"=>$tjb,
            "tjc"=>$tjc,
            "tjd"=>$tjd,
            "tje"=>$tje,
            "tjf"=>$tjf,
            "tjg"=>$tjg,
            "tjh"=>$tjh,
            "tuijianlist"=>CW('post/tuijianlist'),
            'vlist'=>CW('post/vlist'),
            'ilist'=>CW('post/ilist'),
            'add1'=>CW('post/add1'),
            'add2'=>CW('post/add2'),
            'add3'=>CW('post/add3'),
        ),array(
            "id"=>1
        )));
   
    //if($res){
    	msg('Cài đặt thành công!','Xác nhận','','success');
    //}else{
    //    msg('Dữ liệu không đổi!','Nhập lại','javascript:location.reload()','',true);
    //}
?>