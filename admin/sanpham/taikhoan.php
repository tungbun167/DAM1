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
                    $suakh = "index.php?act=suakh&idkh=".$id;
                    $xoakh = "index.php?act=xoakh&idkh=".$id;
                
            echo '    
            <tr>
            
                <td>'.$id.'</td>
                <td>'.$user.'</td>
                <td>'.$pass.'</td>
                <td>'.$email.'</td>
                <td>'.$address.'</td>
                <td>'.$tel.'</td>
                
                <td><a href="'.$suakh.'"><input type="button" value="Sửa"></a>
                <td><a href="'.$xoakh.'"><input type="button" value="xóa" onclick="return confirm(\'bạn có chắc muốn xóa không\')"></a>
               
            </tr>';
                }?>
            
           </table>
           </div>
       
          </form>
         </div>
        </div>



       
    </div>