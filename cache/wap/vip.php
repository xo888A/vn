<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>Thành viên nạp tiền</title>
    <link rel="stylesheet" type="text/css" href="../css/api.css" />
    <link rel="stylesheet" type="text/css" href="../css/swiper.css" />
    <script type="text/javascript" src="../script/jquery.js"></script>
    <script type="text/javascript" src="../script/api.js"></script>
    <script type="text/javascript" src="../script/swiper.js"></script>
    <script type="text/javascript" src="<?php echo JS ?>/index.js"></script>
    <style>
        .morder{
            border-top:1px solid #f1eeee;
            bottom:0;left:0;width:100%;background: #fff;position: fixed;
        }
        .morder div{
            padding:10px
        }
        .gopay{
            top:15px;
            right: 10px;
        }
    </style>
</head>

<body>
    <?php file::import("system-model-top"); ?>
    <div class="wrap flr mt70">
        <div class="top rel ntop ">
            <img class="abs" src="<?php echo TU ?>/vipbg.png">
            <p class="l1 abs"><img src="<?php echo $this->vars["avatar"] ?>"></p>
            <div class="l2 abs">
                <p class="tel"><?php echo $this->vars["tel"] ?><?php echo $this->vars["level"] ?></p>
                <p class="endtime"><?php echo $this->vars["viptime"] ?></p>
            </div>
            <div class="l3 abs onclick">
                <p class="selected" rel="1">Tự động nâng cấp VIP</p>
                <!--<p rel="2">Đổi mật khẩu thẻ VIP</p>-->
                <p rel="2">Vấn đề thường gặp</p>
            </div>
       </div>
    </div>
    <div class="wrap">
        <div class="npart1 ">
            <p class="btit">Vui lòng chọn gói VIP<span class="fr"><a style="color:#FF7AA5" href="<?php echo INDEX ?>/index.php?mod=customer">Cần trợ giúp từ CSKH</a></span></p>
            <ul class="width3 overflow vippay">
                <?php echo $this->vars["vip"] ?>
            </ul>
            <div class="not">
                <div class="w">
                    <p><span>Đọc trước khi chọn mua:</span><?php echo $this->vars["miaoshu1"] ?></p>
                </div>
            </div>
            
            
            <img  src="<?php echo TU ?>/btit.jpg" style="margin: 20px 0;width: 100%;">
            <ul class="func overflow  w100">
                <li>
                    <div>
                        <img src="<?php echo TU ?>/f1.png">
                        <p>Phát trực tuyến </p>
                    </div>
                </li>
                <li>
                    <div>
                        <img src="<?php echo TU ?>/f2.png">
                        <p>Mở khóa tất cả ảnh kỹ thuật số</p>
                    </div>
                </li>
                <li>
                    <div>
                        <img src="<?php echo TU ?>/f3.png">
                        <p>Hơn 300 tác phẩm được cập nhật mỗi tháng</p>
                    </div>
                </li><li>
                    <div>
                        <img src="<?php echo TU ?>/f4.png">
                        <p>Tích hợp ứng dụng cho máy tính và điện thoại di động</p>
                    </div>
                </li>
                <li>
                    <div>
                        <img src="<?php echo TU ?>/f5.png">
                        <p>Chất lượng video siêu rõ nét 1080P</p>
                    </div>
                </li><li>
                    <div>
                        <img src="<?php echo TU ?>/f6.png">
                        <p>Tải xuống tác phẩm gốc không mất dữ liệu</p>
                    </div>
                </li><li>
                    <div>
                        <img src="<?php echo TU ?>/f7.png">
                        <p>100+ mô hình ban đầu đã được ký</p>
                    </div>
                </li><li>
                    <div>
                        <img src="<?php echo TU ?>/f8.png">
                        <p>Tên miền độc quyền không bao giờ bị mất</p>
                    </div>
                </li><li>
                    <div>
                        <img src="<?php echo TU ?>/f9.png">
                        <p> Thanh toán bảo mật không có nội dung khiêu dâm</p>
                    </div>
                </li><li>
                    <div>
                        <img src="<?php echo TU ?>/f10.png">
                        <p>Dịch vụ khách hàng trực tuyến độc quyền</p>
                    </div>
                </li>
            </ul><div class="bottom"></div>
        </div>
    </div>
    <!--<div class="part4 npart2 part overflow iuy wrap hide">-->
    <!--    <p class="notice" style="font-size:18px;margin-top:20px">Đổi VIP bằng mã PIN</p>-->
    <!--    <p class="button button2 s"><input class="covertcard w89" placeholder="Nhập mật khẩu thẻ" class='w89'></p>-->
    <!--    <p class="pubbtn covertcardbtn" style="margin:20px 0 10px">Xác nhận trao đổi</p>-->
    <!--    <p class="notice a">1.Mỗi thẻ chỉ được sử dụng một lần</p>-->
    <!--    <p class="notice a">2.Sao chép và dán mã thẻ bạn đã mua vào ô nhập ở trên để đổi</p>-->
    <!--    <p class="notice a">3.Nếu bạn cần trợ giúp, vui lòng liên hệ với bộ phận chăm sóc khách hàng</p>-->
    <!--</div>-->
    <div class="npart2 overflow addpt3 hide wrap hide">
        <p class="notice y" style="font-size:18px;margin-top:20px">FAQ / Hỏi & Đáp Trợ giúp</p>
        <ul class="overflow answer">
             <?php echo $this->vars["answer"] ?>
        </ul>
    </div>
    <div class="morder rel">
            <div>
                <p class="p1">Số lượng đơn hàng:<span class="s1">¥<strong>0</strong>đồng</span></p>
            <p class="p2"><span class="s2">Đã chọn: <strong>Chưa có lựa chọn</strong></span></p>
            <a href="javascript:;" id="" class="fr gopay">Thanh toán ngay</a></p>
            </div>
        </div>
    <script>
        $(function(){
            $('.vippay li').click(function(){
                var s1 = $(this).find('.s1').text();
                var id = $(this).find("input[name=id]").val();
                $('.vippay li img.vipselect').remove();
                var ele = $(this).find('.vipselect').attr('class');
                if(ele==undefined || !ele){
                    $(this).append("<img class='abs vipselect' src='../image/s_.png'>");
                }
                var yhq = parseInt($(this).find('.yhq').text());
                if(yhq){
                    s1 = parseInt(s1)-yhq;
                }
                $('.morder span.s1 strong').text(s1);
                $('.morder span.s2 strong').text($(this).find('.y1').text());
                $('.gopay').attr('id',id)
            });
            $('.gopay').click(function(){
                var id = $(this).attr('id');
                ajax('gopay',"id="+id+"&type=vip");
            });
        });
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
    </script>

</body>

</html>
