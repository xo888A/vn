<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    $db->query("truncate table signinset");
    $db->exec('signinset','i',array(
    	'rewardtype'=>1,
    	'reward'=>3,
    	'day'=>1
    ));
    $db->exec('signinset','i',array(
    	'rewardtype'=>2,
    	'reward'=>1,
    	'day'=>2
    ));
    $db->exec('signinset','i',array(
    	'rewardtype'=>2,
    	'reward'=>2,
    	'day'=>3
    ));
    $db->exec('signinset','i',array(
    	'rewardtype'=>1,
    	'reward'=>5,
    	'day'=>4
    ));
    $db->exec('signinset','i',array(
    	'rewardtype'=>2,
    	'reward'=>3,
    	'day'=>5
    ));
    $db->exec('signinset','i',array(
    	'rewardtype'=>2,
    	'reward'=>3,
    	'day'=>6
    ));
    $db->exec('signinset','i',array(
    	'rewardtype'=>1,
    	'reward'=>7,
    	'day'=>7
    ));
    msg('Khởi tạo hoàn tất!','Làm mới','javascript:location.reload()','success',true);
?>