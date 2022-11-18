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
    <style>
        .category_input{
            width:100%
        }
    </style>
</head>
<body>
    <?php file::import("system-model-admin-header"); ?>
    <?php file::import("system-model-admin-aside"); ?>
    <div class="wrap">
        <div class="w100">
            <?php file::import("system-model-admin-tag"); ?>
            <div class="content">
        		<div class="frame">
                    <p class="title">Thêm chủ đề</p>
                    <div class="frmtable_content">
                		<table class="w100 addtopic">
                			<tbody><tr>
                				<td>Tên chủ đề</td>
                				<td><input name="name" value="<?php echo $this->vars["name"] ?>" placeholder="Lên đến 4 từ"></td>
                			</tr>
                			<tr>
                				<td>Mô tả chủ đề </td>
                				<td><input name="desces" value="<?php echo $this->vars["desces"] ?>" placeholder="Tóm tắt trong một câu"></td>
                			</tr>
                			<tr>
                				<td>Các chủ đề được đề xuất có liên quan</td>
                				<td><input name="tuijian" value="<?php echo $this->vars["tuijian"] ?>" placeholder="Định dạng: tên, tên, tên"></td>
                			</tr>
                			<!--<tr>-->
                			<!--	<td>Hot</td>-->
                			<!--	<td><input name="hot" value="<?php echo $this->vars["hot"] ?>" placeholder="此参数关系到 社区-推荐=>热门话题的显示 热门话题只显示热度最高的4个, 此处填写数字"></td>-->
                			<!--</tr>-->
                			<tr>
                				<td>Hình thu nhỏ của chủ đề</td>
                				<td>
                				    <div class="upload">
                                		<form class="test" method="post" enctype="multipart/form-data">
                                    		<p>
                                    			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">Chọn</a>
                                    		</p><input placeholder="Chọn ảnh" class="css" mode="upload" name="cover" value="<?php echo $this->vars["cover"] ?>">
                                    		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>Tải lên</a>
                                		</form>
                                	</div>
                    	        </td>
                			</tr>
                			<tr>
                				<td>Ảnh nền chủ đề</td>
                				<td>
                				    <div class="upload">
                                		<form class="test" method="post" enctype="multipart/form-data">
                                    		<p>
                                    			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">Chọn</a>
                                    		</p><input placeholder="Chọn ảnh" class="css" mode="upload" name="beijingtu" value="<?php echo $this->vars["beijingtu"] ?>">
                                    		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>Tải lên</a>
                                		</form>
                                	</div>
                    	        </td>
                			</tr>
                			<tr>
                				<td><input type="hidden" name="id" value="<?php echo CW('get/id');  ?>" /></td>
                				<td><?php echo $this->vars["btn"] ?></td>
                			</tr>
                		</tbody></table>
                	</div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>