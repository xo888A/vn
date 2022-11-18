<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    
    $where = "";
    $count = $db->get_count('topiclist',$where,'id'); 
    $pagecount = ceil($count/PAGESIZE);
    $page = CW('get/page',1);
    
    $page = $page<=0 ? 1 : $page;
    $page = $page>=$pagecount ? $pagecount : $page;
    $page = ($page-1)<0 ? 0 : ($page-1)*PAGESIZE;
    
    

    $topics = $db->query('topic','',$where,'id desc',"{$page},".PAGESIZE);
    $data = '';
    foreach ($topics as $topic){
		$data .= "<tr>
            		<td><input class='category_input' name='name' placeholder='Tên chủ đề' value='{$topic['name']}'></td>
            		<td>
                    	<div class='upload'>
                    		<form class='test' method='post' enctype='multipart/form-data'>
                        		<p>
                        			<a class='rel btn btn3' href='javascript:;'><i class='fa fa-file-photo-o'></i><input name='file' type='file'>Chọn</a>
                        		</p><input placeholder='Vui lòng chọn hình ảnh' class='css' mode='upload' name='cover' value='{$topic['cover']}'>
                        		<a class='btn btn1 upload' href='javascript:;'><i class='fa fa-cloud-upload'></i>Tải lên</a>
                    		</form>
                    	</div>
                    </td>
                    <td>
                    	<a class='btn btn2' rel='updatetopic' topicid='{$topic['id']}' href='javascript:;'><i class='fa fa-edit'></i>Cập nhật</a>
            		</td>
                </tr>";
    }
    

    $pageurl = INDEX.'/admin.php?mod=topiclist&page=';
    $page = functions::page($count,$pagecount,$pageurl);

    $tpl =  new Society();
    $tpl->assign('data',$data);
    $tpl->assign('page',$page);
    $tpl->compile('selected','admin'); 
?>