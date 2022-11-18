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
    <script>
        $(function(){
		    $("select[name=select]").find("option[value='<?php echo CW('get/select');  ?>']").attr("selected",true);
		    
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
                    <p class="title">Tìm kiếm có điều kiện </p>
                    <div class="frmtable">
                        <form action="admin.php" method="get" class="search">
                            <input type="hidden" name="mod" value="recharge" />
                            <input name="keyword" value="<?php echo CW('get/keyword')==='0' ? '' : CW('get/keyword');  ?>" placeholder="Số thứ tự tìm kiếm, hỗ trợ tìm kiếm mờ"" />
                            <input name="tel" value="<?php echo CW('get/tel')==='0' ? '' : CW('get/tel');  ?>" placeholder="Tìm kiếm tài khoản người dùng, hỗ trợ tìm kiếm mờ" />
                            <select name="select">
                                <option value="2">Tất cả</option>
                                <option value="1">Đã thanh toán</option>
                                <option value="0">Chưa thanh toán</option>
                                
                            </select>
                            <button type="submit" class="btn btn1"><i class="fa fa-search"></i>Tìm kiếm</button>
                        </form>
                    </div>
                    
                </div>
                <div class="frame">
                    <p class="title">Quản lý nạp tiền của người dùng</p>
                    <div class="frmtable">
                    <table class="w100 list">
                        <tr>
                            <th>Người dùng</th>
                            <th>Cách thức nạp /Tên </th>
                            <th>Số tiền</th>
                            <th>Mã đơn</th>
                            <th>Thời gian nạp</th>
                            <th>Thao tác / Trạng thái</th>
                        </tr>
                        <?php echo $this->vars["data"] ?>
                    </table>
                    </div>
                    <div class="w100 fl" style="margin:30px 0">
                        <?php echo $this->vars["page"] ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function(){
            $('.dakuan').click(function(){
                if(confirm('请再次确认是否设置为已打款状态?')){
                    ajax('setdakuan',"id="+$(this).attr('rel'));
                }
            });
        });
    </script>
</body>
</html>