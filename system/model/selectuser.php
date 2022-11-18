
<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $selectusers = $db->query('sets','selectuser','id=1','',1);
    $selectusers = explode(',',$selectusers[0]['selectuser']);
    $data =  '';
    foreach($selectusers as $selectuser){
        $user = $db->query('users','',"tel='{$selectuser}'",'',1);
        $url = INDEX.'/index.php?mod=author&id='.functions::autocode($selectuser);
        $data .= "<li>
                <a href='{$url}'>
                    <div class='rel'><img src='{$user[0]['avatar']}'></div>
                    <p class='overhid'>{$user[0]['nickname']}</p>
                </a>
            </li>";
    }
    
    $tpl =  new Society();
    $tpl->assign('data',$data);
    if(functions::is_mobile()){
        $tpl->compile(basename(__FILE__,'.php'),'wap'); 
    }else{
        $tpl->compile(basename(__FILE__,'.php'),''); 
    }
   
    
?>