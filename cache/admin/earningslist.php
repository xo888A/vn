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
                            <input type="hidden" name="mod" value="earningslist" />
                            <input name="keyword" value="<?php echo CW('get/keyword')==='0' ? '' : CW('get/keyword');  ?>" placeholder="搜索标题,支持模糊检索" />
                            
                            <button type="submit" class="btn btn1"><i class="fa fa-search"></i>Tìm kiếm</button>
                        </form>
                    </div>
                    
                </div>
                <div class="frame">
                    <p class="title">Quản lý lợi nhuận người dùng</p>
                    <div class="frmtable">
                    <table class="w100 list">
                        <tr>
                            <td>Lợi nhuận người dùng</td>
            				<td>Khoản lợi nhuận</td>
            				<td>Người dùng nạp tiền</td>
            				<td>Cấp đại lý</td>
            				<td>Thời gian sinh lời</td>   
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