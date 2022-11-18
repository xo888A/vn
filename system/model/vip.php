<?php 
    if(!defined('CW')){exit('Access Denied');}
    $tel = getuser();
    $db = functions::db();
    $user = $db->query('users','',"tel='{$tel}'",'',1);
    $tpl =  new Society();
    functions::getavatar($tpl);
    $tpl->assign('tel',$user[0]['tel']);$tu = TU;
    $isvip = false;
    if($user[0]['viptime']>time()){
        $isvip = true;
    }
     
    if($isvip){
        if($user[0]['mylevel']=='6'){
            $tpl->assign('viptime','Hội viên vĩnh cửu');
        }else{
            $tpl->assign('viptime',date('Y-m-d',$user[0]['viptime']).' Hết hạn');
        }
        
        $tpl->assign('level',"<img src='{$tu}/{$user[0]['mylevel']}.png' />");
    }else{
        $tpl->assign('viptime','Hiện tại bạn không phải là VIP');
        $tpl->assign('level',"<img src='{$tu}/k.png' />");
    }
    
    $vipcards = $db->query('vipcard','','','id asc');
    $vip = '';
    $tu = TU;
    foreach ($vipcards as $vipcard){
        if($vipcard['id']==1 && $vipcard['state']=='开启'){
            if($isvip){
                $add1 = "<p class='p2'><img src='{$tu}/yhq.png' />Giảm VNĐ<span class='yhq'>{$vipcard['ucard']}</span>VNĐ</p>";
            }else{
                $add1 = '';
            }
            $vip = "<li class='b1'>
                           <p class='tag'>{$vipcard['stit']}</p>
                           <div class='e1'>
                               <p class='y1'>{$vipcard['btit']}</p>
                               <p  class='y2'>¥<span class='s1'>{$vipcard['nowprice']}</span><span class='s2'>{$vipcard['oldprice']}VNĐ</span></p>
                               <p  class='y3'>{$vipcard['descs']}</p>
                               <img class='y4 abs' src='{$tu}/v1.png' />
                           </div>
                           <input type='hidden' name='id' value='1' />
                           {$add1}
                       </li>";
        }
        if($vipcard['id']==2 && $vipcard['state']=='开启'){
            if($isvip){
                $add2 = "<p class='p2'><img src='{$tu}/yhq.png' />Giảm VNĐ<span class='yhq'>{$vipcard['ucard']}</span>VNĐ</p>";
            }else{
                $add2 = '';
            }
            $vip .= "<li class='b2'>
                           <p class='tag'>{$vipcard['stit']}</p>
                           <div class='e2'>
                               <p class='y1'>{$vipcard['btit']}</p>
                               <p  class='y2'>¥<span class='s1'>{$vipcard['nowprice']}</span><span class='s2'>{$vipcard['oldprice']}VNĐ</span></p>
                               <p  class='y3'>{$vipcard['descs']}</p>
                               <img class='y4 abs' src='{$tu}/v2.png' />
                           </div>
                           <input type='hidden' name='id' value='2' />
                           {$add2}
                       </li>";
        }
        if($vipcard['id']==3 && $vipcard['state']=='开启'){
            if($isvip){
                $add3 = "<p class='p2'><img src='{$tu}/yhq.png' />Giảm VNĐ<span class='yhq'>{$vipcard['ucard']}</span>VNĐ</p>";
            }else{
                $add3 = '';
            }
            $vip .= "<li class='b3'>
                           <p class='tag'>{$vipcard['stit']}</p>
                           <div class='e3'>
                               <p class='y1'>{$vipcard['btit']}</p>
                               <p  class='y2'>¥<span class='s1'>{$vipcard['nowprice']}</span><span class='s2'>{$vipcard['oldprice']}VNĐ</span></p>
                               <p  class='y3'>{$vipcard['descs']}</p>
                               <img class='y4 abs' src='{$tu}/v3.png' />
                           </div>
                           <input type='hidden' name='id' value='3' />
                           {$add3}
                       </li>";
        }
        if($vipcard['id']==4 && $vipcard['state']=='开启'){
            if($isvip){
                $add4 = "<p class='p2'><img src='{$tu}/yhq.png' />Giảm VNĐ<span class='yhq'>{$vipcard['ucard']}</span>VNĐ</p>";
            }else{
                $add4 = '';
            }
            $vip .= "<li class='b4'>
                           <p class='tag'>{$vipcard['stit']}</p>
                           <div class='e4'>
                               <p class='y1'>{$vipcard['btit']}</p>
                               <p  class='y2'>¥<span class='s1'>{$vipcard['nowprice']}</span><span class='s2'>{$vipcard['oldprice']}VNĐ</span></p>
                               <p  class='y3'>{$vipcard['descs']}</p>
                               <img class='y4 abs' src='{$tu}/v4.png' />
                           </div>
                           <input type='hidden' name='id' value='4' />
                           {$add4}
                       </li>";
        }
        if($vipcard['id']==5 && $vipcard['state']=='开启'){
            if($isvip){
                $add5 = "<p class='p2'><img src='{$tu}/yhq.png' />Giảm VNĐ<span class='yhq'>{$vipcard['ucard']}</span>VNĐ</p>";
            }else{
                $add5 = '';
            }
            $vip .= "<li class='b5'>
                           <p class='tag'>{$vipcard['stit']}</p>
                           <div class='e5'>
                               <p class='y1'>{$vipcard['btit']}</p>
                               <p  class='y2'>¥<span class='s1'>{$vipcard['nowprice']}</span><span class='s2'>{$vipcard['oldprice']}VNĐ</span></p>
                               <p  class='y3'>{$vipcard['descs']}</p>
                               <img class='y4 abs' src='{$tu}/v5.png' />
                           </div>
                           <input type='hidden' name='id' value='5' />
                           {$add5}
                       </li>";
        }
        if($vipcard['id']==6 && $vipcard['state']=='开启'){
            if($isvip){
                $add6 = "<p class='p2'><img src='{$tu}/yhq.png' />Giảm VNĐ<span class='yhq'>{$vipcard['ucard']}</span>VNĐ</p>";
            }else{
                $add6 = '';
            }
            $vip .= "<li class='b6'>
                           <p class='tag'>{$vipcard['stit']}</p>
                           <div class='e6'>
                               <p class='y1'>{$vipcard['btit']}</p>
                               <p  class='y2'>¥<span class='s1'>{$vipcard['nowprice']}</span><span class='s2'>{$vipcard['oldprice']}VNĐ</span></p>
                               <p  class='y3'>{$vipcard['descs']}</p>
                               <img class='y4 abs' src='{$tu}/v6.png' />
                           </div>
                           <input type='hidden' name='id' value='6' />
                           {$add6}
                       </li>";
        }
    }
    $tpl->assign('vip',$vip);
    if($isvip){
        $img = 's_.png';
        $text = "Sau khi trừ phiếu khuyến mãi";
    }else{
        $img = 's.png';
        $text = "";
    }
    $tpl->assign('vipis',$img);
    $tpl->assign('text',$text);
    
    $answers = $db->query('answer','',"wtype='Mô-đun VIP'");
    $_answer = '';
    foreach ($answers as $answer){
        $_answer .= "<li>
                            <h4>{$answer['title']}</h4>
                            <p>Trả lời: {$answer['content']}</p>
                        </li>";
    }
    $tpl->assign('answer',$_answer);
    $miaoshu1 = $db->query('sets','miaoshu1','id=1','',1);
    $tpl->assign('miaoshu1',$miaoshu1[0]['miaoshu1']);
    if(isphone()){
        $tpl->compile(basename(__FILE__,'.php'),'wap'); 
    }else{
        $tpl->compile(basename(__FILE__,'.php'),''); 
    }
?>