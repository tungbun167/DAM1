<?php 

function sendMail($email){
    $sql = "SELECT *FROM taikhoan WHERE email='$email'";
    $taikhoan = pdo_query_one($sql);
    if ($taikhoan != false) {
        return "Gửi thành công";
    }else{
        return "Email Bạn nhập không đúng";
    }
}