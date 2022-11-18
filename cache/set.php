<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>Cài đặt</title>
    <meta name="keywords" content="Từ khóa" />
    <meta name="description" content="Mô tả rang" />
    <link rel="stylesheet" href="<?php echo CSS ?>/style.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/index.js"></script>
</head>

<body>
    <?php file::import("system-model-header"); ?>
    <div class="wrap2 overflow">
        <div class="fl w100">
            <div class="fl fls">
                <p class="u"><img src="<?php echo $this->vars["avatar"] ?>" /></p>
                <p class="qiandao">Điểm danh nhận thưởng</p>
                <ul class="fun">
                    <li><a href="<?php echo INDEX ?>/index.php?mod=user"><img src="<?php echo TU ?>/u1.png" />Trung tâm hội viên</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=edit"><img src="<?php echo TU ?>/u7.png" />Quản lý tác phẩm</a></li>
                    <li class="selected"><a href="<?php echo INDEX ?>/index.php?mod=set"><img src="<?php echo TU ?>/u2_.png" />Cài đặt tài khoản</a></li>
                    
                    <li><a href="<?php echo INDEX ?>/index.php?mod=wallet"><img src="<?php echo TU ?>/u3.png" />Ví của tôi</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=vip"><img src="<?php echo TU ?>/u4.png" />Nạp tiền hôi viên</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=money"><img src="<?php echo TU ?>/u5.png" />Nạp tiền</a></li>
                    <!--<li><a href="<?php echo INDEX ?>/index.php?mod=card"><img src="<?php echo TU ?>/u6.png" />Đổi mật mã thẻ</a></li>-->
                    <li><a href="<?php echo INDEX ?>/index.php?mod=concern"><img src="<?php echo TU ?>/u7.png" />Theo dõi của tôi</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=albuy"><img src="<?php echo TU ?>/u8.png" />Video đã mua</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=customer"><img src="<?php echo TU ?>/u9.png" />Trung tâm chăm sóc khách hàng</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=message"><img src="<?php echo TU ?>/u10.png" />Trung tâm thông tin</a></li>
                    <li><a href="<?php echo INDEX ?>/index.php?mod=shares"><img src="<?php echo TU ?>/u11.png" />Quảng cáo kiếm tiền</a></li>
                    <li class="logout"><a href="<?php echo INDEX ?>/index.php?mod=logout "><img src="<?php echo TU ?>/u12.png" />Đăng xuất tài khoản</a></li>
                </ul>
            </div>
            <div class="fl flr">
                <div class="pubtit">
                    <p class="selected" rel="u1"><span></span>Thông tin cá nhân</p>
                    <!--<p rel="u2"><span></span>Liên kết email</p>-->
                    <p rel="u3"><span></span>Mật khẩu tài khoản</p>
                    <p rel="u4"><span></span>Mật khẩu rút tiền</p>
                </div>
                <!--start part1-->
                <div class="part1 part msg overflow rel ">
                    <input type="hidden" name="simg" value=""  />
                    <ul class="list_avatar hide">
                        <?php echo $this->vars["listava"] ?>
                    </ul>
                    <form id="files" class="test" method="post" enctype="multipart/form-data">
                    <p class="avatar fl"><img src="<?php echo $this->vars["avatar"] ?>" /></p>
                    <p class="des">Chọn một ảnh đại diện bạn thích (*^_^*)</p>
                    <p class="btn">
                        <a href="javascript:;" class="tj">Cài đặt ảnh đại diện</a>
                    </p>
                    </form>
                    <script>
                        $(function(){
                            $('.listavatar p').click(function(){
                                $('.listavatar p').attr('class','');
                                $(this).addClass('selected');
                                var index = parseInt($(this).index())+1;
                                var ele = ".o"+index;
                                $('.public_o').hide();
                                $(ele).show();
                            });
                        });
                    </script>
                    <div class="listavatar hide">
                        <p class="selected"><span></span>Ảnh đại diện kinh điển</p>
                       
                        <div class="clear"></div>
                    </div>
                    <div class="btnimg list_avatar hide">
                        <ul class="o1 overflow public_o">
                            <?php echo $this->vars["li1"] ?>
                        </ul>
                       
                    </div>
                    <div class="import" style="width:100% !important">
                    <p class="button"  style="margin-top: 15px;"><input placeholder="biệt danh" name="nickname" value="<?php echo $this->vars["nickname"] ?>" /><a href="javascript:;" class="nickname">Lưu lại</a></p>
                    <p class="notice">Biệt danh / nick name không được vượt quá 10 ký tự</p>
                    </div>
                </div>
                <!--start part2-->
                <div class="part2 part overflow hide">
                    <?php echo $this->vars["html2"] ?>
                    <div <?php echo $this->vars["ishide2"] ?>>
                    <p class="button button2 s"><input name="email" placeholder="email" /></p>
                    <p class="notice">Nhắc nhở: Sau khi cài đặt hộp thư sẽ không được phép sửa đổi</p>
                    
                    <p class="pubbtn sendemail">Lập tức ràng buộc </p>
                    </div>
                </div>
                <!--start part3-->
                <div class="part3 part overflow hide">
                    <p class="notice" style="font-size:20px">Sửa đổi mật khẩu tài khoản hội viên</p>
                    <p class="button button2 s"><input name="pass1" placeholder="Nhập mật khẩu cũ" /></p>
                    <p class="button button2 s"><input name="pass2" placeholder="Mật khẩu mới" /></p>
                    <p class="notice">Mật khẩu chỉ chấp nhận chữ hoặc số, không hỗ trợ các ký tự đặc biệt</p>
                    <p class="button button2 s"><input name="pass3" placeholder="Xác nhận mật khẩu mới" /></p>
                    <p class="pubbtn updatepassword">Xác nhận thay đổi mật khẩu</p>
                </div>
                <!--start part4-->
                <div class="part4 part3 part overflow hide">
                    <?php echo $this->vars["html"] ?>
                    <div <?php echo $this->vars["ishide"] ?>>
                    <p class="notice" style="font-size:20px">Cài đặt mật khẩu rút tiền</p>
                    <p class="button button2 s"><input placeholder="Nhập mật khẩu gồm 6 chữ số" name="withdrawalspass" /></p>
                    <p class="notice">Nhắc nhở: Khi mật khẩu rút tiền được đặt sẽ không được phép sửa đổi</p>
                    <p class="pubbtn withdrawalspass">Lưu lại</p>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <?php file::import("system-model-footer"); ?>
    <script>
        $(function(){
            $('.pubtit p').click(function(){
                var rel = $(this).attr("rel");
                $('.pubtit p').attr('class','');
                $(this).attr('class','selected');
                if(rel=="u1"){
                    $('.part1').show();
                    $('.part2').hide();
                    $('.part3').hide();
                    $('.part4').hide();
                }else if(rel=="u2"){
                    $('.part1').hide();
                    $('.part2').show();
                    $('.part3').hide();
                    $('.part4').hide();
                }else if(rel=="u3"){
                    $('.part1').hide();
                    $('.part2').hide();
                    $('.part3').show();
                    $('.part4').hide();
                }else if(rel=="u4"){
                    $('.part1').hide();
                    $('.part2').hide();
                    $('.part3').hide();
                    $('.part4').show();
                }
            });
            $('.selectsex').click(function(){
                $('.mysex').toggle();
            });
            $('.mysex a').click(function(){
                $('.selectsex').val($(this).text());
                $('.mysex').hide();
            });
            $('.tj').click(function(){
                $('.listavatar,.btnimg').toggle();
            });
            $('.list_avatar img').click(function(){
                
                var img = $(this).attr('src');
                $('.avatar.fl img').attr('src',img);
                $('input[name=simg]').val(img);
                
                var img = $('input[name=simg]').val();
                ajax('webupdateusers');
                
            });
        });
        $("input[type=file]").change(function(e){
        　　var imgBox = e.target;
        　　uploadImg($('.avatar.fl img'), imgBox)
        });

    </script>
</body>

</html>
