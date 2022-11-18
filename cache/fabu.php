<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="maximum-scale=1.0, minimum-scale=1.0, user-scalable=0, initial-scale=1.0, width=device-width" />
    <meta name="format-detection" content="telephone=no, email=no, date=no, address=no">
    <title>Đăng lên</title>
    <link rel="stylesheet" href="<?php echo CSS ?>/style.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/backstage.js"></script>
    <script>
        function fabu(){
            var post_flag = false; 
            if(post_flag) return; post_flag = true;
            data = $('.frmtable_content input,.frmtable_content textarea,.frmtable_content select').serialize();
            $.ajax({
        		type: "post",
        		url: "/webajax.php?mod=useraddvideo",
        		dataType: 'json',
        		data: data,
        		success: function(data){
                    //$('.message').remove();
                    //$('body').append(data); 
                    if(data.state=='success'){
                        alert(data.data);
                        location.reload();
                    }else{
                        alert(data.data);
                    }
                    
                    post_flag =false;
                },
        		error: function() {
                    post_flag =false;
                },
                beforeSend: function() {
                    
                }
           })
        }
    </script>
</head>

<body>
    <?php file::import("system-model-header"); ?>
    <div class="wrap2 overflow">

            <div class="">
                <div>
                    <p style="margin:20px 0;font-weight: bold;"><a style="color: #3FCF7F;" href="<?php echo INDEX ?>/index.php?mod=user"><< 返回会员中心</a></p>
                    <p style="width:100%;height:1px;background:#ccc;"></p>
                </div>
               <section class="public frmtable_content">
                   <table class="w100">
                            <tr>
                				<td>Loại video</td>
                				<td>
                				    <select name="vidtype">
                				        <option value='Video dài'>Video dài</option>
                				        <option value='Video ngắn'>Video ngắn</option>
                				    </select>
                				</td>
                			</tr>
                            <tr>
                				<td>Chủ đề video</td>
                				<td><p><input name="title"  placeholder="Không quá 99 ký tự (33 ký tự)" /></p></td>
                			</tr>
                	
                			<tr>
                				<td>Danh mục lựa chọn </td>
                				<td>
                				    <select name="topic">
                				        <?php echo $this->vars["option"] ?>
                				    </select>
                				</td>
                			</tr>
                			<tr>
                				<td>Ảnh bìa video</td>
                				<td class="upload">
                				    <form class="test" method="post" enctype="multipart/form-data">
                                		<p>
                                			<a class="rel btn btn3" href="javascript:;"><input name="file" type="file">Chọn</a>
                                		</p><input placeholder="Lựa chọn ảnh" class="css" mode="upload" name="videocover" >
                                		<a class="btn btn1 upload" href="javascript:;">Tải lên</a>
                            		</form>
                				</td>
                			</tr>
                			<tr>
                				<td>Địa chỉ video</td>
                				<td class="upload">
                				    <form class="test" method="post" enctype="multipart/form-data">
                                		<p>
                                			<a class="rel btn btn3" href="javascript:;"><i class="fa fa-file-photo-o"></i><input name="file" type="file">Chọn</a>
                                		</p><input placeholder="Vui lòng tải video lên hoặc điền vào liên kết video từ xa" class="css" mode="upload" name="videourl" >
                                		<a class="btn btn1 upload" href="javascript:;">Tải lên</a>
                            		</form>
                				</td>
                				
                			</tr>
                			
                			<!--<tr>-->
                			<!--	<td>Thời lượng video</td>-->
                			<!--	<td><input name="addparam"  placeholder="Thời lượng video Định dạng 00:00" /></td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>视频大小</td>-->
                			<!--	<td><input name="addparam"  placeholder="Định dạng: 12.5M" /></td>-->
                			<!--</tr>-->
                			<tr>
                				<td></td>
                				<td>
                				    <input name="userid" type="hidden" value="<?php echo $this->vars["tel"] ?>" />
                				    <a class="btn btn1" href="javascript:;" onclick="fabu()">Đăng ngay</a>
                				</td>
                			</tr>
                   </table>
               </section>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <?php file::import("system-model-footer"); ?>
</body>

</html>
