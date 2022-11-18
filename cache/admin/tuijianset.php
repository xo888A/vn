<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>CÀI ĐẶT</title>
    <link rel="stylesheet" href="<?php echo CSS ?>/backstage.css" />
    <link rel="stylesheet" href="<?php echo CSS ?>/font-awesome.min.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/backstage.js"></script>
   
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
            			    
                			<tr>
                				<td>首页模块（不限数量）</td>
                				<td><input value="<?php echo $this->vars["tja"] ?>" name="tja" placeholder="Phân tách nhiều chủ đề bằng dấu phẩy (,)"></td>
                			</tr>
                			<!--<tr>-->
                			<!--	<td>【Trang chủ】 Đề xuất ở bên phải (4)</td>-->
                			<!--	<td><input value="<?php echo $this->vars["tjb"] ?>" name="tjb" placeholder="Phân tách nhiều chủ đề bằng dấu phẩy (,)"></td>-->
                			<!--</tr>-->
                		    <tr>
                				<td>【推荐】右侧推荐 (9个)</td>
                				<td><input value="<?php echo $this->vars["tjc"] ?>" name="tjc" placeholder="Phân tách nhiều chủ đề bằng dấu phẩy (,)"></td>
                			</tr>
                		    <tr>
                				<td>【话题】 模块推荐(数量不限)</td>
                				<td><input value="<?php echo $this->vars["tjd"] ?>" name="tjd" placeholder="Phân tách nhiều chủ đề bằng dấu phẩy (,)"></td>
                			</tr>
                			<tr>
                				<td>【排行榜】右侧推荐(9)</td>
                				<td><input value="<?php echo $this->vars["tje"] ?>" name="tje" placeholder="Phân tách nhiều chủ đề bằng dấu phẩy (,)"></td>
                			</tr>
                			
                			
                			<!--<tr>-->
                			<!--	<td>【Video】đề xuất ở bên phải (4)</td>-->
                			<!--	<td><input value="<?php echo $this->vars["tjf"] ?>" name="tjf" placeholder="Phân tách nhiều chủ đề bằng dấu phẩy (,)"></td>-->
                			<!--</tr>-->
                			<!--<tr>-->
                			<!--	<td>【Cộng đồng】đề xuất ở bên phải (4)</td>-->
                			<!--	<td><input value="<?php echo $this->vars["tjg"] ?>" name="tjg" placeholder="Phân tách nhiều chủ đề bằng dấu phẩy (,)"></td>-->
                			<!--</tr>-->
                			<tr>
                				<td>【排行榜】右侧推荐(9个)</td>
                				<td><input value="<?php echo $this->vars["tjh"] ?>" name="tjh" placeholder="Phân tách nhiều người dùng bằng dấu phẩy (,)"></td>
                			</tr>
                			<tr>
                				<td>推荐大模块-分类推荐(30个)</td>
                				<td><input value="<?php echo $this->vars["tuijianlist"] ?>" name="tuijianlist" placeholder="Phân tách nhiều phân loại bằng dấu phẩy (,)"></td>
                			</tr>
                		    
                		    
                		    <tr>
                				<td>视频主页顶部滑动分类(无限个)</td>
                				<td><input value="<?php echo $this->vars["vlist"] ?>" name="vlist" placeholder="Phân tách nhiều phân loại bằng dấu phẩy (,)"></td>
                			</tr>
                			<tr>
                				<td>社区主页顶部滑动分类(无限个)</td>
                				<td><input value="<?php echo $this->vars["ilist"] ?>" name="ilist" placeholder="Phân tách nhiều phân loại bằng dấu phẩy (,)"></td>
                			</tr>
                			
                			
                			<tr>
                				<td>Trang chủ - Đoán bạn thích (Không giới hạn))</td>
                				<td><input value="<?php echo $this->vars["add1"] ?>" name="add1" placeholder="Phân tách nhiều ID bằng dấu phẩy (,)"></td>
                			</tr>
                			<tr>
                				<td>Các đề xuất liên quan đến trang video (không giới hạn)</td>
                				<td><input value="<?php echo $this->vars["add2"] ?>" name="add2" placeholder="Phân tách nhiều ID bằng dấu phẩy (,)"></td>
                			</tr>
                			<tr>
                				<td>Các đề xuất liên quan đến cộng đồng (không giới hạn)</td>
                				<td><input value="<?php echo $this->vars["add3"] ?>" name="add3" placeholder="Phân tách nhiều ID bằng dấu phẩy (,)"></td>
                			</tr>
                			
                			
                			<tr>
                				<td></td>
                				<td><a href="javascript:;" class="btn submit" rel="updatetuijian"><i class="fa fa-edit"></i>Cài đặt</a></td>
                			</tr>
                			
                		</tbody></table>
                	</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>