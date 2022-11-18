<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>Danh sách Blogger</title>
    <link rel="stylesheet" type="text/css" href="../css/api.css" />
    <link rel="stylesheet" type="text/css" href="../css/swiper.css" />
    <script type="text/javascript" src="../script/jquery.js"></script>
    <script type="text/javascript" src="../script/api.js"></script>
    <script type="text/javascript" src="<?php echo JS ?>/index.js"></script>
    
    <script type="text/javascript" src="../script/swiper.js"></script>
</head>

<body>
    <?php file::import("system-model-header"); ?>
    <ul class="overflow wrap userlist">
       <?php echo $this->vars["data"] ?>
    </ul>
    <?php echo $this->vars["page"] ?>
    <p class="botom"></p>
    <?php file::import("system-model-footer"); ?>
    
</body>

</html>
