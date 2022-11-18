<?php 
    header("Content-Type: application/force-download");
    $id = CW('gp/id');
    if($id=='1'){
        $filename = 'Báo biểu thu nhập.txt';
    }elseif($id=='2'){
        $filename = 'Báo biểu đăng ký.txt';
    }
    header("Content-Disposition: attachment; filename={$filename}");
    ob_start();
    if(!defined('CW')){exit('Access Denied');}
    //functions::is_ajax();
    
    $user = getuser();
    $db = functions::db();
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
   
            // $users .=  "<li>
            //             <div>
            //                 <a href='{$url1}'><img src='{$avat1}' /></a>
            //                 <p class='p1'>{$duser}-Đăng ký thành viên</p>
            //                 <p class='p2'>{$t2}</p>
            //                 <p class='p3'></p>
            //                 <p class='p4'></p>
            //             </div>
            //         </li>";
            $users .= "{$duser}-Đăng ký thành viên-{$t2}"."\n";
        
        
        
        
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
           
            // $fenhong .= "<li>
            //                 <div>
            //                     <a href='{$url}'><img src='{$avat}' /></a>
            //                     <p class='p1'>{$earnings['currtel']}-充值{$earnings['price']}VNĐ</p>
            //                     <p class='p2'>{$t}</p>
            //                     <p class='p3'><span>¥</span>{$earnings['earnings']}</p>
            //                     <p class='p4'>Phân thành số tiền</p>
            //                 </div>
            //             </li>";
            $fenhong .= "{$earnings['currtel']}-Nạp tiền{$earnings['price']}VNĐ-{$t}-Số tiền chia sẻ：¥{$earnings['earnings']}"."\n";
            
        }
        
    }
    ob_end_clean();
    if($id=='1'){
        echo $fenhong;
    }elseif($id=='2'){
        echo $users;
    }
    
    //$fenhong
    //$users

   
?>