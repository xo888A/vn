<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>Cài đặt tài khoản</title>
    <link rel="stylesheet" type="text/css" href="../css/api.css" />
    <script type="text/javascript" src="../script/jquery.js"></script>
    <script type="text/javascript" src="../script/api.js"></script>
    <script type="text/javascript" src="<?php echo JS ?>/index.js"></script>
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
</head>

<body>
    <?php file::import("system-model-top"); ?>
    <div class="wrap set">
        <div class="pubtit">
            <p class="selected" rel="u1"><span></span>Thông tin cá nhân</p>
          
            <p rel="u3"><span></span>Mật khẩu tài khoản</p>
            <p rel="u4"><span></span>Mật khẩu rút tiền</p>
        </div>
    </div>
    <div class="wrap h100">
        <div class="part1 part msg overflow rel h100">
            <input type="hidden" name="simg" value="">
           
            <form id="files" class="test" method="post" enctype="multipart/form-data" style="margin-top: 10px;">
            <p class="avatar fl"><img src="<?php echo $this->vars["avatar"] ?>"></p>
            <p class="des">Chọn ảnh đại điện yêu thích(*^_^*)</p>
            <p class="btn">
                
             <a href="javascript:;" class="tj" style="margin-right:0">Cài đặt ảnh đại diện</a>
            </p>
            </form>
            
            
            
            <div class="listavatar hide">
                        <p class="selected"><span></span>Ảnh đại điện chính</p>
                      
                        <div class="clear"></div>
                    </div>
                    <div class="btnimg list_avatar hide">
                        <ul class="o1 overflow public_o">
                            <?php echo $this->vars["li1"] ?>
                        </ul>
                       
                    </div>
            
            
            
            
            <p class="button" style="margin-top: 25px;"><input placeholder="Biệt danh" name="nickname" value="<?php echo $this->vars["nickname"] ?>"><a href="javascript:;" class="nickname">Lưu</a></p>
            <p class="notice">Biệt danh không được vượt quá 10 ký tự và dấu</p>
           
        </div>
        <div class="part2 part overflow hide" >
            <?php echo $this->vars["html2"] ?>
                    <div <?php echo $this->vars["ishide2"] ?>>
                    <p class="button button2 s"><input name="email" placeholder="Email" /></p>
                    <p class="notice">Lưu ý: Email sau khi đã cài đặt, sẽ không được phép sửa đổi</p>
                    
                    <p class="pubbtn sendemail">Liên kết ngay</p>
                    </div>
        </div>
        <div class="part3 part overflow hide" >
            <p class="notice" >Sửa đổi mật khẩu tài khoản thành viên</p>
            <p class="button button2 s"><input name="pass1" class="w89" placeholder="Nhập mật khẩu cũ"></p>
            <p class="button button2 s"><input name="pass2" class="w89" placeholder="Mật khẩu mới"></p>
            <p class="notice">Mật khẩu chỉ có chữ hoặc số không hỗ trợ các ký tự đặc biệt</p>
            <p class="button button2 s"><input name="pass3" class="w89" placeholder="Xác nhận mật khẩu mới"></p>
            <p class="pubbtn updatepassword">Xác nhận thay đổi mật khẩu</p>
        </div>
        <div class="part4 part3 part overflow hide" >
            <?php echo $this->vars["html"] ?>
                    <div <?php echo $this->vars["ishide"] ?>>
<p class="notice">Cài đặt mật khẩu rút tiền</p>
<p class="button button2 s"><input class="w89" placeholder="Nhập 6 chữ số mật khẩu" name="withdrawalspass"></p>
<p class="notice">Lưu ý: Mật khẩu rút tiền sau khi đã cài đặt, sẽ không được phép sửa đổi</p>
<p class="pubbtn withdrawalspass">Lưu</p>
</div>
</div>
    </div>
    <p class="botom"></p>
    <script>
        $(function(){
            $('.selectsex').click(function(){
                $('.mysex').toggle();
            });
            $('.mysex a').click(function(){
                $('.selectsex').val($(this).text());
                $('.mysex').hide();
            });
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
            $('.tj').click(function(){
                $('.list_avatar,.listavatar').toggle();
            });
            $('.list_avatar img').click(function(){
                //$('.list_avatar').hide();
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
