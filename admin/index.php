<?php
    include "../model/pdo.php";
    include "../model/sanpham.php";


    include "header.php";
    if(isset($_GET['act'])&&($_GET['act']!="")){
        $act=$_GET['act'];
        switch($act){
            case "listsp":
                if (isset($_POST['clickok'])&&($_POST['clickok'])) {
                    $keyw=$_POST['keyw'];
                    $iddm=$_POST['iddm'];
                }else{
                    $keyw='';
                    $iddm=0;
                }
                $listdanhmuc =loadall_danhmuc();
                $listsanpham = loadall_sanpham($keyw,$iddm);
                include "sanpham/list.php";
                break;  
               
            case 'taikhoan':
                $listtaikhoan = load_taikhoan();
                include "sanpham/taikhoan.php";
                break;
            case 'danhmuc':
                if (isset($_POST['clickok'])&&($_POST['clickok'])) {
                    $keyw=$_POST['keyw'];
                    $iddm=$_POST['iddm'];
                }else{
                    $keyw='';
                    $iddm=0;
                }
                $listdanhmuc = loadall_danhmuc();
                include "sanpham/danhmuc.php";
                break;
            case 'binhluan':
                $listbinhluan = loadall_binhluan();
                include "sanpham/binhluan.php";
                break;
           case 'addsp':
            if (isset($_POST['themmoi'])&&($_POST['themmoi'])) {
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir.basename($_FILES['hinh']['name']);
                if (move_uploaded_file($_FILES['hinh']['tmp_name'], $target_file)) {
                    echo "Bạn đã up ảnh thành công";
                }else{
                    echo "Không thành công";
                }
                insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm);
                $thanhcong = "Thêm Thành Công";
            }


            $listdanhmuc = loadall_danhmuc();

            include "sanpham/addsp.php";
            break;
            case 'thongke':
                $dsthongke = load_thongke();
                include "sanpham/thongke.php";
                break;
            case 'bieudo':
                    $dsthongke = load_thongke();
                    include "sanpham/bieudo.php";
                    break; 
            case 'suasp':
                if (isset($_GET['idsp'])&&($_GET['idsp'] >0)) {
                    $sanpham=loadone_sanpham($_GET['idsp']);
                }
                $listdanhmuc=loadall_danhmuc();
                include "thaotac/update.php";
                break;
            
        }
    }else{
        $list = loadall_sanpham(keyw:"",iddm:0);
        include "home.php";
    }
    include "footer.php";
?>
