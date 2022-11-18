<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title><?php echo $this->vars["name"] ?></title>
    <link rel="stylesheet" type="text/css" href="../css/api.css" />
    <link rel="stylesheet" type="text/css" href="../css/swiper.css" />
    <link rel="stylesheet" type="text/css" href="../css/swiper.css" />
    <script type="text/javascript" src="../script/jquery.js"></script>
    <script type="text/javascript" src="../script/api.js"></script>
    <script type="text/javascript" src="../script/swiper.js"></script>
    <style>
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
    </style>
    <script>
        $(function(){
            $(window).scroll(function(){
                var top = $(document).scrollTop();
                if(top>=172){
                    var top = $('.flextop').offset().top;
                    $('.flextop').addClass('newadds');
                    $('header').attr('style',"background: #FF7AA5;");
     
                }else{
                    $('.flextop').removeClass('newadds');
                    $('header').attr('style','color:#fff;background:transition');
            
                }
            });
        });
    </script>
</head>

<body>
    <header>
        <p class="abs maintit">#<?php echo $this->vars["name"] ?></p>
        <img   class="abs return back" src="../image/left.png" />
    </header>
    <div class="maincontent rel">
        
        <!--<img class="abs menu_" src="../image/menu_.png" />-->
        <div class="rel h100">
            <img class="w100 h100"  style="height: 247px;" src="<?php echo $this->vars["beijingtu"] ?>">
            <div class="mask"></div>
            <div class="typecontent abs">
                <img src="<?php echo $this->vars["avatar"] ?>" />
                <div>
                    <p class="overhid"><?php echo $this->vars["num"] ?>Nội dung</p>
                    <p class="desc"><?php echo $this->vars["desces"] ?></p>
                </div>
                <div class="swiper wrap overflow  swiperlb">
                    <div class="swiper-wrapper">
                        
                        <?php echo $this->vars["tuijian"] ?>
                    </div>
                </div>
            </div>
            <div class="flex flextop">
                <ul class="publictag">
                    <li class="<?php echo $this->vars["s1"] ?>"><p></p><a href="<?php echo INDEX ?>/index.php?mod=topiclist&id=<?php echo $this->vars["id"] ?>">Toàn bộ hoạt động</a></li>
                    <li class="<?php echo $this->vars["s2"] ?>"><p></p><a href="<?php echo INDEX ?>/index.php?mod=topiclist&type=video&id=<?php echo $this->vars["id"] ?>">Video</a></li>
                    <li class="<?php echo $this->vars["s3"] ?>"><p></p><a href="<?php echo INDEX ?>/index.php?mod=topiclist&type=organ&id=<?php echo $this->vars["id"] ?>">Cộng đồng</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <ul class="publicul mp10">
        <?php echo $this->vars["data"] ?>
    </ul>
    <?php echo $this->vars["page"] ?>
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
                <p>Video ngắn</p></a>
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
