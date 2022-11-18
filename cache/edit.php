<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>Quản lý bài đăng</title>
    <meta name="keywords" content="关键词" />
    <meta name="description" content="首页描述" />
    <link rel="stylesheet" href="<?php echo CSS ?>/style.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/js.js"></script>
    
</head>

<body>
    <?php file::import("system-model-header"); ?>
    <div class="wrap2 overflow">
        <div class="fl w100">
            <div class="fl fls">
                <p class="u"><img src="<?php echo $this->vars["avatar"] ?>" /></p>
                <p class="qiandao">Thưởng điểm danh</p>
                <ul class="fun">
                    <li><a href="<?php echo INDEX ?>/index.php?mod=user"><img src="<?php echo TU ?>/u1.png" />Trung tâm thành viên</a></li>
                    <li class="selected"><a href="<?php echo INDEX ?>/index.php?mod=user"><img src="<?php echo TU ?>/u7_.png" />Quản lý bài đăng</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=set"><img src="<?php echo TU ?>/u2.png" />Cài đặt tài khoản</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=wallet"><img src="<?php echo TU ?>/u3.png" />Ví của tôi</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=vip"><img src="<?php echo TU ?>/u4.png" />Thành viên nạp tiền</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=money"><img src="<?php echo TU ?>/u5.png" />Nạp tiền</a></li>
                    <!--<li><a href="<?php echo INDEX ?>/index.php?mod=card"><img src="<?php echo TU ?>/u6.png" />Đổi mật khẩu thẻ</a></li>-->
                    <li><a href="<?php echo INDEX ?>/index.php?mod=concern"><img src="<?php echo TU ?>/u7.png" />Theo dõi của tôi</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=albuy"><img src="<?php echo TU ?>/u8.png" />Video đã mua</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=customer"><img src="<?php echo TU ?>/u9.png" />Trung tâm CSKH</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=message"><img src="<?php echo TU ?>/u10.png" />Trung tâm thông báo</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=shares"><img src="<?php echo TU ?>/u11.png" />Kiếm tiền quảng cáo</a></li>
                    <li class="logout"><a href="javascript:;"><img src="<?php echo TU ?>/u12.png" />Đăng xuất</a></li>
                </ul>
            </div>
            <script>
                    $(function(){
                        $('.onclick p').click(function(){
                            $('.onclick p').attr('class','');
                            var rel = $(this).attr("rel");
                            $(this).attr('class','selected');
                            if(rel=="1"){
                                $('.npart1').show();
                                $('.npart2').hide();
                                $('.npart3').hide();
                            }else if(rel=='2'){
                                $('.npart1').hide();
                                $('.npart2').show();
                                $('.npart3').hide();
                            }else if(rel=='3'){
                                $('.npart1').hide();
                                $('.npart2').hide();
                                $('.npart3').show();
                            }
                        });
                        $('.tx li').click(function(){
                            $('.tx li').attr('class','');
                            $(this).attr('class','selected');
                        });
                    });
                </script>
            <div class="fl flr">
                <div class="pubtit">
                    <p rel="u2"><a href="<?php echo INDEX ?>/index.php?mod=fabu" style="color:red;font-weight:bold">Tải lên</a></p>
                    <p rel="u2"><a href="<?php echo INDEX ?>/index.php?mod=edit&type=all">Toàn bộ</a></p>
                    <p rel="u2"><a href="<?php echo INDEX ?>/index.php?mod=edit&type=on">Đang xét duyệt</a></p>
                    <p rel="u2"><a href="<?php echo INDEX ?>/index.php?mod=edit&type=success">Thành công</a></p>
                </div>
               <section class="public" >
                    <ul class="overflow width3 albuy">
                        <?php echo $this->vars["data"] ?>
                    </ul>
                    <?php echo $this->vars["page"] ?>
                </section>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <?php file::import("system-model-footer"); ?>
</body>

</html>
