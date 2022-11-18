<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    $cardtype = CW('post/cardtype',1);
    $cardnum = intval(CW('post/cardnum'));
    $num = intval(CW('post/num'));
    
    $mylevel = intval(CW('post/mylevel'));
    $jinbinum = intval(CW('post/jinbinum'));
    
    $count = $db->get_count('card');
    if($count>10000){
        msg('Thư viện thẻ có thể lưu trữ lên đến 10.000 thẻ (bao gồm cả thẻ đã qua sử dụng), vui lòng xóa một số thẻ đổi thưởng trước','Làm mới','','',true);
    }
    if($cardnum<1){
        msg('Số kim cương hoặc số ngày VIP phải là số nguyên lớn hơn 0','Làm mới','','',true);
    }
    if($num>5000 || $num<1){
    	msg('Số lượng thẻ đổi thưởng có thể từ 1-5000','Làm mới','','',true);
    }
    if(intval($cardtype)==2){
        $mylevel = intval(CW('post/mylevel'));
        $jinbinum = intval(CW('post/jinbinum'));
        if($mylevel>6 || $mylevel<1){
            msg('Phạm vi cấp bậc 1-6','Làm mới','','',true);
        }
    }else{
        $mylevel = $jinbinum = 0;
    }
    
    for($i=0;$i<$num;$i++){
        $db->exec('card','i',array(
        	'cardtype'=>$cardtype,
        	'cardnum'=>$cardnum,
        	'mylevel'=>$mylevel,
        	'jinbinum'=>$jinbinum,
        	'card'=>md5(uniqid(microtime(true),true))
        ));
    }
    
   msg('Thẻ đổi thưởng được tạo!','Làm mới','javascript:location.reload()','success',true);
?>