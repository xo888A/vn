<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $questions = $db->query('question','','','id desc');
    foreach ($questions as $question){
		$data .= "<tr>
            		<td><input class='category_input' name='question' placeholder='Câu hỏi' value='{$question['question']}'></td>
            		<td><input class='category_input' name='answer' placeholder='Câu trả lời' value='{$question['answer']}'></td>
                    <td>
                        <a class='btn btn2' rel='updatequestion' qaid='{$question['id']}' href='javascript:;'><i class='fa fa-edit'></i>Cập nhật>
                        <a class='btn btn3 del' rel='question' id='{$question['id']}' href='javascript:;'><i class='fa fa-trash'></i>Xóa</a>
            		</td>
                </tr>";
    }
    $tpl =  new Society();
    $tpl->assign('data',$data);
    $tpl->compile('setcust','admin'); 
?>	