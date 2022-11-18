<?php 
    if(!defined('CW')){exit('Access Denied');}
    $tpl =  new Society();
    $db = functions::db();
    $tel = functions::autocode(CW('cookie/__username'),'-');
    $user = $db->query('users','avatar',"tel='{$tel}'",'',1);
    $tpl->assign('avatar',$user[0]['avatar'] ? $user[0]['avatar'] : TU.'/default.jpg');
    $answers = $db->query('answer','',"wtype='客服问答模块'");
    $_answer = '';
    $tu = TU;
    $sets =$db->query('sets','','id=1','',1);
    $kefu1= $sets[0]['kefu1'];
    $kefu2= $sets[0]['kefu2'];
    $tpl->assign('kefu1',$kefu1);
    $tpl->assign('kefu2',$kefu2);
    if(isphone()){
        $css ='fl';
    }else{
        $css ='fr';
    }
    foreach ($answers as $answer){
        $_answer .= "<li>
                        <p class='tit'><img src='{$tu}/w.png'>{$answer['title']}</p>
                        <p class='desc overflow'><img class='fl' src='{$tu}/d.png'><span class='{$css}'>{$answer['content']}</span></p>
                    </li>";
    }
    $tpl->assign('data',$_answer);
   if(isphone()){
        $tpl->compile(basename(__FILE__,'.php'),'wap'); 
    }else{
        $tpl->compile(basename(__FILE__,'.php'),''); 
    }
?>