<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>Quảng cáo kiếm tiền</title>
    <meta name="keywords" content="Từ khóa" />
    <meta name="description" content="Mô tả trang" />
    <link rel="stylesheet" href="<?php echo CSS ?>/style.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/index.js"></script>
    <script src="<?php echo JS ?>/copy.js"></script>
    <style>
        .fenhong_download .a{
            width: 100%;
            text-align: center;
            font-size: 18px;
            margin: 20px 0;
        }
        .fenhong_download .b{ 
            cursor: pointer;
            background: #FF7AA5;
            color: #fff;
            width: 30%;
            margin: 0 auto;
            text-align: center;
            line-height: 55px;
            font-size: 18px;
            border-radius: 6px;
        }
        .share2 p.button{
            margin-top: 0;
            margin-bottom: 25px;
        }
        .tui1{
            margin-top:15px;
            margin-bottom:3px;
        }
        .tui1 span{
            color:#FF7AA5;
        }
    </style>
</head>

<body>
    <?php file::import("system-model-header"); ?>
    <div class="wrap2 overflow">
        <div class="fl w100">
            <div class="fl fls">
                <p class="u"><img src="<?php echo $this->vars["avatar"] ?>" /></p>
                <p class="qiandao">Điểm danh nhận tiền</p>
                <ul class="fun">
                    <li><a href="<?php echo INDEX ?>/index.php?mod=user"><img src="<?php echo TU ?>/u1.png" />Trung tâm hội viên</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=edit"><img src="<?php echo TU ?>/u7.png" />Quản lý tác phẩm</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=set"><img src="<?php echo TU ?>/u2.png" />Cài đặt tài khoản</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=wallet"><img src="<?php echo TU ?>/u3.png" />Ví của tôi</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=vip"><img src="<?php echo TU ?>/u4.png" />Nạp tiền hội viên</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=money"><img src="<?php echo TU ?>/u5.png" />Nạp tiền</a></li>
                    <!--<li><a href="<?php echo INDEX ?>/index.php?mod=card"><img src="<?php echo TU ?>/u6.png" />Đổi mật mã thẻ</a></li>-->
                    <li><a href="<?php echo INDEX ?>/index.php?mod=concern"><img src="<?php echo TU ?>/u7.png" />Theo dõi của tôi</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=albuy"><img src="<?php echo TU ?>/u8.png" />Video đã mua</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=customer"><img src="<?php echo TU ?>/u9.png" />Trung tâm chăm sóc khách hàng</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=message"><img src="<?php echo TU ?>/u10.png" />Trung tâm thông tin</a></li>
                    <li  class="selected"><a href="<?php echo INDEX ?>/index.php?mod=shares"><img src="<?php echo TU ?>/u11_.png" />Quảng cáo kiếm tiền</a></li>
                    <li class="logout"><a href="<?php echo INDEX ?>/index.php?mod=logout "><img src="<?php echo TU ?>/u12.png" />Đăng xuất tài khoản</a></li>
                </ul>
            </div>
            <div class="fl flr">
               <ul class="overflow width3 share">
                   <li>
                       <p class="p1"><span>¥</span><?php echo $this->vars["num1"] ?></p>
                       <p class="p2">Tổng số thu nhập trước đây</p>
                       <img src="<?php echo TU ?>/sh1.png" />
                   </li>
                   <li>
                       <p class="p1"><?php echo $this->vars["num2"] ?></p>
                       <p class="p2">Tổng số đăng ký trước đây</p>
                       <img src="<?php echo TU ?>/sh2.png" />
                   </li>
                   <li>
                       <p class="p1"><?php echo $this->vars["num5"] ?></p>
                       <p class="p2">Toàn số tải xuống trước đây</p>
                       <img src="<?php echo TU ?>/sh3.png" />
                   </li>
                   <li>
                       <p class="p1"><span>¥</span><?php echo $this->vars["num3"] ?></p>
                       <p class="p2">Thu nhập hôm nay</p>
                       <img src="<?php echo TU ?>/sh4.png" />
                   </li>
                   <li>
                       <p class="p1"><?php echo $this->vars["num4"] ?></p>
                       <p class="p2">Đăng ký hôm nay</p>
                       <img src="<?php echo TU ?>/sh5.png" />
                   </li><li>
                       <p class="p1"><?php echo $this->vars["num6"] ?></p>
                       <p class="p2">Tải xuống hôm nay</p>
                       <img src="<?php echo TU ?>/sh6.png" />
                   </li>
               </ul>
               <script>
                    $(function(){
                        $('.pubtit p').click(function(){
                            var rel = $(this).attr("rel");
                            $('.pubtit p').attr('class','');
                            $(this).attr('class','selected');
                            if(rel=="u1"){
                                $('.part1').show();
                                $('.part2,.part3').hide();
                            }else if(rel=="u2"){
                                $('.part2').show();
                                $('.part1,.part3').hide();
                            }else{
                                $('.part3').show();
                                $('.part1,.part2').hide();
                            }
                        });
                        $('.tx li').click(function(){
                            $('.tx li').attr('class','');
                            $(this).attr('class','selected');
                        });
                    });
                </script>
                <div class="pubtit">
                    <p class="selected" rel="u1"><span></span>Bắt đầu quảng cáo</p>
                    <p rel="u2"><span></span>Báo cáo thu nhập</p>
                    <p rel="u3"><span></span>Báo cáo đăng ký</p>
                 
                </div>
                <div class="part1 part share2 ">
                    <p class="bdesc">Nhắc nhở: Thành viên tiêu dùng thông qua các liên kết khuyến mãi hoặc mã QR sau đây sẽ được tính thu nhập! Báo cáo là thực tế và hiệu quả, đồng thời bạn có thể ràng buộc mối quan hệ đề xuất thông qua liên kết của mình. Sau khi đăng ký, ID đề xuất sẽ bị ràng buộc vĩnh viễn và thành viên sẽ tính số lần mua hàng của bạn bất kỳ lúc nào và hưởng phần chia sẻ doanh thu tiêu thụ thứ cấp vĩnh viễn.</p>
                    <p class="tui1"><span>Liên kết quảng cáo 1:</span> Đi đến trang chủ của trang web (dùng chung liên kết)</p>
                    <p class="button"><input readonly="readonly" value="<?php echo $this->vars["url"] ?>"><a href="javascript:;" class="urls">Copy</a></p>
                    <p class="tui1"><span>Liên kết quảng cáo 2:</span> Vào trang tải APP về (chỉ dành cho chuyên dụng)</p>
                    <p class="button"><input readonly="readonly" value="<?php echo $this->vars["url2"] ?>"><a href="javascript:;" class="urls2">Copy</a></p>
                    <p class="tui1"><span>Mã QR quảng cáo</span> </p>
                    <p style="margin: 10px 0 40px;"><img src="<?php echo INDEX ?>/index.php?mod=qrcode&card=<?php echo $this->vars["card"] ?>" /></p>
                    <div class="rel">
                        <p class="abs"></p>
                        <p><strong>1</strong><span>Bước 1: </span>Sao chép liên kết khuyến mãi / mã QR bất kỳ</p>
                        <p class="ti"><strong>2</strong><span>Bước 2: </span>Gửi các liên kết quảng cáo qua nhiều kênh khác nhau, các nhóm phần mềm giao tiếp mạng xã hội thường được sử dụng, v.v.</p>
                        <p class="t2"></p>
                        <p><strong>3</strong><span>Bước 3: </span>Những người dùng được mời truy cập thông qua liên kết chia sẻ của bạn và sau đó mối quan hệ đề xuất có thể bị ràng buộc. Sau khi đăng ký, ID đề xuất sẽ bị ràng buộc vĩnh viễn và họ có thể tận hưởng lần nâng cấp thành viên thứ hai và chia sẻ doanh thu tiêu thụ! Rút hơn 100 đồng!！</p>
                    </div>
                </div>
                <div class="part2 hide">
                    <p class="bigtit overflow">
                        <span class="fl">Hành vi của người dùng được mời</span>
                        <span class="fr">Chia sẻ số tiền</span>
                    </p>
                    <ul class="overflow ulli2">
                        <?php echo $this->vars["fenhong"] ?>
                    </ul>
                </div>
                <div class="part3 hide">
                    <p class="bigtit overflow">
                        <span class="fl">Người dùng được mời</span>
                        <span class="fr"></span>
                    </p>
                    <ul class="overflow ulli2">
                        <?php echo $this->vars["users"] ?>
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <?php file::import("system-model-footer"); ?>
    <script>
        var clipboard = new Clipboard('.urls', {
        text: function() {
            return '<?php echo $this->vars["url"] ?>';
        }
    });
    clipboard.on('success',
    function(e) {
        alert('复制成功!');
    });
    var clipboard2 = new Clipboard('.urls2', {
        text: function() {
            return '<?php echo $this->vars["url2"] ?>';
        }
    });
    clipboard2.on('success',
    function(e) {
        alert('复制成功!');
    });
    $(function(){
        $('.shouyidw').click(function(){
            if(confirm('确定要下载收益报表吗?')){
                window.open("<?php echo INDEX ?>/webajax.php?mod=txt&id=1");
            }
        });
        $('.userdw').click(function(){
            if(confirm('确定要下载注册报表吗?')){
                window.open("<?php echo INDEX ?>/webajax.php?mod=txt&id=2");
            }
        });
    });
    </script>
</body>

</html>
