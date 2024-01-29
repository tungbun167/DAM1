<div class="row2">
         <div class="row2 font_title">
          <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
         </div>
         <div class="row2 form_content ">
          <form action="#" method="POST">
           <div class="row2 mb10 formds_loai">
            <form action="index.php?act=listsp" method="POST">
                <input type="text" name="keyw">
                <select name="iddm" id="">
                    <option value="0">Tất Cả</option>
                    <?php 
                    foreach($listdanhmuc as $list) {
                        extract($list);
                        echo '<option value="'.$id.'">'.$name.'</option>';
                    }
                    
                    ?>
                </select>
                <input type="submit" name="clickok" value="GO">
            </form>
           <table>
            <tr>
                
                <th>Mã Sản Phẩm</th>
                <th>Tên Sản Phẩm</th>
                <th>Giá Sản Phẩm</th>
                <th>Ảnh</th>
                <th>Lượt Xem</th>
                <th>Chức Năng</th>
            </tr>
            <?php foreach ($listsanpham as $list) {
                    extract($list);
                    $suasp = "index.php?act=suasp&idsp=".$id;
                    $hinh= "../upload/".$img;
                   if (is_file($hinh)) {
                        $hinh="<img src='".$hinh."' width='100px' height='100px'";
                   }else{
                    $hinhpath="No file img";
                   }
            echo '    
            <tr>
            
                <td>'.$id.'</td>
                <td>'.$name.'</td>
                <td>'.$price.'</td>
                <td>'.$hinh.'</td>
                <td>'.$luotxem.'</td>
                
                
                <td><a href="'.$suasp.'"><input type="button" value="Sửa"></a>
                
                <input type="button" value="Xóa"></td>
               
            </tr>';
                }?>
            
           </table>
           </div>
      
          </form>
         </div>
        </div>



       
    </div>