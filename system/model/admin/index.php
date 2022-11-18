<?php 

    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    // $keyword = CW('get/keyword');
    // $where = "name like '%{$keyword}%'";
    // $count = $db->get_count('tongji',$where,'id');
    // $pagecount = ceil($count/PAGESIZE);
    // $page = CW('get/page',1);

    // $page = $page<=0 ? 1 : $page;
    // $page = $page>=$pagecount ? $pagecount : $page;
    // $page = ($page-1)<0 ? 0 : ($page-1)*PAGESIZE;
    
    // //
    // $tongjis = $db->query('alltongji','',$where,'ftime desc',"{$page},".PAGESIZE);
    // $data = '';
    // foreach ($tongjis as $tongji){
    //     $shouru = $tongji['shouru'];
    //     $ip = $tongji['ip'];
    //     $ipzhuanhuan = round($shouru/$ip*10000,0);
    //     $regnum = $tongji['regnum'];
    //     $add = intval($tongji['downnumkouliang'])+intval($tongji['downnum']);
    //     $zhuancezhuanhua = round($shouru/$regnum,2);
    //     $time = date('Y-m-d',$tongji['ftime']);
    //     $url = INDEX.'/admin.php?mod=tongji&time='.date('Y-m-d',$tongji['ftime']);
    //     $shouru = $tongji['shouru'];
        
    //     $zhuancezhuanhua = round($shouru/$regnum,2);
    //     $xiazaizhuanhua = round($shouru/$add,2);
    //     if($xiazaizhuanhua.is_nan()){
    //         $xiazaizhuanhua = 0;
    //     }
        
    //     $data .= "<tr>
    //         		<td>{$time}</td>
    //         		<td>{$ip}</td>
    //         		<td>{$ipzhuanhuan}</td>
    //         		<td>{$zhuancezhuanhua}</td>
    //                 <td>{$regnum}/{$tongji['regkouliang']}</td>
    //                 <td>{$add}/{$tongji['downnumkouliang']}</td>
    //                 <td>{$tongji['chongzhi']}</td>
    //                 <td>{$tongji['kouliang']}</td>
    //                 <td>{$tongji['dailishouru']}</td>
    //                 <td>{$tongji['pingtaishouru']}</td>
    //                 <td><a class='btn btn2' href='{$url}'>Kiểm tra chi tiết</a></td>
    //             </tr>";
    // }
    // $allurl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    // if(stripos($allurl ,"&page=")){
    // 	$nallurl = substr($allurl,0,stripos($allurl ,"&page="));
    // }else{
    // 	$nallurl = $allurl;
    // }
    // $pageurl = $nallurl.'&page=';
    // $page = functions::page($count,$pagecount,$pageurl);

    // $tpl =  new Society();
    // $tpl->assign('data',$data);
    // $tpl->assign('page',$page);
    // $tpl->compile('tongjilist','admin');

    if(!defined('CW')){exit('Access Denied');}
    $tpl =  new Society();
    $system = 'Loại hệ thống và số phiên bản: '.php_uname();
    $memory = 'Bộ nhớ tiêu thụ: '.round(memory_get_usage() / 1024 / 1024, 2) . ' MB' . PHP_EOL . '<br />';
    $db = functions::db();
	$admin = $db->query('admin','','id=1','',1);
	$tpl->assign('ip',$admin[0]['ip']);
	$tpl->assign('address',$admin[0]['address']);
    $tpl->assign('memory',$memory);
    $tpl->assign('system',$system);
    $tpl->assign('logtime',date('Y-m-d H:i:s',$admin[0]['logtime']));
    
	$today = strtotime(date("Y-m-d"),time());
	$today24 = $today+60*60*24-1;
	$num1 = $db->get_count("users","logintime>$today and logintime<$today24");$num1 = $num1 ? $num1 : 0;
	
	
	$ytime = strtotime(date("Y-m-d",strtotime("-1 day")));
    $yetime = $ytime+24 * 60 * 60-1;
	$num2 = $db->get_count("users","ftime>$ytime and ftime<$yetime");$num2 = $num2 ? $num2 : 0;
	
	$num3 = $db->get_count("users","id>0");$num3 = $num3 ? $num3 : 0;
	
	
	$ios = $db->get_count("users","systemtype='ios");$ios = $ios ? intval($ios) : 0;
	$android = $db->get_count("users","systemtype='android'");$android = $android ? intval($android) : 0;
	
	$tpl->assign('num1',$num1);
	$tpl->assign('num2',$num2);
	$tpl->assign('num3',$num3);
	$tpl->assign('android',$android);
	$tpl->assign('ios',$ios);
	$tpl->assign('all',$android+$ios);
    $tpl->compile('index','admin'); 
?>