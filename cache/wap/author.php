<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title><?php echo $this->vars["nickname"] ?>Tác phẩm của</title>
    <link rel="stylesheet" type="text/css" href="../css/api.css" />
    <link rel="stylesheet" type="text/css" href="../css/swiper.css" />
    <link rel="stylesheet" type="text/css" href="../css/swiper.css" />
    <script type="text/javascript" src="../script/jquery.js"></script>
    <script type="text/javascript" src="../script/api.js"></script>
    <script type="text/javascript" src="<?php echo JS ?>/index.js"></script>
    <script type="text/javascript" src="../script/swiper.js"></script>
    <style>
        .followuser{
            z-index:9999
        }
        li .avatar{
            display:none
        }
        header p.fr{
                margin: 17px 10px 0 0;
        }
        .followuser{
            padding: 5px 30px !important; 
        }
        .left1,.left2 {
            width: 35% !important;
        }
        .left1 p:nth-child(2),.left2 p:nth-child(2){
            font-size:12px !important
        }
    </style>
    <style>
        .hide{
            display: none !important;
        }
        header{
            position: fixed;
            left:0;top:0;
            width: 100%;
            z-index: 1000;
            height:60px;
        }
        .newadds{
            position: fixed;left:0;top:53px;bottom:initial;z-index: 999999;
        }
        header .h_avatar{
            width: 40px;height: 40px;border-radius: 50%;
            margin: 7px 0 0 45px;
            display: none;
        }
        .h_p{
            display: inline-block;
             color:#fff;
             vertical-align: middle;
            margin: 10px 0 0 15px;
        }
        header p{
            display: none !important
        }
        .maincontent div.abs, .buy-wrap div.abs{
            width:89%;
        }
    </style>
    <script>
        $(function(){
            $(window).scroll(function(){
                var top = $(document).scrollTop();
                if(top>=172){
                    var top = $('.flextop').offset().top;
                    $('.flextop').addClass('newadds');
                    $('header').attr('style',"background:#3f3a3b;");
                    $('.h_avatar,header p').attr('style',"display:inline-block !important");
                }else{
                    $('.flextop').removeClass('newadds');
                    $('header').attr('style','color:#fff;background:transition');
                    $('.h_avatar,header p').attr('style',"display:none !important");
                }
            });
        });
    </script>
</head>

<body>
    <header>
        <img   class="abs return back" src="../image/left.png" />
        <img class="h_avatar " src="<?php echo $this->vars["avatar"] ?>" />
        <p  class="h_p "><?php echo $this->vars["nickname"] ?></p>
        <p class="fr "><?php echo $this->vars["guanzhu"] ?></p>
    </header>
    <div class="maincontent rel">
       
        <div class="rel h100">
            <img class="w100 h100" style="height: 250px;" src="<?php echo $this->vars["cover"] ?>">
            <div class="mask"></div>
            <div class="avatar abs left">
                <img class="avatar" src="<?php echo $this->vars["avatar"] ?>" />
                <div class="div1 abs left1">
                    <p><?php echo $this->vars["follow"] ?></p>
                    <p>Người hâm mộ</p>
                </div>
                <div class="div2 abs left2">
                    <p><?php echo $this->vars["count"] ?></p>
                    <p>Tác phẩm</p>
                </div>
            </div>
            <div class="abs msg">
                <p class="p1"><?php echo $this->vars["nickname"] ?><span><img class="sex" src="<?php echo TU ?>/<?php echo $this->vars["sex"] ?>.png"></span><span class="m"><img src="<?php echo $this->vars["tu"] ?>/desc.png"><?php echo $this->vars["miaoshu"] ?></span></p>
                <p class="p2"><?php echo $this->vars["descs"] ?></p>
            </div>
            <?php echo $this->vars["guanzhu"] ?>
            <div class="flex flextop">
                <ul class="publictag">
                    <li class="<?php echo $this->vars["css1"] ?>"><p></p><a href="<?php echo $this->vars["a1"] ?>">Tất cả tin tức</a></li>
                    <li class="<?php echo $this->vars["css2"] ?>"><p></p><a href="<?php echo $this->vars["a2"] ?>">Video</a></li>
                    <li class="<?php echo $this->vars["css3"] ?>"><p></p><a href="<?php echo $this->vars["a3"] ?>">Cộng đồng</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <ul class="publicul" style="margin-top:8%">
        <?php echo $this->vars["data"] ?>
    </ul><?php echo $this->vars["page"] ?>
    <p class="botom"></p>
    <footer class="fix w100">
        <ul class="overflow">
            <li class="selected">
                <a href="./index.php?mod=index">
                <img src="../image/a1_.png" />
                <p>Trang chủ</p></a>
            </li>
            <li>
                <a href="./index.php?mod=videolist">
                <img src="../image/a2.png" />
                <p>Video</p></a>
            </li>
            <li>
                <a href="./index.php?mod=download">
                <img src="../image/a3.png" />
                <p>Tải xuống</p></a>
            </li>
            <li>
                <a href="./index.php?mod=organlist">
                <img src="../image/a4.png" />
                <p>Cộng đồng</p></a>
            </li>
            <li>
                <a href="./index.php?mod=user">
                <img src="../image/a5.png" />
                <p>Tôi</p></a>
            </li>
        </ul>
    </footer>
    <script>
        var swiper = new Swiper(".swiperlb", {
            slidesPerView: 'auto',
            observer:true,
            observeParents:true,
            freeMode : true,
            freeModeFluid : true,
            spaceBetween: 10,
         });
    </script>
</body>

</html>
