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
        $tpl->assign('viptime',date('Y-m-d',$user[0]['viptime']).' 到期');
        $tpl->assign('level',"<img src='{$tu}/{$user[0]['mylevel']}.png' />");
    }else{
        $tpl->assign('viptime','您当前不是VIP');
        $tpl->assign('level',"<img src='{$tu}/k.png' />");
    }
    $tpl->assign('diam',$user[0]['diam'] ? $user[0]['diam'] : 0);
    
    
    
    
    $diamcards = $db->query('diamcard','','','id asc');
    $_diam = '';
    $tu = TU;
    foreach ($diamcards as $diamcard){
        if($diamcard['id']==1 && $diamcard['state']=='开启'){
            if($diamcard['tag']){
                $add = "<p class='tag'>{$diamcard['tag']}</p>";
            }else{
                $add = '';
            }
            $_diam = "<li class='b1'>
                           {$add}
                           <div class='e1'>
                               <p class='y1'>{$diamcard['diamnum']}00VNĐ</p>
                               <p  class='y2'>¥<span class='s1'>{$diamcard['price']}</span></p>
                               <p  class='y3'>{$diamcard['descs']}</p>
                               <img class='y4 abs' src='{$tu}/bb.png' />
                           </div>
                           <input type='hidden' name='id' value='1' />
                       </li>";
        }
        if($diamcard['id']==2 && $diamcard['state']=='开启'){
            if($diamcard['tag']){
                $add = "<p class='tag'>{$diamcard['tag']}</p>";
            }else{
                $add = '';
            }
            $_diam .= "<li class='b1'>
                           {$add}
                           <div class='e1'>
                               <p class='y1'>{$diamcard['diamnum']}00VNĐ</p>
                               <p  class='y2'>¥<span class='s1'>{$diamcard['price']}</span></p>
                               <p  class='y3'>{$diamcard['descs']}</p>
                               <img class='y4 abs' src='{$tu}/bb.png' />
                           </div>
                            <input type='hidden' name='id' value='2' />
                       </li>";
        }
        if($diamcard['id']==3 && $diamcard['state']=='开启'){
            if($diamcard['tag']){
                $add = "<p class='tag'>{$diamcard['tag']}</p>";
            }else{
                $add = '';
            }
            $_diam .= "<li class='b1'>
                           {$add}
                           <div class='e1'>
                               <p class='y1'>{$diamcard['diamnum']}00VNĐ</p>
                               <p  class='y2'>¥<span class='s1'>{$diamcard['price']}</span></p>
                               <p  class='y3'>{$diamcard['descs']}</p>
                               <img class='y4 abs' src='{$tu}/bb.png' />
                           </div>
                            <input type='hidden' name='id' value='3' />
                       </li>";
        }
        if($diamcard['id']==4 && $diamcard['state']=='开启'){
            if($diamcard['tag']){
                $add = "<p class='tag'>{$diamcard['tag']}</p>";
            }else{
                $add = '';
            }
            $_diam .= "<li class='b1'>
                           {$add}
                           <div class='e1'>
                               <p class='y1'>{$diamcard['diamnum']}00VNĐ</p>
                               <p  class='y2'>¥<span class='s1'>{$diamcard['price']}</span></p>
                               <p  class='y3'>{$diamcard['descs']}</p>
                               <img class='y4 abs' src='{$tu}/bb.png' />
                           </div>
                          <input type='hidden' name='id' value='4' />
                       </li>";
        }
        if($diamcard['id']==5 && $diamcard['state']=='开启'){
            if($diamcard['tag']){
                $add = "<p class='tag'>{$diamcard['tag']}</p>";
            }else{
                $add = '';
            }
            $_diam .= "<li class='b1'>
                           {$add}
                           <div class='e1'>
                               <p class='y1'>{$diamcard['diamnum']}00VNĐ</p>
                               <p  class='y2'>¥<span class='s1'>{$diamcard['price']}</span></p>
                               <p  class='y3'>{$diamcard['descs']}</p>
                               <img class='y4 abs' src='{$tu}/bb.png' />
                           </div>
                          <input type='hidden' name='id' value='5' />
                       </li>";
        }
        if($diamcard['id']==6 && $diamcard['state']=='开启'){
            if($diamcard['tag']){
                $add = "<p class='tag'>{$diamcard['tag']}</p>";
            }else{
                $add = '';
            }
            $_diam .= "<li class='b1'>
                           {$add}
                           <div class='e1'>
                               <p class='y1'>{$diamcard['diamnum']}00VNĐ</p>
                               <p  class='y2'>¥<span class='s1'>{$diamcard['price']}</span></p>
                               <p  class='y3'>{$diamcard['descs']}</p>
                               <img class='y4 abs' src='{$tu}/bb.png' />
                           </div>
                          <input type='hidden' name='id' value='6' />
                       </li>";
        }
        if($diamcard['id']==7 && $diamcard['state']=='开启'){
            if($diamcard['tag']){
                $add = "<p class='tag'>{$diamcard['tag']}</p>";
            }else{
                $add = '';
            }
            $_diam .= "<li class='b1'>
                           {$add}
                           <div class='e1'>
                               <p class='y1'>{$diamcard['diamnum']}00VNĐ</p>
                               <p  class='y2'>¥<span class='s1'>{$diamcard['price']}</span></p>
                               <p  class='y3'>{$diamcard['descs']}</p>
                               <img class='y4 abs' src='{$tu}/bb.png' />
                           </div>
                          <input type='hidden' name='id' value='7' />
                       </li>";
        }
        if($diamcard['id']==8 && $diamcard['state']=='开启'){
            if($diamcard['tag']){
                $add = "<p class='tag'>{$diamcard['tag']}</p>";
            }else{
                $add = '';
            }
            $_diam .= "<li class='b1'>
                           {$add}
                           <div class='e1'>
                               <p class='y1'>{$diamcard['diamnum']}00VNĐ</p>
                               <p  class='y2'>¥<span class='s1'>{$diamcard['price']}</span></p>
                               <p  class='y3'>{$diamcard['descs']}</p>
                               <img class='y4 abs' src='{$tu}/bb.png' />
                           </div>
                          <input type='hidden' name='id' value='8' />
                       </li>";
        }
        if($diamcard['id']==9 && $diamcard['state']=='开启'){
            if($diamcard['tag']){
                $add = "<p class='tag'>{$diamcard['tag']}</p>";
            }else{
                $add = '';
            }
            $_diam .= "<li class='b1'>
                           {$add}
                           <div class='e1'>
                               <p class='y1'>{$diamcard['diamnum']}00VNĐ</p>
                               <p  class='y2'>¥<span class='s1'>{$diamcard['price']}</span></p>
                               <p  class='y3'>{$diamcard['descs']}</p>
                               <img class='y4 abs' src='{$tu}/bb.png' />
                           </div>
                          <input type='hidden' name='id' value='9' />
                       </li>";
        }
    }
    
    $tpl->assign('diams',$_diam);
    
    
    
    $answers = $db->query('answer','',"wtype='金币模块'");
    $_answer = '';
    foreach ($answers as $answer){
        $_answer .= "<li>
                            <h4>{$answer['title']}</h4>
                            <p>Trả lời: {$answer['content']}</p>
                        </li>";
    }
    $tpl->assign('answer',$_answer);
    $miaoshu2 = $db->query('sets','miaoshu2','id=1','',1);
    $tpl->assign('miaoshu2',$miaoshu2[0]['miaoshu2']);
    if(isphone()){
        $tpl->compile(basename(__FILE__,'.php'),'wap'); 
    }else{
        $tpl->compile(basename(__FILE__,'.php'),''); 
    }
?>