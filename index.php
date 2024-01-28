<?php
    
    include "model/pdo.php";
    include "model/sanpham.php";
    include "model/quyenmk.php";
    include "view/header.php";
    include "global.php";
    $spnew = loadall_sanpham_home();
    $dsdm = loadall_danhmuc();
    $dstop10 = loadall_sanpham_top10();
    if(isset($_GET['act'])&&($_GET['act']!="")){
        $act=$_GET['act'];
        switch($act){
            case "sanphamct":
                if (isset($_GET['idsp']) && ($_GET['idsp'] >0)) {
                    $sp = loadone_sanpham($_GET['idsp']);
                    $sp_cungloai = load_sanpham_cungloai($_GET['idsp'], $sp['iddm']);
                    $binhluan = load_binhluan($_GET['idsp']);
                    include "view/chitietsanpham.php";
                }
                break;

            case 'sanpham':
                if (isset($_GET['iddm']) && ($_GET['iddm'] >0)) {
                    $iddm=$_GET['iddm'];
                    $dssp=loadall_sanpham("",$iddm);
                    $tendm=load_ten_dm($iddm);
                    include "view/sanpham.php"; 
                }else{
                    include "view/home.php";
                }
                break;
            case "dangki" :
                if (isset($_POST['dangki'])) {
                    $email = $_POST['email'];
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    insert_taikhoan($email,$user,$pass);
                    $thongbao = "đăng kí thành công";
                }
                include "view/login/dangki.php";
                break;
            case "quyenmk" :
                if (isset($_POST['guiemail'])) {
                    $email = $_POST['email'];
                    $sendMailMess = sendMail($email);
                }
                include "view/login/quyenmk.php";

                break;
            case 'dangnhap':
                if (isset($_POST['dangnhap'])) {
                    $loginMess = dangnhap($_POST['user'], $_POST['pass']);
                    include "view/home.php";

                }
                break;
            case 'dangxuat':
              dangxuat();
              include "view/home.php";
                break;
            
        }
    }else{
        include "view/home.php";
    }
   
    include "view/footer.php";
?>

        
