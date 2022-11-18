<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    $db->query("truncate table diamcard");
    $db->exec('diamcard','i',array(
    	'diamnum'=>500,
    	'give'=>288,
    	'price'=>500,
    	'descs'=>'Tặng 288 viên kim cương',
        'tag'=>'',
    ));
    $db->exec('diamcard','i',array(
    	'diamnum'=>388,
    	'give'=>168,
    	'price'=>388,
    	'descs'=>'Tặng 138 viên kim cương',
        'tag'=>'',
    ));
    $db->exec('diamcard','i',array(
    	'diamnum'=>200,
    	'give'=>50,
    	'price'=>200,
    	'descs'=>'Tặng 50 viên kim cương',
        'tag'=>'Tối cao',
    ));
    $db->exec('diamcard','i',array(
    	'diamnum'=>150,
    	'give'=>35,
    	'price'=>120,
    	'descs'=>'Tặng 35 viên kim cương',
        'tag'=>'Lợi nhuận lớn',
    ));
    $db->exec('diamcard','i',array(
    	'diamnum'=>100,
    	'give'=>30,
    	'price'=>100,
    	'descs'=>'Tặng 30 viên kim cương',
        'tag'=>'',
    ));
    $db->exec('diamcard','i',array(
    	'diamnum'=>80,
    	'give'=>20,
    	'price'=>75,
    	'descs'=>'Tặng 20 viên kim cương',
        'tag'=>'Tiết kiệm',
    ));
    
    $db->exec('diamcard','i',array(
    	'diamnum'=>50,
    	'give'=>10,
    	'price'=>50,
    	'descs'=>'Tặng 10 viên kim cương',
        'tag'=>'Lợi nhuận nhỏ',
    ));
    $db->exec('diamcard','i',array(
    	'diamnum'=>30,
    	'give'=>5,
    	'price'=>28,
    	'descs'=>'Tặng 5 viên kim cương',
        'tag'=>'Thưởng thức',
    ));
    $db->exec('diamcard','i',array(
    	'diamnum'=>15,
    	'give'=>2,
    	'price'=>15,
    	'descs'=>'Tặng 2 viên kim cương',
        'tag'=>'Trải nghiệm nhỏ',
    ));
    
    msg('Khởi tạo hoàn tất!','Làm mới','javascript:location.reload()','success',true);
?>