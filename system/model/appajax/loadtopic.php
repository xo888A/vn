<?php 
    if(!defined('CW')){exit('Access Denied');}
    $page = intval(abs(CW('get/page',1)));
    $db = functions::db();
    $where = "";
    $count = $db->get_count('topic',$where,'id'); 
    $pagecount = ceil($count/APPSIZE);
    $page = $page<1 ? 0 : ($page-1)*APPSIZE;
    $articles = $db->query('topic','',$where,'id desc',"{$page},".APPSIZE);
    $data = '';
    foreach($articles as $val){
      $num = $db->get_count('post',"instr(topic,'{$val['id']}')");
      $data .="<li>
                <p class='default'><img src='{$val['cover']}' /></p>
                <div>
                    <p>#{$val['name']}#</p>
                    <p>{$num}Nội dung</p>
                    <p class='hideline'>{$val['desces']}</p>
                </div>
                <a tapmode class='bgcolor shadow element_hover' onclick=\"returntopic('{$val['name']}','{$val['id']}')\">Thêm</a>
            </li>";
    }
    if($data){
        echo json_encode(array(
            'data'=>$data,
            'state'=>1
        ));
    }else{
        echo json_encode(array(
            'data'=>'',
            'state'=>1
        ));
    }
?>


