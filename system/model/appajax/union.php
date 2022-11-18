<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $type = CW('gp/type');
    $level = CW('gp/level');
    $selectuserlist = $typelistlist = $playlistlist = '';
    if($type=='selectuser'){
        $selectusers = $db->query('sets','selectuser','id=1','',1);
        $selectusers = explode(',',$selectusers[0]['selectuser']);
        foreach($selectusers as $selectuser){
            $user = $db->query('users','',"tel='{$selectuser}'",'',1);
            $selectuserlist .= "<li>
                    <a href='javascript:;' onclick='openuserindex(\"{$selectuser}\")'>
                        <div class='rel'><img src='{$user[0]['avatar']}'></div>
                        <p class='overhid'>{$user[0]['nickname']}</p>
                    </a>
                </li>";
        }
    }elseif($type=='typelist'){
        $where = " and find_in_set(0,level)";
        if($level){
            $where = " and find_in_set($level,level)";
        }
        $advs = $db->query('appadv','',"positionabs='Lưu trữ chủ đề'".$where);
        foreach($advs as $adv){
            $typelistlist .= "<li>
                    <a href='javascript:;' onclick='openadv(\"{$adv['id']}\")'>
                    <img src='{$adv['cover']}' />
                    <p class='overhid'>{$adv['remarks']}</p>
                    </a>
                </li>";
        }
    }elseif($type=='playlist'){
        $where = " and find_in_set(0,level)";
        if($level){
            $where = " and find_in_set($level,level)";
        }
        $advs = $db->query('appadv','',"positionabs='Chọn cách chơi'".$where);
        foreach($advs as $adv){
            $playlistlist .= "<li>
                <a href='javascript:;' onclick='openadv(\"{$adv['id']}\")'>
                    <div class='rel'><img src='{$adv['cover']}'></div>
                    <p class='overhid'>#{$adv['remarks']}</p>
                </a>
            </li>";
        }
        
    }
    echo json_encode(array(
        'selectuser'=>$selectuserlist,
        'typelist'=>$typelistlist,
        'playlist'=>$playlistlist,
        'state'=>1
    ));
?>