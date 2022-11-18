<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>Thông tin của App</title>
    <link rel="stylesheet" type="text/css" href="../css/api.css" />
    <script type="text/javascript" src="../script/jquery.js"></script>
    <script type="text/javascript" src="../script/api.js"></script>
    <style>
        .message2 img{
            max-width: 100%;
        }
    </style>
</head>

<body>
    <?php file::import("system-model-top"); ?>
    <div class="wrap  mt70">
        <ul class="overflow message width1">
            <li>
                <a href="<?php echo INDEX ?>/index.php?mod=message&type=平台通知">
                <img src="<?php echo TU ?>/msg1.png">
                <p>Thông báo của App</p>
                </a>
            </li>
            <li>
                <a href="<?php echo INDEX ?>/index.php?mod=message&type=官方消息">
                <img src="<?php echo TU ?>/msg2.png">
                <p>Thông tin chính thức</p>
                </a>
            </li>
      
            <li>
                <a href="<?php echo INDEX ?>/index.php?mod=activity">
                <img src="<?php echo TU ?>/msg4.png">
                <p>Hoạt động chính thức</p>
                </a>
            </li>
            <li>
                <a href="<?php echo INDEX ?>/index.php?mod=app">
                <img src="<?php echo TU ?>/msg5.png">
                <p>Đề xuất của <br />APP</p>
                </a>
            </li>
        </ul>
        <ul class="overflow ulli2 message2">
            <?php echo $this->vars["data"] ?></ul>
            <?php echo $this->vars["page"] ?>
    </div>
</body>

</html>
