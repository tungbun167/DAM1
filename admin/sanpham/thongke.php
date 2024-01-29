<div class="row2">
         <div class="row2 font_title">
          <h1>DANH SÁCH THỐNG KÊ</h1>
         </div>
         <div class="row2 form_content ">
          <form action="#" method="POST">
           <div class="row2 mb10 formds_loai">
            <form action="index.php?act=listsp" method="POST">
                <input type="text" name="keyw">
            
            </form>
           <table>
            <tr>
                
                <th>Mã Sản Phẩm</th>
                <th>Tên Danh Mục</th>
                <th>Số Lượng</th>
                <th>Giá min</th>
                <th>Giá max</th>
                <th>Tổng</th>
            </tr>
            <?php foreach ($dsthongke as $ds) {
                    extract($ds);
                   
            echo '    
            <tr>
            
                <td>'.$id.'</td>
                <td>'.$name.'</td>
                <td>'.$soluong.'</td>
                <td>'.$gia_min.'</td>
                <td>'.$gia_max.'</td>
                <td>'.$gia_avg.'</td>
                
                

               
            </tr>';
                }?>
            
           </table>
           </div>
      <div class="row mb10">

      <a href="?act=bieudo"><input class="mr20" type="button" value="XEM BIỂU ĐỒ"></a>
      </div>
          </form>

         </div>
        </div>



       
    </div>