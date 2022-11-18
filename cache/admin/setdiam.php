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
                    <p class="title">Cài đặt kim cương</p>
                    <div class="notice">
		                <div class="note-info">
		                    <p class="p1 btn3">Lời khuyên</p>
		                    <p class="pub">Nếu nhãn nhỏ cần được xuất hiện, vui lòng thêm dấu gạch dưới "_" sau nhãn, ví dụ: hãy dùng thử_ Lưu ý giới hạn ký tự</p>
		                    <a href="javascript:;" class="btn init" rel="initdiams">Nếu không có dữ liệu tùy chọn thẻ kim cương trên trang này, vui lòng nhấp vào nút này để khởi tạo</a>  
		                </div>
		            </div>
                    <div class="frmtable">
                    <table class="w100 list">
                        <tr>
                            <th>Kim cương kiếm được</th>
                            <th>Quà tặng kim cương</th>
                            <th>Giá</th>
                            <th>Mô tả</th>
                            <th>Thẻ nhỏ</th>
                            <th>Địa chỉ mua hàng</th>
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