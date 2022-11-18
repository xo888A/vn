<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    
    $where = "";
    $count = $db->get_count('answer',$where,'id'); 
    $pagecount = ceil($count/PAGESIZE);
    $page = CW('get/page',1);
    
    $page = $page<=0 ? 1 : $page;
    $page = $page>=$pagecount ? $pagecount : $page;
    $page = ($page-1)<0 ? 0 : ($page-1)*PAGESIZE;
    
    
    //"{$page},".PAGESIZE
    $answers = $db->query('answer','',$where,'id desc');
    $data = '';
    foreach ($answers as $answer){
        $url2 = INDEX.'/admin.php?mod=answer&id='.$answer['id'];
		$data .= "<tr>
		            <td>{$answer['wtype']}</td>
            		<td>{$answer['title']}</td>
            		<td><span>{$answer['content']}</span></td>
                    <td>
                        <a class='btn btn2' href='{$url2}'><i class='fa fa-edit'></i>Chỉnh sửa</a>
                    	<a class='btn btn3 del' rel='answer' id='{$answer['id']}' href='javascript:;'><i class='fa fa-trash'></i>Xóa</a>
            		</td>
                </tr>";
    }
    $pageurl = INDEX.'/admin.php?mod=topiclist&page=';
    $page = functions::page($count,$pagecount,$pageurl);

    $tpl =  new Society();
    $tpl->assign('data',$data);
    $tpl->assign('page',$page);
    $tpl->compile('answerlist','admin'); 
?>