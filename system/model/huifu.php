<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $id = CW('get/id',1);
    $focum = CW('get/focum',2);
    $tpl =  new Society();
    functions::getavatar($tpl);
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
            $_kuang = INDEX."/image/k.png";//Khung
            $_biaoshi = INDEX."/image/k.png";//Khung
        }
        $_time = date('Y.m.d H:i:s',$curuser['ftime']);
        $tpl->assign('_avatar',$user[0]['avatar']);
        $tpl->assign('_nickname',functions::getnickname($user[0]['nickname']));
        $tpl->assign('_kuang',$_kuang);
        $tpl->assign('_biaoshi',$_biaoshi);
        $tpl->assign('_ftime',$_time);
        $tpl->assign('_comment',$curuser['comment']);
        $tpl->assign('_title',$post[0]['name']);
        //////////////////////////
        $tpl->assign('postid',$postid);
        $tpl->assign('tel2',$curuser['tel1']);
        $tpl->assign('commentid',$curuser['commentid']);
        $tpl->assign('idd',$id);
        $tpl->assign('back',$_SERVER['HTTP_REFERER']);
        $tpl->assign('_href',INDEX.'/index.php?mod=html&id='.$postid);
        $tpl->assign('fabiao','_fabiao2');
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
        if(functions::isadmin($user[0]['tel'])){
            $_kuang = IMG.'/admin1.png';
            $_biaoshi = IMG.'/admin2.png';
        }
        if($user[0]['viptime']<time()){
            $_kuang = INDEX."/image/k.png";//Khung
            $_biaoshi = INDEX."/image/k.png";//Khung
        }
        $tpl->assign('_avatar',$_avatar);
        $tpl->assign('_nickname',functions::getnickname($_nickname));
        $tpl->assign('_kuang',$_kuang);
        $tpl->assign('_biaoshi',$_biaoshi);
        $tpl->assign('_ftime',$_time);
        $tpl->assign('_comment',$_comment);
        $tpl->assign('_title',$post[0]['title']);
        
        
        $tpl->assign('postid',$postid);
        $tpl->assign('tel2',$curuser['tel1']);
        $tpl->assign('commentid',$curuser['commentid']);
        $tpl->assign('idd',$id);
        $tpl->assign('back',$_SERVER['HTTP_REFERER']);
        if($post[0]['videourl']){
            $_href = INDEX.'/index.php?mod=video&id='.$postid[0]['postid'];
        }else{
            $_href = INDEX.'/index.php?mod=organ&id='.$postid[0]['postid'];
        }
        $tpl->assign('_href',$_href);
        $tpl->assign('fabiao','_fabiao');
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
    $tpl->assign('tietu',$tietu);
    $tpl->assign('biaoqing',$biaoqing);
    
    if(isphone()){
        $tpl->compile(basename(__FILE__,'.php'),'wap'); 
    }else{
        $tpl->compile(basename(__FILE__,'.php'),''); 
    }
?>