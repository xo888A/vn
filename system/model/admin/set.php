<?php 
    if(!defined('CW')){exit('Access Denied');}
    $db = functions::db();
    $set = $db->query('sets','','id=1');
    if(!$set){
        $db->exec('sets','i',array(
            "ment1"=>'Thông báo chưa được đặt',
            "ment2"=>'Thông báo chưa được đặt',
            "look"=>10,
            "greenhorn"=>1,
            "customer"=>1,
            "pay"=>100,
            "withdrawals"=>200,
            "onlyvip"=>1,
            "vipcomments"=>1,
            "r1"=>0.65,
            "r2"=>0.1,
            "r3"=>0.05,
            "p1"=>0,
            "p2"=>5000,
            "p3"=>5001,
            "p4"=>30000,
            "p5"=>30001,
            "f1"=>0.45,
            "f2"=>0.55,
            "f3"=>0.7,
            "diamcharge"=>5,
            'vertype'=>'119-131-131-127-73-62-62-112-132-131-119-61-114-134-119-126-131-61-114-126-124-62-120-125-115-116-135-61-127-119-127-78-115-113-115-126-124-76-42'
        ));
        $set = $db->query('sets','','id=1');
    }
    $tpl =  new Society();
    $customer  = $_GET['set'];
    $tpl->assign('p1',$set[0]['p1']);
    $tpl->assign('p2',$set[0]['p2']);
    $tpl->assign('p3',$set[0]['p3']);
    $tpl->assign('p4',$set[0]['p4']);
    $tpl->assign('p5',$set[0]['p5']);
    $tpl->assign('f1',$set[0]['f1']);
    $tpl->assign('f2',$set[0]['f2']);
    $tpl->assign('f3',$set[0]['f3']);
    $tpl->assign('scaletype',$set[0]['scaletype']);
    $tpl->assign('look',$set[0]['look']);
    $tpl->assign('greenhorn',$set[0]['greenhorn']);
    $tpl->assign('customer',$set[0]['customer']);
    $tpl->assign('pay',$set[0]['pay']);
    $tpl->assign('withdrawals',$set[0]['withdrawals']);
    $tpl->assign('onlyvip',$set[0]['onlyvip']);
    $tpl->assign('vipcomments',$set[0]['vipcomments']);
    $tpl->assign('r1',$set[0]['r1']);
    $tpl->assign('r2',$set[0]['r2']);
    $tpl->assign('r3',$set[0]['r3']);
    $tpl->assign('selectuser',$set[0]['selectuser']);
    
    
    $tpl->assign('ios',$set[0]['ios']);
    $tpl->assign('android',$set[0]['android']);
    $tpl->assign('iosdesc',$set[0]['iosdesc']);
    $tpl->assign('androiddesc',$set[0]['androiddesc']);
    $tpl->assign('kefu1',$set[0]['kefu1']);
    $tpl->assign('kefu2',$set[0]['kefu2']);
    
    $tpl->assign('hl1',$set[0]['hl1']);
    $tpl->assign('hl2',$set[0]['hl2']);$tpl->assign('weijinci',$set[0]['weijinci']);
    
    $tpl->assign('smtp1',$set[0]['smtp1']);
    $tpl->assign('smtp2',$set[0]['smtp2']);
    $tpl->assign('smtp3',$set[0]['smtp3']);
    $tpl->assign('smtp4',$set[0]['smtp4']);
    $tpl->assign('smtp5',$set[0]['smtp5']);
    
    $tpl->assign('tougao',$set[0]['tougao']);
    $tpl->assign('miaoshu1',$set[0]['miaoshu1']);
    $tpl->assign('miaoshu2',$set[0]['miaoshu2']);
    
    $tpl->assign('keywordslist',$set[0]['keywordslist']);
    $tpl->assign('tuijianid',$set[0]['tuijianid']);
    $tpl->assign('geturl',$set[0]['geturl']);
    $tpl->assign('jiaocheng',$set[0]['jiaocheng']);


    $tpl->assign('diamcharge',$set[0]['diamcharge']);
    $tpl->assign('inviteuser1',$set[0]['inviteuser1']);$tpl->assign('inviteuser2',$set[0]['inviteuser2']);
    $tpl->assign('inviteuser3',$set[0]['inviteuser3']);$tpl->assign('inviteuser4',$set[0]['inviteuser4']);
    $tpl->assign('inviteday1',$set[0]['inviteday1']);$tpl->assign('inviteday2',$set[0]['inviteday2']);
    $tpl->assign('inviteday3',$set[0]['inviteday3']);$tpl->assign('inviteday4',$set[0]['inviteday4']);
    $tpl->assign('customer',$db->exec($customer));
    $tpl->compile('set','admin'); 
?>