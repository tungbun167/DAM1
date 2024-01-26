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
    WHERE sanpham.id = 1 ";
    $result = pdo_query($sql);
    return $result;

}