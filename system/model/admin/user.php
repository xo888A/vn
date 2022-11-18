<?php 
    if(!defined('CW')){exit('Access Denied');}
    
    $db = functions::db();
    
    $tpl =  new Society();
    $id = CW('get/id');
	if($id){
		$user = $db->query('users','',"id='{$id}'",'',1);
		$tpl->assign('nickname',$user[0]['nickname']);
		$tpl->assign('tel',$user[0]['tel']);
		$tpl->assign('man',$user[0]['man']);
		$tpl->assign('kouliang',$user[0]['kouliang']);
		$tpl->assign('days',$user[0]['days']);
		$tpl->assign('miaoshu',$user[0]['miaoshu']);
		$tpl->assign('flonum',$user[0]['flonum']);
		$tpl->assign('addparam',$user[0]['addparam']);
		$tpl->assign('card',$user[0]['card']);
		$tpl->assign('email',$user[0]['email']);
		$tpl->assign('descs',$user[0]['descs']);
		$tpl->assign('password',functions::autocode($user[0]['password'],'-'));
		$tpl->assign('cover',$user[0]['cover']);
		$tpl->assign('avatar',$user[0]['avatar']);
		$tpl->assign('mylevel',$user[0]['mylevel']);
		$tpl->assign('diam',$user[0]['diam']);
		$tpl->assign('money',$user[0]['money']);
		$tpl->assign('viptime',$user[0]['viptime'] ? date('Y-m-d H:i:s',$user[0]['viptime']) : 0);
		$tpl->assign('sex',$user[0]['sex']);
		$tpl->assign('withdrawalspass',$user[0]['withdrawalspass']);
		$tpl->assign('lockpass',$user[0]['lockpass']);
		$tpl->assign('freeze',$user[0]['freeze']=='1' ? 'Đóng băng' : 'Bình thường');
		$button = "<a href='javascript:;' class='btn submit' rel='updateuser'><i class='fa fa fa-edit'></i>Cập nhật</a>";
	}else{
	    $button = "<a href='javascript:;' class='btn submit' rel='adduser'><i class='fa fa-plus-square-o'></i>Không thể thêm</a>";
	}
    $tpl->assign('button',$button);
    $tpl->compile('user','admin'); 
?>