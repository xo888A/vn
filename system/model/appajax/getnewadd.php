<?php
    $index = INDEX;
    $i = IMG;
     $newadd = "<div class='newadddata overflow wrap' onclick='openwin(\"login\")'>
        <div class='div1'>
                       
                        <p class='p1'>Cộng đồng ban đầu</p>
                        <p class='p2'>Kí hợp đồng với Vlogger</p>
                        <img src='{$i}/md1.png' />
                      
                    </div>
                    <div class='div2'>
                      
                        <p class='p1'>Thao tác tỉ mỉ</p>
                        <p class='p2'>Xem trực tuyến APP</p>
                        <img src='{$i}/md2.png' />
                       
                    </div>
                    <div class='div3'>
                      
                        <p class='p1'>Người mẫu tập hợp</p>
                        <p class='p2'>Cập nhật hàng trăm blogger</p>
                        <img src='{$i}/md3.png' />
                        
                    </div>
                    <div class='div4'>
                       
                        <p class='p1'>Đặc quyền VIP</p>
                        <p class='p2'>VIP xem không giới hạn</p>
                        <img src='{$i}/md4.png' />
                       
                    </div>
    </div>";
    echo json_encode(array(
        'state'=>1,
        'data'=>$newadd
    ));
?>