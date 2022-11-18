<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>Tìm kiếm</title>
    <link rel="stylesheet" type="text/css" href="../css/api.css" />
    <script type="text/javascript" src="../script/jquery.js"></script>
    <script type="text/javascript" src="../script/api.js"></script>
    <style>
        .publictag{
            margin:0 auto;
        }
      
        .add8.publictag a{
            font-size:14px;
        }
 
    </style>
</head>

<body>
    <?php file::import("system-model-top"); ?>
    <div class="wrap">
        <section class="section3 mt70" >
            <div class="flex flex2">
                <?php echo $this->vars["ul"] ?>   
            </div>
        </section>
        <section class="public">
            <ul class="useradd overflow width1 ">
                <?php echo $this->vars["data"] ?>

            </ul>
            
            <div class="clear"></div>
        </section><?php echo $this->vars["page"] ?>
    </div>
    <p class="botom"></p>
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
