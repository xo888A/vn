<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>Phần chủ đề</title>
    <link rel="stylesheet" type="text/css" href="../css/api.css" />
    <link rel="stylesheet" type="text/css" href="../css/swiper.css" />
    <script type="text/javascript" src="../script/jquery.js"></script>
    <script type="text/javascript" src="../script/api.js"></script>
    
    <script type="text/javascript" src="../script/swiper.js"></script>
    <style>
        .adv10 li img{
            border-radius: 20px;
        }
    </style>
</head>

<body>
    <?php file::import("system-model-header"); ?>
    <div class="index  wrap overflow swiper">
        <div class="swiper-wrapper">
            <?php echo $this->vars["adv1"] ?>
        </div>
        <div class="i swiper-pagination"></div>
    </div>
    
    <p class="line"></p>
   
    <?php echo $this->vars["tuijian"] ?>
    <p class="botom"></p>
    <?php file::import("system-model-footer"); ?>
    <script>
        var swiper = new Swiper('.index', {
          pagination: {
            el: '.i.swiper-pagination',
          },
          direction:'horizontal',
          loop: true,
          autoplay:true,
          speed:1000,
        });
        var swiper = new Swiper(".indexadv", {
            observer:true,
             observeParents:true,
             slidesPerView: 'auto',
             freeMode : true,
             freeModeFluid : true,
             spaceBetween: 10,
         });
    </script>
</body>

</html>
