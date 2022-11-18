<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title><?php echo TITLE ?></title>
    <link rel="stylesheet" href="<?php echo CSS ?>/backstage.css" />
    <link rel="stylesheet" href="<?php echo CSS ?>/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo CSS ?>/time.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/backstage.js"></script>
    <script src="<?php echo JS ?>/time.js"></script>
</head>
<body>
    <?php file::import("system-model-admin-header"); ?>
    <?php file::import("system-model-admin-aside"); ?>
    <div class="wrap">
        <div class="w100">
            <?php file::import("system-model-admin-tag"); ?>
            <div class="content">
                <div class="frame">
                	<p class="title">Thông tin người dùng</p>
                	<div class="frmtable_content">
                		<table class="w100">
                			<tr>
                				<td>Tài khoản người dùng</td>
                				<td><p><input name="nickname" value="<?php echo $this->vars["nickname"] ?>" placeholder="" /></p></td>
                			</tr>
                			<tr>
                				<td>Nhóm người dùng</td>
                				<td class="rel">
                					<input readonly="true" value="<?php echo $this->vars["addparam"] ?>" class="pub_select" name="addparam" placeholder="Nhấp để chọn nhóm người dùng" />
                					<ul class="abs hide">
                					    <li>Người dùng</li>
                					    <li>Tác giả</li>
                					    <li>Người quản lý</li>
                					</ul>
                				</td>
                			</tr>
                			<tr>
                				<td>Tài khoản</td>
                				<td><input name="tel" value="<?php echo $this->vars["tel"] ?>" placeholder="Số điện thoại liên kết với người dùng" /></td>
                			</tr>
                			<tr>
                				<td>Mật khẩu</td>
                				<td><input name="password" value="<?php echo $this->vars["password"] ?>" placeholder="Mật khẩu" /></td>
                			</tr>
                			<tr>
                				<td>Email</td>
                				<td><input name="email" value="<?php echo $this->vars["email"] ?>" placeholder="Mật khẩu" /></td>
                			</tr>
                			<tr>
                				<td>Mật khẩu</td>
                				<td><input name="card" value="<?php echo $this->vars["card"] ?>" placeholder="Mật khẩu" /></td>
                			</tr>
                			<tr>
                				<td>Mô tả về người dùng</td>
                				<td><input name="miaoshu" value="<?php echo $this->vars["miaoshu"] ?>" placeholder="Mô tả" /></td>
                			</tr>
                			<tr>
                				<td>Coin</td>
                				<td><input name="diam" value="<?php echo $this->vars["diam"] ?>" placeholder="Số kim cương" /></td>
                			</tr>
                			<tr>
                				<td>Ví</td>
                				<td><input name="money" value="<?php echo $this->vars["money"] ?>" placeholder="Số tiền người dùng sở hữu" /></td>
                			</tr>
                			<tr>
                				<td>Fan</td>
                				<td><input name="flonum" value="<?php echo $this->vars["flonum"] ?>" placeholder="Fan" /></td>
                			</tr>
                			<tr>
                				<td>Thời gian hết hạn VIP</td>
                				<td><input id="time" name="viptime" value="<?php echo $this->vars["viptime"] ?>" placeholder="Thời gian hết hạn VIP" /></td>
                			</tr>
                			<tr>
                				<td>Giới tính</td>
                				<td class="rel">
                					<input readonly="true" value="<?php echo $this->vars["sex"] ?>" class="pub_select" name="sex" placeholder="Nhấp chọn giới tính" />
                					<ul class="abs hide">
                					    <li>Nam</li>
                					    <li>Nữ</li>
                					</ul>
                				</td>
                			</tr>
                			<tr>
                				<td>Mật khẩu giao dịch</td>
                				<td><input name="withdrawalspass" value="<?php echo $this->vars["withdrawalspass"] ?>" placeholder="Mật khẩu giao dịch" /></td>
                			</tr>
                			<!--<tr>-->
                			<!--	<td>Mật khẩu khóa màn hình </td>-->
                			<!--	<td><input name="lockpass" value="<?php echo $this->vars["lockpass"] ?>" placeholder="Mật khẩu khóa màn hình" /></td>-->
                			<!--</tr>-->
                			<tr>
                				<td>Chữ ký</td>
                				<td><input name="descs" value="<?php echo $this->vars["descs"] ?>" placeholder="Không được vượt quá 255 ký tự" /></td>
                			</tr>
                			<tr>
                				<td>Đầy đủ X cái</td>
                				<td><input name="man" value="<?php echo $this->vars["man"] ?>" placeholder="Lượng" /></td>
                			</tr>
                			<tr>
                				<td>Trừ X cái</td>
                				<td><input name="kouliang" value="<?php echo $this->vars["kouliang"] ?>" placeholder="" /></td>
                			</tr>
                			<tr>
                				<td>Hình đại diện</td>
                				<td class="upload">
                				    <form class="test" method="post" enctype="multipart/form-data">
                                		<p>
                                			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">Chọn</a>
                                		</p><input placeholder="Vui lòng chọn một hình ảnh" class="css" mode="upload" name="avatar" value="<?php echo $this->vars["avatar"] ?>">
                                		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>Tải lên</a>
                            		</form>
                				</td>
                			</tr>
                			<tr>
                				<td>Hình nền</td>
                				<td class="upload">
                				    <form class="test" method="post" enctype="multipart/form-data">
                                		<p>
                                			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">Chọn</a>
                                		</p><input placeholder="Vui lòng chọn một hình ảnh" class="css" mode="upload" name="cover" value="<?php echo $this->vars["cover"] ?>">
                                		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>Tải lên</a>
                            		</form>
                				</td>
                			</tr>
                			
                			<tr>
                				<td>Số ngày đăng nhập liên tục</td>
                				<td><input name="days" value="<?php echo $this->vars["days"] ?>" placeholder="" /></td>
                			</tr>
                			<tr>
                				<td>Có đóng băng không</td>
                				<td class="rel">
                					<input readonly="true" value="<?php echo $this->vars["freeze"] ?>" class="pub_select" name="freeze" placeholder="Bấm để chọn trạng thái" />
                					<ul class="abs hide">
                					    <li>Đống băng</li>
                					    <li>Bình thường</li>
                					</ul>
                				</td>
                			</tr>
                			<tr>
                				<td>Ngôi sao</td>
                				<td class="rel">
                					<input  value="<?php echo $this->vars["mylevel"] ?>"  name="mylevel" placeholder="Nhiều dấu sao được phân tách bằng dấu (,), nhiều nhất là 2 dấu sao, chẳng hạn như 1,2" />
                					<div class="xb">
                					    <p>1. <img src='<?php echo TU ?>/1.png' /></p>
                					    <p>2. <img src='<?php echo TU ?>/2.png' /></p>
                					    <p>3. <img src='<?php echo TU ?>/3.png' /></p>
                					    <p>4. <img src='<?php echo TU ?>/4.png' /></p>
                					    <p>5. <img src='<?php echo TU ?>/5.png' /></p>
                					    <p>6. <img src='<?php echo TU ?>/6.png' /></p>
                					</div>

                					<div class="xb">Lưu ý: Chỉ được xuất hiện một dấu sao 1234567, nếu không sẽ gây ra lỗi hiển thị nghiệp vụ</div>
                				</td>
                			</tr>
                			<input type="hidden" name="id" value="<?php echo CW('get/id');  ?>" />
                			<tr>
                				<td></td>
                				<td><?php echo $this->vars["button"] ?></td>
                			</tr>
                		</table>
                	</div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var opts1={
            'targetId':'time',//时间写入对象的id
            'hms':'on',
            'format':'-',
            'min':'2021-08-30 00:00:00',
            'max':'2099-10-30 00:00:00'
        };

    xvDate(opts1);

</script>
</body>
</html>