<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>Trang chủ thông báo</title>
    <link rel="stylesheet" href="<?php echo CSS ?>/style.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/index.js"></script>
    <style>
        .message2 img{
            max-width: 100%;
        }
    </style>
</head>

<body>
    <?php file::import("system-model-header"); ?>
    <div class="wrap2 overflow">
        <div class="fl w100">
            <div class="fl fls">
                <p class="u"><img src="<?php echo $this->vars["avatar"] ?>" /></p>
                <p class="qiandao">Điểm danh nhận xu vàng</p>
                <ul class="fun">
                    <li><a href="<?php echo INDEX ?>/index.php?mod=user"><img src="<?php echo TU ?>/u1.png" />Trung tâm hội viên</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=edit"><img src="<?php echo TU ?>/u7.png" />Quản lý tác phẩm</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=set"><img src="<?php echo TU ?>/u2.png" />Cài đặt tài khoản</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=wallet"><img src="<?php echo TU ?>/u3.png" />Ví tiền của tôi</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=vip"><img src="<?php echo TU ?>/u4.png" />Hội viên nạp tiền</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=money"><img src="<?php echo TU ?>/u5.png" />Nạp xu vàng</a></li>
                    <!--<li><a href="<?php echo INDEX ?>/index.php?mod=card"><img src="<?php echo TU ?>/u6.png" />Đổi mã thẻ</a></li>-->
                    <li><a href="<?php echo INDEX ?>/index.php?mod=concern"><img src="<?php echo TU ?>/u7.png" />Theo dõi của tôi</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=albuy"><img src="<?php echo TU ?>/u8.png" />Video đã mua</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=customer"><img src="<?php echo TU ?>/u9.png" />Trung tâm Chăm sóc khách hàng</a></li>
                    <li  class="selected"><a href="<?php echo INDEX ?>/index.php?mod=message"><img src="<?php echo TU ?>/u10_.png" />Trung tâm thông báo</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=shares"><img src="<?php echo TU ?>/u11.png" />Quảng cáo kiếm tiền</a></li>
                    <li class="logout"><a href="<?php echo INDEX ?>/index.php?mod=logout "><img src="<?php echo TU ?>/u12.png" />Đăng xuất tài khoản</a></li>
                </ul>
            </div>
           
            <div class="fl flr">
                <ul class="overflow message width1">
                    <li>
                        <a href="<?php echo INDEX ?>/index.php?mod=message&type=官方消息">
                        <img src="<?php echo TU ?>/msg1.png" />
                        <p>Trang chủ thông báo</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo INDEX ?>/index.php?mod=message&type=平台通知">
                        <img src="<?php echo TU ?>/msg2.png" />
                        <p>Thông báo chính thức</p>
                        </a>
                    </li>
           
                    <li>
                        <a href="<?php echo INDEX ?>/index.php?mod=activity">
                        <img src="<?php echo TU ?>/msg4.png" />
                        <p>Hoạt động chính thức</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo INDEX ?>/index.php?mod=app">
                        <img src="<?php echo TU ?>/msg5.png" />
                        <p>Ứng dụng đề xuất</p>
                        </a>
                    </li>
                </ul>
                <ul class="overflow ulli2 message2">
                    <?php echo $this->vars["data"] ?>
                </ul>
                <?php echo $this->vars["page"] ?>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <?php file::import("system-model-footer"); ?>
</body>

</html>
