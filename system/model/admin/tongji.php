<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    // $keyword = CW('get/keyword');
    // $where = "name like '%{$keyword}%'";
    $time = CW('get/time');
    $timestart = strtotime($time);
	$timeend = $timestart+60*60*24;
    $where = "(ftime between {$timestart} and {$timeend})";
   
    $count = $db->get_count('tongji',$where,'id');
    $pagecount = ceil($count/PAGESIZE);
    $page = CW('get/page',1);
    
    $page = $page<=0 ? 1 : $page;
    $page = $page>=$pagecount ? $pagecount : $page;
    $page = ($page-1)<0 ? 0 : ($page-1)*PAGESIZE;
    
    
    $tongjis = $db->query('tongji','',$where,'id desc',"{$page},".PAGESIZE);
    $data = '';
    foreach ($tongjis as $tongji){
        $shouru = $tongji['shouru'];
        $ip = $tongji['ip'];
        $ipzhuanhuan = round($shouru/$ip*10000,0);
        $regnum = $tongji['regnum'];
        $add = intval($tongji['downnumkouliang'])+intval($tongji['downnum']);
        $zhuancezhuanhua = round($shouru/$regnum,2);
        $xiazaizhuanhua = round($shouru/$add,2);
        if($xiazaizhuanhua.is_nan()){
            $xiazaizhuanhua = 0;
        }
        $data .= "<tr>
            		<td>{$tongji['card']}</td>
            		<td>{$shouru}</td>
            		<td>{$ip}</td>
            		<td>{$ipzhuanhuan}</td>
            		<td>{$zhuancezhuanhua}</td>
                    <td>{$regnum}/{$tongji['regkouliang']}</td>
                    <td>{$add}/{$tongji['downnumkouliang']}</td>
                    <td>{$tongji['chongzhi']}</td>
                    <td>{$tongji['kouliang']}</td>
                    <td>{$tongji['dailishouru']}</td>
                    <td>{$tongji['pingtaishouru']}</td>
                </tr>";
    }
    $allurl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    if(stripos($allurl ,"&page=")){
    	$nallurl = substr($allurl,0,stripos($allurl ,"&page="));
    }else{
    	$nallurl = $allurl;
    }
    $pageurl = $nallurl.'&page=';
    $page = functions::page($count,$pagecount,$pageurl);

    $tpl =  new Society();
    $tpl->assign('data',$data);
    $tpl->assign('page',$page);
    $tpl->compile(basename(__FILE__,'.php'),'admin');
?>