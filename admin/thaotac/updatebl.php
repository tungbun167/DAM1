<?php
if(is_array($binhluan)){
    extract($binhluan);
}
?>

<div class="row2">
         <div class="row2 font_title">
          <h1>SỬA BÌNH LUẬN</h1>
         </div>
         <div class="row2 form_content ">

          <form action="index.php?act=updatebl" method="POST" >
           <div class="row2 mb10 form_content_container">
            
           <label> Nội Dung </label> <br>
            <input type="text" name="noidung" value="<?=$noidung?>">
           </div>
           <div class="row2 mb10">
            <label> Tên Người bình luận </label> <br>
            <input type="text" name="iduser" value="<?=$iduser?>">
           </div>
           <div class="row2 mb10">
           <label> Ngày Bình Luận </label> <br>
            <input type="text" name="ngaybinhluan" value="<?=$ngaybinhluan?>">
           </div>
           
           
           <div class="row mb10 ">
            <input type="hidden" name="id" value="<?=$id?>">
         <input class="mr20" name="capnhat2" type="submit" value="CẬP NHẬT">
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