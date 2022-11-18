<?php
    if(!defined('CW')){exit('Access Denied');}
    functions::is_ajax();
    functions::set_cookie('__secret','',time()-3600);

    msg('Hệ thống đã đăng xuất thành công! ',' Đóng','javascript:window.location.reload()','success');
?>