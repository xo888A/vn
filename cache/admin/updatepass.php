<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title><?php echo TITLE ?></title>
    <link rel="stylesheet" href="<?php echo CSS ?>/backstage.css" />
    <link rel="stylesheet" href="<?php echo CSS ?>/font-awesome.min.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/backstage.js"></script>
</head>
<body>
    <?php file::import("system-model-admin-header"); ?>
    <?php file::import("system-model-admin-aside"); ?>
    <div class="wrap">
        <div class="w100">
            <?php file::import("system-model-admin-tag"); ?>
            <div class="content">
        		<div class="frame">
                    <p class="title">Sửa đổi mật khẩu quản trị viên nền</p>
                    <div class="frmtable_content">
                		<table class="w100">
                			<tbody><tr>
                				<td>Tài khoản quản trị viên</td>
                				<td><input name="username" placeholder="Hỗ trợ đặt lại"></td>
                			</tr>
                			<tr>
                				<td>Mật khẩu cũ quản trị viên </td>
                				<td><input name="oldpass" placeholder=""></td>
                			</tr>
                			<tr>
                				<td>Mật khẩu mới quản trị viên</td>
                				<td><input name="newpass" placeholder=""></td>
                			</tr>
                			<tr>
                				<td>Mật khẩu thứ cấp của quản trị viên</td>
                				<td><input name="newpass2" placeholder=""></td>
                			</tr>
                			<tr>
                				<td></td>
                				<td><a href="javascript:;" class="btn submit" rel="updatepass"><i class="fa fa-edit"></i>Làm mới</a></td>
                			</tr>
                		</tbody></table>
                	</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>