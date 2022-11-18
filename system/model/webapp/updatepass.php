<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    

    //msg('Thanh niên đừng nói võ mồm, nếu bạn đổi mật khẩu thì người khác làm sao thử?','Nhập lại','javascript:location.reload()','',true);
    
    
    $username = CW('post/username');
    $oldpass = CW('post/oldpass');
    $newpass = CW('post/newpass');
    $newpass2 = CW('post/newpass2');
    if(!$username || !$oldpass || !$newpass || !$newpass2){
        msg('Nội dung phải được điền!','Nhập lại','javascript:location.reload()','',true);
    }
    $db = functions::db();
	$admin = $db->query('admin','','id=1','',1);
	if(!$admin){
		$db->exec('admin','i',array(
			'username'=>'admin',
			'password'=>'admin888',
			'password2'=>'888888',
			'ftime'=>time()
		));
	}
// 	if($oldpass!=$admin[0]['password']){
// 		msg('Mật khẩu ban đầu sai!','Nhập lại','javascript:location.reload()','error',true);
// 	}
	
	if(strlen($username)>20 || strlen($username)<1){
    	msg('ký tự tên người dùng  yêu cầu từ 1~20','Nhập lại','javascript:location.reload()','error',true);
    }
	if(strlen($newpass)>20 || strlen($newpass)<1){
    	msg('Yêu cầu ký tự mật khẩu là 1~20','Nhập lại','javascript:location.reload()','error',true);
    }
	
	// if($oldpass!=$newpass){
	// 	msg('Hai mật khẩu không nhất quán!','Nhập lại','javascript:location.reload()','error',true);
	// }
	$res = $db->exec('admin','u',array(array(
		'username'=>$username,
		'password'=>$newpass,
		'password2'=>$newpass2
	),array(
		'id'=>1
	)));
   
    if($res){
        functions::set_cookie('__secret','',time()-3600);
        msg('Thay đổi mật khẩu thành công!','Xác nhận',INDEX.'/login.gsp','success');
    }else{
        msg('Thay đổi mật khẩu thất bại!','Làm mới','javascript:location.reload()','error',true);
    }
?>