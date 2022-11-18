<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $tpl =  new Society();
    $user = getuser();
    $u = $db->query('users','',"tel='{$user}'",'',1);
    functions::getavatar($tpl);
    $tpl->assign('money',$u[0]['money']);
    $tpl->assign('url',INDEX.'/?card='.$u[0]['card']);
    $tpl->assign('url2',INDEX.'/index.php?mod=download&card='.$u[0]['card']);
    $num2 = $jinrinum = $jinrishouru = $allshouru = 0;
    
    
    $count = $db->get_count('level',"tel='{$user}'");
    $man = $u[0]['man'];//Cứ đủ 4 sẽ khấu trừ  2
    $kouliang = $u[0]['kouliang'];
    
    
    $fenhong = '';
    $levels = $db->query("level",'',"tel='{$user}'",'id asc');//
    $starttime = strtotime(date('Y-m-d',time()));
    $endtime = strtotime(date('Y-m-d',time()))+86400;
    $users = '';
    $snum = $jl = $jl2 = 0;
    foreach ($levels as $level){
        if($level['ishide']){
            continue;
        }

        // if($level['ftime']>$starttime && $level['ftime']<$endtime){
        //     $jinrinum++;
        // }
        //$num2++;
        $duser = $level['tel2'];
        $t2 = date('Y-m-d H:i:s',$level['ftime']);
        $url1 = INDEX.'/index.php?mod=author&id='.functions::autocode($duser);
        $avat1 = $db->query('users','avatar',"tel='{$duser}'",'',1);
        $avat1 = $avat1[0]['avatar'];
        $jl++;
        if($jl<=20){
            $users .=  "<li>
                        <div>
                            <a href='{$url1}'><img src='{$avat1}' /></a>
                            <p class='p1'>{$duser}-Thành viên đã đăng ký</p>
                            <p class='p2'>{$t2}</p>
                            <p class='p3'></p>
                            <p class='p4'></p>
                        </div>
                    </li>";
        }
        
        
        
        
        $earningses = $db->query('earnings','',"parent='{$user}' and currtel='{$duser}'");
        
        foreach ($earningses as $earnings){
            $allshouru = $allshouru+$earnings['earnings'];
            if($earnings['ftime']>$starttime && $earnings['ftime']<$endtime){
                $jinrishouru = $jinrishouru+$earnings['earnings'];
                
            }
            $t = date('Y-m-d H:i:s',$earnings['ftime']);
            $avat = $db->query('users','avatar',"tel='{$earnings['currtel']}'",'',1);
            $avat = $avat ? $avat[0]['avatar'] : TU.'/default.jpg';
            $url = INDEX.'/index.php?mod=author&id='.functions::autocode($earnings['currtel']);
            $jl2++;
            if($jl2<=20){
            $fenhong .= "<li>
                            <div>
                                <a href='{$url}'><img src='{$avat}' /></a>
                                <p class='p1'>{$earnings['currtel']}-Nạp tiền{$earnings['price']}VND</p>
                                <p class='p2'>{$t}</p>
                                <p class='p3'><span>¥</span>{$earnings['earnings']}</p>
                                <p class='p4'>Chia thành số tiền</p>
                            </div>
                        </li>";
            }
        }
        
    }
    $tpl->assign('num1',$allshouru ? $allshouru : 0);//
    
    $tu = TU;
    $html =  "<div class='center'><img class='nodata' style='width: 150px !important;height:auto !important' src='{$tu}/nodata.png'><p class='center nd'>Chưa có báo cáo~</p></div>";
    $fenhongadd = "<div class='fenhong_download'><p class='a'>Trang web chỉ ghi lại 20 bản ghi mới nhất, vui lòng tải xuống và xem dữ liệu lịch sử khuyến mại !</p><p class='b shouyidw'>Tải xuống tàon bộ lợi nhuận</p></div>";
    if(isphone()){
        $fenhongadd = "<div class='fenhong_download'><p class='a'>Chỉ 20 phần dữ liệu mới nhất được ghi lại. Để có dữ liệu đầy đủ, vui lòng tải xuống và kiểm tra trên PC.!</p></div>";
    }
    
    
    $tpl->assign('fenhong',$fenhong ? $fenhong.$fenhongadd : $html);//
    $usersadd ="<div class='fenhong_download'><p class='a'>Trang web chỉ ghi lại 20 bản ghi mới nhất, vui lòng tải xuống và kiểm tra dữ liệu lịch sử khuyến mãi !</p><p class='b userdw'>Tải xuống mẫu đăng ký đầy đủ</p></div>";
    $timestart = strtotime(date('Y-m-d'),time());
	$timeend = $timestart+60*60*24;
    if(isphone()){
        $usersadd ="<div class='fenhong_download'><p class='a'>Chỉ 20 phần dữ liệu mới nhất được ghi lại. Để có dữ liệu đầy đủ, vui lòng tải xuống và kiểm tra trên PC.!</p></div>";
    }
    $jinrinum = $db->query('tongji','',"card='{$u[0]['card']}' and (ftime between {$timestart} and {$timeend})");
    $jinrinum = $jinrinum[0]['regnum']-$jinrinum[0]['regkouliang'];
    $tpl->assign('users',$users ? $users.$usersadd : $html);//
    $tpl->assign('num3',$jinrishouru ? $jinrishouru : 0);
    $tpl->assign('num4',$jinrinum ? $jinrinum : 0);
    
    $numeee = $db->query('tongji','',"card='{$u[0]['card']}'");
   
    foreach ($numeee as $nume){
        $val = $nume['regnum']-$nume['regkouliang'];
        $num2 = $num2 + $val;
    }
    
    $tpl->assign('card',$u[0]['card']);//
    
    $tpl->assign('num2',$num2 ? $num2 : 0);//
    $num5 = $num6 = 0;
    
    $numssss = $db->query('tongji','downnum',"card='{$u[0]['card']}'");
   
    foreach ($numssss as $nums){
        $num5 += $nums['downnum'];
    }
    $num6 = $db->query('tongji','downnum',"card='{$u[0]['card']}' and (ftime between {$timestart} and {$timeend})");
    $num6 = $num6[0]['downnum'];
    $tpl->assign('num5',$num5);//Tổng lịch sử tải xuống
    $tpl->assign('num6',$num6);//Tải xuống ngay hôm nay
    if(isphone()){
        $tpl->compile(basename(__FILE__,'.php'),'wap'); 
    }else{
        $tpl->compile(basename(__FILE__,'.php'),''); 
    }
?>