
<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $where = " and find_in_set(0,level)";
    if(STARTADV){
        $level = getlevel();
        if($level){
            //$where = " and level like '%{$level}%'";
            $where = " and find_in_set($level,level)";
        }
    }
    $advs = $db->query('adv','',"position='专题归档'".$where);
    $data = '';
    foreach($advs as $adv){
        $url = $adv['content1'];
        $url1 = substr($url,0,strrpos($url,'_'));
        $at = substr($url,strrpos($url,'_')+1);
        if($at=='@@'){
            $add = "target='_blank'";
        }else{
            $add = '';
        }
        $data .= "<li>
                <a href='{$url1}' $add>
                <img src='{$adv['cover']}' />
                <p class='overhid'>{$adv['remarks']}</p>
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