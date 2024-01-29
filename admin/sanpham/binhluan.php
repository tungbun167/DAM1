<div class="row2">
         <div class="row2 font_title">
          <h1>DANH SÁCH BÌNH LUẬN</h1>
         </div>
         <div class="row2 form_content ">
          <form action="#" method="POST">
           <div class="row2 mb10 formds_loai">
           <table>
            <tr>
                
                <th>ID</th>
                <th>Nội Dung</th>
                <th>ID user</th>
                <th>Ngày Bình luận</th>
                <th>Thao Tác</th>
               
            </tr>
            <?php foreach ($listbinhluan as $list) {
                    extract($list);
                   
            echo '    
            <tr>
            
                <td>'.$id.'</td>
                <td>'.$noidung.'</td>
                <td>'.$user.'</td>
               
                <td>'.$ngaybinhluan.'</td>
                
                
                <td><input type="button" value="Sửa">   <input type="button" value="Xóa"></td>
               
            </tr>';
                }?>
            
           </table>
           </div>
       
          </form>
         </div>
        </div>



       
    </div>