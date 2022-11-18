<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>Phần chủ đề</title>
    <link rel="stylesheet" href="<?php echo CSS ?>/style.css" />
    <link rel="stylesheet" href="<?php echo CSS ?>/swiper-bundle.min.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/swiper-bundle.min.js"></script>
    <script src="<?php echo JS ?>/index.js"></script>
</head>

<body>
    <?php file::import("system-model-header"); ?>
    <div class="wrap">
        <section class="section2 p">
            <div class="fl h100 w60" >
                <div class='toplistl fl h100' >
                    <div class="swiper-container h100 ">
                        <div class="swiper-wrapper">
                            <?php echo $this->vars["adv1"] ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="toplistr fr h100">
                    <?php echo $this->vars["adv2"] ?>
                </div>
                <div class="clear"></div>
            </div>
<div class="clear hide phoneshow"></div>
<div class="swiper indexadv phoneshow  hide">
  <div class="swiper-wrapper">
   <?php echo $this->vars["adv4"] ?>
  </div>
</div>
            <div class="fr h100 w40" >
                <div class="wrapr">
                    <ul class="overflow">
                        <?php echo $this->vars["tje"] ?>
                        
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
        </section><div class="clear hide phoneshow"></div>
        <?php echo $this->vars["tuijian"] ?>
    </div>
    
    <?php file::import("system-model-footer"); ?>
    <script>
        var swiper = new Swiper('.swiper-container', {
          pagination: {
            el: '.swiper-pagination',
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