<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>Cài đặt thành viên</title>
    <link rel="stylesheet" href="<?php echo CSS ?>/backstage.css" />
    <link rel="stylesheet" href="<?php echo CSS ?>/font-awesome.min.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/backstage.js"></script>
    <style>
        .frmtable_content td.r input{
            margin-bottom:5px;width:10%
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
                    
                	<p class="title">Số lượng video / cộng đồng đã xem mỗi ngày bởi các thành viên ở mọi cấp độ((video ngắn không giới hạn)</p>
                    <div class="frmtable_content">
                		<table class="w100">
                			<tbody>
                			<tr>
                				<td>Số lượt xem hàng ngày của thành viên LV1</td>
                				<td><input value="<?php echo $this->vars["lv1"] ?>" name="lv1" placeholder=""></td>
                			</tr>
                			<tr>
                				<td>Số lượt xem hàng ngày của thành viên LV2</td>
                				<td><input value="<?php echo $this->vars["lv2"] ?>" name="lv2" placeholder=""></td>
                			</tr><tr>
                				<td>Số lượt xem hàng ngày của thành viên LV3</td>
                				<td><input value="<?php echo $this->vars["lv3"] ?>" name="lv3" placeholder=""></td>
                			</tr>
                			<tr>
                				<td>Số lượt xem hàng ngày của thành viên LV4</td>
                				<td><input value="<?php echo $this->vars["lv4"] ?>" name="lv4" placeholder=""></td>
                			</tr>
                			<tr>
                				<td>Số lượt xem hàng ngày của thành viên LV5</td>
                				<td><input value="<?php echo $this->vars["lv5"] ?>" name="lv5" placeholder=""></td>
                			</tr>
                			<tr>
                				<td>Số lượt xem hàng ngày của thành viên LV6</td>
                				<td><input value="<?php echo $this->vars["lv6"] ?>" name="lv6" placeholder=""></td>
                			</tr>
                				<td><a href="javascript:;" class="btn submit" rel="updatevipset"><i class="fa fa-edit"></i>Lưu</a></td>
                		</tbody></table>
                	</div>
                	
                	
                	<!--<p class="title">Các cấp độ thành viên khác nhau thiết kế số lượng tải xuống mỗi ngày</p>-->
                 <!--   <div class="frmtable_content">-->
                	<!--	<table class="w100">-->
                	<!--		<tbody>-->
                			<!--<tr>-->
                			<!--	<td>Lượt tải xuống hàng ngày của thành viên LV1</td>-->
                			<!--	<td><input value="<?php echo $this->vars["downlv1"] ?>" name="downlv1" placeholder=""></td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>Lượt tải xuống hàng ngày của thành viên LV2</td>-->
                			<!--	<td><input value="<?php echo $this->vars["downlv2"] ?>" name="downlv2" placeholder=""></td>-->
                			<!--</tr><tr>-->
                			<!--	<td>Lượt tải xuống hàng ngày của thành viên LV3</td>-->
                			<!--	<td><input value="<?php echo $this->vars["downlv3"] ?>" name="downlv3" placeholder=""></td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>Lượt tải xuống hàng ngày của thành viên LV4</td>-->
                			<!--	<td><input value="<?php echo $this->vars["downlv4"] ?>" name="downlv4" placeholder=""></td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>Lượt tải xuống hàng ngày của thành viên LV5</td>-->
                			<!--	<td><input value="<?php echo $this->vars["downlv5"] ?>" name="downlv5" placeholder=""></td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>Lượt tải xuống hàng ngày của thành viên LV6</td>-->
                			<!--	<td><input value="<?php echo $this->vars["downlv6"] ?>" name="downlv6" placeholder=""></td>-->
                			<!--</tr>-->
                			
                	<!--		<tr>-->
                	<!--			<td></td>-->
                			
                	<!--		</tr>-->
                	<!--	</tbody></table>-->
                	<!--</div>-->
                	
                	
                </div>
            </div>
        </div>
    </div>
</body>
</html>