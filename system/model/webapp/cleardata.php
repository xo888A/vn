<?php 
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    $db = functions::db();
    $db->query("truncate table card");
    msg('Đã xóa!','Xác nhận','','success');
?>