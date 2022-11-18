<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>Ví tiền của tôi</title>
    <link rel="stylesheet" type="text/css" href="../css/api.css" />
    <script type="text/javascript" src="../script/jquery.js"></script>
    <script type="text/javascript" src="../script/api.js"></script>
    <script type="text/javascript" src="<?php echo JS ?>/index.js"></script>
</head>

<body>
    <?php file::import("system-model-top"); ?>
    <div class="wrap">
        <div class="top rel newtop2 mt70 ">
            <div>
                <ul class="overflow ">
                    <li>
                        <img src="<?php echo TU ?>/top1.png">
                        <p class="p1">Nhân dân tệ(đồng)</p>
                        <p class="p2">Số tiền: <?php echo $this->vars["money"] ?></p>
                    </li>
                    <li>
                        <img src="<?php echo TU ?>/top2.png">
                        <p class="p1">Tiền của tôi</p>
                        <p class="p2">Số dư: <?php echo $this->vars["diam"] ?></p>
                    </li>
                </ul>
            </div>
            <img class="abs" src="<?php echo TU ?>/moneybg.png">
        </div>
        <div class="pubtit ">
            <p class="selected" rel="u1"><span></span>Yêu cầu rút tiền</p>
            <p rel="u2" class=""><span></span>Lịch sử rút tiền</p>
        </div>
        <div class="part3 part overflow  part1" style="display: block;">
            <p class="notice" style="font-size:16px">Mời nhập số tiền rút</p>
            <p class="button button2 s"><input name="wallet" class="w89" placeholder="Nhập số tiền"></p>
            <p class="notice notice2">Số dư hiện tại: <span class="nowmoney"><?php echo $this->vars["money"] ?></span>Đồng<span class="fr alltixian">Rút toàn bộ</span></p>
            <ul class="overflow tx">
                <li class="selected" rel="npart1"><p class="abs"><img class="r" src="/static/img/web/select.png"></p><div><img class="z" src="./static/img/web/tx1.png"><span>Thẻ ngân hàng</span></div></li>
                <li rel="npart2"><p class="abs"><img class="r" src="/static/img/web/select.png"></p><div><img class="z" src="/static/img/web/tx2.png"><span>Ví điện tử</span></div></li>
                <li rel="npart3"><p class="abs"><img class="r" src="/static/img/web/select.png"></p><div><img class="z" src="/static/img/web/tx3.png"><span>USDT</span></div></li>
            </ul>
            <input type="hidden" name="wtype" value="bank">
            <div class="_public npart1">
                <p class="button button2 s"><input class="w89" name="bankcard" placeholder="Số thẻ ngân hàng"></p>
                <p class="button button2 s"><input class="w89" name="bankcardname" placeholder="Họ tên chủ thẻ"></p>
                <p class="button button2 s"><input class="w89" name="bankcardtype" placeholder="Biệt danh chủ thẻ"></p>
            </div>
            <div class="_public npart2 hide">
                <p class="button button2 s"><input class="w89" name="alipay" placeholder="Họ tên thật"></p>
                <p class="button button2 s"><input class="w89" name="alipayname" placeholder="Số ví điện tử"></p>
            </div>
            <div class="_public npart3 hide">
                <p class="button button2 s"><input class="w89" name="numberaddress" placeholder="Đơn vị tiền tệ (chỉ USDT-TRC20)"></p>
            </div>
            <p class="button button2 s"><input name="pass" class="w89" placeholder="Mật khẩu rút tiền"></p>
            <p class="notice notice2">Tiền rút sẽ đến trong vòng 24 giờ, nếu không nhận được, vui lòng liên hệ với bộ phận CSKH</p>
            <p class="pubbtn wallettixian">Rút tiền ngay</p>
        </div>
        <div class="part2 _part2 hide">
            <ul><?php echo $this->vars["w"] ?></ul>
        </div>
    </div>
    <p class="botom"></p>
    <script>
        $(function(){
            $('.pubtit p').click(function(){
                var rel = $(this).attr("rel");
                $('.pubtit p').attr('class','');
                $(this).attr('class','selected');
                if(rel=="u1"){
                    $('.part1').show();
                    $('.part2').hide();
                }else{
                    $('.part2').show();
                    $('.part1').hide();
                }
            });
            $('.tx li').click(function(){
                $('.tx li').attr('class','');
                $('._public').attr('style','display:none');
                var rel = $(this).attr('rel');
                rel = "."+rel;
                $(this).attr('class','selected');
                $(rel).attr('style','display:block');
                if(rel=='.npart1'){
                    $("input[name=wtype]").val("bank")
                }else if(rel=='.npart2'){
                    $("input[name=wtype]").val("alipay")
                }else if(rel=='.npart3'){
                    $("input[name=wtype]").val("number")
                }
            });
        });
    </script>

</body>

</html>
