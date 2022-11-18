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
        .search select{
            width: 100%;
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
                    <p class="title">Cài đặt báo danh</p>
                    <div class="notice">
		                <div class="note-info">
		                    <p class="p1 btn3">Nhắc nhở</p>
		                    <p class="pub">1. Ngày thứ ba/ngày thứ năm/ngày thứ bảy biểu tượng phần thưởng do hệ thống ép buộc và cố định, nội dung phần thưởng do quản trị viên thiết lập.</p>
		                    <p class="pub">2. Bạn cần đăng nhập liên tục để nhận được phần thưởng cuối cùng. Nếu không phần thưởng sẽ được tính lại</p>
		                    <a href="javascript:;" class="btn init" rel="initsignin">,Nếu không có dữ liệu phần thưởng đăng nhập trên trang này, vui lòng nhấp vào nút này để làm mới</a>  
		                </div>
		            </div>
                    <div class="frmtable">
                    <table class="w100 list">
                        <tr>
                            <th>Số ngày</th>
                            <th>Loại phần thưởng</th>
                            <th>Nội dung thưởng</th>
                            <th>Chỉnh sửa</th>
                        </tr>
                        <?php echo $this->vars["data"] ?>
                    </table>
                    </div>
                    
                </div>
            </div>

        </div>
    </div>
</body>
</html>