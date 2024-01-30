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
                    $suabl = "index.php?act=suabl&idbl=".$id;
                    $xoabl = "index.php?act=xoabl&idbl=".$id;
                   
            echo '    
            <tr>
            
                <td>'.$id.'</td>
                <td>'.$noidung.'</td>
                <td>'.$user.'</td>
               
                <td>'.$ngaybinhluan.'</td>
                
                
                <td><a href="'.$suabl.'"><input type="button" value="Sửa"></a>   
                <td><a href="'.$xoabl.'"><input type="button" value="xóa" onclick="return confirm(\'bạn có chắc muốn xóa không\')"></a>
            </tr>';
                }?>
            
           </table>
           </div>
       
          </form>
         </div>
        </div>



       
    </div>