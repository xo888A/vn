<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>Blogger·Cộng đồng</title>
    <link rel="stylesheet" type="text/css" href="../css/api.css" />

    <link rel="stylesheet" type="text/css" href="../css/swiper.css" />
    <script type="text/javascript" src="../script/jquery.js"></script>
    <script type="text/javascript" src="../script/api.js"></script>
    <script type="text/javascript" src="../script/swiper.js"></script>


</head>

<body>
    <?php file::import("system-model-header"); ?>
    <div class="index  wrap overflow swiper">
        <div class="swiper-wrapper">
            <?php echo $this->vars["adv1"] ?>
        </div>
        <div class="i swiper-pagination"></div>
    </div>
 <?php echo $this->vars["newadd"] ?>
    <div class="wrap scroll-wrap rel">
        <img class="abs titimg" src="../image/toutiao.png">
        <div class="scroll">
                <div class="scrollDiv" id="s1">
                    <ul class="scrollDiv adv4">
                      <?php echo $this->vars["adv4"] ?>
                    </ul>
                  </div>
                  <script type="text/javascript">
                        function AutoScroll(obj) {
                            $(obj).find("ul.scrollDiv").animate({
                                marginTop: "-23px"
                            }, 500, function() {
                                $(this).css({
                                    marginTop: "0px"
                                }).find("li:first").appendTo(this);
                            });
                        }
                        $(document).ready(function() {
                            setInterval('AutoScroll("#s1")', 3000);
                        });
                </script>
            </div>
    </div>
   <div class="wrap">
        <div class="index-adv  overflow adv3" style="margin-top:20px">
            <p>
                <a href='<?php echo INDEX ?>/index.php?mod=type'><img src='../image/huati.jpg' /></a>
                <span>Chủ đề đang hot</span>
            </p><p>
                <a href='<?php echo INDEX ?>/index.php?mod=shares' ><img src='../image/paihangbang.jpg' /></a>
                <span>Kiếm tiền bằng quảng cáo</span>
            </p><p>
                <a href='<?php echo INDEX ?>/index.php?mod=customer' ><img src='../image/jinpaizuozhe.jpg' /></a>
                <span>Trung tâm CSKH</span>
            </p><p>
                <a href='<?php echo INDEX ?>/index.php?mod=app'><img src='../image/jinzhanbikan.jpg' /></a>
                <span>Đề xuất của APP</span>
            </p>
        </div>
    </div>
    <p class="line"></p>


    <div class="wrap swiper">
        <p class="tit mt15"><img src="../image/cai.png" width="25" height="25" style="width: 25px; height: 25px;"/>Mời bạn yêu thích<span class="fr resh"><img src="../image/resh.png" />Thay đổi hàng loạt</span></p>
        <div class="publicswiper swiper">
            <div class="swiper-wrapper reshcontent">
                <?php echo $this->vars["data1"] ?>
            </div>
        </div>
    </div>
    <p class="line"></p>
    <div class="wrap swiper">
        <p class="tit mt15"><img src="../image/hot.png" width="25" height="25" style="width: 25px; height: 25px;"/>Đang phát trực tiếp<span class="fr"><a href="<?php echo INDEX ?>/index.php?mod=type">Thêm<img src="../image/right.png" /></a></span></p>
        <div class="publicswiper swiper">
            <div class="swiper-wrapper">
                <?php echo $this->vars["data2"] ?>

            </div>
        </div>
    </div>
    <p class="line"></p>

    <?php echo $this->vars["tuijian"] ?>
    <p class="botom"></p>
    <?php file::import("system-model-footer"); ?>
    <script>
        var swiper = new Swiper('.index', {
          pagination: {
            el: '.i.swiper-pagination',
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
 
            $('.menu').click(function(){
                $('.list').show();
            });
            $('.closecategory').click(function(){
                $('.list').hide();
            });
        });
        var swiper = new Swiper(".publicswiper", {
            slidesPerView: 'auto',
            grid: {
                rows: 2,
            },
            observer:true,
            observeParents:true,
            freeMode : true,
            freeModeFluid : true,
            spaceBetween: 10,
         });
        $(function(){
            $('.resh').click(function(){
                $.ajax({url:"<?php echo INDEX ?>/webajax.php?mod=resh&type=phone",success:function(data){
                    $(".reshcontent").html(data);
                }});
            });

        });
    </script>
</body>

</html>
