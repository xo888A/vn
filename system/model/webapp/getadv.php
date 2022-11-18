<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $where = " and find_in_set(0,level)";
    if(STARTADV){
        $level = CW('get/level',1);
        if($level){
            //$where = " and level like '%{$level}%'";
            $where = " and find_in_set($level,level)";
        }
    }
    
    $dev = CW('get/dev');
    $num = CW('get/num') ? CW('get/num') : 10;
    $isswiper = CW('get/isswiper');
    $ispart = CW('get/part');
    $position = CW('get/position');
    if($dev){
        $advs = $db->query('appadv','',"positionabs='{$position}'".$where,'',$num);
        
    }else{
        $advs = $db->query('adv','',"position='{$position}'".$where,'',$num);
    }
   
    $advlist = '';
    $tu = TU;
    foreach ($advs as $adv){
        if(CW('get/isphone')=='is1'){
            $advlist .= "<div class='swiper-slide'>
                                    <a href='{$adv['content1']}' target='_blank'><img src='{$adv['cover']}' /></a>
                                </div>";
        }else{
            if(CW('get/pos')=='right'){
                if(CW('get/dev')){
                    
                    $advlist .= "<li onclick='openadv(\"{$adv['id']}\")'>
                            <a href='javascript:;' ><img src='{$adv['cover']}' class='fl' /></a>
                            <div class='fr rel'>
                                <p class='d1'>{$adv['remarks']}</p>
                                <p class='d2 abs'>Quảng cáo</p>
                                <a class='d3 abs' href='javascript:;' >Kiểm tra chi tiết<img src='{$tu}/o1.png'></a>
                            </div>
                        </li>";
                }else{
                    
                    
                    /////////////////////////
                        $url = $adv['content1'];
                        $url1 = substr($url,0,strrpos($url,'_'));
                        $at = substr($url,strrpos($url,'_')+1);
                        if($at=='@@'){
                            $add = "target='_blank'";
                        }else{
                            $add = '';
                        }
                        //////////////////////////
                   
                    
                    $advlist .= "<li>
                            <a href='{$url1}' $add><img src='{$adv['cover']}' class='fl' /></a>
                            <div class='fr rel'>
                                <p class='d1'>{$adv['remarks']}</p>
                                <p class='d2 abs'>Quảng cáo</p>
                                <a class='d3 abs' href='{$url1}' $add>Kiểm tra chi tiết<img src='{$tu}/o1.png'></a>
                            </div>
                        </li>";
                }
                
            }else if(CW('get/pos')=='user'){
                $advlist .= "<li><a href='{$adv['content1']}' target='_blank'><img src='{$adv['cover']}'  /></a></li>";
            }else{
                if($isswiper){
                    if($dev=='app'){
                        $onclick ="openadv(\"{$adv['id']}\")";
                        $cn1 = "<a href='javascript:;' onclick='{$onclick}'><img src='{$adv['cover']}' /></a>";
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
                        $cn1 = "<a href='$url1' {$add}><img src='{$adv['cover']}' /></a>";
                        //////////////////////////
                    }
                    $advlist .= "<div class='swiper-slide'>
                                    {$cn1}
                                </div>";
                }else if($ispart){
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
                    $advlist .= "<p>
                                    <a href='{$url1}' {$add}><img src='{$adv['cover']}' /></a>
                                    <span>{$adv['remarks']}</span>
                                </p>";
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
                    $advlist .= "<a href='{$url1}' {$add}><img src='{$adv['cover']}' /></a>";
                }
            }
        }
        
    }
    echo $advlist;
        


?>