<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
  
    $user = CW('post/tel');
    $u = $db->query('users','',"tel='{$user}'",'',1);
    
    $num2 = $jinrinum = $jinrishouru = $allshouru = 0;
    
    
    $count = $db->get_count('level',"tel='{$user}'");
    $man = $u[0]['man'];//每满4扣2
    $kouliang = $u[0]['kouliang'];
    
    
    $fenhong = '';
    $levels = $db->query("level",'',"tel='{$user}'",'id asc');//
    $starttime = strtotime(date('Y-m-d',time()));
    $endtime = strtotime(date('Y-m-d',time()))+86400;
    $users = '';
    $snum = $jl = $jl2 = 0;
    foreach ($levels as $level){
        $snum++;
        if(($snum+1)%$man==0){
            $db->exec('level','u',"ishide=1,id='{$level['id']}'");
            continue;
        }
        if($snum%$man==0){
            $db->exec('level','u',"ishide=1,id='{$level['id']}'");
            continue;
        }

        if($level['ftime']>$starttime && $level['ftime']<$endtime){
            $jinrinum++;
        }
        $num2++;
        $duser = $level['tel2'];
        $t2 = date('Y-m-d H:i:s',$level['ftime']);
        $url1 = INDEX.'/index.php?mod=author&id='.functions::autocode($duser);
        $avat1 = $db->query('users','avatar',"tel='{$duser}'",'',1);
        $avat1 = $avat1[0]['avatar'];
        $jl++;
        if($jl<=2){
        $users .=  "<li>
                        <div>
                            <a href='{$url1}'><img src='{$avat1}' /></a>
                            <p class='p1'>{$duser}-Đăng ký hội viên</p>
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
            if($jl2<=2){
            $fenhong .= "<li>
                            <div>
                                <a href='{$url}'><img src='{$avat}' /></a>
                                <p class='p1'>{$earnings['currtel']}-Nạp tiền{$earnings['price']}VND</p>
                                <p class='p2'>{$t}</p>
                                <p class='p3'><span>¥</span>{$earnings['earnings']}</p>
                                <p class='p4'>Phân chia số tiền</p>
                            </div>
                        </li>";
            }
        }
        
    }
    
    $tu = TU;
    $html =  "<div class='center'><img class='nodata' style='width: 150px !important;height:auto !important' src='{$tu}/nodata.png'><p class='center nd'>Tạm thời không có báo cáo~</p></div>";


    
    $num5 = $db->get_count('share',"card='{$u[0]['card']}'");
    $num6 = $db->get_count('share',"card='{$u[0]['card']}' and (ftime between $starttime and $endtime)");
    $fenhongadd = "<div class='fenhong_download'><p class='a' style='width: 100%;
            text-align: center;
            font-size: 15px;
            margin: 20px 0;'>Chỉ có ghi nhận mới nhất của 20 dòng số liệu, sau khi hoàn thành mời bạn đến tại bản giao diện máy tính tải về sau đó kiểm tra</p></div>";
    if(isphone()){
        $fenhongadd = "<div class='fenhong_download'><p class='a' style='width: 100%;
            text-align: center;
            font-size: 15px;
            margin: 20px 0;'>Chỉ có ghi nhận mới nhất của 20 dòng số liệu, sau khi hoàn thành mời bạn đến tại bản giao diện máy tính tải về sau đó kiểm tra</p></div>";
    }
    $usersadd ="<div class='fenhong_download'><p class='a' style='width: 100%;
            text-align: center;
            font-size: 15px;
            margin: 20px 0;'>Chỉ có ghi nhận mới nhất của 20 dòng số liệu, sau khi hoàn thành mời bạn đến tại bản giao diện máy tính tải về sau đó kiểm tra</p></div>";
    
    if(isphone()){
        $usersadd ="<div class='fenhong_download'><p class='a' style='width: 100%;
            text-align: center;
            font-size: 15px;
            margin: 20px 0;'>Chỉ có ghi nhận mới nhất của 20 dòng số liệu, sau khi hoàn thành mời bạn đến tại bản giao diện máy tính tải về sau đó kiểm tra</p></div>";
    }
    echo json_encode(array(
        'state'=>1,
        'num1'=>$allshouru ? round($allshouru,2) : 0,
        'users'=>$users ? $users.$usersadd : '',
        'num2'=>$num2 ? $num2 : 0,
        'num3'=>$jinrishouru ? round($jinrishouru,2) : 0,
        'num4'=>$jinrinum ? $jinrinum : 0,
        'num5'=>$num5 ? $num5 : 0,
        'num6'=>$num6 ? $num6 : 0,
        'money'=>$u[0]['money'],
        'fenhong'=>$fenhong ? $fenhong.$fenhongadd : $html,
        'shareurl'=>INDEX.'/?card='.$u[0]['card'],
        'shareurl2'=>INDEX.'/index.php?mod=download&card='.$u[0]['card'],
        'tgurl'=>INDEX.'/index.php?mod=qrcode&card='.$u[0]['card']
    ));
?>