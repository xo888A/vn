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
	<script charset="utf-8" src="<?php echo PLUGINS ?>/kindeditor-all.js"></script>
	<script charset="utf-8" src="<?php echo PLUGINS ?>/lang/zh-CN.js"></script>
	<script charset="utf-8" src="<?php echo PLUGINS ?>/plugins/code/prettify.js"></script>
	
    <script type="text/javascript">
        $(function(){
            
            KindEditor.ready(function(K) {
			var editor1 = K.create('.textarea', {
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
        .textarea{
            height:200px;
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
                    <p class="title">Đăng tải trang chủ thông báo/Thông tin chính thức</p>
                    <div class="frmtable_content">
                		<table class="w100">
                			<tbody>
                			<tr>
                				<td>Thể loại thông tin</td>
                				<td class="rel">
                					<input readonly="true" value="<?php echo $this->vars["mtype"] ?>" class="pub_select" name="mtype" placeholder="点击选择消息类型">
                					<ul class="abs hide">
                					    <li value="1">Trang chủ thông báo</li>
                					    <li value="2">Thông tin chính thức</li>
                					</ul>
                				</td>
                			</tr>
                			<tr>
                				<td>Thời gian đăng tải</td>
                				<td><input  name="ftime" class='' value="<?php echo $this->vars["ftime"] ?>"></td>
                			</tr><input type="hidden" value="<?php echo $this->vars["id"] ?>" name="id" />
                			<tr>
                				<td>Nội dung thông tin</td>
                				<td><input  name="content" class='textarea' value="<?php echo $this->vars["content"] ?>"></td>
                			</tr>
                			
                			<tr>
                				<td></td>
                				<td><?php echo $this->vars["button"] ?></td>
                			</tr>
                		</tbody></table>
                	</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>