<?php 
    if(!defined('CW')){exit('Access Denied');}
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require ROOT_URL.'/email/Exception.php';
    require ROOT_URL.'/email/PHPMailer.php';
    require ROOT_URL.'/email/SMTP.php';
    $db = functions::db();
    $email =  CW('gp/email');
    $tel =  CW('gp/tel');
    $_GDKLF = CW('cookie/_GDKLF');
    if((intval($_GDKLF)+60)>time()){
        echo json_encode(array(
                'state'=>2,
                'err'=>'Khoảng thời gian giữa hai lần gửi quá ngắn, vui lòng thử lại sau!'
            ));return;
    }
    $exist = $db->query('users','',"tel='{$tel}' and email='{$email}'",'',1);
    if($exist){
        $pass = functions::autocode($exist[0]['password'],'-');
        // $reg = '#^\w{3,50}@\w{1,64}\.\w{2,5}$#';
        // if(!preg_match($reg,$email)){
        //     echo json_encode(array(
        //         'state'=>2,
        //         'err'=>'Lỗi định dạng email!'
        //     ));return;
        // }
        $mail = new PHPMailer(true);
        $set = $db->query('sets','','id=1','',1);
        try {
            $mail->CharSet ="UTF-8";                     //đặt mã email
            $mail->SMTPDebug = 0;                        // đầu ra chế độ gỡ lỗi
            $mail->isSMTP();                             // Sử dụng
            $mail->Host = $set[0]['smtp1'];                // Máy chủ SMTP
            $mail->SMTPAuth = true;                      // Cho phép xác thực SMTP
            $mail->Username = $set[0]['smtp2'];                // Tên người dùng SMTP là tên người dùng của email
            $mail->Password = $set[0]['smtp3'];             // SMTP Mật mã   Một số email là mã ủy quyền (chẳng hạn như 163 email)
            //$mail->SMTPSecure = 'ssl';                    // email TLS hoặc ssl Giao thức
            $mail->Port = intval($set[0]['smtp4']);                            // Cổng máy chủ 25 hoặc465 Cụ thể cần xem hỗ trợ sever của email
        
            $mail->setFrom($set[0]['smtp5'], '萌堆');  //Người gửi
            $mail->addAddress($email, '');  // 收件人
            //$mail->addAddress('ellen@example.com');  // Có thể thêm vào nhiều người nhận 
            //$mail->addReplyTo('xxxx@163.com', 'info'); //Thời gian trả lời, email người nhận trả lời nên giống với người gửi
            //$mail->addCC('cc@example.com');                    //CC
            //$mail->addBCC('bcc@example.com');                    //Bcc
        
            //Gửi tệp đính kèm
            // $mail->addAttachment('../xy.zip');         // Thêm tệp đính kèm
            // $mail->addAttachment('../thumb-1.jpg', 'new.jpg');    // Gửi tệp đính kèm và đổi tên
        
            //Content
            $mail->isHTML(true);                                  // Có gửi dưới dạng tài liệu HTML hay không  Sau khi gửi, máy khách có thể hiển thị trực tiếp nội dung HTML tương ứng
            $mail->Subject = 'Lấy lại mật khẩu';
            $mail->Body    = 'Xin chào, mật khẩu của bạn là:'.$pass;
            $mail->AltBody = 'Xin chào, mật khẩu của bạn là:'.$pass;
        
            $mail->send();
            functions::set_cookie('_GDKLF',time());
            echo json_encode(array(
                'state'=>1,Gửi thành công, vui lòng vào email để kiểm tra mã xác minh
                'data'=>'Gửi thành công, vui lòng vào email để kiểm tra mã xác minh!',
                'do'=>'receive'
            ));
        } catch (Exception $e) {
            echo json_encode(array(
                'state'=>2,
                'err'=>$mail->ErrorInfo
            ));
        }
    }else{
        echo json_encode(array(
            'state'=>2,
            'err'=>'Tài khoản không khớp với email'
        ));return;
    }
?>