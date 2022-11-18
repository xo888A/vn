<?php 
if(!defined('CW')){exit('Access Denied');}
$db = functions::db();
$seo = $db->query('seo','','id=1');
if(!$seo){
    $db->exec('seo','i',array(
        'seo1'=>'Trang chủ',
        'seo2'=>'Đề xuất quản trị viên',
        'seo3'=>'Bản chủ đề',
        'seo4'=>'Danh sách chủ đề',
        'seo5'=>'Danh sách Vlogger',
        'seo6'=>'Tất cả video',
        'seo7'=>'Cộng đồng',
        'seo8'=>'Bảng xếp hạng',
        'seo9'=>'Tải ứng dụng',
        'seo10'=>'Tiêu đề nội dung video',
        'seo11'=>'Tiêu đề Nội dung Cộng đồng',
        'seo12'=>'Tiêu đề nội dung trang đơn',
        'seo13'=>'Vlogger nổi bật',
        'seo14'=>'Lưu trữ chủ đề',
        'seo15'=>'Chọn cách chơi',
        'seo16'=>'Trung tâm thành viên',
        'seo17'=>'Cài đặt tài khoản',
    ));
    $seo = $db->query('seo','','id=1');
}

$tpl =  new Society();
$tpl->assign('seo1',$seo[0]['seo1']);
$tpl->assign('seo2',$seo[0]['seo2']);
$tpl->assign('seo3',$seo[0]['seo3']);
$tpl->assign('seo4',$seo[0]['seo4']);
$tpl->assign('seo5',$seo[0]['seo5']);
$tpl->assign('seo6',$seo[0]['seo6']);
$tpl->assign('seo7',$seo[0]['seo7']);
$tpl->assign('seo8',$seo[0]['seo8']);
$tpl->assign('seo9',$seo[0]['seo9']);
$tpl->assign('seo10',$seo[0]['seo10']);
$tpl->assign('seo11',$seo[0]['seo11']);
$tpl->assign('seo12',$seo[0]['seo12']);
$tpl->assign('seo13',$seo[0]['seo13']);
$tpl->assign('seo14',$seo[0]['seo14']);
$tpl->assign('seo15',$seo[0]['seo15']);
$tpl->assign('seo16',$seo[0]['seo16']);
$tpl->assign('seo17',$seo[0]['seo17']);
$tpl->compile('seo','admin'); 
?>