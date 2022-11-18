<?php 
    require ROOT_URL.'/email/Exception.php'; 
    require ROOT_URL.'/email/PHPMailer.php'; 
    require ROOT_URL.'/email/SMTP.php'; 
    use PHPMailer\PHPMailer\PHPMailer; 
    use PHPMailer\PHPMailer\Exception; 
    if(!defined('CW')){exit('Access Denied');}

    $tel = CW('post/tel',1);
    $email = CW('post/email');
    
    if(!$tel || !$email){
        echo json_encode(array(
            'state'=>2,
            'err'=>'Hạng mục phải điền!'
        ));return;
    }
    
    $reg = "/([a-z0-9]*[-_\.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[\.][a-z]{2,3}([\.][a-z]{2})?/i";

    if(!preg_match($reg,$email)){
        echo json_encode(array(
            'state'=>2,
            'err'=>'Định dạng email không hợp lệ!'
        ));return;
    }
    $db = functions::db();
    $res = $db->query('users','',"email='{$email}' and tel='{$tel}'",'',1);
    if($res){
        $pass = functions::autocode($res[0]['password'],'-');
        //发邮件
        ///////
        $mail = new PHPMailer(true);
        $set = $db->query('sets','smtp1,smtp2,smtp3,smtp4,smtp5','id=1','',1);
        try { 
            $mail->CharSet ="UTF-8";                     //设定邮件编码
            $mail->SMTPDebug = 0;                        // 调试模式输出
            $mail->isSMTP();                             // 使用SMTP
            $mail->Host = $set[0]['smtp1'];                // SMTP服务器
            $mail->SMTPAuth = true;                      // 允许 SMTP 认证
            $mail->Username = $set[0]['smtp2'];                // SMTP 用户名  即邮箱的用户名
            $mail->Password = $set[0]['smtp3'];             // SMTP 密码  部分邮箱是授权码(例如163邮箱)
            //$mail->SMTPSecure = 'ssl';                    // 允许 TLS 或者ssl协议
            $mail->Port = intval($set[0]['smtp4']);                            // 服务器端口 25 或者465 具体要看邮箱服务器支持
        
            $mail->setFrom($set[0]['smtp5'], '管理者');  //发件人
            $mail->addAddress($email, '');  // 收件人
            //$mail->addAddress('ellen@example.com');  // 可添加多个收件人
            //$mail->addReplyTo('xxxx@163.com', 'info'); //回复的时候回复给哪个邮箱 建议和发件人一致
            //$mail->addCC('cc@example.com');                    //抄送
            //$mail->addBCC('bcc@example.com');                    //密送
        
            //发送附件
            // $mail->addAttachment('../xy.zip');         // 添加附件
            // $mail->addAttachment('../thumb-1.jpg', 'new.jpg');    // 发送附件并且重命名
        
            //Content
            $mail->isHTML(true);                                  // 是否以HTML文档格式发送  发送后客户端可直接显示对应HTML内容
            $mail->Subject = 'Tìm lại mật khẩu';
            $mail->Body    = 'Xin chào, mật khẩu của bạn là:'.$pass;
            $mail->AltBody = 'Xin chào, mật khẩu của bạn là:'.$pass;
        
            $mail->send();
            echo json_encode(array(
                'state'=>1,
                'data'=>'Mật khẩu đã được gửi đến email đăng ký của bạn, vui lòng kiểm tra!',
            ));
        } catch (Exception $e) { 
            echo json_encode(array(
                'state'=>2,
                'err'=>'Gửi email không thành công:'. $mail->ErrorInfo.'Vui lòng thử lại sau!',
            ));
        }
        ///////
        echo json_encode(array(
            'state'=>1,
            'data'=>'Mật khẩu đã được gửi đến email đăng ký của bạn, vui lòng kiểm tra!',
        ));
    }else{
        echo json_encode(array(
            'state'=>2,
            'err'=>'Tài khoản hoặc email không tồn tại'
        ));
    }
    
?>