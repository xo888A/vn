<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>Hot Blogger</title>
    <link rel="stylesheet" type="text/css" href="../css/api.css" />
    <script type="text/javascript" src="../script/jquery.js"></script>
    <script type="text/javascript" src="../script/api.js"></script>
    <script type="text/javascript" src="<?php echo JS ?>/index.js"></script>
    <style>
        .selectuser{
            margin-top: 70px;
        }
        .selectuser li{
            float:left;
            width:23.5%;
            margin-right: 2%;
            text-align: center;
            margin-bottom: 15px;
        }
        .selectuser li div{
           width: 100%;
            padding-top: 100%;
            position: relative;
        }
        .selectuser li:nth-child(4n){
            margin-right:0;
        }
        .selectuser li img{
            position: absolute;
            left:0;top:0;
           width:100%;
           height: 100%;
           border-radius: 50%;
        }
        .selectuser li p{
            font-size: 14px;
            margin-top:5px;
        }
        
        
        .topul{
            margin-left: 20%;
        }
        .topul li{
            width: auto  !important;
            margin-right: 3% !important;
            position: relative;
        }
         .topul li a{
            font-weight: normal !important;   
         }
        .topul li.selected a{
            font-weight: bold !important;
        }
        .topul li.selected p{
            font-weight: bold;
            position: absolute;
            background: #FF7AA5;
            height: 5px;
            width: 50%;
            border-radius: 10px;
            top: 42px;
            left: 24.5%;
        }
    </style>
</head>

<body>
    <header class="public ls">
        <img class="abs left back" src="../image/left_.png">
        <ul class="topul overflow">
            <li class="selected"><p class="abs"></p><a href="<?php echo INDEX ?>/index.php?mod=selectuser">Hot Blogger</a></li>
            <li class=""><p class="abs"></p><a href="<?php echo INDEX ?>/index.php?mod=typelist">Ch??? ????? l??u tr??? </a></li>
            <li class=""><p class="abs"></p><a href="<?php echo INDEX ?>/index.php?mod=playlist">Ch???n c??ch ch??i</a></li>
        </ul>
        <p class="center"></p>
</header>
    <!--<div class="flex mt50">-->
    <!--    <ul class="publictag">-->
    <!--        <li class="selected"><p class="abs"></p><a href="<?php echo INDEX ?>/index.php?mod=selectuser">????????????</a></li>-->
    <!--        <li class=""><p class="abs"></p><a href="<?php echo INDEX ?>/index.php?mod=typelist">????????????</a></li>-->
    <!--        <li class=""><p class="abs"></p><a href="<?php echo INDEX ?>/index.php?mod=playlist">????????????</a></li>-->
    <!--    </ul>-->
    <!--</div>-->
    <ul class="overflow selectuser wrap">
            <?php echo $this->vars["data"] ?>
            
        </ul>
    <p class="botom"></p>

</body>

</html>
