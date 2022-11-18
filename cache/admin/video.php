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
                    <p class="title">Nhắc nhở</p>
                    <div class="notice">
		                <div class="note-info">
		                    <p class="p1 btn3">Nhắc nhở</p>
		                    <p class="pub">1. Nếu giá kim cương của người dùng bình thường và giá kim cương của người dùng VIP đều được điền bằng 0, thì video này miễn phí</p>
		                    <p class="pub">2. Nếu giá kim cương của người dùng thông thường> 0 giá kim cương của người dùng VIP = 0, thì video này dành riêng cho người dùng VIP, miễn phí</p>
		                    <p class="pub">3. Nếu giá kim cương của người dùng phổ thông> giá kim cương của người dùng VIP và không ai trong số họ có thể bằng 0, thì video này là video chất lượng cao và phí kim cương sẽ căn cứ theo cài đặt tương ứng.</p>

		                </div>
		            </div>
                	<p class="title">Thêm video</p>
                	<div class="frmtable_content">
                		<table class="w100">
                		    <tr>
                				<td>Tên người dùng</td>
                				<td><p><input name="userid" value="<?php echo $this->vars["userid"] ?>" placeholder="ID người dùng"  /></p></td>
                			</tr>
                			<tr>
                				<td>Tiêu đề video</td>
                				<td><p><input name="title" value="<?php echo $this->vars["title"] ?>" placeholder="Không quá 99 ký tự (33 từ)" /></p></td>
                			</tr>
                            <tr>
                				<td>Thời gian phát</td>
                				<td><p><input name="ftime" value="<?php echo $this->vars["ftime"] ?>" placeholder="Thời gian phát, tùy chọn, định dạng 2022-02-02 15:15:15" /></p></td>
                			</tr>
                			<tr>
                				<td>Ảnh bìa video</td>
                				<td class="upload">
                				    <form class="test" method="post" enctype="multipart/form-data">
                                		<p>
                                			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">Chọn</a>
                                		</p><input placeholder="Chọn ảnh" class="css" mode="upload" name="videocover" value="<?php echo $this->vars["videocover"] ?>">
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
                                		</p><input placeholder="Chọn ảnh" class="css" mode="upload" name="videourl" value="<?php echo $this->vars["videourl"] ?>">
                                		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>Tải lên</a>
                            		</form>
                				</td>
                				
                			</tr>
                			
                			<tr>
                				<td>Thời lượng video</td>
                				<td><input name="addparam" value="<?php echo $this->vars["addparam"] ?>" placeholder="Thời lượng video định dạng 00:00" /></td>
                			</tr>
                			<!--<tr>-->
                			<!--	<td>Liên kết tải xuống</td>-->
                			<!--	<td><input name="downloadurl" value="<?php echo $this->vars["downloadurl"] ?>" placeholder="Liên kết tải xuống" /></td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>Quyền tải xuống</td>-->
                			<!--	<td>-->
                			<!--	    <ul class="adv_ul">-->
                			<!--	        <li><input name="lv0" <?php echo $this->vars["l0"] ?> type="checkbox" />Thành viên phổ thông</li>-->
                			<!--	        <li><input name="lv1" <?php echo $this->vars["l1"] ?> type="checkbox" />Thành viênLV1</li>-->
                			<!--	        <li><input name="lv2" <?php echo $this->vars["l2"] ?> type="checkbox" />Thành viênLV2</li>-->
                			<!--	        <li><input name="lv3" <?php echo $this->vars["l3"] ?> type="checkbox" />Thành viênLV3</li>-->
                			<!--	        <li><input name="lv4" <?php echo $this->vars["l4"] ?> type="checkbox" />Thành viênLV4</li>-->
                			<!--	        <li><input name="lv5" <?php echo $this->vars["l5"] ?> type="checkbox" />Thành viênLV5</li>-->
                			<!--	        <li><input name="lv6" <?php echo $this->vars["l6"] ?> type="checkbox" />Thành viênLV6</li>-->
                			<!--	    </ul>-->
                			<!--	</td>-->
                			<!--</tr>-->
                			<tr>
                				<td>Kích thước gói nén</td>
                				<td><input name="filesize" value="<?php echo $this->vars["filesize"] ?>" placeholder="Kích thước gói nén" /></td>
                			</tr>
                			<tr>
                				<td>Giá kim cương của người dùng phổ thông</td>
                				<td><input name="diamond" value="<?php echo $this->vars["diamond"] ?>" placeholder="Đơn vị: Kim cương điền số 0 thì miễn phí" /></td>
                			</tr>
                			<tr>
                				<td>Giá kim cương cho người dùng VIP</td>
                				<td><input name="vipdiam" value="<?php echo $this->vars["vipdiam"] ?>" placeholder="Đơn vị: kim cương điền vào là 0 và giá kim cương cho người dùng phổ thông không phải là 0, nghĩa là miễn phí cho người dùng VIP" /></td>
                			</tr>
                			<tr>
                				<td>Hot(số lượng đã đọc)</td>
                				<td><input name="hot" value="<?php echo $this->vars["hot"] ?>" placeholder="12580" /></td>
                			</tr>
                			<tr>
                				<td>Thích(Số người)</td>
                				<td><input name="like" value="<?php echo $this->vars["like"] ?>" placeholder="Hệ thống tự động tính toán, không được nhập" /></td>
                			</tr>
                			<!--<tr>-->
                			<!--	<td>Thuộc tính</td>-->
                			<!--	<td class="rel">-->
                			<!--		<input  value="<?php echo $this->vars["flag"] ?>" class="flag_select" name="flag" placeholder="Nhấp để chọn thuộc tính" />-->
                			<!--		<ul class="abs hide">-->
                			<!--		    <li>Hot</li>-->
                			<!--		    <li>Tuyển chọn</li>-->
                			<!--		    <li>Đề xuất</li>-->
                			<!--		    <li>Tìm kiếm nhiều</li>-->
                			<!--		    <li>Đề xuất/li>-->
                			<!--		    <li>Đánh dấu</li>-->
                			<!--		    <li>VIP Chọn lọc</li>-->
                			<!--		    <li>VIP Heaven7</li>-->
                			<!--		    <li>Đề xuất VIP </li>-->
                			<!--		    <li>VIP Hot stream</li>-->
                			<!--		    <li>Kim cương chọn lọc</li>-->
                			<!--		    <li>Đề xuất tốt nhất cho kim cương</li>-->
                			<!--		    <li>Khuyến mãi kim cương</li>-->
                			<!--		</ul>-->
                			<!--	</td>-->
                			<!--</tr>-->
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
                				<td>Trạng thái bài đăng</td>
                				<td class="rel">
                					<input readonly="true" value="<?php echo $this->vars["ishow"] ?>" class="pub_select" name="ishow" placeholder="Bấm để chọn trạng thái" />
                					<ul class="abs hide">
                					    <li>Công khai</li>
                					    <li>Xét duyệt</li>
                					</ul>
                				</td>
                			</tr>
                			<tr>
                				<td>Đề xuất hoặc không</td>
                				<td class="rel">
                					<input readonly="true" value="<?php echo $this->vars["istuijian"] ?>" class="pub_select" name="istuijian" placeholder="Bấm để chọn trạng thái" />
                					<ul class="abs hide">
                					    <li>Có</li>
                					    <li>Không</li>
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