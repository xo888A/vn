<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>Danh sách Blogger</title>
    <link rel="stylesheet" href="<?php echo CSS ?>/style.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/index.js"></script>
</head>

<body>
    <?php file::import("system-model-header"); ?>
    <div class="wrap">
        <ul class="w100 width2 userlist overflow newadd23">
            <?php echo $this->vars["data"] ?>
        </ul>
        <?php echo $this->vars["page"] ?>
        <p class="phoneshowheight"></p>
    </div>
    <?php file::import("system-model-footer"); ?>

</body>

</html>
