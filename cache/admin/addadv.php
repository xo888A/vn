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
		$(function(){
		    $("select[name=content4]").find("option[value='<?php echo $this->vars["content4"] ?>']").attr("selected",true);
		    $("select[name=position]").find("option[value='<?php echo $this->vars["position"] ?>']").attr("selected",true);
            $("select[name=select]").find("option[value='<?php echo $this->vars["click"] ?>']").attr("selected",true);
           
            $('.position').change(function(data){
                var value = $(".position option:selected").attr("value");
                $('.search div.mr20').addClass('hide');
                if(value=='noselect'){
                    return;
                }else if(value=='APP帖子详情页'){
                    $('.pos1').removeClass('hide');
                }else if(value=='APP应用中心'){
                    $('.pos2').removeClass('hide');
                }else if(value=='APP会员-会员'){
                    $('.pos3').removeClass('hide');
                }else if(value=='APP会员-钻石'){
                    $('.pos4').removeClass('hide');
                }else if(value=='APP会员-精选'){
                    $('.pos5').removeClass('hide');
                }else if(value=='首页-推荐'){
                    $('.pos6').removeClass('hide');
                }else if(value=='首页-话题'){
                    $('.pos7').removeClass('hide');
                }else if(value=='社区-最新'){
                    $('.pos8').removeClass('hide');
                }else if(value=='社区-推荐'){
                    $('.pos9').removeClass('hide');
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
		                    <p class="pub">1. Về mặt lý thuyết, số lượng quảng cáo được thêm vào trang này là không giới hạn. Đối với số lượng quảng cáo cố định trên trang APP, vui lòng chuyển đến cài đặt nội bộ của APP-Trang chủ / Cộng đồng.</p>
		                    <p class="pub">2. Mỗi trang phát video có thể đặt một quảng cáo và có bao nhiêu bài đăng video, bạn có thể đặt bấy nhiêu quảng cáo. Nếu không đặt, nó sẽ được lấy ngẫu nhiên từ các quảng cáo trên trang video đã đặt.</p>
		                    <p class="pub">3. Hiệu quả nhấp chuột của quảng cáo được thiết lập theo lời nhắc, hỗ trợ nhảy ra khỏi APP vào trình duyệt, hỗ trợ nhảy đến một bài viết trong APP, hỗ trợ nhảy đến mục chức năng APP, hỗ trợ nhảy sang trang nổi bật của APP (tùy chỉnh nội dung) và hỗ trợ mở các liên kết bên ngoài trong APP này.</p>
		               </div>
		            </div>
                	<div class="frmtable_content">
                		<table class="w100">
                		    <tr>
                				<td>Vị trí quảng cáo</td>
                				<td class="search">
            						<select name="position" class="position">
            						    <option value="noselect">--请选择广告位置--</option>
                                        <!--<option value="APP帖子详情页">APP帖子详情页</option>-->
                                        <!--<option value="APP应用中心">APP应用中心</option>-->
                                        <!--<option value="APP会员-会员">APP会员-会员</option>-->
                                        <!--<option value="APP会员-钻石">APP会员-钻石</option>-->
                                        <!--<option value="APP会员-精选">APP会员-精选</option>-->
                                        <!--<option value="首页-推荐">首页-推荐</option>-->
                                        <!--<option value="首页-话题">首页-话题</option>-->
                                        <!--<option value="社区-最新">社区-最新</option>-->
                                        <!--<option value="社区-推荐">社区-推荐</option>-->
                                        <!--<option value="--------">----分割线请勿选择 前台模块----</option>-->
                                        <option value="专题归档">==专题归档==</option>
                                        <option value="选择玩法">==选择玩法==</option>
                                        
                                        
                                        
                                        <option value="首页移动-文字广告">首页移动-文字广告</option>
                                        <option value="视频播放页-文字广告">视频播放页-文字广告</option>
                                        <option value="首页-轮播图">首页-轮播图</option>
                                        <option value="首页-右侧6广告">首页-右侧6广告</option>
                                        <option value="首页-右侧4广告">首页-右侧4广告</option>
                                        <option value="推荐-轮播图">推荐-轮播图</option>
                                        <option value="推荐-右侧2广告">推荐-右侧2广告</option>
                                        <option value="话题-轮播图">话题-轮播图</option>
                                        <option value="话题-右侧2广告">话题-右侧2广告</option>
                                        <option value="视频-轮播图">视频-轮播图</option>
                                        <option value="视频-右侧6广告">视频-右侧6广告</option>
                                        <option value="视频-右侧4广告">视频-右侧4广告</option>
                                        <option value="社区-轮播图">社区-轮播图</option>
                                        <option value="社区-右侧6广告">社区-右侧6广告</option>
                                        <option value="社区-右侧4广告">社区-右侧4广告</option>
                                        <option value="排行榜-轮播图">排行榜-轮播图</option>
                                        <option value="排行榜-右侧2广告">排行榜-右侧2广告</option>
                                        <option value="视频详情页-右侧2广告">视频详情页-右侧2广告</option>
                                        <option value="社区详情页-右侧2广告">社区详情页-右侧2广告</option>
                                        <option value="--------">----分割线请勿选择 用户模块----</option>
                                        <option value="用户模块-3广告">用户模块-3广告</option>
                                    </select>
                                    <div class="hide mr20 pos1"><input name="postid" value="<?php echo $this->vars["postid"] ?>" placeholder="请输入帖子ID, 支持影片ID与社区ID" /></div>
                                    <div class="hide mr20 pos2"><p name="pos2">当前选项为APP应用中心</p></div>
                                    <div class="hide mr20 pos3"><p name="pos3">当前选项为APP会员-会员</p></div>
                                    <div class="hide mr20 pos4"><p name="pos4">当前选项为APP会员-钻石</p></div>
                                    <div class="hide mr20 pos5"><p name="pos5">当前选项为APP会员-精选</p></div>
                                    <div class="hide mr20 pos6"><p name="pos6">当前选项为首页-推荐</p></div>
                                    <div class="hide mr20 pos7"><p name="pos7">当前选项为首页-话题</p></div>
                                    <div class="hide mr20 pos8"><p name="pos8">当前选项为社区-最新</p></div>
                                    <div class="hide mr20 pos9"><p name="pos9">当前选项为社区-推荐</p></div>
           
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
                			<!--	<td><p><input name="tel" value="<?php echo $this->vars["tel"] ?>" placeholder="Vui lòng điền số điện thoại di động của người dùng, nếu không sẽ thuộc về nhà điều hành" /></p></td>-->
                			<!--</tr>-->
                			<tr>
                				<td>Ảnh bìa quảng cáo</td>
                				<td class="upload">
                				    <form class="test" method="post" enctype="multipart/form-data">
                                		<p>
                                			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">Chọn</a>
                                		</p><input placeholder="Vui lòng chọn hình ảnh" class="css" mode="upload" name="imgcover" value="<?php echo $this->vars["imgcover"] ?>">
                                		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>Tải lên</a>
                            		</form>
                				</td>
                			</tr>
                			<!--<tr>-->
                			<!--	<td>广告到期时间</td>-->
                			<!--	<td><p><input id="time" name="endtime" value="<?php echo $this->vars["endtime"] ?>" placeholder="点击选择到期时间, 不填代表永不过期" /></p></td>-->
                			<!--</tr>-->
                			<tr>
                				<td>Hiệu quả nhấp chuột của quảng cáo</td>
                				<td class="search selectdiv">

                                    <label>Thêm vào sau liên kết_@@</label>
                                    <div class=" mt20 div1"><input name="content1" value="<?php echo $this->vars["content1"] ?>" placeholder="Vui lòng nhập liên kết" /></div>

                                    <div class="hide mt20 div5">
                                        <textarea name="content5" placeholder=""><?php echo $this->vars["content5"] ?></textarea>
                                    </div>
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