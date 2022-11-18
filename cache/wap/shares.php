<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>Kiếm tiền quảng cáo</title>
    <link rel="stylesheet" type="text/css" href="../css/api.css" />
    <script type="text/javascript" src="../script/jquery.js"></script>
    <script type="text/javascript" src="../script/api.js"></script>
    <script src="<?php echo JS ?>/copy.js"></script>
    <style>
        .ulli2 .p3 {
            top: 7px;
        }
        .pubtit p {
            margin-right: 7px;
            font-size: 12px !important;
        }
        .share li .p2 {
    font-size: 12px;
    left: 11%;
    bottom: 15%;
    color: #fff;
    height: 40px;
    width: 100px;
    top: 49px;
    line-height: 16px;
}
    </style>
    <style>
        .fenhong_download .a{
            width: 100%;
            text-align: center;
            font-size: 15px;
            margin: 20px 0;
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
    <?php file::import("system-model-top"); ?>
    <div class="wrap  mt70">
        <ul class="overflow width3 share">
            <li>
                       <p class="p1"><span>¥</span><?php echo $this->vars["num1"] ?></p>
                       <p class="p2">Lịch sử tổng doanh thu</p>
                       <img src="<?php echo TU ?>/sh1.png" />
                   </li>
                   <li>
                       <p class="p1"><?php echo $this->vars["num2"] ?></p>
                       <p class="p2">Lịch sử đăng ký</p>
                       <img src="<?php echo TU ?>/sh2.png" />
                   </li>
                   <li>
                       <p class="p1"><?php echo $this->vars["num5"] ?></p>
                       <p class="p2">Lịch sử tải</p>
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
                       <p class="p2">Đã tải hôm nay</p>
                       <img src="<?php echo TU ?>/sh6.png" />
                   </li>
        </ul>
        <div class="pubtit">
            <p class="selected" rel="u1"><span></span>Bắt đầu quảng cáo</p>
            <p rel="u2" class=""><span></span>Báo cáo thu nhập</p>
            <p rel="u3" class=""><span></span>Báo cáo đăng ký</p>
        </div>
        <div class="part1 part share2 " style="display: block;">
            <p class="bdesc">Nhắc nhở: Thành viên tiêu dùng thông qua các liên kết khuyến mãi hoặc mã QR bên dưới sẽ được tính vào tổng thu! Báo cáo là thực tế và hiệu quả, thông qua link có thể liên kết với những đề xuất liên quan khác . Sau khi đăng ký, ID sẽ bị ràng buộc vĩnh viễn và bất cứ khi nào thành viên mua hàng sẽ tính cho doanh thu của bạn,bạn sẽ hưởng phần chia sẻ doanh thu tiêu thụ thứ cấp vĩnh viễn</p>
            <p class="tui1"><span>Link quảng cáo 1:</span> Vào trang chủ web(Thông qua liên kết)</p>
                    <p class="button"><input readonly="readonly" value="<?php echo $this->vars["url"] ?>"><a href="javascript:;" class="urls">Sao chép</a></p>
                    <p class="tui1"><span>Link quảng cáo 2:</span> Vào trang chủ tải App(Chỉ dành cho đại lý)</p>
                    <p class="button"><input readonly="readonly" value="<?php echo $this->vars["url2"] ?>"><a href="javascript:;" class="urls2">Sao chép</a></p>
                    <p class="tui1"><span>Mã QR quảng cáo </span> </p>
                    <p style="margin: 10px 0 40px;"><img src="<?php echo INDEX ?>/index.php?mod=qrcode&card=<?php echo $this->vars["card"] ?>" /></p>
            <!--<div class="rel">-->
            <!--    <p class="abs"></p>-->
            <!--    <p><strong>1</strong><span>Bước thứ nhất: </span>Sao chép bất kỳ liên kết quảng cáo / mã QR</p>-->
            <!--    <p class="ti"><strong>2</strong><span>Bước thứ 2: </span>Gửi liên kết quảng cáo đến các nhóm giao lưu trên các mạng xã hội v.v.。</p>-->
            <!--    <p class="t2"><img src="<?php echo INDEX ?>/static/img/web/tg.png"></p>-->
            <!--    <p><strong>3</strong><span>Bước thứ 3: </span><span class="ayr">Những người dùng được mời truy cập thông qua liên kết chia sẻ của bạn ,ngay sau đó sẽ liên kết với những đề xuất liên quan. Sau khi đăng ký, ID đề xuất sẽ bị ràng buộc vĩnh viễn, tận hưởng nâng 2 cấp thành viên và chia sẻ doanh thu tiêu thụ! Đủ 100 đồng có thể rút tiền ngay!</span></p>-->
            <!--</div>-->
            <p style="height:100px"></p>
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
                        <span class="fl">Hành vi của người dùng được mời</span>
                        <span class="fr"></span>
                    </p>
                    <ul class="overflow ulli2">
                        <?php echo $this->vars["users"] ?>
                    </ul>
                </div>
    </div>
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
    </script>
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

</body>

</html>
