<?php 

function sendMail($email){
    $sql = "SELECT *FROM taikhoan WHERE email='$email'";
    $taikhoan = pdo_query_one($sql);
    if ($taikhoan != false) {
        sendMailPass($email,$taikhoan['user'],$taikhoan['pass']);
        return "Gửi thành công";
    }else{
        return "Email Bạn nhập không đúng";
    }
}

function sendMailPass($email, $username, $pass){
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';


    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'e6ce45200e19cf';                     //SMTP username
    $mail->Password   = '79eeb34bccd1f1';                               //SMTP password
    $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('duanmau@example.com', 'ĐuAnMau');
    $mail->addAddress($email, $username);     //Add a recipient            //Name is optional


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Người dùng quyên mật khẩu';
    $mail->Body    = 'Mật khẩu của bạn là' .$pass;


    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}