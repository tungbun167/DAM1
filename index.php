<?php
    include "model/pdo.php";
    include "model/sanpham.php";
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


            
        }
    }else{
        include "view/home.php";
    }
   
    include "view/footer.php";
?>

        
