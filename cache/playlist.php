<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>Lựa chọn cách chơi</title>
    <link rel="stylesheet" href="<?php echo CSS ?>/style.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/index.js"></script>
    <style>
        .playlist{
            margin-top: 50px;
        }
        .playlist li{
            float:left;
            margin-right:1%;
            width:9%;
            text-align: center;
            margin-bottom: 15px;
        }
        .playlist li:nth-child(10n){
            margin-right:0;
        }
        .playlist li img{
            width:100px;
            margin:0 auto;
            height:100px;
            border-radius: 7px;
        }
        .playlist li p{
            font-size:15px;
            margin-top:5px;
            padding: 0 14px;
        }
    </style>
</head>

<body>
    <?php file::import("system-model-header"); ?>
    <div class="wrap">
        <div class="section3">
        <div class="flex">
                <ul class=" margin ranksoll">
                    <li class=""><p class="abs"></p><a href="<?php echo INDEX ?>/index.php?mod=selectuser">Blogger nổi bật</a></li>
                    <li class=""><p class="abs"></p><a href="<?php echo INDEX ?>/index.php?mod=typelist">Lưu trữ chủ đề</a></li>
                    <li class="selected"><p class="abs"></p><a href="<?php echo INDEX ?>/index.php?mod=playlist">Lựa chọn cách chơi</a></li>                </ul>
            </div>
        </div>
        <ul class="overflow playlist">
            <?php echo $this->vars["data"] ?>
        </ul>
       
    </div>
    <?php file::import("system-model-footer"); ?>

</body>

</html>
