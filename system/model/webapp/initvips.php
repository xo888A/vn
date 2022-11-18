<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    $db->query("truncate table vipcard");
    $db->exec('vipcard','i',array(
    	'stit'=>'Trải nghiệm nhỏ',
    	'btit'=>'Thẻ trải nghiệm đồng',
    	'oldprice'=>50,
    	'nowprice'=>30,
    	'descs'=>'Ưu đãi đặc biệt mới / gửi 10 kim cương + 7 ngày VIP',
    	'adddiam'=>10,
    	'days'=>7
    ));
    $db->exec('vipcard','i',array(
    	'stit'=>'Vẫy một lần',
    	'btit'=>'Thẻ kim cương lấp lánh',
    	'oldprice'=>100,
    	'nowprice'=>50,
    	'descs'=>'Tặng 20 kim cương + 14 ngày VIP',
    	'adddiam'=>20,
    	'days'=>14
    ));
    $db->exec('vipcard','i',array(
    	'stit'=>'Tiết kiệm',
    	'btit'=>'Thẻ bạch kim hoàn hảo',
    	'oldprice'=>150,
    	'nowprice'=>100,
    	'descs'=>'Tặng 30 kim cương + 30 ngày VIP',
    	'adddiam'=>30,
    	'days'=>30
    ));
    $db->exec('vipcard','i',array(
    	'stit'=>'Tận hưởng sự cao quý',
    	'btit'=>'Thẻ nghỉ ngơi tối cao',
    	'oldprice'=>230,
    	'nowprice'=>200,
    	'descs'=>'Gửi 50 kim cương + 365 ngày VIP',
    	'adddiam'=>50,
    	'days'=>365
    ));
    $db->exec('vipcard','i',array(
    	'stit'=>'Người bán độc quyền',
    	'btit'=>'Dành riêng cho người bán',
    	'oldprice'=>5000,
    	'nowprice'=>3000,
    	'descs'=>'Quảng cáo dành riêng cho người bán',
    	'adddiam'=>1000,
    	'days'=>1000
    ));
    $db->exec('vipcard','i',array(
    	'stit'=>'24 giờ, dành riêng cho người mới',
    	'btit'=>'Thẻ phúc lợi cho người mới',
    	'oldprice'=>150,
    	'nowprice'=>100,
    	'descs'=>'Thời gian bán có hạn, đừng bỏ lỡ cơ hội',
    	'adddiam'=>0,
    	'days'=>30
    ));
    msg('Khởi tạo hoàn tất! ',' Làm mới','javascript:location.reload()','success',true);
?>