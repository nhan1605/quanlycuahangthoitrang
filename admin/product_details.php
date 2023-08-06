<?php
require_once("header_admin.php");
 $product_name =$_GET['product_name'];
?>
<!-- nội dung -->
            <div class="col-lg-9">
                <div class="title_item">CHI TIẾT SẢN PHẨM</div>
            <div class="scroll">
            <!-- START -->
                <div class="container" style="padding: 20px;">
                <?php
            $sql ="SELECT `product_name`, `brand_name`, `category_name`, `unit_price`,`product_description`
            FROM `tbl_product`,`tbl_brand`,`tbl_category` 
            WHERE product_name = '".$product_name."' and tbl_product.brand_id = tbl_brand.brand_id and tbl_product.category_id = tbl_category.category_id";

            $ketquatruyvan = $conn->query($sql);
            if($ketquatruyvan->num_rows>0){
               $chitietsanpham=$ketquatruyvan->fetch_assoc()
                ?>
                    <div class="product_name">
                        <h1><?=$chitietsanpham['product_name']?></h1>
                    </div>
                    <div class="product_descrip">
                        <p>Thương hiệu: <?=$chitietsanpham['brand_name']?></p>
                    </div>
                    <div class="product_descrip">
                        <p>Loại: <?=$chitietsanpham['category_name']?></p>
                    </div>
                    <div class="product_descrip">
                        <p>Giá: <?=$chitietsanpham['unit_price']?></p>
                    </div>
                    <div class="product_descrip">
                        <p>Mô tả: <?=$chitietsanpham['product_description']?></p>
                    </div>

                    <?php
                        }
                    ?>
</div>
                <button class="btn btn-success" id="btn-add">Thêm màu hoặc size cho sản phẩm</button>
                <button class="btn btn-success" id="btn-update">Cập nhật thông tin sản phẩm</button>
               <!-- Nội dung -->
               <div class="container" style="margin-top:10px;">
            <table class="table table-striped table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Ảnh</th>
                    <th>Màu</th>
                    <th>Kích thước</th>
                    <th>Số lượng trong kho</th>
                    <th>Số lượng đã bán</th>
                    <th>Chỉnh sửa</th>
                    <th>Xóa</th>
                </tr>
                <tr>
                    <?php
                    $sql ="SELECT `product_id`, `unit_price`, `unit_in_stock`, `unit_in_order`, 
                    `product_img`, tbl_color.color_img, tbl_size.size_name 
                    FROM `tbl_product`,`tbl_color`,`tbl_size`
                    WHERE  `product_name` = '".$product_name."' and tbl_product.color_id = tbl_color.color_id 
                    and tbl_product.size_id= tbl_size.size_id order by product_id;
                    ";

                    $ketquatruyvan = $conn->query($sql);
                    if($ketquatruyvan->num_rows>0){
                    while($sanpham=$ketquatruyvan->fetch_assoc()){
                    ?>

                    <td><?=$sanpham['product_id']?></td>
                    <td>
                    <img width="60px" height="60px"  src="../image-product/<?=$sanpham['product_img']?>" alt="">
                    </td>
                    <td>
                        <img width="20px" height="50px" src="<?=$sanpham['color_img']?>" alt="">
                    </td>
                    <td><?=$sanpham['size_name']?></td>
                    <td><?=$sanpham['unit_in_stock']?></td> 
                    <td><?=$sanpham['unit_in_order']?></td>
                    <td> 
                        <button class="btn btn-info" value="<?=$sanpham['product_id']?>" id="btn-update_items">Cập nhật</button>
                    </td>
                    <td>
                        <!-- <form action="thuc_hien_xoa_product_details.php" method="post">
                            <input type="hidden" name="delete_product" value="<?=$sanpham['product_id']?>">
                            <button type="submit"  href="" class="btn btn-danger">Xóa</button> 
                        </form> -->
                        <a href="./thuc_hien_xoa_product_details.php?product_id=<?=$sanpham['product_id'];?>" class="btn btn-danger">Xóa</a>
                    </td>
                 
                </tr>  
                <?php
          }
        }
?>
            </table>
            
                </div>
            <!-- END -->
                </div>
            </div>
        </div>
      </div>
    </section>
  </main>

  <!-- Thêm size hoặc Màu -->
  
        <!-- The Modal -->
        <div id="modal-add" class="modal">
            <!-- Nội dung form đăng nhập -->
            <div class="modal-content">
                <form action="./thuc_hien_them_sp_product_details.php" id="add-product"  method="POST">
                    <div class="modal-header">
                        <h2>Thêm size hoặc màu cho sản phẩm</h2>
                        <span class="close_add close">&times;</span>
                    </div>
                    <div class="modal-body">
                    <div class="form-group">
                    <?php
                    $sql ="SELECT `product_name`, tbl_product.brand_id,`brand_name`,  tbl_product.category_id,`category_name`, `unit_price`,`product_description`
                    FROM `tbl_product`,`tbl_brand`,`tbl_category` 
                    WHERE product_name = '".$product_name."' and tbl_product.brand_id = tbl_brand.brand_id and tbl_product.category_id = tbl_category.category_id ";
                    $ketquatruyvan = $conn->query($sql);
                    if($ketquatruyvan->num_rows>0){
                    $chitietsanpham=$ketquatruyvan->fetch_assoc()
                        ?>
                            <label>Tên sản phẩm</label>
                            <br>
                            <input type="text" disabled class="form-control" value="<?=$chitietsanpham['product_name']?>">
                            <input type="hidden"  name="product_name" class="form-control" value="<?=$chitietsanpham['product_name']?>">
                        </div>
                        <div class="form-group">
                            <label>Loại</label>
                            <br>
                            <input type="text" disabled  class="form-control" value="<?=$chitietsanpham['category_name']?>">
                            <input type="hidden" name="category_id"  class="form-control" value="<?=$chitietsanpham['category_id']?>">
                        </div>
                        <div class="form-group">
                            <label>Thương hiệu</label>
                            <br>
                            <input type="hidden"  name="brand_id" class="form-control" value="<?=$chitietsanpham['brand_id']?>">
                            <input type="text" disabled  class="form-control" value="<?=$chitietsanpham['brand_name']?>">
                        </div>
                        <div class="form-group">
                            <label>Giá</label>
                            <br>
                            <input type="text" disabled  class="form-control" min='0' step="10000" value="<?=$chitietsanpham['unit_price']?>">
                            <input type="hidden" name="unit_price" class="form-control" value="<?=$chitietsanpham['unit_price']?>">
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <br>
                            <textarea  disabled  id="" cols="40" rows="10"><?=$chitietsanpham['product_description']?></textarea>
                            <input type="hidden" value="<?=$chitietsanpham['product_description']?>" name="product_description" id="">
                        </div>
                        <?php
                        }
                    ?>
                        <div class="form-group">
                            <label>Kích thước</label>
                            <br>
                            <select name="size_id" id="">
                            <?php 
                            $sql = "SELECT `size_id`, `size_name` FROM `tbl_size` WHERE 1";
                            $ketQuaTruyVan = mysqli_query($conn,$sql);
                            if($ketQuaTruyVan->num_rows >0){
                                while($size = $ketQuaTruyVan->fetch_assoc()){
                                echo "<option value='".$size['size_id']."'>".$size['size_name']." </option>";
                                }
                            }
                             ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Màu</label>
                            <br>
                            <select name="color_id" id="">
                            <?php 
                            $sql = "SELECT `color_id`, `color_name` FROM `tbl_color` WHERE 1";
                            $ketQuaTruyVan = mysqli_query($conn,$sql);
                            if($ketQuaTruyVan->num_rows >0){
                                while($color = $ketQuaTruyVan->fetch_assoc()){
                                echo "<option value='".$color['color_id']."'>".$color['color_name']." </option>";
                                }
                            }
                             ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Số lượng</label>
                            <br>
                            <input type="number" name="quantity" class="form-control" min="0" step="1">
                        </div>
                        <div class="form-group">
                            <label>Ảnh </label>
                            <br>
                            <input type="file" name="product_img" class="form-control">
                        </div>
                    </div>
                   <div class="modal-footer">
                   <input type="button" id="btn-close_add" class="btn btn-secondary" data-dismiss="modal" value="Đóng">
                   <button type="submit" name="add-product" id="btn-add_product" class="btn btn-primary ">Lưu</button>
                    </div>
                    
                </form>
            </div>
        </div>
        <!-- end modal -->

<!-- Cập nhật số lượng sản PHẨM -->
    
        <!-- The Modal -->
        <div id="modal-update_items" class="modal">
            
            <!-- Nội dung form đăng nhập -->
            <div class="modal-content">
                <form action="./thuc_hien_cap_nhat_product_details.php" method="POST">
                    <div class="modal-header">
                        <h2>Cập nhật số lượng sản phẩm</h2>
                        <span class="close_update_items close">&times;</span>
                        <input type="hidden" name="product_id" class="id_product" id="" value="">
                    </div>
                    <div class="modal-body">
                    <div class="form-group">
                    <?php
                    $sql ="SELECT `product_name`, tbl_product.brand_id,`brand_name`,  tbl_product.category_id,`category_name`, `unit_price`,`product_description`
                    FROM `tbl_product`,`tbl_brand`,`tbl_category` 
                    WHERE product_name = '".$product_name."' and tbl_product.brand_id = tbl_brand.brand_id and tbl_product.category_id = tbl_category.category_id ";
                    $ketquatruyvan = $conn->query($sql);
                    if($ketquatruyvan->num_rows>0){
                    $chitietsanpham=$ketquatruyvan->fetch_assoc()
                        ?>
                            <label>Tên sản phẩm</label>
                            <br>
                            <input type="text" disabled class="form-control" value="<?=$chitietsanpham['product_name']?>">
                            <input type="hidden"  name="product_name" class="form-control" value="<?=$chitietsanpham['product_name']?>">
                        </div>
                        <div class="form-group">
                            <label>Loại</label>
                            <br>
                            <input type="text" disabled  class="form-control" value="<?=$chitietsanpham['category_name']?>">
                            <input type="hidden" name="category_id"  class="form-control" value="<?=$chitietsanpham['category_id']?>">
                        </div>
                        <div class="form-group">
                            <label>Thương hiệu</label>
                            <br>
                            <input type="hidden"  name="brand_id" class="form-control" value="<?=$chitietsanpham['brand_id']?>">
                            <input type="text" disabled  class="form-control" value="<?=$chitietsanpham['brand_name']?>">
                        </div>
                        <div class="form-group">
                            <label>Giá</label>
                            <br>
                            <input type="text" disabled  class="form-control" min='0' step="10000" value="<?=$chitietsanpham['unit_price']?>">
                            <input type="hidden" name="unit_price" class="form-control" value="<?=$chitietsanpham['unit_price']?>">
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <br>
                            <textarea  disabled  id="" cols="40" rows="10"><?=$chitietsanpham['product_description']?></textarea>
                            <input type="hidden" value="<?=$chitietsanpham['product_description']?>" name="product_description" id="">
                        </div>
                        <?php
                        }
                    ?>
                        <div class="form-group">
                            <label>Số lượng</label>
                            <br>
                            <input type="number" name="quantity" class="form-control" min="0" step="1">
                        </div>
                    </div>
                   <div class="modal-footer">
                   <button type="button" id="btn-close_update_items" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                   <button type="submit" name="update-product_item" class="btn btn-primary">Lưu</button>
                   </div>
                    
                </form>
            </div>
        </div>
<!-- end modal -->

    <!-- Cập nhật thông tin sản phẩm -->
    
        <!-- The Modal -->
        <div id="modal-update" class="modal">
            <!-- Nội dung form đăng nhập -->
            <div class="modal-content">
                <form action="./thuc_hien_cap_nhat_thong_tin_product_details.php" method="POST">
                    <div class="modal-header">
                        <h2>Cập nhật thông tin của sản phẩm</h2>
                        <span class="close_update close">&times;</span>
                    </div>
                    <div class="modal-body">
                    <div class="form-group">
                    <?php
                    $sql ="SELECT `product_name`, tbl_product.brand_id,`brand_name`,  tbl_product.category_id,`category_name`, `unit_price`,`product_description`
                    FROM `tbl_product`,`tbl_brand`,`tbl_category` 
                    WHERE product_name = '".$product_name."' and tbl_product.brand_id = tbl_brand.brand_id and tbl_product.category_id = tbl_category.category_id ";
                    $ketquatruyvan = $conn->query($sql);
                    if($ketquatruyvan->num_rows>0){
                    $chitietsanpham=$ketquatruyvan->fetch_assoc()
                        ?>
                            <label>Tên sản phẩm</label>
                            <br>
                            <input type="text" disabled class="form-control" value="<?=$chitietsanpham['product_name']?>">
                            <input type="hidden" name="product_name" class="form-control" value="<?=$chitietsanpham['product_name']?>">
                        </div>
                        <div class="form-group">
                            <label>Loại</label>
                            <br>
                            <select name="category_id" id="">
                                <?php 
                                $sql = "SELECT `category_id`, `category_name` FROM `tbl_category` WHERE 1";
                                $ketQuaTruyVan = mysqli_query($conn,$sql);
                                if($ketQuaTruyVan->num_rows >0){
                                    while($category = $ketQuaTruyVan->fetch_assoc()){
                                        if($category['category_id']== $chitietsanpham['category_id']){
                                            echo "<option value='".$category['category_id']."' selected='selected'>".$category['category_name']." </option>";
                                        }
                                    echo "<option value='".$category['category_id']."'>".$category['category_name']." </option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Thương hiệu</label>
                            <br>
                            <select name="brand_id" id="">
                                <?php 
                                $sql = "SELECT `brand_id`, `brand_name` FROM `tbl_brand` WHERE 1";
                                $ketQuaTruyVan = mysqli_query($conn,$sql);
                                if($ketQuaTruyVan->num_rows >0){
                                    while($brand = $ketQuaTruyVan->fetch_assoc()){
                                        if($brand['brand_id'] == $chitietsanpham['brand_id']){
                                    echo "<option value='".$brand['brand_id']."'  selected='selected'>".$brand['brand_name']." </option>";
                                        }else{
                                           echo "<option value='".$brand['brand_id']."'>".$brand['brand_name']." </option>";
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Giá</label>
                            <br>
                            <input type="text" name="unit_price"  class="form-control" min='0' step="10000" value="<?=$chitietsanpham['unit_price']?>">
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <br>
                            <textarea  name="product_description"  id="product_description" cols="40" rows="10"><?=$chitietsanpham['product_description']?></textarea>
                            <script>CKEDITOR.replace('product_description');</script>
                        </div>
                        <?php
                        }
                    ?>
                    </div>
                   <div class="modal-footer">
                   <button type="button" id="btn-close_update" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                   <button type="submit" name="update-product" class="btn btn-primary">Lưu</button>
                   </div>
                    
                </form>
            </div>
        </div>
        <!-- end modal -->
<?php
require_once("footer_admin.php")
?>

<script>
    // lấy phần Modal
    var modalAdd = document.getElementById('modal-add');
    var modalUpdateItems = document.getElementById('modal-update_items');
    var modalUpdate = document.getElementById('modal-update');
    var idProduct = document.querySelector('.id_product')
    // Lấy phần button mở Modal
    var btnAdd = document.getElementById("btn-add");
    var btnUpdateItems = document.querySelectorAll("#btn-update_items");
    var btnUpdate = document.getElementById("btn-update");
  
    // Lấy phần span đóng Modal add
    var spanAdd = document.getElementsByClassName("close_add")[0];
    var btnSpanAdd = document.getElementById('btn-close_add');
    // Lấy phần span đóng Modal updateitem
    var spanUpdateItems = document.getElementsByClassName("close_update_items")[0];
    var btnSpanUpdateItems = document.getElementById('btn-close_update_items');
    // Lấy phần span đóng Modal update
    var spanUpdate = document.getElementsByClassName("close_update")[0];
    var btnSpanUpdate = document.getElementById('btn-close_update');


    // Khi button được click thi mở Modal
    btnAdd.onclick = function() {
        modalAdd.style.display = "block";
    }
    btnUpdate.onclick = function() {
        modalUpdate.style.display = "block";
    }
    
    btnUpdateItems.forEach(e => {
        e.onclick = function(){
            modalUpdateItems.style.display = 'block';
            idProduct.value = e.value
        }
    });
    // Khi span được click thì đóng Modal add
    spanAdd.onclick = function() {
        modalAdd.style.display = "none";
    }
    btnSpanAdd.onclick = function() {
        modalAdd.style.display = "none";
    }
    // Khi span được click thì đóng Modal update item
    spanUpdateItems.onclick = function() {
        modalUpdateItems.style.display = "none";
    }
    btnSpanUpdateItems.onclick = function() {
        modalUpdateItems.style.display = "none";
    }
  
    // Khi span được click thì đóng Modal update
    spanUpdate.onclick = function() {
        modalUpdate.style.display = "none";
    }
    btnSpanUpdate.onclick = function() {
        modalUpdate.style.display = "none";
    }
  
  
    // Khi click ngoài Modal thì đóng Modal
    window.onclick = function(event) {
        if (event.target == modalAdd) {
            modalAdd.style.display = "none"; 
        }
        if (event.target == modalUpdate) {
            modalUpdate.style.display = "none"; 
        }
        if (event.target == modalUpdateItems) {
            modalUpdateItems.style.display = "none"; 
        }
    }



</script>