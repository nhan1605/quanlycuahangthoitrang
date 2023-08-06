<?php
require_once("./header_admin.php")
?>
<!-- nội dung -->
            <div class="col-lg-9">
                <div class="title_item">DANH SÁCH LOẠI HÀNG</div>
            <div class="scroll">
            <!-- START -->
            
               <!-- Nội dung -->
               <div class="container" style="margin-top:10px;">
               <button class="btn btn-success" id="btn-add" style="margin-bottom:10px;">Thêm loại hàng</button>
            <table class="table table-striped table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Tên loại</th>
                    <th>Mô tả</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
                <?php
            $sql ="SELECT `category_id`, `category_name`, `category_discription` FROM `tbl_category` WHERE 1";
            $ketquatruyvan = $conn->query($sql);
            if($ketquatruyvan->num_rows>0){
                while($category=$ketquatruyvan->fetch_assoc()){
                ?>
                <tr>
                    <td><?=$category['category_id']?></td>
                    <td ><?=$category['category_name']?></td>
                    <td ><?=$category['category_discription']?></td>
                    <td>
                        <form action="./category_sua.php" method="POST" id="btn-form_update" >
                            <button type="submit"  class="btn btn-info" name="btn-category_id" id="btn-update_items" value="<?=$category['category_id']?>">Sửa</button>  
                        </form>
                    </td>
                    <td>
                    <a class="btn btn-danger" href="./category_thuc_hien_xoa.php?category_id=<?=$category['category_id']?>">Xóa</a>
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

<!-- Thêm loại hàng-->
   <!-- The Modal -->
   <div id="myModal" class="modal">
            <!-- Nội dung form đăng nhập -->
            <div class="modal-content">
                <form action="./category_thuc_hien_them.php" class="form" method="POST">
                    <div class="modal-header">
                        <h2>Thêm loại hàng</h2>
                        <span class="close">&times;</span>
                    </div>
                    <div class="modal-body">
                         <div class="form-group">
                            <label>Tên loại hàng</label>
                            <br>
                            <input type="text" name="category_name" class=" input_name  form-control">
                            <span class="form-massage"></span>
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <br>
                            <textarea name="category_description" id="category_description" cols="40" rows="10"></textarea>
                            <script>CKEDITOR.replace('category_description');</script>
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
require_once("./footer_admin.php")
?>

<script>
    // lấy phần Modal
    var modal = document.getElementById('myModal');
    var modalUpdateItems = document.getElementById('modal-update_items');
    var idBrand = document.querySelector('.id_brand')
         //tên sản phẩm
var brandName = document.querySelectorAll(".brand_name");
var brandDes = document.querySelectorAll(".brand_description");
var brandImg = document.querySelectorAll(".brand_img");
  
    // Lấy phần button mở Modal
    var btn = document.getElementById("btn-add");
    var btnUpdateItems = document.querySelectorAll("#btn-update_items");
  
    // Lấy phần span đóng Modal
    var span = document.getElementsByClassName("close")[0];
    var btnSpan = document.getElementById('btn-close');

        // Lấy phần span đóng Modal update
        var spanUpdateItems = document.getElementsByClassName("close_update_items")[0];
    var btnSpanUpdateItems = document.getElementById('btn-close_update_items');

    // Khi button được click thi mở Modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    btnUpdateItems.forEach(e => {
        e.onclick = function(){
            modalUpdateItems.style.display = 'block';
            idBrand.value = e.value
        }
    });

    // Khi span được click thì đóng Modal
    span.onclick = function() {
        modal.style.display = "none";
    }
    btnSpan.onclick = function() {
        modal.style.display = "none";
    }
        // Khi span được click thì đóng Modal update 
        spanUpdateItems.onclick = function() {
        modalUpdateItems.style.display = "none";
    }
    btnSpanUpdateItems.onclick = function() {
        modalUpdateItems.style.display = "none";
    }
  
    // Khi click ngoài Modal thì đóng Modal
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }



var form = document.querySelector(".form");
var formUpdate = document.querySelector(".form-update");

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
    brandName.forEach(ele => {
    if(inputName.value.toLowerCase().trim() == ele.innerHTML.toLowerCase().trim()){
        e.preventDefault(); 
        error(inputName,'Thương hiệu này đã tồn tại');
        inputName.focus();
    }
    }); 
}

formUpdate.onsubmit = function(e){
    brandName.forEach(ele => {
    if(inputName.value.toLowerCase().trim() == ele.innerHTML.toLowerCase().trim()){
        e.preventDefault(); 
        error(inputName,'Thương hiệu này đã tồn tại');
        inputName.focus();
    }
    }); 
}


</script>