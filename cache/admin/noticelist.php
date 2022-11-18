<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <meta name="format-detection" content="telephone=no" />
    <title>Thông tin</title>
    <link rel="stylesheet" href="<?php echo CSS ?>/backstage.css" />
    <link rel="stylesheet" href="<?php echo CSS ?>/font-awesome.min.css" />
    <script src="<?php echo JS ?>/jquery-1.8.3.min.js"></script>
    <script src="<?php echo JS ?>/backstage.js"></script>
    <script type="text/javascript">
        $(function(){
            $("select[name=mtype]").find("option[value='<?php echo CW('get/mtype');  ?>']").attr("selected",true);
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
                            <input type="hidden" name="mod" value="noticelist" />
                            <input name="keyword" value="<?php echo CW('get/keyword')==='0' ? '' : CW('get/keyword');  ?>" placeholder="Nội dung tìm kiếm, hỗ trợ tìm kiếm mờ" />
                            <select name="mtype">
                                <option value="全部">Toàn bộ</option>
                                <option value="平台通知">Trang chủ thông báo</option>
                                <option value="官方消息">Thông tin chính thức</option>
                            </select>
                            <button type="submit" class="btn btn1"><i class="fa fa-search"></i>Tìm kiếm</button>
                        </form>
                    </div>
                    
                </div>
                <div class="frame">
                    <p class="title">Thông báo/Quản lý thông tin</p>
                    <div class="frmtable">
                    <table class="w100 list">
                        <tr>
                            <th>Thể loại thông tin</th>
                            <th>Nội dung</th>
                            <th>Thời gian đăng tải</th>
                            <th>Thao tác</th>
                        </tr>
                        <?php echo $this->vars["data"] ?>
                    </table>
                    </div>
                    <div class="fr pat30 w100">
                        <?php echo $this->vars["page"] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>