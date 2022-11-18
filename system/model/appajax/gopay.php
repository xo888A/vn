<?php 
    if(!defined('CW')){exit('Access Denied');}

    $tel = CW('post/tel');
    $id = CW('post/id');
    if(!$id){
        echo json_encode(array(
             'state'=>2,
            'err'=>'Vui lòng chọn hạng mục muốn nạp tiền!'
        ));return;
    }
    $db = functions::db();
    $type = CW('post/type');
    $exist = $db->query('pays','',"tel='{$tel}' and state=0");
    if($exist){
        if($type=='vip'){
            $user = $db->query('users','',"tel='{$tel}'",'',1);
            $isvip = false;
            if($user[0]['viptime']>time()){
                $isvip = true;
            }
            $vipcard = $db->query('vipcard','','id='.$id);
            if($isvip){
                $url1 = $vipcard[0]['address2'];
            }else{
                $url1 = $vipcard[0]['address1'];
            }
        }else{
            $diamcard = $db->query('diamcard','','id='.$id);
            $url1 = $diamcard[0]['address1'];
        }

         echo json_encode(array(
             'state'=>1,
            'data'=>'nopay',
            'url'=>$url1
        ));return;
    }
    
    $pay = 0;
    if($type=='vip'){
        $user = $db->query('users','',"tel='{$tel}'",'',1);
        $isvip = false;
        if($user[0]['viptime']>time()){
            $isvip = true;
        }
        $pay = $vipcard = $db->query('vipcard','','id='.$id);
        $pay = $pay[0]['nowprice'];
        if($isvip){
            $pay = $pay-intval($vipcard[0]['ucard']);
            $url = $vipcard[0]['address2'];
        }else{
            $url = $vipcard[0]['address1'];
        }
    }else{
        $pay = $diamcard = $db->query('diamcard','','id='.$id);
        $pay = $pay[0]['price'];
        $url = $diamcard[0]['address1'];
    }
    $res = $db->exec('pays','i',array(
        'tel'=>$tel,
        'pay'=>$pay,
        'mchorderno'=>$id,
        'paytype'=>$type,
        'payorder'=>md5(uniqid()),
        'ftime'=>time()
    ));
    if($res){
        echo json_encode(array(
            'data'=>'Đặt hàng thành công',
            'state'=>1,
            'url'=>$url,
            'do'=>'pay'
        ));
    }else{
         echo json_encode(array(
             'state'=>2,
            'err'=>'Máy chủ đang bận, vui lòng thử lại sau!'
        ));
    }
?>