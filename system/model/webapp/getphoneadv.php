<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();$dev = CW('get/dev');
    $where = " and find_in_set(0,level)";
    if(STARTADV){
        $level = CW('get/level',1);
        if($level){
            //$where = " and level like '%{$level}%'";
            $where = " and find_in_set($level,level)";
        }
    }

    $num = CW('get/num') ? CW('get/num') : 10;
    $isswiper = CW('get/isswiper');
    $ispart = CW('get/part');
    $position = CW('get/position');
    $iswenzi = CW('get/iswenzi');
    $dev = CW('get/dev');
    if($dev){
        $advs = $db->query('appadv','',"positionabs='{$position}'".$where,'',$num);
    }else{
        $advs = $db->query('adv','',"position='{$position}'".$where,'',$num);
    }
    
    $advlist = '';
    $tu = TU;
    foreach ($advs as $adv){
        if($ispart){
            if($dev=='app'){
                
                $onclick ="openadv(\"{$adv['id']}\")";
                $a = "<a href='javascript:;' onclick='{$onclick}'><img src='{$adv['cover']}' /></a>";
            }else{
                //////////////////////////
                $url = $adv['content1'];
                $url1 = substr($url,0,strrpos($url,'_'));
                $at = substr($url,strrpos($url,'_')+1);
                if($at=='@@'){
                    $add = "target='_blank'";
                }else{
                    $add = '';
                }
                //////////////////////////
                $a = "<a href='{$url1}' $add><img src='{$adv['cover']}' /></a>";
            }
            $advlist .= "<p>
                            {$a}
                            <span>{$adv['remarks']}</span>
                        </p>";
        }elseif($iswenzi){
            if($dev=='app'){
                $onclick ="openadv(\"{$adv['id']}\")";
                $a = "<a href='javascript:;'  onclick='{$onclick}'>{$adv['remarks']}</a>";
            }else{
                //////////////////////////
                $url = $adv['content1'];
                $url1 = substr($url,0,strrpos($url,'_'));
                $at = substr($url,strrpos($url,'_')+1);
                if($at=='@@'){
                    $add = "target='_blank'";
                }else{
                    $add = '';
                }
                //////////////////////////
                $a = "<a href='{$url1}' $add>{$adv['remarks']}</a>";
            }
            $advlist .="<li>
                   {$a}
                </li>";
        }else{
            if($dev=='app'){
                $onclick ="openadv(\"{$adv['id']}\")";
                $a = "<a href='javascript:;'  onclick='{$onclick}'><img src='{$adv['cover']}' /></a>";
            }else{
                //////////////////////////
                        $url = $adv['content1'];
                        $url1 = substr($url,0,strrpos($url,'_'));
                        $at = substr($url,strrpos($url,'_')+1);
                        if($at=='@@'){
                            $add = "target='_blank'";
                        }else{
                            $add = '';
                        }
                        //////////////////////////
                
                $a = "<a href='{$url1}' $add><img src='{$adv['cover']}' /></a>";
            }
            $advlist .= "<div class='swiper-slide'>
                    {$a}
                </div>";
        }
        
    }
    echo $advlist;
        


?>