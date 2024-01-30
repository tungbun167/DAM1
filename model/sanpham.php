<?php
// hiển thị 9 sản phẩm mới nhất
function loadall_sanpham_home(){
    $sql = "SELECT *FROM sanpham where 1 order by id desc limit 0,9";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
// hiển thị top 10 sản phẩm có lượt em cao nhất

function loadall_sanpham_top10(){
    $sql = "SELECT *FROM sanpham where 1 order by luotxem desc limit 0,10";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadall_danhmuc(){
    $sql = "SELECT *FROM danhmuc order by id desc";
    $listdanhmuc = pdo_query($sql);
    return $listdanhmuc;
}
function load_ten_dm($iddm){
    $sql = "SELECT *FROM danhmuc where id=".$iddm;
    $listdanhmuc = pdo_query_one($sql);
    extract($dm);
    return $name;
}
function loadall_sanpham($keyw="",$iddm=0){
    $sql = "SELECT * FROM sanpham where 1";

    if ($keyw!="") {
        $sql.="and name like '%".$keyw."%'";
    }
    if ($iddm>0) {
        $sql.=" and iddm='".$iddm."'";
    }
    $sql.=" order by id desc";
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}
function loadone_sanpham($id){
    $sql = "SELECT *FROM sanpham where id=$id";
    $result = pdo_query_one($sql);
    return $result;
}
function load_sanpham_cungloai($id, $iddm){
    $sql = "SELECT *FROM sanpham where iddm = $iddm and id <> $id";
    $result = pdo_query($sql);
    return $result;
}
// bình luận

function load_binhluan($id){
    $sql = "SELECT binhluan.noidung, binhluan.ngaybinhluan, taikhoan.user FROM `binhluan`
    LEFT JOIN taikhoan ON binhluan.iduser = taikhoan.id
    LEFT JOIN sanpham ON binhluan.idpro = sanpham.id
    WHERE sanpham.id = $id ";
    $result = pdo_query($sql);
    return $result;

}
function load_one_binhluan($id){
    $sql = "SELECT *FROM binhluan where id=$id";
    $result = pdo_query_one($sql);
    return $result;
}
function loadall_binhluan($keyw="",$id=0){
    $sql = "SELECT binhluan.id,binhluan.noidung,binhluan.iduser,binhluan.idpro,binhluan.ngaybinhluan, taikhoan.user,
    sanpham.name , sanpham.img FROM `binhluan`
   INNER JOIN taikhoan ON binhluan.iduser=taikhoan.id 
   INNER JOIN sanpham ON binhluan.idpro = sanpham.id";
    // where 1 tức là nó đúng
    if($keyw!=""){
        $sql.=" and name like '%".$keyw."%'";
    }
    if($id>0){
        $sql.=" and iddm ='".$id."'";
        
    }
    $sql.=" order by binhluan.id desc";
    $listsanpham=pdo_query($sql);
    return  $listsanpham;
}

// Tài khoản

function insert_taikhoan($email, $user,$pass){
    $sql = "INSERT INTO `taikhoan` (`email`,`user`,`pass`) VALUES ('$email','$user','$pass')";
    pdo_execute($sql);
    return $sql;
}

// đăng nhập
    session_start();
function dangnhap($user,$pass){
     $sql = "SELECT *FROM taikhoan WHERE user='$user' and pass='$pass'";
     $taikhoan = pdo_query_one($sql);

     if ($taikhoan != false) {
        $_SESSION['user']=$user;
     }else{
        return "Thông Tin Tài Khoản Sai";
     }
}
function dangxuat(){
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
    }
}

function load_taikhoan(){
    $sql = "SELECT * FROM taikhoan where 1";
    $listtaikhoan = pdo_query($sql);
    return $listtaikhoan;
}
function load_one_taikhoan($id){
    $sql = "SELECT *FROM taikhoan where id=$id";
    $result = pdo_query_one($sql);
    return $result;
}

function insert_sanpham($tensp,$giasp, $hinh, $mota, $iddm){
    $sql = "INSERT INTO `sanpham`(`name`, `price`, `img`, `mota`, `iddm`) VALUES ('$tensp', '$giasp', '$hinh', '$mota', '$iddm');";
    pdo_execute($sql);
}



// Thống kê

function load_thongke(){
    $sql= "SELECT dm.id, dm.name, COUNT(*) 'soluong', MIN(price) 'gia_min', MAX(price)
     'gia_max', AVG(price) 'gia_avg' FROM danhmuc dm JOIN sanpham sp ON dm.id=sp.iddm
      GROUP BY dm.id, dm.name ORDER BY soluong DESC";
    return pdo_query($sql);
}

//update ảnh

// function update_sanpham($id,$iddm,$tensp,$giasp,$mota,$hinh){
//         if ($hinh !="") {
//             $sql = "UPDATE `sanpham` SET `name` = '{$tensp}',
//              `price` = '{$giasp}', `mota`='{$mota}', `img`='{$hinh}', `iddm`='{$iddm}'
//                 WHERE `sanpham`.`id`=$id ";
//         }else{
//             $sql = "UPDATE `sanpham` SET `name` = '{$tensp}',
//              `price` = '{$giasp}', `mota`='{$mota}', `img`='{$hinh}', `iddm`='{$iddm}'
//                 WHERE `sanpham`.`id`=$id ";
//         }
//         pdo_execute($sql);
// }
function update_sanpham($id,$iddm,$tensp,$giasp,$mota,$hinh){
    if($hinh!=""){
        // $sql="update sanpham set iddm='".$iddm."',name='".$tensp."',price='".$giasp."',mota='".$mota."',img='".$hinh."' where id=".$id;
        $sql=  "UPDATE `sanpham` SET `name` = '{$tensp}', `price` = '{$giasp}', `mota` = '{$mota}',`img` = '{$hinh}', `iddm` = '{$iddm}' WHERE `sanpham`.`id` = $id";
    }else{
        //  $sql="update sanpham set iddm='".$iddm."',name='".$tensp."',price='".$giasp."',mota='".$mota."' where id=".$id;
        $sql=  "UPDATE `sanpham` SET `name` = '{$tensp}', `price` = '{$giasp}', `mota` = '{$mota}', `iddm` = '{$iddm}' WHERE `sanpham`.`id` = $id";
    }
    pdo_execute($sql);
    
}
function update_taikhoan($id,$tenkh,$pass,$email,$address,$tel){
    $sql = "UPDATE `taikhoan` SET `user` = '{$tenkh}', `pass` = '{$pass}', `email`= '{$email}', `address` = '{$address}', `tel` = '{$tel}' WHERE `taikhoan`.`id`=$id";
    pdo_execute($sql);
}

function update_binhluan($id,$iduser,$noidung,$ngaybinhluan){
    $sql = "UPDATE `binhluan` SET `iduser` = '{$iduser}', `noidung` = '{$noidung}', `ngaybinhluan`= '{$ngaybinhluan}' WHERE `binhluan`.`id`=$id";
    pdo_execute($sql);
}
function xoasp($id){
    $sql = "DELETE FROM sanpham WHERE id=" .$id;
    pdo_execute($sql);
}

function xoabl($id){
    $sql = "DELETE FROM binhluan WHERE id=" .$id;
    pdo_execute($sql);
}
function xoakh($id){
    $sql = "DELETE FROM taikhoan WHERE id=" .$id;
    pdo_execute($sql);
}