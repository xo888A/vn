<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>Cộng đồng Blogger</title>
    <link rel="stylesheet" href="<?php echo CSS ?>/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?php echo CSS ?>/style.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/swiper-bundle.min.js"></script>
    <script src="<?php echo JS ?>/index.js"></script>

</head>

<body>
    <?php file::import("system-model-header"); ?>
    <div class="wrap">
        <section class="section1">
            <div class="fl overimg">
                <div class="main swiper-container h100">
                    <div class="swiper-wrapper">
                        <?php echo $this->vars["adv1"] ?>
                    </div>
                    <div class="m swiper-pagination"></div>
                </div>
            </div>
            <div class="fl advs phonehide">
  
                <div  class="overflow">
                    <?php echo $this->vars["adv2"] ?>
                </div>
   
            </div>
            <div class="rel hide phoneshow">
                <img class="abs lbimg" src="<?php echo IMG ?>/toutiao.png" />
                <div class="lb">
                    <ul class="lunbo  hide phoneshow">
                        <li>
                            <a href="">Cuộn lên và xuống</a>
                        </li>
                        <li>
                            <a href="">Cuộn lên và xuống</a>
                        </li>
                        <li>
                            <a href="">Cuộn lên và xuống</a>
                        </li>
                        <li>
                            <a href="">Cuộn lên và xuống</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="fr cusname">
                <div class="overflow">
                    <?php echo $this->vars["adv3"] ?>
                </div>
            </div>
            <div class="clear"></div>
        </section>
        <section class="public">
            <p class="tit">Mời yêu thích<a href="javascript:;" class="fr resh"><img src="<?php echo TU ?>/resh.png" />Thay đổi hàng loạt</a></p>
            <ul class="overflow width1 reshcontent">
                <?php echo $this->vars["data1"] ?>
            </ul>
        </section>
        <section class="public">
            <p class="tit">Đang phát trực tiếp<span class="fr"><a href="<?php echo INDEX ?>/index.php?mod=type">Thêm<img src="../image/right.png" /></a></span></p>
            <ul class="overflow width1">
                <?php echo $this->vars["data2"] ?>
            </ul>
        </section>
        <?php echo $this->vars["tuijian"] ?>
        <p class="line"></p>
    </div>
    <?php file::import("system-model-footer"); ?>
    <script>
        var swiper = new Swiper('.main', {
          pagination: {
            el: '.m.swiper-pagination',
          },
          direction:'horizontal',
          loop: true,
          autoplay:true,
          speed:1000,
        });
        var swiper = new Swiper(".indexadv", {
            observer:true,
             observeParents:true,
             slidesPerView: 'auto',
             freeMode : true,
             freeModeFluid : true,
             spaceBetween: 10,
         });
         $(function(){
        	$('.resh').click(function(){
                $.ajax({url:"<?php echo INDEX ?>/webajax.php?mod=resh&type=all",success:function(data){
                    $(".reshcontent").html(data);
                }});
            });
        });
    </script>
</body>

</html>
