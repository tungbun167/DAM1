<div class="row2">
         <div class="row2 font_title">
          <h1>THÊM MỚI LOẠI HÀNG HÓA</h1>
         </div>
         <div class="row2 form_content ">

          <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data">
           <div class="row2 mb10 form_content_container">
            <label for="">Danh Mục</label>
            <select name="iddm" id="">
                    <option value="0">Tất Cả</option>
                    <?php 
                    foreach($listdanhmuc as $list) {
                        extract($list);
                        echo '<option value="'.$id.'">'.$name.'</option>';
                    }
                    
                    ?>
                </select>
           <label> Tên Sản Phẩm </label> <br>
            <input type="text" name="tensp" placeholder="nhập vào tên">
           </div>
           <div class="row2 mb10">
            <label>Giá sản phẩm </label> <br>
            <input type="text" name="giasp" placeholder="nhập vào Giá">
           </div>
           <div class="row2 mb10">
            <label>Hình ảnh </label> <br>
            <input type="file" name="hinh" placeholder="Hình ảnh">
           </div>
           <div class="row2 mb10">
            <label>Mô Tả</label> <br>
            <textarea name="mota" id="" cols="30" rows="10"></textarea>
           </div>
           <div class="row mb10 ">
         <input class="mr20" name="themmoi" type="submit" value="THÊM MỚI">
         <input  class="mr20" type="reset" value="NHẬP LẠI">

         <a href="index.php"><input  class="mr20" type="button" value="DANH SÁCH"></a>
           </div>

           <?php if (isset($thanhcong)&&$thanhcong !='') {
            echo $thanhcong;
           } ?>
          </form>

         </div>
        </div>