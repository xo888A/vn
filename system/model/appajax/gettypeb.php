<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $set = $db->query('sets','tjd','id=1');
    $tuijiantopic = explode(',',$set[0]['tjd']);
    $tuijian = '';
    $a = TU.'/a.png';
    $b = TU.'/b.png';
    $c = TU.'/c.png';
   
    foreach ($tuijiantopic as $val){
        $topicid = $db->query('topic','id',"name='{$val}'",'',1);$topicid =  $topicid[0]['id'];
        if(!$topicid){continue;}
        
            $css = 'mt15  wrap';
            $data = functions::get_contents(INDEX.'/webajax.php?mod=gettiezi&topic='.$topicid.'&order=id&num=10&orderby=hot&dev=app');
        
        
        $url = INDEX.'/index.php?mod=topiclist&id='.$topicid;
        $tuijian .= "<section class='public {$css}'><p class='tit'>{$val}<span class='fr mores'><a  onclick=\"opentopic('{$val}')\" href='javascript:;'>Thêm nữa<img src='../image/right.png' /></a></span></p><ul class='overflow width1'>{$data}</ul></section>";
        $tuijian=$tuijian."<p class='line'></p>";
    }
  
   echo json_encode(array(
        'data'=>$tuijian,
        'state'=>1
    ));
    
?>