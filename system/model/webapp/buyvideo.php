<?php 
    if(!defined('CW')){exit('Access Denied');}
    $vid = CW('post/id',1);
    $tel = functions::autocode(CW('cookie/__username'),'-');
    if(!$tel){
       echo json_encode(array(
            'err'=>'Vui lòng đăng nhập trước！',
        ));return;
    }
    $db = functions::db();
    $exist = $db->query('sellvideo','',"tel='{$tel}' and vidid='{$vid}'");
    if($exist){
        echo json_encode(array(
            'err'=>'Không mua lại！',
        ));return;
    }
    $post = $db->query('post','vipdiam,diamond',"id='{$vid}'",'',1);
    $vipdiam = $post[0]['vipdiam'];
    $diamond = $post[0]['diamond'];
    $user = $db->query('users','viptime,diam',"tel='{$tel}'",'',1);
    $user_diam = $user[0]['diam'];
    if($user[0]['viptime']>time()){
        if($user_diam>$vipdiam){
            $surplusdiam = $user_diam-$vipdiam;
            $res1 = $db->exec('users','u',"diam='{$surplusdiam}',tel='{$tel}'");
            $res2 = $db->exec('sellvideo','i',array(
                    'tel'=>$tel,
                    'vidid'=>$vid,
                    'ftime'=>time()
            ));
            if($res1 && $res2){
                $db->exec('buyrecord','i',array(
                    'tel'=>$tel,
                    'paytype'=>'buyvid',
                    'payid'=>$vid,
                    'ftime'=>time()
                ));
                 echo json_encode(array(
                    'do'=>'reload',
                    'data'=>'Mua thành công',
                ));
            }else{
                echo json_encode(array(
                    'err'=>'Mua thất bại！'
                ));
            }
        }else{
            echo json_encode(array(
                'err'=>'Bạn không còn đủ tiền để mua video này！'
            ));
        }
    }else{
        if($user_diam>$diamond){
            $surplusdiam = $user_diam-$diamond;
            $res1 = $db->exec('users','u',"diam='{$surplusdiam}',tel='{$tel}'");
            $res2 = $db->exec('sellvideo','i',array(
                    'tel'=>$tel,
                    'vidid'=>$vid,
                    'ftime'=>time()
                ));
            if($res1 && $res2){
                echo json_encode(array(
                    'do'=>'reload',
                    'data'=>'Mua thành công'
                ));
            }else{
                echo json_encode(array(
                    'err'=>'Không mua được！',
                ));
            }
        }else{
            echo json_encode(array(
                'err'=>'Bạn không còn đủ tiền để mua video này！'
            ));
        }
    }
?>