<?php 
    if(!defined('CW')){exit('Access Denied');}
    $tel =$tel2= CW('post/tel');
    $db =functions::db();
    $user = $db->query('users','',"tel='{$tel}'",'',1);

 
     
    $diam = $user[0]['diam'] ? $user[0]['diam'] : 0;


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


   
    //Mô-đun số tiền
    $answers = $db->query('answer','',"wtype='金币模块'");
    $_answer = '';
    foreach ($answers as $answer){
        $_answer .= "<li>
                            <h4>{$answer['title']}</h4>
                            <p>Trả lời: {$answer['content']}</p>
                        </li>";
    }




    $miaoshu2 = $db->query('sets','miaoshu2','id=1','',1);

    echo json_encode(array(
        'miaoshu'=>$miaoshu2[0]['miaoshu2'],
        'avatar'=>$user[0]['avatar'],
        'level'=>$user[0]['mylevel'] ? "<img src='../image/"+$user[0]['mylevel']+".png' />" : "<img src='../image/k.png' />",
        'tel'=>$tel2,
        'diam'=>"Số dư:{$diam}Số tiền",
        'diampay'=>$_diam,
        'answer'=>$_answer,
        'state'=>1
    ));
?>