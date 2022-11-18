<?php 
    if(!defined('CW')){exit('Access Denied');}
    $tel = CW('post/tel',1);
    $type = intval(CW('post/type',1));
    $posttype = CW('post/posttype');
    if(!$tel){
        echo json_encode(array(
            'state'=>1,
            'err'=>'Chỉ có thể thao tác sau khi liên kết với số điện thoại di động'
        ));return;
    }
    $postid = CW('post/postid',1);
    if(!$postid){
        echo json_encode(array(
            'state'=>1,
            'err'=>'ID video không hợp lệ, thao tác thất bại'
        ));return;
    }
    $db = functions::db();
    $exist = $db->query('users','',"tel='{$tel}'",'',1);
    if(!$exist){
        echo json_encode(array(
            'state'=>1,
            'err'=>'Người dùng hiện tại không hợp lệ, thao tác thất bại'
        ));return;
    }
    $islike = $db->query('likes','',"tel='{$tel}' and postid='{$postid}'",'',1);
    if($type==1){
        if($islike){
            echo json_encode(array(
                'state'=>1,
                'err'=>'Vui lòng không lặp lại thao tác'
            ));return;
        }
        
        $res = $db->exec('likes','i',array(
            'tel'=>$tel,
            'postid'=>$postid,
            'posttype'=>$posttype,
            'ftime'=>time()
        ));
        if($res){
            $return_like = getlike($db,$postid)+1;
            $db->exec('post','u',"likes='{$return_like}',id='{$postid}'");
        }
    }else if($type==2){
        if(!$islike){
            echo json_encode(array(
                'state'=>1,
                'err'=>'ID không hợp lệ, vui lòng thao tác lại sau'
            ));return;
        }
        $res = $db->exec('likes','d',"tel='{$tel}' and postid='{$postid}'");
        if($res){
            $return_like = getlike($db,$postid)-1;
            $db->exec('post','u',"likes='{$return_like}',id='{$postid}'");
        }
    }
    
    
    
    if($res){
        echo json_encode(array(
            'state'=>1,
            'data'=>'success',
            'num'=>functions::hot($return_like)
        ));
    }else{
        echo json_encode(array(
            'state'=>2,
            'err'=>'Thao tác thất bại'
        ));
    }
    function getlike($db,$postid){
        $likes = $db->query('post','likes',"id='{$postid}'",'',1);
        $return_like = intval($likes[0]['likes']);
        return intval($return_like);
    }
    

?>