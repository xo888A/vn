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
        $(function(){
            $("select[name=type]").find("option[value='<?php echo CW('get/type');  ?>']").attr("selected",true);
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
                            <input type="hidden" name="mod" value="withdrawals" />
                            <input name="keyword" value="<?php echo CW('get/keyword')==='0' ? '' : CW('get/keyword');  ?>" placeholder="Tìm kiếm tài khoản, hỗ trợ tìm kiếm mờ" />
                            <select name="type">
                                <option value="0">Tất cả</option>
                                <option value="bank">Thẻ ngân hàng</option>
                                <option value="number">Tiền điện tử</option>
                                <option value="alipay">Momo</option>
                            </select>
                            <button type="submit" class="btn btn1"><i class="fa fa-search"></i>Tìm kiếm</button>
                        </form>
                    </div>
                    
                </div>
                <div class="frame">
                    <p class="title">Quản lý rút tiền</p>
                    <div class="frmtable">
                    <table class="w100 list">
                        <tr>
                            <th>Người dùng</th>
                            <th>Số tiền rút</th>
                            <th>Loại tiền rút </th>
                            <th>Chi tiết Tài khoản</th>
                            <th>Thời gian rút tiền</th>
                            <th>Trạng thái</th>
                            <th>Thao tác作</th>
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