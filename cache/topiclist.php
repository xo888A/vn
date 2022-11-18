<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title><?php echo $this->vars["name"] ?></title>
    <link rel="stylesheet" href="<?php echo CSS ?>/style.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/index.js"></script>
</head>

<body>
    <?php file::import("system-model-header"); ?>
    <div class="wrap">
        <section class="section3">
            <div class="w100 fl">
                <p class="fl img2"><img  src="<?php echo $this->vars["avatar"] ?>" /></p>
                <div class="fr w88">
                    <div class="u2  w100"><p>#<?php echo $this->vars["name"] ?></p><p class="listtype"><?php echo $this->vars["tuijian"] ?></div>
                    <p class="content"><?php echo $this->vars["num"] ?>Nội dung</p>
                    <p class="desc"><?php echo $this->vars["desces"] ?></p>
                    <div class="flex flex2">
                        <ul class="add8">
                            <li class="<?php echo $this->vars["s1"] ?>"><p class="abs"></p><a href="<?php echo INDEX ?>/index.php?mod=topiclist&id=<?php echo $this->vars["id"] ?>">Hoạt động</a></li>
                            <li class="<?php echo $this->vars["s2"] ?>"><p class="abs"></p><a href="<?php echo INDEX ?>/index.php?mod=topiclist&type=video&id=<?php echo $this->vars["id"] ?>">Video</a></li>
                            <li class="<?php echo $this->vars["s3"] ?>"><p class="abs"></p><a href="<?php echo INDEX ?>/index.php?mod=topiclist&type=organ&id=<?php echo $this->vars["id"] ?>">Cộng đồng</a></li>
                        </ul>
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
