<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $cards = $db->query('card','','','id desc');
    foreach ($cards as $card){
        if($card['cardtype']=='1'){
            $cardtype = 'Kim cương';
            $res = $card['cardnum'].'Kim cương';
        }elseif ($card['cardtype']=='2') {
            $cardtype = 'Thành viên';
            $res = 'Thành viên'.$card['cardnum'].'Ngày';
        }
        if(!$card['ishow']){
            $state = "<span class='alw'>Chưa sử dụng</span>";
        }else{
            $state = "<span class='aly'>Đã sử dụng</span>";
        }
		$data .= "<tr>
            		<td><p>{$card['card']}</p></td>
            		<td><p>{$cardtype}</p></td>
            		<td><p>{$res}</p></td>
            		<td><p>{$state}</p></td>
            		<td><a class='btn btn3 del' rel='card' id='{$card['id']}' href='javascript:;'><i class='fa fa-trash'></i>Xóa</a></td>
                </tr>";
    }
    $tpl =  new Society();
    echo 'success';
?>