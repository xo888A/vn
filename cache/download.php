<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>Tải xuống</title>
    <link rel="stylesheet" href="<?php echo CSS ?>/style.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/index.js"></script>
    <style>
        .wrap img{
            max-width: 100%;
        }
        .dd{
            
            top: 9%;
            right: 25%;
            
        }
        .dd div{
            color: #000;
            border-radius: 10px;
            text-align: center;
        }
        .qrcode  img{
            width: 170px;
    height: 170px;

        }
        .qrcode{
            border-radius: 10px;
            background: #fff;
    width: 170px;
    padding: 20px;
    margin: 0 auto;
        }
        .p1{
            line-height: 35px;
            color: #fff;
            font-size: 50px;
            font-weight: bold;
            text-shadow: 2px 2px #cbc1c1;
            margin-bottom: 24px;
        }
        .p2{
                color: #fff;
    font-size: 26px;
    text-shadow: 2px 2px #cbc1c1;
    margin-bottom: 24px;
        }
        .s{
            background: #fff;
    width: 170px;
    margin: 0 auto;
    padding: 20px;
    margin-top: -30px;
    border-radius: 10px;
        }
    </style>
</head>

<body>
    <?php file::import("system-model-header"); ?>
    <div class="dowmload rel">
        
        <div class="abs dd">
            <p class="p1">Tải xuống ứng dụng</p>
            <p class="p2">Nhanh hơn, dễ dàng và mượt mà hơn~</p>
            <div>
                <p class="qrcode"><img src="<?php echo INDEX ?>/index.php?mod=qrcode" /></p>
            <p class="s">Quét mã điện thoại để tải xuống ứng dụng</p>
            </div>
        </div>
        <img class="w100" src="<?php echo TU ?>/appbg-pc.jpg" />
        <div class="phone center" style="margin-top:20px">
            <p class="selected" rel="android"><span></span>Hướng dẫn cài đặt Android</p>
            <p rel="ios"><span></span>hướng dẫn cài đặt iPhone</p>
        </div>
        <div class="wrap">
            <div class="android">
                <?php echo $this->vars["android"] ?>
            </div>
            <div class="ios hide">
                <?php echo $this->vars["ios"] ?>
            </div>
        </div>
    </div>
    <?php file::import("system-model-footer"); ?>
    <script>
        $(function(){
            $('.phone p').click(function(){
                var rel = $(this).attr('rel');
                $('.phone p').attr('class','');
                $(this).addClass('selected');
                if(rel=='android'){
                    $('.android').show();
                    $('.ios').hide();
                }else{
                    $('.android').hide();
                    $('.ios').show();
                }
                
            });
        });
    </script>
</body>

</html>
