<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>设置</title>
    <link rel="stylesheet" href="<?php echo CSS ?>/backstage.css" />
    <link rel="stylesheet" href="<?php echo CSS ?>/font-awesome.min.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/backstage.js"></script>
    <link rel="stylesheet" href="<?php echo PLUGINS ?>/themes/default/default.css" />
	<link rel="stylesheet" href="<?php echo PLUGINS ?>/plugins/code/prettify.css" />
	<script charset="utf-8" src="<?php echo PLUGINS ?>/kindeditor-all.js"></script>
	<script charset="utf-8" src="<?php echo PLUGINS ?>/lang/zh-CN.js"></script>
	<script charset="utf-8" src="<?php echo PLUGINS ?>/plugins/code/prettify.js"></script>
    <script type="text/javascript">
        $(function(){
            $("select[name=greenhorn]").find("option[value='<?php echo $this->vars["greenhorn"] ?>']").attr("selected",true);
            $("select[name=customer]").find("option[value='<?php echo $this->vars["customer"] ?>']").attr("selected",true);
            $("select[name=onlyvip]").find("option[value='<?php echo $this->vars["onlyvip"] ?>']").attr("selected",true);
            $("select[name=vipcomments]").find("option[value='<?php echo $this->vars["vipcomments"] ?>']").attr("selected",true);
            $("select[name=scaletype]").find("option[value='<?php echo $this->vars["scaletype"] ?>']").attr("selected",true);
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
        });
    </script>
    <style>
        .frmtable_content td.r input{
            margin-bottom:5px;width:10%
        }
        td.r{
            font-size:14px;
            color:#888;
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
                    <p class="title">Cài đặt hệ thống</p>
                    <div class="frmtable_content">
                		<table class="w100">
                			<tbody>
            			    <!--<tr>-->
                			<!--	<td>每日免费观影次数</td>-->
                			<!--	<td><input value="<?php echo $this->vars["look"] ?>" name="look" placeholder="填写0代表可以无限观看"></td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>是否开启新注册24小时限时卡</td>-->
                			<!--	<td class="search">-->
                			<!--	    <select name="greenhorn">-->
                   <!--                     <option value="1">开启</option>-->
                   <!--                     <option value="0">不开启</option>-->
                   <!--                 </select>-->
                   <!--             </td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>是否开启在线客服</td>-->
                			<!--	<td class="search">-->
                			<!--	    <select name="customer">-->
                   <!--                     <option value="1">开启</option>-->
                   <!--                     <option value="0">关闭</option>-->
                   <!--                 </select>-->
                   <!--             </td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>用户最低提现金额</td>-->
                			<!--	<td><input value="<?php echo $this->vars["withdrawals"] ?>" name="withdrawals" placeholder="单位:元 需输入整数,不含小数点"></td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>用户提现至少充值多少</td>-->
                			<!--	<td><input value="<?php echo $this->vars["pay"] ?>" name="pay" placeholder="单位:元 需输入整数,不含小数点"></td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>钻石兑换现金手续费</td>-->
                			<!--	<td><input value="<?php echo $this->vars["diamcharge"] ?>" name="diamcharge" placeholder="单位:钻石 需输入整数,不含小数点"></td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>是否VIP用户才能发布社区</td>-->
                			<!--	<td class="search">-->
                			<!--	    <select name="onlyvip">-->
                   <!--                     <option value="1">是</option>-->
                   <!--                     <option value="0">否</option>-->
                   <!--                 </select>-->
                   <!--             </td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>是否VIP用户才能发布评论</td>-->
                			<!--	<td class="search">-->
                			<!--	    <select name="vipcomments">-->
                   <!--                     <option value="1">是</option>-->
                   <!--                     <option value="0">否</option>-->
                   <!--                 </select>-->
                   <!--             </td>-->
                			<!--</tr>-->
                			<tr>
                				<td>Tỷ lệ nghịch đảo của người dùng ở các cấp độ khác nhau</td>
                				<td class="r">
                				    <input value="<?php echo $this->vars["r1"] ?>" name="r1" placeholder="1tỷ lệ nghịch đảo tác nhân">
                				    <!--<input value="<?php echo $this->vars["r2"] ?>" name="r2" placeholder="2级代理反额比">-->
                				    <!--<input value="<?php echo $this->vars["r3"] ?>" name="r3" placeholder="3级代理反额比">-->
                                </td>
                			</tr>
                			<!--<tr>-->
                			<!--	<td>总业绩返利比(业绩范围/返利比)</td>-->
                			<!--	<td class="r">-->
                			<!--	    <input value="<?php echo $this->vars["p1"] ?>" name="p1" placeholder="开始金额">-->
                			<!--	    <input value="<?php echo $this->vars["p2"] ?>" name="p2" placeholder="结束金额">-->
                			<!--	    <input value="<?php echo $this->vars["f1"] ?>" name="f1" placeholder="返利比">-->
                   <!--             </td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>总业绩返利比(业绩范围/返利比)</td>-->
                			<!--	<td class="r">-->
                			<!--	    <input value="<?php echo $this->vars["p3"] ?>" name="p3" placeholder="开始金额">-->
                			<!--	    <input value="<?php echo $this->vars["p4"] ?>" name="p4" placeholder="结束金额">-->
                			<!--	    <input value="<?php echo $this->vars["f2"] ?>" name="f2" placeholder="返利比">-->
                   <!--             </td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>总业绩返利比(业绩范围/返利比)</td>-->
                			<!--	<td class="r">-->
                			<!--	    <input value="<?php echo $this->vars["p5"] ?>" name="p5" placeholder="开始金额">-->
                			<!--	    <input value="<?php echo $this->vars["f3"] ?>" name="f3" placeholder="返利比">-->
                   <!--             </td>-->
                			<!--</tr>-->
                			<tr>
                				<td>Mời tặng VIP</td>
                				<td class="r">
                				    Mời <input value="<?php echo $this->vars["inviteuser1"] ?>" name="inviteuser1" placeholder="Số người"> 人
                				    Tặng <input value="<?php echo $this->vars["inviteday1"] ?>" name="inviteday1" placeholder="Số ngày"> VIP
                                </td>
                			</tr>
                			<tr>
                				<td></td>
                				<td class="r">
                				    Mời <input value="<?php echo $this->vars["inviteuser2"] ?>" name="inviteuser2" placeholder="Số người"> 人
                				    Tặng <input value="<?php echo $this->vars["inviteday2"] ?>" name="inviteday2" placeholder="Số ngày"> VIP
                                </td>
                			</tr>
                			<tr>
                				<td></td>
                				<td class="r">
                				    Mời <input value="<?php echo $this->vars["inviteuser3"] ?>" name="inviteuser3" placeholder="Số người"> 人
                				    Tặng <input value="<?php echo $this->vars["inviteday3"] ?>" name="inviteday3" placeholder="Số ngày"> VIP
                                </td>
                			</tr>
                			<tr>
                				<td></td>
                				<td class="r">
                				    Mời <input value="<?php echo $this->vars["inviteuser4"] ?>" name="inviteuser4" placeholder="Số người"> 人
                				    Tặng <input value="<?php echo $this->vars["inviteday4"] ?>" name="inviteday4" placeholder="Số ngày"> VIP
                                </td>
                			</tr>
                			<!--<tr>-->
                			<!--	<td>播放器播放模式</td>-->
                			<!--	<td class="search">-->
                			<!--	    <select name="scaletype">-->
                   <!--                     <option value="自适应">自适应</option>-->
                   <!--                     <option value="全屏">全屏</option>-->
                   <!--                 </select>-->
                   <!--             </td>-->
                			<!--</tr>-->
                			<tr>
                				<td>Danh sách từ khóa</td>
                				<td><input value="<?php echo $this->vars["keywordslist"] ?>" name="keywordslist" placeholder="Từ khóa được phân tách bằng (,)"></td>
                			</tr>
                			<tr>
                				<td>Danh sách các từ bị cấm</td>
                				<td><input value="<?php echo $this->vars["weijinci"] ?>" name="weijinci" placeholder="Từ bị cấm được phân tách bằng (,)"></td>
                			</tr>
                			<tr>
                				<td>ID đề xuất trang tìm kiếm</td>
                				<td><input value="<?php echo $this->vars["tuijianid"] ?>" name="tuijianid" placeholder="ID được phân tách bằng (,)"></td>
                			</tr>
                			<tr>
                				<td>Vlogerr chọn lọc</td>
                				<td><input value="<?php echo $this->vars["selectuser"] ?>" name="selectuser" placeholder="Danh sách tên người dùng được phân tách bằng (,)"></td>
                			</tr>
                			<!--<tr>-->
                			<!--	<td>备用域名</td>-->
                			<!--	<td><input value="<?php echo $this->vars["geturl"] ?>" name="geturl" placeholder=""></td>-->
                			<!--</tr>-->
                			<tr>
                				<td>Địa chỉ tải xuống iOS</td>
                				<td><input value="<?php echo $this->vars["ios"] ?>" name="ios" placeholder="Liên kết tải xuống đầy đủ"></td>
                			</tr>
                			<tr>
                				<td>Địa chỉ tải xuống Android</td>
                				<td><input value="<?php echo $this->vars["android"] ?>" name="android" placeholder="Liên kết tải xuống đầy đủ"></td>
                			</tr>
                			
                			<tr>
                				<td>Liên kết dịch vụ khách hàng</td>
                				<td><input value="<?php echo $this->vars["kefu1"] ?>" name="kefu1" placeholder=""></td>
                			</tr>
                			<tr>
                				<td>Liên kết dịch vụ khách hàng dự phòng</td>
                				<td><input value="<?php echo $this->vars["kefu2"] ?>" name="kefu2" placeholder=""></td>
                			</tr>
                			<tr>
                				<td>Mô tả tải xuống iOS</td>
                				<td>
                				    <textarea name="iosdesc"><?php echo $this->vars["iosdesc"] ?></textarea>
                				    
                				</td>
                			</tr>
                			<tr>
                				<td>Mô tả tải xuống Android</td>
                				<td>
                				    <textarea name="androiddesc"><?php echo $this->vars["androiddesc"] ?></textarea>
                				</td>
                			</tr>
                			<!--<tr>-->
                			<!--	<td>SMTP服务器</td>-->
                			<!--	<td><input value="<?php echo $this->vars["smtp1"] ?>" name="smtp1" placeholder=""></td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>SMTP用户名</td>-->
                			<!--	<td><input value="<?php echo $this->vars["smtp2"] ?>" name="smtp2" placeholder=""></td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>密码或授权码</td>-->
                			<!--	<td><input value="<?php echo $this->vars["smtp3"] ?>" name="smtp3" placeholder=""></td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>端口</td>-->
                			<!--	<td><input value="<?php echo $this->vars["smtp4"] ?>" name="smtp4" placeholder=""></td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>发件人</td>-->
                			<!--	<td><input value="<?php echo $this->vars["smtp5"] ?>" name="smtp5" placeholder=""></td>-->
                			<!--</tr>-->
                			
                			
                			<tr>
                				<td>Liên kết đóng góp</td>
                				<td><input value="<?php echo $this->vars["tougao"] ?>" name="tougao" placeholder=""></td>
                			</tr>
                			<tr>
                				<td>Mua hàng phải đọc (thành viên)</td>
                				<td><input value="<?php echo $this->vars["miaoshu1"] ?>" name="miaoshu1" placeholder=""></td>
                			</tr>
                			<tr>
                				<td>Mua hàng phải đọc (tiền vàng)</td>
                				<td><input value="<?php echo $this->vars["miaoshu2"] ?>" name="miaoshu2" placeholder=""></td>
                			</tr>
                			<tr>
                				<td>Giải nén liên kết hướng dẫn</td>
                				<td><input value="<?php echo $this->vars["jiaocheng"] ?>" name="jiaocheng" placeholder=""></td>
                			</tr>
                			
                			<tr>
                				<td>Thông tin bản quyền</td>
                				<td><input value="<?php echo $this->vars["hl1"] ?>" name="hl1" placeholder=""></td>
                			</tr>
                			<tr>
                				<td>Mã thống kê</td>
                				<td><input value="<?php echo $this->vars["hl2"] ?>" name="hl2" placeholder=""></td>
                			</tr>
                			
                			<tr>
                				<td></td>
                				<td><a href="javascript:;" class="btn submit" rel="updatesys"><i class="fa fa-edit"></i>Cài đặt</a></td>
                			</tr>
                		
                		
                		</tbody></table>
                	</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>