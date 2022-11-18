<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title><?php echo $this->vars["title"] ?></title>
    <link rel="stylesheet" type="text/css" href="../css/api.css" />
    <link rel="stylesheet" type="text/css" href="../css/swiper.css" />
    <script type="text/javascript" src="../script/jquery.js"></script>
    <script type="text/javascript" src="../script/api.js"></script>
    <script type="text/javascript" src="../script/swiper.js"></script>
    <script type="text/javascript" src="<?php echo JS ?>/index.js"></script>
    <script src="<?php echo JS ?>/flv.min.js"></script>
    <script src="<?php echo JS ?>/hls.min.js"></script>
    <script src="<?php echo JS ?>/DPlayer.min.js"></script>
    <script src="<?php echo JS ?>/copy.js"></script>
    <style>
        .tg strong{
            color:#FF7AA5;
            font-weight: normal;
        }
        .maincontent div.abs p{
            font-size:14px;
        }
        #dplayer{
            height:220px;
        }
        .scrollDiv{
            margin-left:4%;
        }
        .zj li{
            width:25%;
        }
    </style>
</head>

<body>
    <div class="rel">
        <img class="abs return  back" src="../image/left.png" />
    </div>
    <?php echo $this->vars["maincontent"] ?>

    <script>
        $(function(){
            $('.tg span').click(function(){
                $('.tg span').attr('class','');
                $(this).attr('class','selected');
                var index =$(this).index();
                if(index==0){
                    $('.part1').show();
                    $('.part2').hide();
                }else{
                    $('.part2').show();
                    $('.part1').hide();
                }
            });
        });
    </script>
    <div class="tg">
        <span class="selected"><a href="javascript:;">Video</a></span>
        <span class="p"><a href="javascript:;">Bình luận</a></span>
        <strong><?php echo $this->vars["pinglun"] ?></strong>
        <a href="<?php echo INDEX ?>/download.html" class="fr"><img src="<?php echo TU ?>/download.png">Tải APP mà không bị mất</a>
    </div>
<div class="part1">
    <div class="user rel wrap">
        <a href="<?php echo INDEX ?>/index.php?mod=author&id=<?php echo $this->vars["usertel"] ?>"><img class="avatar" src="<?php echo $this->vars["user_avatar"] ?>"></a>
        <p class="abs nicknames"><a href="<?php echo INDEX ?>/index.php?mod=author&id=<?php echo $this->vars["usertel"] ?>"><?php echo $this->vars["user_nickname"] ?></a><span class="fs"><?php echo $this->vars["user_follow"] ?></span><span class="nfs">Người hâm mộ</span></p>
        <p class="m abs"><span><?php echo $this->vars["user_descs"] ?></span></p>
        <p class="abs guanzhu"><?php echo $this->vars["guanzhu"] ?></p>
    </div>
    <div class="title wrap rel">
       
        <p><?php echo $this->vars["title"] ?></p>
    </div>
    <div class="wrap">
        <div class="video"><p class="ts"><img src="<?php echo TU ?>/a.png" /><?php echo $this->vars["time"] ?><img src="<?php echo TU ?>/b.png" class="b" /><?php echo $this->vars["look"] ?><img class="c" src="<?php echo TU ?>/c.png" /><?php echo $this->vars["like"] ?></p></div>
        <ul class="categorys overflow">
            <li class="a"><img src="../image/category.png">Chủ đề</li>
            <?php echo $this->vars["topic"] ?></ul>
    </div>

    <div class="vid-scroll">
        <div class="wrap scroll-wrap rel">
            <img class="abs titimg" src="../image/anim.png">
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
    </div>

    <div class="zj">
        <ul class="overflow">
            <li>
                <?php echo $this->vars["liked"] ?>
            </li>
           
            <li class="two">
                <img src="../image/y3.png" />
                <p><?php echo $this->vars["pinglun"] ?></p>
            </li>
            <li>
                <a href="<?php echo INDEX ?>/index.php?mod=shares">
                <img src="../image/y4.png" />
                <p>Kiếm tiền quảng cáo</p></a>
            </li>
            <li>
                <a href="<?php echo INDEX ?>/index.php?mod=shares">
                <img src="../image/y5.png" />
                <p>Chia sẻ tặng VIP</p></a>
            </li>
        </ul>
    </div>
    <p class="line"></p>
    <div class="wrap swiper">
        <p class="tit mt15"><img src="../image/xianguang.png" width="25" height="25" style="width: 25px; height: 25px;"/>Đề xuất liên quan<span class="fr resh"><img src="../image/resh.png" />Thay đổi hàng loạt</span></span></p>

        <div class="publicswiper swiper">
            <div class="swiper-wrapper reshcontent">
                <?php echo $this->vars["data"] ?>
            </div>
        </div>
    </div>
    <p class="line"></p>
    <div class="wrap">
        <p class="tit mt15"><img src="../image/hot.png" width="25" height="25" style="width: 25px; height: 25px;"/>Video Hot<span class="fr"><a  href="<?php echo INDEX ?>/index.php?mod=recommend">Thêm<img src="../image/right.png" /></a></span></p>
        <ul class="rpart overflow">
            <?php echo $this->vars["adv1"] ?>
            <?php echo $this->vars["data2"] ?>

        </ul>
    </div>
    <p class="line"></p>
 </div>   
 <div class="part2 hide">
    <div class="wrap">
        <p class="ptit">Tất cả bình luân<span><?php echo $this->vars["pinglun"] ?></span></p>
        <div class="pinglun">
            <?php echo $this->vars["cms"] ?>
        </div>
    </div>
</div>
    <p class="botom"></p>
    <div class='fix win hide'>
                <div class='w rel'>
                    <img src='<?php echo TU ?>/close.png' class='closealert abs' />
                    <div class='padding'>
                        <p class='t'>Chi tiết đã xem mỗi ngày</p>
                        <table class="ntable">
                            <?php echo $this->vars["table"] ?>
                        </table>
                        <a href='<?php echo INDEX ?>/index.php?mod=vip' class='d' style="margin:15px auto 0">Nâng cấp VIP</a>
                    </div>
                </div>
            </div>
            
             <div class='fix win2 hide'>
                <div class='w rel'>
                    <img src='<?php echo TU ?>/close.png' class='closealert abs' />
                    <div class='padding'>
                        <p class='t'>Chi tiết đã tải mỗi ngày</p>
                        <table class="ntable">
                            <?php echo $this->vars["table2"] ?>
                        </table>
                        <a href='<?php echo INDEX ?>/index.php?mod=vip' class='d' style="margin:15px auto 0">Nâng cấp VIP</a>
                    </div>
                </div>
            </div>
    <footer class="fix w100  phonefix">
        <div contentEditable="<?php echo $this->vars["notlogins"] ?>"  name="textarea" class="textarea">
            <?php echo $this->vars["notlogin"] ?>
        </div>
        <div class="bq ">
                <div><p class="control" rel="1"><img class="b c" src="<?php echo TU ?>/b1.png" /></p><a postid='<?php echo $this->vars["id"] ?>' class="fr fabiao" href="javascript:;" tel2='' commentid=''>Bình luận</a></div>
            </div>
    </footer>
    <div class="biaoqing hide">
        <p class="biaoqingindex" style="margin-bottom: 4px;"><a class="biaoqing1" href="javascript:;">Biểu cảm</a></p>
        <ul class="overflow biaoqing2">
            <?php echo $this->vars["biaoqing"] ?>
        </ul>
       
    </div>
    <?php echo $this->vars["js"] ?>
    <script>
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
             $('.title img.abs').click(function(){
                var src = $(this).attr('src');
                if(src=="../image/x.png"){
                    $(this).attr('src',"../image/s.png");
                    $('.title p').attr('style',"");
                }else{
                    $(this).attr('src',"../image/x.png");
                    $('.title p').attr('style',"height:auto");
                }
                 
                 
             });
           
        	$('.resh').click(function(){
                $.ajax({url:"<?php echo INDEX ?>/webajax.php?mod=resh&type=phone",success:function(data){
                    $(".reshcontent").html(data);
                }});
            });
            $('.openinstro').click(function(){
                $('.win').show();
            });
         });
    </script>
    <script>
        $(function(){
            
            $('.control').click(function(){
               
                var rel = $(this).attr('rel');
                rel = parseInt(rel);
                if(rel==1){
                    $('.c.b').attr('src',"<?php echo TU ?>/b2.png");
                    $('.biaoqing').show();
                    $(this).attr('rel',0);
                }else{
                    $('.c.b').attr('src',"<?php echo TU ?>/b1.png");
                    $('.biaoqing').hide();
                    $(this).attr('rel',1);
                }
            });
            $('.two').click(function(){
                        $('.tg span').attr('class','');
                    $('.tg span:nth-child(2)').attr('class','selected');
                    $('.part2').show();
                        $('.part1').hide();
                    });
          
        });

    </script>
</body>

</html>
