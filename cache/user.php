<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>Trung tâm hội viên</title>
    <meta name="keywords" content="Từ khóa" />
    <meta name="description" content="Mô tả trang" />
    <link rel="stylesheet" href="<?php echo CSS ?>/style.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/index.js"></script>
</head>

<body>
    <?php file::import("system-model-header"); ?>
    <div class="wrap2 overflow">
        <div class="fl w100">
            <div class="fl fls phonehide">
                <p class="u"><img src="<?php echo $this->vars["avatar"] ?>" /></p>
                <p class="qiandao">Điểm danh nhận thưởng</p>
                <ul class="fun">
                    <li class="selected"><a href="<?php echo INDEX ?>/index.php?mod=user"><img src="<?php echo TU ?>/u1_.png" />Trung tâm hội viên</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=edit"><img src="<?php echo TU ?>/u7.png" />Quản lý tác phẩm</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=set"><img src="<?php echo TU ?>/u2.png" />Cài đặt tài khoản</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=wallet"><img src="<?php echo TU ?>/u3.png" />Ví của tôi</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=vip"><img src="<?php echo TU ?>/u4.png" />Nạp tiền hội viên</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=money"><img src="<?php echo TU ?>/u5.png" />Nạp tiền</a></li>
                    <!--<li><a href="<?php echo INDEX ?>/index.php?mod=card"><img src="<?php echo TU ?>/u6.png" />Đổi mật khẩu thẻ</a></li>-->
                    <li><a href="<?php echo INDEX ?>/index.php?mod=concern"><img src="<?php echo TU ?>/u7.png" />Theo dõi của tôi</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=albuy"><img src="<?php echo TU ?>/u8.png" />Video đã mua</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=customer"><img src="<?php echo TU ?>/u9.png" />Trung tâm chăm sóc khách hàng</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=message"><img src="<?php echo TU ?>/u10.png" />Trung tâm thông tin</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=shares"><img src="<?php echo TU ?>/u11.png" />Quảng cáo kiếm tiền</a></li>
                    <li class="logout"><a href="<?php echo INDEX ?>/index.php?mod=logout "><img src="<?php echo TU ?>/u12.png" />Đăng xuât tài khoản</a></li>
                </ul>
            </div>
            <div class="fl flr">
                <div class="top rel phonehide">
                    <div>
                        <ul class="overflow userindex ">
                            <li>
                                <img src="<?php echo TU ?>/top1.png" />
                                <p class="p1"><?php echo $this->vars["username"] ?></p>
                                <p class="p2">Tài khoản của tôi</p>
                            </li>
                            <li>
                                <img src="<?php echo TU ?>/top2.png" />
                                <p class="p1">Số dư: <?php echo $this->vars["diam"] ?></p>
                                <p class="p2">Tiền của tôi</p>
                            </li>
                            <li>
                                <img src="<?php echo TU ?>/top3.png" />
                                <p class="p1"><?php echo $this->vars["mylevel"] ?></p>
                                <p class="p2">Tư cách hội viên</p>
                            </li>
                        </ul>
                    </div>
                    <img class="abs" src="<?php echo TU ?>/vipbg.png" />
                </div>
                <ul class="adv overflow">
                    
                    <?php echo $this->vars["adv"] ?>
                </ul>
                <div class="pubtit">
                    <p class="selected" rel="u1"><span></span>Yêu thích của tôi</p>
                    <p rel="u2"><span></span><a href="<?php echo INDEX ?>/index.php?mod=look">Lịch sử xem</a></p>
                    <span class="fr clearred hide" >Xóa lịch sử xem</span>
                </div>
                <section class="public">
            <ul class="useradd2 overflow width3 ul1 vimga">
                <?php echo $this->vars["likes"] ?>
            </ul>
            <?php echo $this->vars["page"] ?>
            <div class="clear"></div>
        </section>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <?php file::import("system-model-footer"); ?>
    <script>
        $(function(){
            
        });
    </script>
</body>

</html>
