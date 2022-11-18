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
            width:100% !important
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
                    <p class="title">Cài đặt thành viên</p>
                    <div class="notice">
		                <div class="note-info">
		                    <p class="p1 btn3">Nhắc nhở</p>
		                    <p class="pub">Nếu bạn cần hiển thị thẻ khuyến mại 24 giờ, vui lòng chuyển đến cài đặt nội bộ APP – của tôi–mở cài đặt hệ thống</p>
		                    <p class="pub" style="color:#f00;font-weight:bold">Điền giá trị của mục đầu tiên của thẻ VIP: mở hoặc đóng, các giá trị khác không được điền</p>
		                    <a href="javascript:;" class="btn init" rel="initvips">Nếu không có dữ liệu tùy chọn thẻ thành viên trên trang này, vui lòng nhấp vào nút này để khởi tạo</a>  
		                </div>
		            </div>
                    <div class="frmtable">
                    <table class="w100 list">
                        <tr>
                            <th>Bật/Tắt</th>
                            <th>Khẩu hiệu ở góc trên bên trái</th>
                            <th>Tên thẻ thành viên</th>
                            <th>Giá gốc</th>
                            <th>Giá hiện tại</th>
                            <th>Phiếu thưởng</th>
                            <th>Mô tả thẻ thành viên</th>
                            <th>Ngày thành viên</th>
                            <th>Số kim cương tặng</th>
                            <th>Địa chỉ mua hàng</th>
                            <th>Địa chỉ sau ưu đãi</th>
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