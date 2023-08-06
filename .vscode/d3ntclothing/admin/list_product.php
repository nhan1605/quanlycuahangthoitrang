<?php
require_once("header_admin.php");
?>
<!-- nội dung -->
            <div class="col-lg-9">
                <div class="title_item">DANH SÁCH SẢN PHẨM</div>
            <div class="scroll">
            <!-- START -->
            
               <!-- Nội dung -->
               <div class="container" style="margin-top:10px;">
               <button class="btn btn-success" id="btn-add" style="margin-bottom:10px;">Thêm mặt hàng</button>
            <table class="table table-striped table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Tên mặt hàng</th>
                    <th>Loại</th>
                    <th>Thương hiệu</th>
                    <th>Giá</th>
                    <th>Chi tiết</th>
                    <th>Xóa</th>
                </tr>
                <?php
            $sql ="SELECT `product_name`, `brand_name`, `category_name`, `unit_price`
            FROM `tbl_product`,`tbl_brand`,`tbl_category` 
            WHERE tbl_product.brand_id = tbl_brand.brand_id and tbl_product.category_id = tbl_category.category_id 
             GROUP by `product_name` order by tbl_product.brand_id;";

            $ketquatruyvan = $conn->query($sql);
            if($ketquatruyvan->num_rows>0){
                $i=1;
                while($sanpham=$ketquatruyvan->fetch_assoc()){
                ?>
                <tr>
                    <td><?=$i?></td>
                    <td class="product_name"><?=$sanpham['product_name']?></td>
                    <td><?=$sanpham['brand_name']?></td>
                    <td><?=$sanpham['category_name']?></td>
                    <td><?=$sanpham['unit_price']?></td> 
                    <td>
                      <!-- <form action="./product_details.php?product_details=<?=$sanpham['product_name'];?>" method="post">
                        <input type="hidden" name="product_details" value="<?php echo $sanpham['product_name'] ?>">
                         <button  type="submit" submit class="btn btn-info" >Chi tiết</button>  
                      </form> -->
                      <a href="./product_details.php?product_name=<?=$sanpham['product_name'];?>" class="btn btn-info">Chi tiết</a>
                    </td>
                    <td> 
                        <!-- <form action="./thuc_hien_xoa_list_product.php" method="POST">
                        <input type="hidden" name="delete_product" value="<?php echo $sanpham['product_name'] ?>">
                        <button class="btn btn-danger" href="xoa_mat_hang.php" type="submit">Xóa</button>
                    </form> -->
                      <a href="./thuc_hien_xoa_list_product.php?product_name=<?=$sanpham['product_name'];?>" class="btn btn-danger">Xóa</a>
                    </td>
                 
                </tr>  
                <?php
       $i++;
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
   <!-- The Modal -->
   <div id="myModal" class="modal">
            <!-- Nội dung form đăng nhập -->
            <div class="modal-content">
                <form action="thuc_hien_them_list_product.php" class="form" method="POST" name="add_product">
                    <div class="modal-header">
                        <h2>Thêm sản phẩm</h2>
                        <span class="close">&times;</span>
                    </div>
                    <div class="modal-body">
                         <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <br>
                            <input type="text" name="product_name" class=" input_name form-control">
                            <span class="form-massage"></span>
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
                       echo "<option value='".$brand['brand_id']."'>".$brand['brand_name']." </option>";
                    }
                }
                ?>
                            </select>
                        </div>
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
                            <label>Giá</label>
                            <br>
                            <input type="number" name="unit_price" class="form-control" min='0' step="10000" value="0">
                            <span class="form-massage"></span>
                        </div>
                        <div class="form-group">
                            <label>Số lượng</label>
                            <br>
                            <input type="number" name="quantity" class="form-control" min="0" step="1" value="0">
                            <span class="form-massage"></span>
                        </div>
                        <div class="form-group">
                            <label>Ảnh </label>
                            <br>
                            <input type="file" name="product_img" class="form-control">
                            <span class="form-massage"></span>
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <br>
                            <textarea name="product_content" id="product_content" cols="40" rows="10"></textarea>
                            <span class="form-massage"></span>
                            <script>CKEDITOR.replace('product_content');</script>
                        </div>
                        
                    </div>
                   <div class="modal-footer">
                   <button type="button" id="btn-close" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                   <button type="submit" name="registerbtn" class="btn btn-primary">Lưu</button>
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
    var modal = document.getElementById('myModal');
  
    // Lấy phần button mở Modal
    var btn = document.getElementById("btn-add");
  
    // Lấy phần span đóng Modal
    var span = document.getElementsByClassName("close")[0];
    var btnSpan = document.getElementById('btn-close');
    // Khi button được click thi mở Modal
    btn.onclick = function() {
        modal.style.display = "block";
    }
  
    // Khi span được click thì đóng Modal
    span.onclick = function() {
        modal.style.display = "none";
    }
    btnSpan.onclick = function() {
        modal.style.display = "none";
    }
  
    // Khi click ngoài Modal thì đóng Modal
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    //tên sản phẩm
var productName = document.querySelectorAll(".product_name")

var form = document.querySelector(".form")

// lỗi
function error(input,message){
    var parent = input.parentElement;
    var small = parent.querySelector('.form-massage');
    small.innerHTML = message;

}
function success(input){
    var parent = input.parentElement;
    var small = parent.querySelector('.form-massage');
    small.innerHTML = '';
}
// click button
form.onsubmit = function(e){
           
            var inputName = document.querySelector(".input_name");
    if(inputName.value.trim()==''){
        e.preventDefault(); 
        error(inputName,'Không được để trống!');
        inputName.focus();
    }
    productName.forEach(ele => {
    if(inputName.value.toLowerCase().trim() == ele.innerHTML.toLowerCase().trim()){
        e.preventDefault(); 
        error(inputName,'Sản phẩm đã tồn tại');
        inputName.focus();
    }
    });

    
}


//
</script>