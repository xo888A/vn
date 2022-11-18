<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();

    $vipcards = $db->query('diamcard','',$where,'id desc');
    $data = '';
    foreach ($vipcards as $diam){
		$data .= "<tr>
            		<td><input class='category_input' name='diamnum' placeholder='Kim cương đã mua' value='{$diam['diamnum']}'></td>
            		<td><input class='category_input' name='give' placeholder='Mua quà tặng kim cương, không nhận được quà điền số 0' value='{$diam['give']}'></td>
            		<td><input class='category_input' name='price' placeholder='Giá bán' value='{$diam['price']}'></td>
            		<td><input class='category_input' name='descs' placeholder='Mô tả, tối đa 12 ký tự' value='{$diam['descs']}'></td>
            		<td><input class='category_input' name='tag' placeholder='Nhãn nhỏ ở góc dưới bên phải' value='{$diam['tag']}'></td>
            		<td><input class='category_input' name='address1' placeholder='Địa chỉ mua hàng' value='{$diam['address1']}'></td>
            		<td><a class='btn btn2' rel='updatediam' diamcardid='{$diam['id']}' href='javascript:;'><i class ='fa fa-edit'></i>Cập nhật</a></td>
                </tr>";
    }
    $tpl =  new Society();
    $tpl->assign('data',$data);
    $tpl->compile('setdiam','admin'); 
?>