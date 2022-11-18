<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>Gợi ý quản trị viên cho trang</title>
    <link rel="stylesheet" href="<?php echo CSS ?>/style.css" />
    <link rel="stylesheet" href="<?php echo CSS ?>/swiper-bundle.min.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/swiper-bundle.min.js"></script>
    <script src="<?php echo JS ?>/index.js"></script>
</head>

<body>
    <?php file::import("system-model-header"); ?>
    <div class="wrap">
        <section class="section2">
            <div class="fl  h100" style="width:60%">
                <div class='toplistl fl h100' >
                    <div class="swiper-container h100 ">
                        <div class="swiper-wrapper">
                            <?php echo $this->vars["adv1"] ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="toplistr fr h100" >
                    <?php echo $this->vars["adv2"] ?>
                </div>
                <div class="clear"></div>
            </div>
            <div class="fr  h100" style="width:40%">
                <div class="wrapr">
                    <ul class="overflow newadd">
                        <?php echo $this->vars["tjc"] ?>
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
        </section>
        <section class="public">
            <ul class="useradd overflow width1">
                <?php echo $this->vars["data"] ?>
            </ul>
            <?php echo $this->vars["page"] ?>
            <div class="clear"></div>
        </section>
        <p class="line"></p>
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
        
    </script>
</body>

</html>
