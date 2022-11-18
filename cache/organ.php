<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title><?php echo $this->vars["title"] ?></title>
    <meta name="keywords" content="Từ khóa" />
    <meta name="description" content="Mô tả trang" />
    <link rel="stylesheet" href="<?php echo CSS ?>/style.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/index.js"></script>
    <script src="<?php echo JS ?>/copy.js"></script>
   <style>
       .user.rel .m .n{
            display: none;
        }
   </style>
</head>

<body>
    <?php file::import("system-model-header"); ?>
    <div class="wrap">
        <div class="video">
            <div class="fl organ">
                
                <div class="user rel">
                    <a href="<?php echo INDEX ?>/index.php?mod=author&id=<?php echo $this->vars["usertel"] ?>"><img class="avatar" src="<?php echo $this->vars["user_avatar"] ?>" /></a>
                    <p class="abs nicknames"><a href="<?php echo INDEX ?>/index.php?mod=author&id=<?php echo $this->vars["usertel"] ?>"><?php echo $this->vars["user_nickname"] ?></a><img class="sex" src="<?php echo TU ?>/<?php echo $this->vars["user_sex"] ?>.png"></p>
                    <p class="m abs"><span class="n"><?php echo $this->vars["user_follow"] ?> Phiên bản</span><span><?php echo $this->vars["user_descs"] ?></span></p>
                    <p class="abs guanzhu"><?php echo $this->vars["guanzhu"] ?></p>
                </div>
                <h3><?php echo $this->vars["title"] ?></h3>
                <p class="ts"><img src="<?php echo TU ?>/a.png" /><?php echo $this->vars["time"] ?><img src="<?php echo TU ?>/b.png" class="b" /><?php echo $this->vars["look"] ?><img class="c" src="<?php echo TU ?>/c.png" /><?php echo $this->vars["like"] ?></p>
                <ul class="category overflow">
                    <li class="a"><img src="<?php echo TU ?>/category.png">Chủ đề</li>
                    <?php echo $this->vars["topic"] ?>
                </ul>
                <p class="line" style="margin-bottom:30px"></p>
                <div class="imgcontent">
                    <?php echo $this->vars["imgcontent"] ?>
                </div>
                <div class="rel gl center">
                    <div class="line"></div>
                    <p>Nếu các bạn thích thì hãy like, theo dõi và động viên nhé!</p>
                </div>
                <div class="bts overflow">
                    <div><?php echo $this->vars["liked"] ?></div>
                    <!--<div><a href="javascript:;" class="godown" rel='<?php echo $this->vars["rel"] ?>'><img class="m2" src="<?php echo TU ?>/m2.png" /><span>Tải về</span></a></div>-->
                    <div><a href="<?php echo INDEX ?>/index.php?mod=shares"><img class="m3" src="<?php echo TU ?>/m3.png" /><span>Quảng cáo kiếm tiền</span></a></div>
                    <div><a href="<?php echo INDEX ?>/index.php?mod=shares"><img class="m4" src="<?php echo TU ?>/m4.png" /><span>Chia sẻ tặng VIP</span></a></div>
                </div>
                <section class="public">
                    <p class="tit">Gợi ý tương quan<a href="javascript:;" class="fr resh"><img src="<?php echo TU ?>/resh.png" />Thay đổi hàng loạt</a></p>
                    <ul class="overflow width2 reshcontent">
                        <?php echo $this->vars["data"] ?>
                    </ul>
                </section>
    
                
                <div contentEditable="<?php echo $this->vars["notlogins"] ?>"  name="textarea" class="textarea">
                    <?php echo $this->vars["notlogin"] ?>
                </div>
                <div class="bq rel">
                    <div><p class="control" rel="1"><img class="b c" src="<?php echo TU ?>/b1.png" />Biểu cảm</p><a postid='<?php echo $this->vars["id"] ?>'  class="fr fabiao" href="javascript:;">Bình luận</a></div>
                    <div class="biaoqing abs hide" >
                        <p class="index" style="margin-bottom: 4px;"><a class="biaoqing1" href="javascript:;">Biểu cảm</a></p>
                        <ul class="overflow biaoqing2">
                            <?php echo $this->vars["biaoqing"] ?>
                        </ul>
                       
                    </div>
                </div>
                <p class="ptit">Tất cả bình luận<span><?php echo $this->vars["pinglun"] ?></span></p>
                <div class="pinglun">
                 
                    
                    <?php echo $this->vars["cms"] ?>
                    
                </div>
                
            </div>
            <div class="fr">
                <div class="form" <?php echo $this->vars["reg"] ?>>
                    <div class="w">
                        <p class="b">10 giây đăng ký nhanh</p>
                        <input placeholder="Cài đặt tài khoản" name="tel" minlength="5" maxlength="11" />
                        <p class="s">Có thể điền số điện thoại di động hoặc số tài khoản kỹ thuật số thuần túy</p>
                        <input name="pass" minlength="5" maxlength="11" placeholder="Cài đặt mật khẩu" />
                        <input name="passt" minlength="5" maxlength="11" placeholder="Xác nhận mật khẩu" />
                        <div class="overflow"><a href="javascript:;" class="r _reg" rel="regs">Đăng ký</a><a class="l" href="<?php echo INDEX ?>/login.html">Đăng nhập</a></div>
                    </div>
                </div>
                <p class="rtit">Bài đăng phổ biến<a class="more" href="<?php echo INDEX ?>/index.php?mod=rank">Thêm<img style="height: 26px;" src="../image/right.png"></a></p>
                <ul class="rpart overflow">
                    <?php echo $this->vars["adv1"] ?>
                    <?php echo $this->vars["data2"] ?>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <?php file::import("system-model-footer"); ?>

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
            
            $('.resh').click(function(){
                $.ajax({url:"<?php echo INDEX ?>/webajax.php?mod=resh&type=organ",success:function(data){
                    $(".reshcontent").html(data);
                }});
            });
            $('.openinstro').click(function(){
                $('.win').show();
            });
        });
        
    </script>
    <div class='fix win hide'>
                <div class='w rel'>
                    <img src='<?php echo TU ?>/close.png' class='closealert abs' />
                    <div class='padding'>
                        <p class='t'>Giới hạn xem mỗi ngày</p>
                        <table class="ntable">
                            <?php echo $this->vars["table"] ?>
                        </table>
                        <a href='<?php echo INDEX ?>/index.php?mod=vip' class='d' style="margin:15px auto 0">Thăng cấp lên hạng VIP</a>
                    </div>
                </div>
            </div>
            
     <div class='fix win2 hide'>
                <div class='w rel'>
                    <img src='<?php echo TU ?>/close.png' class='closealert abs' />
                    <div class='padding'>
                        <p class='t'>Giới hạn tải về mỗi ngày</p>
                        <table class="ntable">
                            <?php echo $this->vars["table2"] ?>
                        </table>
                        <a href='<?php echo INDEX ?>/index.php?mod=vip' class='d' style="margin:15px auto 0">Thăng cấp lên hạng VIP</a>
                    </div>
                </div>
            </div>
</body>

</html>
