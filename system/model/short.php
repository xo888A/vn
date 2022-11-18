<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $id = CW('get/id');
    $rand = CW('get/rand');
    if($rand){
        $vid = $db->query('post','',"shortvidurl!='' ",' RAND() ',1);
        
        $data['id']  = $vid[0]['id'];
        $data['shortvidurl']  = $vid[0]['shortvidurl'];
        $data['title'] = $vid[0]['title'];
        $commentNum = $db->get_count('comments',"postid='{$vid[0]['id']}' and ishow=1");
        $username = functions::autocode(CW('cookie/__username'),'-');
        $tel = "";
        if($username) $tel = $username; 
        $data['tel'] = $tel;
        $data['commentNum'] = functions::hot($commentNum);
        $data['like'] = functions::hot($vid[0]['likes']);
        
        $islikes = array();
        if($tel !="")
          $islikes = $db->query('likes','',"tel='{$tel}' and postid='{$vid[0]['id']}'",'',1);
        
        if($islikes){
            $data['likeimg'] = IMG.'/_icon_like.webp';
            $data['likenum'] = "color:red";
        }else{
            $data['likeimg'] = IMG.'/icon_like.webp';
            $data['likenum'] = "";
        }
        // print_r($data);die;
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
        die;
        // print_r($data);die;
        
        // echo $vid[0]['shortvidurl'];
    }else{
        $tpl =  new Society();
        $vid = $db->query('post','id',"shortvidurl!='' ",' RAND() ',3);
        $tpl->assign('id1',$vid[0]['id']);
        $tpl->assign('id2',$vid[1]['id']);
        $tpl->assign('id3',$vid[2]['id']);
        $tpl->compile(basename(__FILE__,'.php'),'wap');
    }
    
?>