<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();

    $signinsets = $db->query('signinset','',$where,'id asc');
    $data = '';
    foreach ($signinsets as $signinset){
        if($signinset['rewardtype']=='1'){
            $v1 = 'selected';
            $v2 = '';
        }elseif ($signinset['rewardtype']=='2') {
            $v1 = '';
            $v2 = 'selected';
        }

		$data .= "<tr class='search'>
		            <td>第{$signinset['day']}Ngày</td>
            		<td><select name='rewardtype'>
                        <option {$v1} value='1'>Kim cương</option>
                        <option {$v2} value='2'>Hồng bao</option>
                    </select></td>
            		<td><input class='category_input' name='reward' placeholder='Điền vào số nguyên' value='{$signinset['reward']}'> Kim cương/Hồng bao</td>
            		
                    <td><a class='btn btn2' rel='updatesignin' id='{$signinset['id']}' href='javascript:;'><i class='fa fa-edit'></i>Cập nhật</a></td>
                </tr>";
    }

    $tpl =  new Society();
    $tpl->assign('data',$data);
    $tpl->compile('signin','admin'); 
?>