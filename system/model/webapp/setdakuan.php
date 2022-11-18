<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $id = CW('post/id');
    if(!$id){
        msg('ID không hợp lệ, vui lòng làm mới trang và thao tác lại!','Làm mới','','',true);
    }
    $db = functions::db();
    $state = $db->query('pays','',"id='{$id}'");
    ///////////////////
    $fu = $level =$db->query('level','',"tel2='{$state[0]['tel']}'");//打款人的父级
    if($fu){
    $son_pay = floatval($state[0]['pay']);
    $fu = $db->query('users','',"tel='{$fu[0]['tel']}'");
    $man = $fu[0]['man'];
    $sets = $db->query('sets','r1','','id asc',1);
    $r1 = $sets[0]['r1'];
    $huoli = round($son_pay*$r1,2);//代理商获利
    $fu_card  = $fu[0]['card'];
    $timestart = strtotime(date('Y-m-d'),time());
	$timeend = $timestart+60*60*24;
    $curdayexist = $db->query('tongji','',"card='{$fu_card}' and (ftime between {$timestart} and {$timeend})");
    $curdayexist2 = $db->query('alltongji','',"(ftime between {$timestart} and {$timeend})");
    if(!$curdayexist && $fu){
        $db->exec('tongji','i',array(
	        'card'=>$fu_card,
	        'shouru'=>0,
	        'ip'=>0,
	        'regnum'=>0,
	        'downnum'=>0,
	        'downnumkouliang'=>0,
	        'chongzhi'=>0,
	        'kouliang'=>0,
	        'dailishouru'=>0,
	        'pingtaishouru'=>0,
	        'ftime'=>time()
	    ));
	    $curdayexist = $db->query('tongji','',"card='{$fu_card}' and (ftime between {$timestart} and {$timeend})");
    }
    if(!$curdayexist2  && $fu){
        $db->exec('alltongji','i',array(
	        'ip'=>1,
	        'shouru'=>0,
	        'regnum'=>1,
	        'downnum'=>0,
	        'downnumkouliang'=>0,
	        'chongzhi'=>0,
	        'kouliang'=>0,
	        'dailishouru'=>0,
	        'pingtaishouru'=>0,
	        'ftime'=>time()
	    ));
	    $curdayexist2 = $db->query('alltongji','',"(ftime between {$timestart} and {$timeend})");
    }
    $shouru = floatval($curdayexist[0]['shouru'])+floatval($huoli);
    $chongzhi = floatval($curdayexist[0]['chongzhi'])+$son_pay;
    
    $shouru2 = floatval($curdayexist2[0]['shouru'])+floatval($huoli);
    $chongzhi2 = floatval($curdayexist2[0]['chongzhi'])+$son_pay;////

    if($level[0]['ishide']){//扣量 - 隐藏用户
   
        $pingtaishouru = floatval($curdayexist[0]['pingtaishouru'])+$son_pay;
        $kouliang = floatval($curdayexist[0]['kouliang'])+$son_pay;
        
        $pingtaishouru2 = floatval($curdayexist2[0]['pingtaishouru'])+$son_pay;/////
        $kouliang2 = floatval($curdayexist2[0]['kouliang'])+$son_pay;/////
        
        if(!$man){
            $kouliang = floatval($curdayexist[0]['kouliang']);
            $kouliang2 = floatval($curdayexist2[0]['kouliang']);/////
        }
      
        
        $sql = "update tongji set shouru='{$shouru}',chongzhi='{$chongzhi}',kouliang='{$kouliang}',pingtaishouru='{$pingtaishouru}' where card='{$fu_card}' and (ftime between {$timestart} and {$timeend})";
        $sql2 = "update alltongji set shouru='{$shouru2}',chongzhi='{$chongzhi2}',kouliang='{$kouliang2}',pingtaishouru='{$pingtaishouru2}' where  (ftime between {$timestart} and {$timeend})";
        	    	    
    }else{
        $dailishouru = floatval($curdayexist[0]['dailishouru'])+floatval($huoli);
        $pingtaishouru = floatval($curdayexist[0]['pingtaishouru'])+$son_pay-floatval($huoli);
        
        $dailishouru2 = floatval($curdayexist2[0]['dailishouru'])+floatval($huoli);
        $pingtaishouru2 = floatval($curdayexist2[0]['pingtaishouru'])+$son_pay-floatval($huoli);
        

        
        $sql = "update tongji set shouru='{$shouru}',chongzhi='{$chongzhi}',dailishouru='{$dailishouru}',pingtaishouru='{$pingtaishouru}' where card='{$fu_card}' and (ftime between {$timestart} and {$timeend})";
        $sql2 = "update alltongji set shouru='{$shouru2}',chongzhi='{$chongzhi2}',dailishouru='{$dailishouru2}',pingtaishouru='{$pingtaishouru2}' where  (ftime between {$timestart} and {$timeend})";
     
    }
    $db->exec($sql);
    $db->exec($sql2);
    }
    ////////////////
    $res = $db->exec('pays','u',"state=1,id='{$id}'");
    if($res){
        $id = $state[0]['mchorderno'];
        $tel = $state[0]['tel'];
        $user = $db->query('users','',"tel='{$tel}'",'',1);
        $paytype = $state[0]['paytype'];
      
        functions::bonus($tel,$id,$paytype);
        functions::pay($tel,$id,$paytype);
        msg('Cài đặt thành công!','Làm mới','javascript:location.reload()','success',true);
    }else{
        msg('Dữ liệu không đổi!','Cài đặt lại','javascript:location.reload()','error',true);
    }
?>