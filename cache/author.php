<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>Tác phẩm của<?php echo $this->vars["nickname"] ?></title>
    <link rel="stylesheet" href="<?php echo CSS ?>/style.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/index.js"></script>
</head>

<body>
    <?php file::import("system-model-header"); ?>
    <div class="wrap">
        <section class="section3">
            <div class="w100 fl">
                <p class="fl img"><img  src="<?php echo $this->vars["avatar"] ?>" /></p>
                <div class="fr w88">
                    <div class="u"><p><?php echo $this->vars["nickname"] ?></p><span><img class="sex" src="<?php echo TU ?>/<?php echo $this->vars["sex"] ?>.png"></span><span class="m"><img src="<?php echo TU ?>/desc.png"><?php echo $this->vars["miaoshu"] ?></span></div>
                    <p class="desc"><?php echo $this->vars["descs"] ?></p>
                    <div class="flex">
                        <ul class="addcolor">
                            <li class="<?php echo $this->vars["css1"] ?>"><p class="abs"></p><a href="<?php echo $this->vars["a1"] ?>">Toàn bộ trạng thái</a></li>
                            <li class="<?php echo $this->vars["css2"] ?>"><p class="abs"></p><a href="<?php echo $this->vars["a2"] ?>">Video</a></li>
                            <li class="<?php echo $this->vars["css3"] ?>"><p class="abs"></p><a href="<?php echo $this->vars["a3"] ?>">Cộng đồng</a></li>
                        </ul>
                        <!--<p class="fs"><span class='newfs'><?php echo $this->vars["follow"] ?></span>Người hâm mộ</p>-->
                        <!--<p class="l">|</p>-->
                        <!--<p class="fs"><span><?php echo $this->vars["count"] ?></span>Tác phẩm</p>-->
                        <p class="gz"><?php echo $this->vars["guanzhu"] ?></p>
                    </div>
                </div>
                
                <div class="clear"></div>
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

</body>

</html>
