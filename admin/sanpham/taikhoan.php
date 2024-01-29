<div class="row2">
         <div class="row2 font_title">
          <h1>DANH SÁCH TÀI KHOẢN</h1>
         </div>
         <div class="row2 form_content ">
          <form action="#" method="POST">
           <div class="row2 mb10 formds_loai">
           <table>
            <tr>
                
                <th>ID</th>
                <th>User</th>
                <th>Pass</th>
                <th>Email</th>
                <th>add</th>
                <th>Tel</th>
            </tr>
            <?php foreach ($listtaikhoan as $list) {
                    extract($list);
                
            echo '    
            <tr>
            
                <td>'.$id.'</td>
                <td>'.$user.'</td>
                <td>'.$pass.'</td>
                <td>'.$email.'</td>
                <td>'.$address.'</td>
                <td>'.$tel.'</td>
                
                
                <td><input type="button" value="Sửa">   <input type="button" value="Xóa"></td>
               
            </tr>';
                }?>
            
           </table>
           </div>
       
          </form>
         </div>
        </div>



       
    </div>