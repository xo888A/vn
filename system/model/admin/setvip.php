<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();

    $vipcards = $db->query('vipcard','',$where,'id asc');
    $data = '';
    foreach ($vipcards as $vip){
		$data .= "<tr>
		            <td><input class='category_input' name='state' placeholder='Khởi động hoặc đóng' value='{$vip['state']}'></td>
            		<td><input class='category_input' name='stit' placeholder='Khẩu hiệu trên cùng bên trái, tối đa 8 ký tự' value='{$vip['stit']}'></td>
            		<td><input class='category_input' name='btit' placeholder='Tên thẻ thành viên, tối đa 6 ký tự' value='{$vip['btit']}'></td>
            		<td><input class='category_input' name='oldprice' placeholder='Giá gốc' value='{$vip['oldprice']}'></td>
            		<td><input class='category_input' name='nowprice' placeholder='Giá hiện tại' value='{$vip['nowprice']}'></td>
            		<td><input class='category_input' name='ucard' placeholder='Phiếu ưu đãi' value='{$vip['ucard']}'></td>
            		<td><input class='category_input' name='descs' placeholder='Mô tả, tối đa 12 ký tự' value='{$vip['descs']}'></td>
            		<td><input class='category_input' name='days' placeholder='Số ngày VIP' value='{$vip['days']}'></td>
            		<td><input class='category_input' name='adddiam' placeholder='Quà tặng kim cương' value='{$vip['adddiam']}'></td>
            		<td><input class='category_input' name='address1' placeholder='Địa chỉ mua hàng' value='{$vip['address1']}'></td>
            		<td><input class='category_input' name='address2' placeholder='Địa chỉ mua hàng sau khi giảm giá' value='{$vip['address2']}'></td>
                    <td><a class='btn btn2' rel='updatevip' vipcardid='{$vip['id']}' href='javascript:;'><i class='fa fa-edit'></i>Cập nhật</a></td>
                </tr>";
    }
    

    $pageurl = INDEX.'/admin.php?mod=setvip&page=';
    $page = functions::page($count,$pagecount,$pageurl);

    $tpl =  new Society();
    $tpl->assign('data',$data);
    $tpl->assign('page',$page);
    $tpl->compile('setvip','admin'); 
?>