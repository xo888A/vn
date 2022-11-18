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
	<script>
		
		$(function(){
		    $("select[name=content4]").find("option[value='<?php echo $this->vars["content4"] ?>']").attr("selected",true);
		    $("select[name=position]").find("option[value='<?php echo $this->vars["position"] ?>']").attr("selected",true);
            $("select[name=positionabs]").find("option[value='<?php echo $this->vars["positionabs"] ?>']").attr("selected",true);
            
            $('.position').change(function(data){
                var value = $(".position option:selected").attr("value");
                $('.search div.mr20').addClass('hide');
                $('.search div.mr20').attr('style','');
                if(value=='noselect'){
                    return;
                }else if(value=='视频帖子ID' || value=='社区帖子ID'|| value=='单页帖子ID' || value=='通用链接'|| value=='推荐用户ID'|| value=='推荐话题名称'){
                    $('.pos1').removeClass('hide');
                }else{
                    $('.pos5').text("当前选项为 : "+value);
                    $('.pos5').removeClass('hide');
                }
                
            });
            
        });
	</script>
    <style>
        .search input{
            width: 70%;
        }
        .ke-container{
            width: 75% !important;
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
                    <p class="title">Thêm quảng cáo</p>
                    <div class="notice">
		                <div class="note-info">
		                    <p class="p1 btn3">Nhắc nhở</p>
		                    <p class="pub">1. Khi quảng cáo là văn bản, nội dung cụ thể cần được viết trong phần chú thích quảng cáo và hiệu ứng quảng cáo là một liên kết thông dụng.</p>
		                  
		               </div>
		            </div>
                	<div class="frmtable_content">
                		<table class="w100">
                		    <tr>
                				<td>Vị trí quảng cáo</td>
                				<td class="search">
            						<select name="positionabs" class="positionabs">
            						   <option value="noselect">--请选择广告位置--</option>
                                       
                                        <!--<option value="首页-推荐">首页-推荐</option>-->
                                        <!--<option value="首页-话题">首页-话题</option>-->
                                        <!--<option value="社区-最新">社区-最新</option>-->
                                        <!--<option value="社区-推荐">社区-推荐</option>-->
                                        <!--<option value="noselect">----分割线请勿选择 前台模块----</option>-->

                                        <option value="首页移动-文字广告">首页移动-文字广告</option>
                                     
                                        <option value="首页-轮播图">首页-轮播图</option>
                                       
                                        <option value="推荐-轮播图">推荐-轮播图</option>
                                       
                                        <option value="话题-轮播图">话题-轮播图</option>
                                     
                                        <option value="视频-轮播图">视频-轮播图</option>
                                     
                                        <option value="社区-轮播图">社区-轮播图</option>
                                     
                                        <option value="排行榜-轮播图">排行榜-轮播图</option>
                                    
                                      
                                    </select>
                                   
           
                				</td>
                			</tr>
                		    <tr>
                				<td>Hiệu quả quảng cáo</td>
                				<td class="search">
            						<select name="position" class="position">
            						    <option value="noselect">--APP常规页面--</option>
            						     <option value="通用链接">通用链接</option>
                                        <!--<option value="ID bài đăng video">ID bài đăng video</option>-->
                                        <!--<option value="ID bài đăng cộng đồng">ID bài đăng cộng đồng</option>-->
                                        <!--<option value="ID bài đăng trên trang đơn">ID bài đăng trên trang đơn</option>-->
                                        <!--<option value="Đề xuất tên chủ đề">Đề xuất tên chủ đề</option>-->
                                        <!--<option value="Đề xuất ID người dùng">Đề xuất ID người dùng</option>-->
                                        <!--<option value="Trang cộng đồng">Trang cộng đồng</option>-->
                                        <!--<option value="Trang video">Trang video</option>-->
                                        <!--<option value="Trang bảng xếp hạng">Trang bảng xếp hạng</option>-->
                                        <!--<option value="Trang đề xuất">Trang đề xuất</option>-->
                                        <!--<option value="Trang chủ đề">Trang chủ đề</option>-->
                                        <!--<option value="Trang danh sách tất cả các chủ đề">Trang danh sách tất cả các chủ đề</option>-->
                                        <!--<option value="Trang danh sách tất cả người dùng">Trang danh sách tất cả người dùng</option>-->
                                        <!--<option value="Người dùng chọn lọc">Người dùng chọn lọc</option>-->
                                        <!--<option value="Lưu trữ chủ đề">Lưu trữ chủ đề</option>-->
                                        <!--<option value="Chọn cách chơi">Chọn cách chơi</option>-->
                                        <!--<option value="noselect">----Trang trung tâm thành viên APP----</option>-->
                                        <!-- <option value="Cài đặt tài khoản">Cài đặt tài khoản</option>-->
                                        <!-- <option value="Ví của tôi">Ví của tôi</option>-->
                                        <!-- <option value="Nạp tiền VIP">Nạp tiền VIP</option>-->
                                        <!-- <option value="Nạp tiền vàng">Nạp tiền vàng</option>-->
                                        <!-- <option value="Đổi mật khẩu thẻ">Đổi mật khẩu thẻ</option>-->
                                        <!-- <option value="heo dõi của tôi">Theo dõi của tôi</option>-->
                                        <!-- <option value="Dịch vụ khách hàng">Dịch vụ khách hàng</option>-->
                                        <!-- <option value="Trung tâm thông tin">Trung tâm thông tin</option>-->
                                        <!-- <option value="Quảng cáo kiếm tiền">Quảng cáo kiếm tiền</option>-->
                                        <!-- <option value="Hoạt động chính thức">Hoạt động chính thức</option>-->
                                        <!-- <option value="APP đề xuất">APP đề xuất</option>-->
                                    </select>
                                    <div class="hide mr20 pos1" <?php echo $this->vars["pos1"] ?>>
                                        <input name="postid" value="<?php echo $this->vars["postid"] ?>" placeholder="Điền thông tin liên quan vào đây" />
                                        <p>Liên kết phải được thêm_@</p>
                                        </div>
                                    
                                    <div class="hide mr20 pos5" <?php echo $this->vars["pos5"] ?>></div>
                                   
                                    
           
                				</td>
                			</tr>
                			<tr>
                				<td>Ghi chú quảng cáo</td>
                				<td><p><input name="remarks" value="<?php echo $this->vars["remarks"] ?>" placeholder="" /></p></td>
                			</tr>
                			<tr>
                				<td>Quyền quảng cáo</td>
                				<td>
                				    <ul class="adv_ul">
                				        <li><input name="lv0" <?php echo $this->vars["l0"] ?> type="checkbox" />Thành viên bình thường</li>
                				        <li><input name="lv1" <?php echo $this->vars["l1"] ?> type="checkbox" />Thành viên LV1</li>
                				        <li><input name="lv2" <?php echo $this->vars["l2"] ?> type="checkbox" />Thành viên LV2</li>
                				        <li><input name="lv3" <?php echo $this->vars["l3"] ?> type="checkbox" />Thành viên LV3</li>
                				        <li><input name="lv4" <?php echo $this->vars["l4"] ?> type="checkbox" />Thành viên LV4</li>
                				        <li><input name="lv5" <?php echo $this->vars["l5"] ?> type="checkbox" />Thành viên LV5</li>
                				        <li><input name="lv6" <?php echo $this->vars["l6"] ?> type="checkbox" />Thành viên LV6</li>
                				    </ul>
                				    
                				</td>
                			</tr>
                			<tr>
                			    <td></td><td>Tất cả quyền hạn đều cần chọn</td>
                			</tr>
                   <!--         <tr>-->
                			<!--	<td>Gian hàng sở hữu</td>-->
                			<!--	<td><p><input name="tel" value="<?php echo $this->vars["tel"] ?>" placeholder="Vui lòng điền số điện thoại di động của người dùng, nếu không, nó sẽ thuộc về nhà điều hành" /></p></td>-->
                			<!--</tr>-->
                			<tr>
                				<td>Ảnh bìa quảng cáo</td>
                				<td class="upload">
                				    <form class="test" method="post" enctype="multipart/form-data">
                                		<p>
                                			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">Chọn</a>
                                		</p><input placeholder="Vui lòng lựa chọn hình ảnh" class="css" mode="upload" name="imgcover" value="<?php echo $this->vars["imgcover"] ?>">
                                		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>Tải lên</a>
                            		</form>
                				</td>
                			</tr>
                			<!--<tr>-->
                			<!--	<td>Thời gian hết hạn quảng cáo</td>-->
                			<!--	<td><p><input id="time" name="endtime" value="<?php echo $this->vars["endtime"] ?>" placeholder="Bấm chọn thời gian hết hạn, để trống nghĩa là nó sẽ không bao giờ hết hạn" /></p></td>-->
                			<!--</tr>-->
                			<tr>
                				<!--<td>Hiệu quả nhấp chuột của quảng cáo</td>-->
                				<!--<td class="search selectdiv">-->
                				<!--    <select name="select" class="select">-->
                				<!--        <option value="noselect">--Vui lòng chọn hiệu quả nhấp chuột--</option>-->
                    <!--                    <option value="Rời APP đến trình duyệt">Rời APP đến trình duyệt</option>-->
                    <!--                    <option value="Mở các liên kết bên ngoài trong APP này">Mở các liên kết bên ngoài trong APP này</option>-->
                    <!--                    <option value="Chuyển đến một bài đăng trong APP">Chuyển đến một bài đăng trong APP</option>-->
                    <!--                    <option value="Chuyển đến mục chức năng APP">Chuyển đến mục chức năng APP</option>-->
                    <!--                    <option value="Chuyển đến trang nổi bật của APP">Chuyển đến trang nổi bật của APP</option>-->
                    <!--                </select>-->
                    <!--                <div class=" mt20 div1"><input name="content1" value="<?php echo $this->vars["content1"] ?>" placeholder="Vui lòng nhập liên kết" /></div>-->
                    <!--                <div class="hide mt20 div2"><input name="content2" value="<?php echo $this->vars["content2"] ?>" placeholder="Vui lòng nhập liên kết" /></div>-->
                    <!--                <div class="hide mt20 div3"><input name="content3" value="<?php echo $this->vars["content3"] ?>" placeholder="Vui lòng nhập ID bài viết, có thể vào trang quản lý video / cộng đồng để xem" /></div>-->
                                <!--    <div class="hide mt20 div4">-->
                                <!--        <select name="content4">-->
                                <!--            <option value="0">--Vui lòng chọn một tính năng--</option>-->
                    				        <!--<option value="Nạp tiền cho thành viên VIP">Nạp tiền cho thành viên VIP</option>-->
                                <!--            <option value="Nạp kim cương">Nạp kim cương</option>-->
                                <!--            <option value="Trung tâm trao đổi">Trung tâm trao đổi</option>-->
                                <!--            <option value="Dịch vụ khách hàng">Dịch vụ khách hàng</option>-->
                                <!--            <option value="Lợi nhuận của tôi">Lợi nhuận của tôi</option>-->
                                <!--            <option value="Kim cương đổi tiền mặt">Kim cương đổi tiền mặt</option>-->
                                <!--            <option value="Rút tiền">Rút tiền</option>-->
                                <!--            <option value="Thiết lập gian hàng">Thiết lập gian hàng</option>-->
                                <!--            <option value="Kiếm tiền như thế nào">Kiếm tiền như thế nào</option>-->
                                <!--            <option value="Mở rộng chia sẻ">Mở rộng chia sẻ</option>-->
                                <!--            <option value="Trung tâm phát triển ứng dụng">Trung tâm phát triển ứng dụng</option>-->
                                <!--            <option value="Trang phát hành">Trang phát hành</option>-->
                                <!--            <option value="Cài đặt">Cài đặt</option>-->
                                <!--            <option value="Theo dõi cùng người hâm mộ">Theo dõi cùng người hâm mộ</option>-->
                                <!--            <option value="Lời mời của tôi">Lời mời của tôi</option>-->
                                <!--            <option value="Lịch sử nạp tiền">Lịch sử nạp tiền</option>-->
                                <!--            <option value="Quản lý phát hành">Quản lý phát hành</option>-->
                                <!--        </select>-->
                                <!--    </div>-->
                                    <!--<div class="hide mt20 div5">-->
                                    <!--    <textarea name="content5" placeholder=""><?php echo $this->vars["content5"] ?></textarea>-->
                                    <!--</div>-->
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