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
                    <p class="title">Thêm ứng dụng</p>
                    <div class="frmtable_content">
                		<table class="w100 addtopic">
                			<tbody><tr>
                				<td>Tên ứng dụng APP</td>
                				<td><input name="name" placeholder="Nhiều nhất 8 kí tự"></td>
                			</tr>
                			<tr>
                				<td>Thời gian ảo tải ứng dụng APP </td>
                				<td><input name="num" placeholder="Đơn vị / 10.000 lần"></td>
                			</tr>
                			<tr>
                				<td>Một câu mô tả đơn giản</td>
                				<td><input name="desces" placeholder="Không vượt quá 12 kí tự"></td>
                			</tr>
                			<tr>
                				<td>Địa chỉ trang tải xuống APP</td>
                				<td><input name="downloadurl" placeholder="Điền vào liên kết trang tải xuống thay vì liên kết tải xuống"></td>
                			</tr>
                			<tr>
                				<td>Biểu tượng ứng dụng APP(100*100)</td>
                				<td>
                				    <div class="upload">
                                		<form class="test" method="post" enctype="multipart/form-data">
                                    		<p>
                                    			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">Chọn</a>
                                    		</p><input placeholder="Vui lòng chọn hình ảnh" class="css" mode="upload" name="cover" value="">
                                    		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>Tải lên</a>
                                		</form>
                                	</div>
                    	        </td>
                			</tr>
                			<tr>
                				<td></td>
                				<td><a href="javascript:;" class="btn1" rel="addapp"><i class="fa fa-plus-square-o"></i>Thêm</a></td>
                			</tr>
                		</tbody></table>
                	</div>
                </div>
            </div>
            <div class="content">
                <div class="frame">
                    <p class="title">Quản lý ứng dụng APP</p>
                    <div class="frmtable">
                    <table class="w100 list">
                        <?php echo $this->vars["data"] ?>
                    </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>