<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>Chăm sóc khách hàng</title>
    <link rel="stylesheet" href="<?php echo CSS ?>/style.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/index.js"></script>
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
                    <li  class="selected"><a href="<?php echo INDEX ?>/index.php?mod=customer"><img src="<?php echo TU ?>/u9_.png" />Trung tâm Chăm sóc khách hàng</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=message"><img src="<?php echo TU ?>/u10.png" />Trung tâm thông báo</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=shares"><img src="<?php echo TU ?>/u11.png" />Quảng cáo kiếm tiền</a></li>
                    <li class="logout"><a href="<?php echo INDEX ?>/index.php?mod=logout "><img src="<?php echo TU ?>/u12.png" />Đăng xuất tài khoản</a></li>
                </ul>
            </div>
           
            <div class="fl flr">
                <div class="customer rel">
                    <img class="customer" src="<?php echo TU ?>/customer.png" />
                    <div>
                        <p class="p1">Trung tâm Chăm sóc khách hàng</p>
                        <p class="p2">Chào bạn! Có phải bạn đang gặp phải vấn đề? Nếu thật sự gặp phải vấn đề trong quá trình sử dụng dịch vụ, vui lòng liên hệ với dịch vụ Chăm sóc khách hàng chuyên nghiệp của chúng tôi, đội ngũ dịch vụ Chăm sóc khách hàng được đào tạo bài bản và huấn luyện kĩ lưỡng sẽ cung cấp đầy đủ thông tin hướng dẫn cho đến khi vấn đề của bạn được giải quyết thành công!</p>
                        <p class="cutbtn"><a href="<?php echo $this->vars["kefu1"] ?>" target="_blank">Chăm sóc khách hàng trực tuyến</a></p>
                    </div>
                </div>
                <p class="w100 center anw2">Câu hỏi thường gặp (phương án giải quyết đề xuất tự động))</p>
                <ul class="answerlist overflow">
                    <?php echo $this->vars["data"] ?>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <?php file::import("system-model-footer"); ?>
</body>

</html>
