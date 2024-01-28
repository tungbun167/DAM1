<div class="boxright">
             
             <div class="mb">
                <div class="box_title">TÀI KHOẢN</div>
                <?php if (!$_SESSION) { ?>
                  
                
                <div class="box_content form_account">

                    <form action="index.php?act=dangnhap" method="POST">
                    <h4>Tên đăng nhập</h4><br>
                    <input type="text" name="user" id="">
                    <h4>Mật khẩu</h4><br>
                    <input type="password" name="pass" id=""><br>
                    <input type="checkbox" name="" id="">Ghi nhớ tài khoản?
                   <br><input type="submit" value="Đăng nhập" name="dangnhap"> <br>
                   <?php 
                    if (isset($loginMess)&&$loginMess !='') {
                        echo $loginMess;
                    }
                   
                   ?>
                    </form>
                   <li class="form_li"><a href="index.php?act=quyenmk">Quên mật khẩu</a></li>
                   <li class="form_li"><a href="index.php?act=dangki">Đăng kí thành viên</a></li>
                </div>
                <?php }else{?>
                  <p>Hello <?=$_SESSION['user']?></p>
                  <br>
                  <button><a href="index.php?act=dangxuat"> Đăng Xuất</a></button>
                <?php } ?> 
             </div>
             <div class="mb">
                <div class="box_title">DANH MỤC</div>
                <div class="box_content2 product_portfolio">
                  <ul >
                    <?php foreach($dsdm as $dm):
                      extract($dm);
                      $linkdm = "index.php?act=sanpham&iddm".$id;
                      ?>
                      
                     <li><a href="<?= $linkdm ?>"> <?= $name?> </a></li>
                     <?php endforeach ?>
                     <!-- <li><a href="">Laptop</a></li>
                     <li><a href="">Điện thoại</a></li>
                     <li><a href="">Ipad</a></li>
                     <li><a href="">Tivi</a></li> -->
                  </ul>
                </div>
                <div class="box_search">
                  <form action="#" method="POST">
                     <input type="text" name="" id="" placeholder="Từ khóa tìm kiếm">
                  </form>
                </div>
             </div>
             <!-- DANH MỤC SẢN PHẨM BÁN CHẠY -->
             <div class="mb">
                <div class="box_title">SẢN PHẨM BÁN CHẠY</div>
                <div class="box_content">
                  <?php foreach($dstop10 as $ds): 
                    extract($ds);
                    $hinh = $img_path.$img;
                    $linksp = "index.php?act=sanphamct&idsp".$id;
                    ?>
                <div class="selling_products" style="width:100%;">
                  <img src="<?= $hinh ?>" alt="anh">
                  <a href="<?= $linksp ?>"><?= $name ?></a>
                </div>
                <?php endforeach ?>
                <!-- <div class="selling_products" style="width:100%;">
                  <img src="./img/clockforgirl.jpg" alt="anh">
                  <a href="">Đồng hồ đeo tay nữ</a>
                </div>
                <div class="selling_products" style="width:100%;">
                  <img src="./img/clockforgirl.jpg" alt="anh">
                  <a href="">Đồng hồ đeo tay nữ</a>
                </div>
                <div class="selling_products" style="width:100%;">
                  <img src="./img/clockforgirl.jpg" alt="anh">
                  <a href="">Đồng hồ đeo tay nữ</a>
                </div>
                <div class="selling_products" style="width:100%;">
                  <img src="./img/clockforgirl.jpg" alt="anh">
                  <a href="">Đồng hồ đeo tay nữ</a>
                </div> -->
                </div>
             </div>
            </div>