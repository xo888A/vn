<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $mod = CW('post/mod');
    $idlist = CW('post/idlist');
    
    $db = functions::db();
    
    $idlist = explode(',',$idlist);
    foreach ($idlist as $id){
        $topiclist = $db->query('post','topic',"id='{$id}'",'',1);
        $array = explode(',',$topiclist[0]['topic']);
        foreach ($array as $val){
            $num = $db->query('topic','num',"id='{$val}'",'',1);
            $num = intval($num[0]['num'])+1;
            $db->exec('topic','u',"num='{$num}',id='{$val}'");
        }
        $res = $db->exec('post','u',array(array(
            'ishow'=>'1',
            'ftime'=>time()
        ),array(
            'id'=>$id
        )));
    }
    if($res){
        
        msg('Thao tác thành công!','Xác nhận','','success');
    }else{
        msg('Dữ liệu không đổi!','Điền lại','javascript:location.reload()','error',true);
    }
   
    
?>