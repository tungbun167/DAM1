<?php
if(is_array($taikhoan)){
    extract($taikhoan);
}
?>

<div class="row2">
         <div class="row2 font_title">
          <h1>SỬA KHÁCH HÀNG</h1>
         </div>
         <div class="row2 form_content ">

          <form action="index.php?act=updatekh" method="POST" >
           <div class="row2 mb10 form_content_container">
            
           <label> Tên Khách Hàng </label> <br>
            <input type="text" name="tenkh" value="<?=$user?>">
           </div>
           <div class="row2 mb10">
            <label> Mật Khẩu </label> <br>
            <input type="text" name="pass" value="<?=$pass?>">
           </div>
           <div class="row2 mb10">
           <label> email </label> <br>
            <input type="text" name="email" value="<?=$email?>">
           </div>
           <div class="row2 mb10">
           <label> address </label> <br>
            <input type="text" name="address" value="<?=$address?>">
           </div>
           <div class="row2 mb10">
           <label> tel </label> <br>
            <input type="text" name="tel" value="<?=$tel?>">
           </div>
           <div class="row mb10 ">
            <input type="hidden" name="id" value="<?=$id?>">
         <input class="mr20" name="capnhat1" type="submit" value="CẬP NHẬT">
         <input  class="mr20" type="reset" value="NHẬP LẠI">

         <a href="index.php?act=binhluan"><input  class="mr20" type="button" value="DANH SÁCH"></a>
           </div>

           <?php if (isset($thanhcong)&&$thanhcong !='') {
            echo $thanhcong;

           }
            ?>
          </form>

         </div>
        </div>