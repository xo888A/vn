<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $topics = $db->query('sets','tuijianlist','id=1');
    $topics = $topics[0]['tuijianlist'];
    $topics = explode(',',$topics);
    $t = '';
    foreach ($topics as $topic){
        $ts = $db->query('topic','',"name='{$topic}'");
        $url = INDEX.'/index.php?mod=topiclist&id='.$ts[0]['id'];
        $t .= "<li><a href='{$url}'>{$topic}</a></li>";
    }
    $index = INDEX;
    $t .= "<li class='special'><a href='{$index}/index.php?mod=alltopiclist'>Kiểm tra toàn bộ phân loại+</a></li>";

    $username = functions::autocode(CW('cookie/__username'),'-');
    $exist = $db->query('users','',"tel='{$username}'",'',1);
    $tpl =  new Society();
    $u = INDEX.'/index.php?mod=user';$tu = TU;
    
    $curname = functions::autocode(CW('cookie/__username'),'-');
    $num1 = $db->get_count('comment2',"tel2='{$curname}' and state=0 and ishow=1");$num1 = $num1 ? $num1 : '';
    $num2 = $db->get_count('htmlcomment2',"tel2='{$curname}' and state=0 and ishow=1");$num2 = $num2 ? $num2 : '';
    $num = intval($num1)+intval($num2);
    if($num>0){
        $nddd = "<i class='newaddcir'>{$num}</i>";
    }
    
    if($exist){
        $nickname = $exist[0]['nickname'] ? functions::cutstr($exist[0]['nickname'],4) : 'Người dùng chưa xác định';
        $html = "<p class='usrmg fr'><a href='{$u}' class='rel'>{$nddd}<img src='{$exist[0]['avatar']}' /></a><span>{$nickname}</span><a class='mbtn2 logout' href='javascript:;'>Đăng xuất</a>";
        $ttt = "<a href='{$u}'><img class='avatar' src='{$exist[0]['avatar']}' class='u' /></a>";
    }else{
        $index = INDEX;
        $html = "<a class='mbtn1' href='{$index}/index.php?mod=login'>Đăng nhập</a><a class='mbtn2' href='{$index}/index.php?mod=reg'>Đăng ký</a>";
        
        $ttt = "<a href='{$index}/index.php?mod=login'><img class='avatar'  src='{$tu}/default.jpg' class='u' /></a>";
    }
    $tpl->assign('usermsg',$html);
    $tpl->assign('ttt',$ttt);
    $tpl->assign('topic',$t);
    $t = CW('get/mod');
    $a = $b = $c = $d = $e = $f = $g = $h = $i = '';

    if($t=='index' || !$t){
        $a = 'selected';
    }elseif($t=='recommend'){
        $c = 'selected';
    }elseif($t=='type'){
        $d = 'selected';
    }elseif($t=='userlist'){
        $e = 'selected';
    }elseif($t=='videolist'){
        $f = 'selected';
    }elseif($t=='organlist'){
        $g = 'selected';
    }elseif($t=='rank'){
        $h = 'selected';
    }elseif($t=='download'){
        $i = 'selected';
    }
    
    $tpl->assign('a',$a);
    $tpl->assign('c',$c);
    $tpl->assign('d',$d);
    $tpl->assign('e',$e);
    $tpl->assign('f',$f);
    $tpl->assign('g',$g);
    $tpl->assign('h',$h);
    $tpl->assign('i',$i);
    
    
    
    
    

    
    if($num>0){
        $sw = "<script>
                $(function(){
                    $('.b11').text({$num1});
                    $('.b22').text({$num2});
                    $('.wrap2 .flr.fl ul.overflow.message.width1 li:nth-child(3)').attr('class','rel');
                    $('.wrap2 .flr.fl ul.overflow.message.width1 li:nth-child(3)').append(\"<span class='abs msgnumber'>{$num}</span>\");
                    $('.wrap2 .fl.fls .fun  li:nth-child(10)').addClass('rel');
                    $('.wrap2 .fl.fls .fun  li:nth-child(10)').append(\"<p class='addnumber'>{$num}</p>\")
                });
            </script>";
    $tpl->assign('sw',$sw);
    }
    
    
    
    
    
    
    if(functions::is_mobile()){
        $_tel = functions::autocode(CW('cookie/__username'),'-');
        $user = $db->query('users','avatar',"tel='{$_tel}'",'',1);
        $tpl->assign('avatar',$user[0]['avatar'] ? $user[0]['avatar'] : TU.'/default.jpg');
        $tpl->compile(basename(__FILE__,'.php'),'wap'); 
    }else{
        $tpl->compile(basename(__FILE__,'.php'),''); 
    }
    
?>