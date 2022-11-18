<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="<?php echo CSS ?>/style.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/index.js"></script>
    <script src="<?php echo JS ?>/captcha.js"></script>

    <style>
        .desc{
            color:#ccc;
            margin: -10px 0 10px;
        }
    </style>
</head>

<body onload="generatec()">
    <?php file::import("system-model-header"); ?>
    <div class="wrap">
        <div class="fm">
            <p class="center">Đăng ký người dùng mới</p>
            <input type="hidden" name="card" value="<?php echo CW('get/card');  ?>"  />
            <input class="fmbtn" name="tel" minlength="5" maxlength="11"  placeholder="Cài đặt tài khoản" />
            <p class="desc">Có thể điền số điện thoại di động hoặc số tài khoản kỹ thuật số thuần túy</p>
            <input class="fmbtn" name="pass" minlength="5" maxlength="11" placeholder="Cài đặt mật khẩu" />
            <input class="fmbtn" name="passt" minlength="5" maxlength="11" placeholder="Xác nhận mật khẩu" />
            <div>
                <div id="user-input" style="width: 67%;" class="inline">
                    <input type="text" class="fmbtn" id="submit-cap"
                        placeholder="Mã xác nhận" />
                </div>
                 <div class="inline"  onclick="generatec()">
                    <div id="image-cap" class="" selectable="False">
                      </div>
                
                </div>
            </div>
            <p class="pubbtn" style="margin-top:0"><a href="javascript:;" class="_reg" rel="regs">Đăng ký</a></p>
            <p class="pubbtn"><a href="<?php echo INDEX ?>/login.html">Đăng nhập</a></p>
            <div class="center2">
                <div>
                    <a href="<?php echo INDEX ?>/index.php?mod=customer">
                    <img src="<?php echo TU ?>/form1.png" />
                    <span>Trung tâm chăm sóc khách hàng</span>
                    </a>
                </div>
                <div>
                    <a href="<?php echo INDEX ?>/download.html">
                    <img src="<?php echo TU ?>/form2.png" />
                    <span>Tải APP về</span>
                    </a>
                </div>
                <div>
                    <a href="<?php echo $this->vars["tougao"] ?>" target="_blank">
                    <img src="<?php echo TU ?>/form3.png" />
                    <span>Đóng góp để kiếm tiền</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
