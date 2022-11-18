<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $mod = CW('post/mod');
    $idlist = CW('post/idlist');
    
    $db = functions::db();
    
    $idlist = explode(',',$idlist);
    foreach ($idlist as $id){
        
        $res = $db->exec('htmlcomment2','u',"ishow=1,id='{$id}'");
    }
    if($res){
        
        msg('Thao tác thành công!','Xác nhận','','success');
    }else{
        msg('Dữ liệu không đổi!','Điền lại','javascript:location.reload()','error',true);
    }
   
    
?>