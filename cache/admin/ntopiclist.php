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
    <style>
        .category_input{
            width:100%
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
                    <p class="title">Điều kiện tìm kiếm</p>
                    <div class="frmtable">
                        <form action="admin.php" method="get" class="search">
                            <input type="hidden" name="mod" value="ntopiclist" />
                            <input name="keyword" value="<?php echo CW('get/keyword')==='0' ? '' : CW('get/keyword');  ?>" placeholder="Tìm kiếm tên chủ đề, hỗ trợ tìm kiếm mờ" />
                            
                            <button type="submit" class="btn btn1"><i class="fa fa-search"></i>Tìm kiếm</button>
                        </form>
                    </div>
                    
                </div>
                <div class="frame">
                    <p class="title">Quản lý chủ đề</p>
                    <div class="frmtable">
                    <table class="w100 list">
                        <tr>
                            <th>Tên chủ đề</th>
                            <th>Mô tả chủ đề</th>
                            <th>Mức độ phổ biến</th>
                            <th>Đề xuất chủ đề</th>
                            <th>Thao tác</th>
                        </tr>
                        <?php echo $this->vars["data"] ?>
                    </table>
                    <style>
                        .page{
                            overflow: hidden;
                        }
                    </style>
                    <div style="margin-top:10px">
                        <?php echo $this->vars["page"] ?>
                    </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>