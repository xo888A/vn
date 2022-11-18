<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>Hoạt động</title>
    <link rel="stylesheet" href="<?php echo CSS ?>/backstage.css" />
    <link rel="stylesheet" href="<?php echo CSS ?>/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo CSS ?>/time.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/backstage.js"></script>
    <script src="<?php echo JS ?>/time.js"></script>
    <link rel="stylesheet" href="<?php echo PLUGINS ?>/themes/default/default.css" />
	<link rel="stylesheet" href="<?php echo PLUGINS ?>/plugins/code/prettify.css" />
	<script charset="utf-8" src="<?php echo PLUGINS ?>/kindeditor-all.js"></script>
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
            $("select[name=select]").find("option[value='<?php echo $this->vars["click"] ?>']").attr("selected",true);
		    $("select[name=content4]").find("option[value='<?php echo $this->vars["content4"] ?>']").attr("selected",true);
            $('.select').change(function(data){
                var value = $(".select option:selected").attr("value");
                $('.selectdiv div.mt20').addClass('hide');
                if(value=='noselect'){
                    return;
                }else if(value=='跳出APP到浏览器'){
                    $('.div1').removeClass('hide');
                }
                // else if(value=='本APP内打开外链'){
                //     $('.div2').removeClass('hide');
                // }else if(value=='跳到APP内某个帖子'){
                //     $('.div3').removeClass('hide');
                // }else if(value=='跳到APP功能项'){
                //     $('.div4').removeClass('hide');
                // }else if(value=='跳到APP专题页'){
                //     $('.div5').removeClass('hide');
                // }
                
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
                	<p class="title">Thêm hoạt động</p>
                	<div class="frmtable_content">
                		<table class="w100">
                			<tr>
                				<td>Tiêu đề hoạt động</td>
                				<td><p><input name="title" value="<?php echo $this->vars["title"] ?>" placeholder="không quá 90 ký tự (30 từ)" /></p></td>
                			</tr>

                			<tr>
                				<td>Ảnh bìa hoạt động</td>
                				<td class="upload">
                				    <form class="test" method="post" enctype="multipart/form-data">
                                		<p>
                                			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">Lựa chọn</a>
                                		</p><input placeholder="Vui lòng lựa chọn hình ảnh" class="css" mode="upload" name="activitycover" value="<?php echo $this->vars["activitycover"] ?>">
                                		<a class="btn btn1 upload" href="javascript:;"><i class="fa fa-cloud-upload"></i>Tải lên</a>
                            		</form>
                				</td>
                			</tr>
            			    <tr>
                				<td>Thời gian hoạt động</td>
                				<td><input id="time1" name="time1" onclick="laydate(<?php echo $this->vars["istime: true,format:'YYYY-MM-DD hh:mm'"] ?>)" class="w30 marb10" value="<?php echo $this->vars["time1"] ?>" placeholder="Thời gian bắt đầu">
                				<input id="time2" class="w30 marb10" onclick="laydate(<?php echo $this->vars["istime: true,format:'YYYY-MM-DD hh:mm'"] ?>)" name="time2" value="<?php echo $this->vars["time2"] ?>" placeholder="Thời gian kết thúc"><br>
                			</tr>
                		    <tr>
                				<td>Hiệu quả nhấp chuột của quảng cáo</td>
                				<td class="search selectdiv">
                				    <select name="select" class="select">
                				        <option value="noselect">--请选择点击效果--</option>
                                        <option value="跳出APP到浏览器">跳出APP到浏览器</option>
                                        <!--<option value="本APP内打开外链">本APP内打开外链</option>-->
                                        <!--<option value="跳到APP内某个帖子">跳到APP内某个帖子</option>-->
                                        <!--<option value="跳到APP功能项">跳到APP功能项</option>-->
                                        <!--<option value="跳到APP专题页">跳到APP专题页</option>-->
                                    </select>
                                    <div class="hide mt20 div1"><input name="content1" value="<?php echo $this->vars["content1"] ?>" placeholder="请输入链接" /></div>
                                    <div class="hide mt20 div2"><input name="content2" value="<?php echo $this->vars["content2"] ?>" placeholder="请输入链接" /></div>
                                <!--    <div class="hide mt20 div3"><input name="content3" value="<?php echo $this->vars["content3"] ?>" placeholder="请输入帖子ID,可前往视频管理页面查看" /></div>-->
                                <!--    <div class="hide mt20 div4">-->
                                <!--        <select name="content4">-->
                                <!--            <option value="0">--请选择功能项--</option>-->
                    				        <!--<option value="VIP会员充值">VIP会员充值</option>-->
                                <!--            <option value="钻石充值">钻石充值</option>-->
                                <!--            <option value="兑换中心">兑换中心</option>-->
                                <!--            <option value="客服中心">客服中心</option>-->
                                <!--            <option value="我的收益">我的收益</option>-->
                                <!--            <option value="钻石兑换现金">钻石兑换现金</option>-->
                                <!--            <option value="提现">提现</option>-->
                                <!--            <option value="商家入驻">商家入驻</option>-->
                                <!--            <option value="如何赚钱">如何赚钱</option>-->
                                <!--            <option value="分享推广">分享推广</option>-->
                                <!--            <option value="应用推广中心">应用推广中心</option>-->
                                <!--            <option value="发布页面">发布页面</option>-->
                                <!--            <option value="设置">设置</option>-->
                                <!--            <option value="关注与粉丝">关注与粉丝</option>-->
                                <!--            <option value="我的邀请">我的邀请</option>-->
                                <!--            <option value="充值记录">充值记录</option>-->
                                <!--            <option value="发布管理">发布管理</option>-->
                                <!--        </select>-->
                                <!--    </div>-->
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
    <script type="text/javascript">
        var opts1={
            'targetId':'time1',//时间写入对象的id
            'hms':'on',
            'format':'-',
            'min':'2021-06-09 10:00:00',
            'max':'2099-10-30 10:00:00'
        };
        var opts2={
            'targetId':'time2',//时间写入对象的id
            'hms':'on',
            'format':'-',
            'min':'2021-06-09 10:00:00',
            'max':'2099-10-30 10:00:00'
        };

    xvDate(opts1);
    xvDate(opts2);
    var select = '<?php echo $this->vars["click"] ?>'; 
    if(select=='跳出APP到浏览器'){
        $('.div1').removeClass('hide');
    }
    // else if(select=='本APP内打开外链'){
    //     $('.div2').removeClass('hide');
    // }else if(select=='跳到APP内某个帖子'){
    //     $('.div3').removeClass('hide');
    // }else if(select=='跳到APP功能项'){
    //     $('.div4').removeClass('hide');
    // }else if(select=='跳到APP专题页'){
    //     $('.div5').removeClass('hide');
    // }
    
</script>
</body>
</html>