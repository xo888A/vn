<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $id = CW('post/id');
    $focum = CW('post/focum',2);
    if($focum){
        $curuser = $db->query('htmlcomment2','',"id='{$id}'",'',1);$curuser = $curuser[0];
        $postid =$db->query('htmlcomments','postid',"id='{$curuser['commentid']}'");
        $post = $db->query('html','name',"id='{$postid[0]['postid']}'");
        $user = $db->query('users','',"tel='{$curuser['tel1']}'",'',1);
        $postid = $postid[0]['postid'];
        if($curuser['state']=='0'){
            $db->exec('htmlcomment2','u',"state=1,id='{$id}'");
        }
        $_kuang = IMG.'/T'.$user[0]['mylevel'].'.png';
        $_biaoshi = IMG.'/'.$user[0]['mylevel'].'.png';
        if(functions::isadmin($user[0]['tel'])){
            $_kuang = IMG.'/admin1.png';
            $_biaoshi = IMG.'/admin2.png';
        }
        if($user[0]['viptime']<time()){
            $_kuang = INDEX."/image/k.png";//框
            $_biaoshi = INDEX."/image/k.png";//框
        }
        $_time = date('Y.m.d H:i:s',$curuser['ftime']);
        $_avatar =$user[0]['avatar'];
        $_nickname = functions::getnickname($user[0]['nickname']);
        $_comment = $curuser['comment'];
   
        $_title = $post[0]['name'];
        $tel2 = $curuser['tel1'];
        $commentid = $curuser['commentid'];
        //$tpl->assign('_href',INDEX.'/index.php?mod=html&id='.$postid);
        $onclick = "opendanye(\"{$postid[0]['postid']}\")";
        $fabiao = "<a style='color:#fff' href='javascript:;' onclick='_fabiao2(\"$postid\",\"$tel2\",\"$commentid\")' class='fr hf cb ' postid='{}'  tel2='{}' commentid='{}'>Phản hồi bình luận</a>";
    }else{
        $curuser = $db->query('comment2','',"id='{$id}'",'',1);$curuser = $curuser[0];
        $postid =$db->query('comments','postid',"id='{$curuser['commentid']}'");
        $post = $db->query('post','',"id='{$postid[0]['postid']}'");
        $postid = $postid[0]['postid'];
        if($curuser['state']=='0'){
            $db->exec('comment2','u',"state=1,id='{$id}'");
        }
        $user = $db->query('users','',"tel='{$curuser['tel1']}'",'',1);
        $_avatar = $user[0]['avatar'];
        $_nickname = $user[0]['nickname'];
        $_kuang = IMG.'/T'.$user[0]['mylevel'].'.png';
        $_biaoshi = IMG.'/'.$user[0]['mylevel'].'.png';
        $_time = date('Y.m.d H:i:s',$curuser['ftime']);
        $_comment = $curuser['comment'];
        
        if($user[0]['viptime']<time()){
            $_kuang = INDEX."/image/k.png";//框
            $_biaoshi = INDEX."/image/k.png";//框
        }
        if(functions::isadmin($user[0]['tel'])){
            $_kuang = IMG.'/admin1.png';
            $_biaoshi = IMG.'/admin2.png';
        }
        $_nickname = functions::getnickname($_nickname);
        //$tpl->assign('_comment',$_comment);
        $_title = $post[0]['title'];
        $tel2 = $curuser['tel1'];
        $commentid = $curuser['commentid'];
        if($post[0]['videourl']){
            //$_href = INDEX.'/index.php?mod=video&id='.$postid[0]['postid'];
            $onclick = "openvideo(\"{$postid}\",\"video\")";
        }else if($post[0]['shortvidurl']){
            $onclick = "openvideo(\"{$postid}\",\"shortvideo\")";
        }else{
            //$_href = INDEX.'/index.php?mod=organ&id='.$postid[0]['postid'];
            $onclick = "openvideo(\"{$postid[0]}\",\"organ\")";
        }
        //$tpl->assign('_href',$_href);
        $fabiao = "<a style='color:#fff'  onclick='_fabiao(\"$postid\",\"$tel2\",\"$commentid\")' class='fr hf cb ' postid='{}'  tel2='{}' commentid='{}'>Phản hồi bình luận</a>";
    }
    $biaoqing = $tietu = '';;
    for($i=0;$i<=49;$i++){
        $url = TU.'/img1/'.$i.'.png';
        $biaoqing.= "<li><img src='{$url}'/></li>";
    }
    for($i=0;$i<=29;$i++){
        $url = TU.'/img2/a'.$i.'.png';
        $tietu.= "<li><img src='{$url}'/></li>";
    }
    echo json_encode(array(
        'state'=>1,
        'biaoqing'=>$biaoqing,
        'tietu'=>$tietu,
        '_time'=>$_time,
        '_avatar'=>$_avatar,
        '_nickname'=>$_nickname,
        '_kuang'=>$_kuang,
        '_biaoshi'=>$_biaoshi,
        '_comment'=>$_comment,
        '_title'=>"<i style='font-style:normal;' onclick='{$onclick}'>{$_title}</i>",
        'postid'=>$postid,
        'tel2'=>$tel2,
        'commentid'=>$commentid,
        'idd'=>$id,
        'back'=>$_SERVER['HTTP_REFERER'],
        'fabiao'=>$fabiao
    ));
?>