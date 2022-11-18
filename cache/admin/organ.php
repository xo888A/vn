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
    <link rel="stylesheet" href="<?php echo PLUGINS ?>/themes/default/default.css" />
	<link rel="stylesheet" href="<?php echo PLUGINS ?>/plugins/code/prettify.css" />
	<script charset="utf-8" src="<?php echo PLUGINS ?>/kindeditor.js"></script>
	<script charset="utf-8" src="<?php echo PLUGINS ?>/lang/zh-CN.js"></script>
	<script charset="utf-8" src="<?php echo PLUGINS ?>/plugins/code/prettify.js"></script>
	<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea', {
				cssPath : '<?php echo PLUGINS ?>/plugins/code/prettify.css',
				uploadJson : '<?php echo PLUGINS ?>/php/upload_json.php',
				fileManagerJson : '<?php echo PLUGINS ?>/php/file_manager_json.php',
				allowFileManager : true,
				afterCreate : function() {
				    this.sync();
				},
				afterBlur:function(){
				    this.sync();
				}
			});
			prettyPrint();
		});
	</script>
</head>
<body>
    <?php file::import("system-model-admin-header"); ?>
    <?php file::import("system-model-admin-aside"); ?>
    <div class="wrap">
        <div class="w100">
            <?php file::import("system-model-admin-tag"); ?>
            <div class="content">
                <div class="frame">
                	<p class="title">Thêm video</p>
                	<div class="frmtable_content">
                		<table class="w100">
                		    <tr>
                				<td>Tên người dùng</td>
                				<td><p><input name="userid" value="<?php echo $this->vars["userid"] ?>" placeholder="ID người dùng" /></p></td>
                				<input type="hidden" name="id" value="<?php echo CW('get/id');  ?>" />
                			</tr>
                			<tr>
                				<td>Tiêu đề</td>
                				<td><p><input name="title" value="<?php echo $this->vars["title"] ?>" placeholder="Không quá 99 ký tự (33 chữ)" /></p></td>
                			</tr>
                            <tr>
                				<td>Thời gian phát hành</td>
                				<td><p><input name="ftime" value="<?php echo $this->vars["ftime"] ?>" placeholder="Thời gian phát hành, có thể để trống, định dạng 2022-02-02 15:15:15" /></p></td>
                			</tr>
                			<tr>
                				<td>Ảnh bìa</td>
                				<td class="upload">
                				    <form class="test" method="post" enctype="multipart/form-data">
                                		<p>
                                			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">Lựa chọn</a>
                                		</p><input placeholder="Vui lòng chọn ảnh" class="css" mode="upload" name="organcover" value="<?php echo $this->vars["organcover"] ?>">
                                		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>Tải lên</a>
                            		</form>
                				</td>
                			</tr>
                			<tr>
                				<td>Ảnh bìa 1</td>
                				<td class="upload">
                				    <form class="test" method="post" enctype="multipart/form-data">
                                		<p>
                                			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">Lựa chọn</a>
                                		</p><input placeholder="Vui lòng chọn hình ảnh" class="css" mode="upload" name="img1" value="<?php echo $this->vars["img1"] ?>">
                                		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>Tải lên</a>
                            		</form>
                				</td>
                			</tr>
                			<tr>
                				<td>Ảnh bìa 2</td>
                				<td class="upload">
                				    <form class="test" method="post" enctype="multipart/form-data">
                                		<p>
                                			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">Lựa chọn</a>
                                		</p><input placeholder="Vui lòng chọn hình ảnh" class="css" mode="upload" name="img2" value="<?php echo $this->vars["img2"] ?>">
                                		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>Tải lên</a>
                            		</form>
                				</td>
                			</tr>
                            <tr>
                				<td>Ảnh bìa 3</td>
                				<td class="upload">
                				    <form class="test" method="post" enctype="multipart/form-data">
                                		<p>
                                			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">Lựa chọn</a>
                                		</p><input placeholder="Vui lòng chọn hình ảnh" class="css" mode="upload" name="img3" value="<?php echo $this->vars["img3"] ?>">
                                		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>Tải lên</a>
                            		</form>
                				</td>
                			</tr>
                			<tr>
                				<td>Ảnh bìa 4</td>
                				<td class="upload">
                				    <form class="test" method="post" enctype="multipart/form-data">
                                		<p>
                                			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">Lựa chọn</a>
                                		</p><input placeholder="Vui lòng chọn hình ảnh" class="css" mode="upload" name="img4" value="<?php echo $this->vars["img4"] ?>">
                                		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>Tải lên</a>
                            		</form>
                				</td>
                			</tr>
                			<tr>
                				<td>Ảnh bìa 5</td>
                				<td class="upload">
                				    <form class="test" method="post" enctype="multipart/form-data">
                                		<p>
                                			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">Lựa chọn</a>
                                		</p><input placeholder="Vui lòng chọn hình ảnh" class="css" mode="upload" name="img5" value="<?php echo $this->vars["img5"] ?>">
                                		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>Tải lên</a>
                            		</form>
                				</td>
                			</tr>
                			<tr>
                				<td>Ảnh bìa 6</td>
                				<td class="upload">
                				    <form class="test" method="post" enctype="multipart/form-data">
                                		<p>
                                			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">Lựa chọn</a>
                                		</p><input placeholder="Vui lòng chọn hình ảnh" class="css" mode="upload" name="img6" value="<?php echo $this->vars["img6"] ?>">
                                		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>Tải lên</a>
                            		</form>
                				</td>
                			</tr>
                			
                			<tr>
                				<td>Danh sách hình ảnh</td>
                				<td><textarea name="imgcontent" placeholder=""><?php echo $this->vars["imgcontent"] ?></textarea></td>
                			</tr>
                			<tr>
                				<td>Thử xem 6 hình ảnh</td>
                				<td><p><input name="shikan" value="<?php echo $this->vars["shikan"] ?>" placeholder="Định dạng: http://www.a.com/1.jpg|http://www.a.com/2.jpg" /></p></td>
        
                			</tr>
                			<!--<tr>-->
                			<!--	<td>图7</td>-->
                			<!--	<td class="upload">-->
                			<!--	    <form class="test" method="post" enctype="multipart/form-data">-->
                   <!--             		<p>-->
                   <!--             			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">选择</a>-->
                   <!--             		</p><input placeholder="请选择图片" class="css" mode="upload" name="img7" value="<?php echo $this->vars["img7"] ?>">-->
                   <!--             		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>上传</a>-->
                   <!--         		</form>-->
                			<!--	</td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>图8</td>-->
                			<!--	<td class="upload">-->
                			<!--	    <form class="test" method="post" enctype="multipart/form-data">-->
                   <!--             		<p>-->
                   <!--             			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">选择</a>-->
                   <!--             		</p><input placeholder="请选择图片" class="css" mode="upload" name="img8" value="<?php echo $this->vars["img8"] ?>">-->
                   <!--             		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>上传</a>-->
                   <!--         		</form>-->
                			<!--	</td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>图9</td>-->
                			<!--	<td class="upload">-->
                			<!--	    <form class="test" method="post" enctype="multipart/form-data">-->
                   <!--             		<p>-->
                   <!--             			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">选择</a>-->
                   <!--             		</p><input placeholder="请选择图片" class="css" mode="upload" name="img9" value="<?php echo $this->vars["img9"] ?>">-->
                   <!--             		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>上传</a>-->
                   <!--         		</form>-->
                			<!--	</td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>钻石价格</td>-->
                			<!--	<td><input name="diamond" value="<?php echo $this->vars["diamond"] ?>" placeholder="单位:钻石" /></td>-->
                			<!--</tr>-->
                			<tr>
                				<td>Số lượng hình ảnh</td>
                				<td><input name="addparam" value="<?php echo $this->vars["addparam"] ?>" placeholder="Số lượng hình ảnh" /></td>
                			</tr>
                            <tr>
                				<td>Giá kim cương cho người dùng phổ thông</td>
                				<td><input name="diamond" value="<?php echo $this->vars["diamond"] ?>" placeholder="Đơn vị: Kim cương. Điền vào số 0 tượng trưng miễn phí" /></td>
                			</tr>
                			<tr>
                				<td>Giá kim cương cho VIP</td>
                				<td><input name="vipdiam" value="<?php echo $this->vars["vipdiam"] ?>" placeholder="Đơn vị: kim cương  Điền vào 0 và nếu giá kim cương cho người dùng thông thường không phải là 0, tượng trưng là miễn phí cho người dùng VIP" /></td>
                			</tr>
                			<!--<tr>-->
                			<!--	<td>下载地址</td>-->
                			<!--	<td><input name="downloadurl" value="<?php echo $this->vars["downloadurl"] ?>" placeholder="下载地址" /></td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>下载权限</td>-->
                			<!--	<td>-->
                			<!--	    <ul class="adv_ul">-->
                			<!--	        <li><input name="lv0" <?php echo $this->vars["l0"] ?> type="checkbox" />普通会员</li>-->
                			<!--	        <li><input name="lv1" <?php echo $this->vars["l1"] ?> type="checkbox" />LV1会员</li>-->
                			<!--	        <li><input name="lv2" <?php echo $this->vars["l2"] ?> type="checkbox" />LV2会员</li>-->
                			<!--	        <li><input name="lv3" <?php echo $this->vars["l3"] ?> type="checkbox" />LV3会员</li>-->
                			<!--	        <li><input name="lv4" <?php echo $this->vars["l4"] ?> type="checkbox" />LV4会员</li>-->
                			<!--	        <li><input name="lv5" <?php echo $this->vars["l5"] ?> type="checkbox" />LV5会员</li>-->
                			<!--	        <li><input name="lv6" <?php echo $this->vars["l6"] ?> type="checkbox" />LV6会员</li>-->
                			<!--	    </ul>-->
                			<!--	</td>-->
                			<!--</tr>-->
                			<tr>
                				<td>Kích thước gói nén</td>
                				<td><input name="filesize" value="<?php echo $this->vars["filesize"] ?>" placeholder="压缩包大小" /></td>
                			</tr>
                			<tr>
                				<td>Mức độ phổ biến (số lượng đã đọc)</td>
                				<td><input name="hot" value="<?php echo $this->vars["hot"] ?>" placeholder="" /></td>
                			</tr>
                			<tr>
                				<td>Yêu thích (số người)</td>
                				<td><input name="like" value="<?php echo $this->vars["like"] ?>" placeholder="Tính toán tự động bởi hệ thống, có thể để trống" /></td>
                			</tr>
                			<tr>
                				<td>Chủ đề</td>
                				<td class="rel">
                					<input  value="<?php echo $this->vars["topic"] ?>" class="_topic_select" name="topic" placeholder="Nhiều chủ đề được phân tách bằng dấu |. Nếu chủ đề đã điền không tồn tại, hệ thống sẽ tự động thêm vào" />
                					<ul class="abs hide">
                					    <?php echo $this->vars["data"] ?>
                					</ul>
                				</td>
                			</tr>
                			<tr>
                				<td>Trạng thái phát hành</td>
                				<td class="rel">
                					<input readonly="true" value="<?php echo $this->vars["ishow"] ?>" class="pub_select" name="ishow" placeholder="Bấm để chọn trạng thái" />
                					<ul class="abs hide">
                					    <li>Công khai</li>
                					    <li>Đánh giá</li>
                					</ul>
                				</td>
                			</tr>
                			<tr>
                				<td>Khuyến khích không</td>
                				<td class="rel">
                					<input readonly="true" value="<?php echo $this->vars["istuijian"] ?>" class="pub_select" name="istuijian" placeholder="Bấm để chọn trạng thái" />
                					<ul class="abs hide">
                					    <li>Khuyến khích</li>
                					    <li>Không</li>
                					</ul>
                				</td>
                			</tr>
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