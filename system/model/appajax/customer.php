<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $answers = $db->query('answer','',"wtype='客服问答模块'");$_answer = '';
     foreach ($answers as $answer){
        $_answer .= "<li>
                        <p class='tit'><img src='../image/w.png'>{$answer['title']}</p>
                        <p class='desc overflow'><img class='fl' src='../image/d.png'><span class='{$css}'>{$answer['content']}</span></p>
                    </li>";
    }
    $sets = $db->query('sets','kefu1,kefu2','id=1');
    echo json_encode(array(
        'answer'=>$_answer,
        'state'=>1,
        'kefu1'=>$sets[0]['kefu1'],
        'kefu2'=>$sets[0]['kefu2']
    ));
?>