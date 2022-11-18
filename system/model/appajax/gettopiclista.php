<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db =functions::db();
    $name = CW('post/name');
    $topic = $db->query('topic','',"name='{$name}'");
    $id =$topic[0]['id'];
    
    $where = "find_in_set($id,topic) and";
    $where = $where." ishow=1 and shortvidcover=''";
    $count = $db->get_count('post',$where);
    
    
    $tuijians = explode(',',$topic[0]['tuijian']);
    $_tuijian = '';
    foreach ($tuijians as $tuijian){
        if(!$tuijian){
            continue;
        }
        $_id = $db->query('topic','id',"name='{$tuijian}'",'',1);
        $u = INDEX.'/index.php?mod=topiclist&id='.$_id[0]['id'];
        $_tuijian .= "<div class='swiper-slide'><a href='javascript:;' onclick='opentopic(\"{$tuijian}\")'>{$tuijian}</a></div>";
        
    }
    
    
    echo json_encode(array(
        'state'=>1,
        'tuijian'=>$_tuijian,
        'desces'=>functions::cut2($topic[0]['desces'],10),
        'avatar'=>$topic[0]['cover'],
        'beijingtu'=>$topic[0]['beijingtu'] ? $topic[0]['beijingtu'] : '../image/beijingtu.png',
        'num'=>$count,
    ));
?>