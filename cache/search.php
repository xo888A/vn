<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>Tìm kiếm</title>
    <link rel="stylesheet" href="<?php echo CSS ?>/style.css" />
    <link rel="stylesheet" href="<?php echo CSS ?>/swiper-bundle.min.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/swiper-bundle.min.js"></script>
    <script src="<?php echo JS ?>/index.js"></script>
</head>

<body>
    <?php file::import("system-model-header"); ?>
    <div class="wrap">
        <section class="section3" >
            <div class="flex flex2">
                <?php echo $this->vars["ul"] ?>   
            </div>
        </section>
        <section class="public">
            <ul class="useradd overflow width1">
                <?php echo $this->vars["data"] ?>

            </ul>
            <?php echo $this->vars["page"] ?>
            <div class="clear"></div>
        </section>
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
