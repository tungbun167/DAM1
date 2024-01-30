<?php
    include "../model/pdo.php";
    include "../model/sanpham.php";

    include "../global.php";

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
            case "suasp":
                        if(isset($_GET['idsp'])&&($_GET['idsp']>0)){
                            $sanpham=loadone_sanpham($_GET['idsp']);
                        }
                        $listdanhmuc=loadall_danhmuc();
                        include "thaotac/update.php";
                        break;
            
            case "updatesp":
                            if(isset($_POST['capnhat'])&&($_POST['capnhat'])){
                                $iddm=$_POST['iddm'];
                                $id=$_POST['id'];
                                $tensp=$_POST['tensp'];
                                $giasp=$_POST['giasp'];
                                $mota=$_POST['mota'];
                                $hinh=$_FILES['hinh']['name'];
                                $target_dir = "../upload/";
                                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                                   
                                } else {
                                   
                                }
                                update_sanpham($id,$iddm,$tensp,$giasp,$mota,$hinh);
                                $thongbao="cập nhật thành công!";
                            }
                            $listsanpham=loadall_sanpham("",0);
                            $listdanhmuc=loadall_danhmuc();
                            include "sanpham/list.php";
                            break;
           case 'suakh':
             if(isset($_GET['idkh'])&&($_GET['idkh']>0)){
            $taikhoan = load_one_taikhoan($_GET['idkh']);
            
            }
            $listtaikhoan = load_taikhoan();
             include "thaotac/updatekh.php";
              break;
            case 'updatekh':
                if(isset($_POST['capnhat1'])&&($_POST['capnhat1'])){
                    $id=$_POST['id'];
                    $tenkh=$_POST['tenkh'];
                    $pass=$_POST['pass'];
                    $email=$_POST['email'];
                    $address=$_POST['address'];
                    $tel=$_POST['tel'];
                                             
                    update_taikhoan($id,$tenkh,$pass,$email,$address,$tel);
                    $thongbao="cập nhật thành công!";
                }
                $listtaikhoan = load_taikhoan();
                include "sanpham/taikhoan.php";
                break;
            case 'suabl':
                if(isset($_GET['idbl'])&&($_GET['idbl']>0)){
                    $binhluan = load_one_binhluan($_GET['idbl']);
                    
                    }
                    $listbinhluan = loadall_binhluan();
                     include "thaotac/updatebl.php";
                      break;
            case 'updatebl':
                if (isset($_POST['capnhat2'])&&($_POST['capnhat2'])) {
                    $id=$_POST['id'];
                    $noidung=$_POST['noidung'];
                    $iduser=$_POST['iduser'];
                    $ngaybinhluan=$_POST['ngaybinhluan'];
                    update_binhluan($id,$iduser,$noidung,$ngaybinhluan);
                    $thongbao="cập nhật thành công!";
                }
                $listbinhluan = loadall_binhluan();
                     include "sanpham/binhluan.php";
                break;   
                case "xoakh":
                    if(isset($_GET['idkh'])){
                        xoakh($_GET['idkh']);
                    }
                    $listtaikhoan = load_taikhoan("",0);
                    include "sanpham/taikhoan.php";
                    break;
                case "xoabl":
                    if(isset($_GET['idbl'])){
                        xoabl($_GET['idbl']);
                    }
                    $listbinhluan = loadall_binhluan("",0);
                    include "sanpham/binhluan.php";
                    break;
               case "xoasp":
                    if(isset($_GET['idsp'])){
                        xoasp($_GET['idsp']);
                    }
                    $listsanpham=loadall_sanpham("",0);
                    include "sanpham/list.php";
                    break;         
                           
        }
    }else{
        $listdanhmuc=loadall_danhmuc();
        $list = loadall_sanpham("",0);
        include "home.php";
    }
    include "footer.php";
?>
