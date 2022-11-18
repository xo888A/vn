<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $username = CW('post/username',3);
    $password = CW('post/password',3);
    $password2 = CW('post/password2',3);
    //$code = CW('post/code');
   
    if(!$username || !$password || !$password2){
        msg('Tất cả nội dung phải được điền vào! ',' Điền lại','javascript:location.reload()','',true);
    }
    $cookie_code = functions::autocode(CW('cookie/code'),'-');
	if($code!=$cookie_code){
		//msg('Mã xác minh sai!','Nhập lại','javascript:location.reload()','',true);
	}
	$db = functions::db();
	$admin = $db->query('admin','','id=1','',1);
	if(($username==$admin[0]['username'] && $password==$admin[0]['password'] && $password2==$admin[0]['password2'])){
    	functions::set_cookie('__secret',functions::autocode('islogin'));
    	$ip = functions::get_real_ip();
    	$address = functions::get_user_city($ip);
    	$address = $address ? $address : 'Chưa xác định';
    	$db->exec('admin','u',array(array(
    		'logtime'=>time(),
    		'ip'=>'',
    		'address'=>''
    	),array(
    		'id'=>1
    	)));
        msg('Kiểm chứng thành công!','Xác nhận',INDEX.'/admin.php?mod=index','success');
    }else{
        msg('Kiểm chứng thất bại!','Thử lại','javascript:location.reload()','error',true);
    }
    // echo functions::autocode('islogin');
    // die();
?>