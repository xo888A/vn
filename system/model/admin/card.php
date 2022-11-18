<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $keyword = CW('get/keyword');
    
    if($keyword){
        $where = "user='{$keyword}'";
    }else{
        $where = "";
    }
    
    
   
 
    $cards = $db->query('card','',$where,'ftime desc'); 

    foreach ($cards as $card){
        if($card['cardtype']=='1'){
            $cardtype = 'Tiền vàng';
            $res = $card['cardnum'].'Tiền vàng';
        }elseif ($card['cardtype']=='2') {
            $cardtype = 'Thành viên';
            $res = 'Thành viên'.$card['cardnum'].'Ngày';
        }
        if(!$card['ishow']){
            $state = "<span class='alw'>Chưa sử dụng</span>";
        }else{
            $state = "<span class='aly'>Đã sử dụng</span>";
        }
        if($card['ftime']){
            $ftime = date('Y.m.d H:i:s',$card['ftime']);
        }else{
            $ftime = '';
        }
        
		$data .= "<tr>
            		<td><p>{$card['card']}</p></td>
            		<td><p>{$cardtype}</p></td>
            		<td><p>{$res}</p></td>
            		<td><p>{$card['user']}</p></td>
            		<td><p>{$ftime}</p></td>
            		<td><p>{$state}</p></td>
            		<td><a class='btn btn3 del' rel='card' id='{$card['id']}' href='javascript:;'><i class='fa fa-trash'></i>Xóa</a></td>
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
    $tpl->assign('keyword',$keyword);
    
    $tpl->compile('card','admin');
?>