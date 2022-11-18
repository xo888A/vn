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
    <script type="text/javascript">
        var inputs =  document.getElementsByTagName("input");
        function converSelectAll(){
            for(var i = 0;i<inputs.length;i++){
                if(inputs[i].checked){
                    inputs[i].checked = false;
                }else{
                    inputs[i].checked = true;
                }
            }
        }
        $(function(){
            $("select[name=ishow]").find("option[value='<?php echo CW('get/ishow');  ?>']").attr("selected",true);
            $("select[name=topic]").find("option[value='<?php echo CW('get/topic');  ?>']").attr("selected",true);
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
                    <p class="title">Điều kiện tìm kiếm</p>
                    <div class="frmtable">
                        <form action="admin.php" method="get" class="search">
                            <input type="hidden" name="mod" value="shortvideomanager" />
                            <input name="keyword" value="<?php echo CW('get/keyword')==='0' ? '' : CW('get/keyword');  ?>" placeholder="搜索标题,支持模糊检索" />
                            <select name="ishow">
                                <option value="Tất cả">Tất cả</option>
                                <option value="Công khai">Công khai</option>
                                <option value="Không thể xem">Không thể xem</option>
                            </select>
                            <button type="submit" class="btn btn1"><i class="fa fa-search"></i>Tìm kiếm</button>
                        </form>
                    </div>
                    
                </div>
                <div class="frame">
                    <p class="title">Quản lý video ngắn</p>
                    <div class="frmtable">
                    <table class="w100 list">
                        <tr>
                            <th><span style="color:#3FCF7F;cursor: pointer;" onclick="converSelectAll()">Chọn tất cả</span>/<span class='newishow' rel='post' style="color:red;cursor: pointer;">Xét duyệt</span></th>
                            <th>ID video ngắn</th>
                            <!--<th>Loại hình</th>-->
                            <th>Ảnh bìa/th>
                            <th>Tiêu đề</th>
                            <th>Số lượt thích</th>
                            <th>Thời gian đăng</th>
                            <th>Thao tác/th>
                        </tr>
                        <?php echo $this->vars["data"] ?>
                    </table>
                    </div>
                    <div class="fr pat30">
                        <?php echo $this->vars["page"] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>