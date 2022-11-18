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
                	<p class="title">Thêm video </p>
                	<div class="frmtable_content">
                		<table class="w100">
                		    <tr>
                				<td>Tên người dùng</td>
                				<td><p><input name="tel" value="<?php echo $this->vars["tel"] ?>" placeholder="Số điện thoại di động 11 chữ số" /></p></td>
                			</tr>
                			<tr>
                				<td>Tiêu đề video ngắn</td>
                				<td><p><input name="title" value="<?php echo $this->vars["title"] ?>" placeholder="Không quá 60 ký tự (20 từ)" /></p></td>
                			</tr>
                            <tr>
                				<td>Thời gian đăng</td>
                				<td><p><input name="ftime" value="<?php echo $this->vars["ftime"] ?>" placeholder="Thời gian đăng" /></p></td>
                			</tr>
                			<tr>
                				<td>Ảnh nền video ngắn</td>
                				<td class="upload">
                				    <form class="test" method="post" enctype="multipart/form-data">
                                		<p>
                                			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">Chọn</a>
                                		</p><input placeholder="Chọn ảnh" class="css" mode="upload" name="shortvidcover" value="<?php echo $this->vars["shortvidcover"] ?>">
                                		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>Tải lên</a>
                            		</form>
                				</td>
                			</tr>
                			<tr>
                				<td>Địa chỉ video</td>
                				<td class="upload">
                				    <form class="test" method="post" enctype="multipart/form-data">
                                		<p>
                                			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">Chọn</a>
                                		</p><input placeholder="Chọn ảnh" class="css" mode="upload" name="shortvidurl" value="<?php echo $this->vars["shortvidurl"] ?>">
                                		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>Tải lên</a>
                            		</form>
                				</td>
                				
                			</tr>
                			<tr>
                				<td>Thích (số người)</td>
                				<td><input name="likes" value="<?php echo $this->vars["likes"] ?>" placeholder="Tính toán tự động bởi hệ thống, tùy chọn" /></td>
                			</tr>
                			<tr>
                				<td>Phân loại</td>
                				<td class="rel">
                					<input  value="<?php echo $this->vars["topic"] ?>" class="" name="topic" placeholder="Bấm để chọn chủ đề" />
                					<ul class="abs hide">
                					    <?php echo $this->vars["data"] ?>
                					</ul>
                				</td>
                			</tr>
                			<tr>
                				<td>Trạng thái đăng</td>
                				<td class="rel">
                					<input readonly="true" value="<?php echo $this->vars["ishow"] ?>" class="pub_select" name="ishow" placeholder="Bấm để chọn trạng thái" />
                					<ul class="abs hide">
                					    <li>Công khai</li>
                					    <li>Xét duyệt</li>
                					</ul>
                				</td>
                			</tr>
                			<tr>
                				<td>Nó có dành riêng cho VIP không</td>
                				<td class="rel">
                					<input readonly="true" value="<?php echo $this->vars["diamond"] ?>" class="pub_select" name="diamond" placeholder="Bấm để chọn trạng thái" />
                					<ul class="abs hide">
                					    <li>VIP</li>
                					    <li>Miễn phí</li>
                					</ul>
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
</body>
</html>