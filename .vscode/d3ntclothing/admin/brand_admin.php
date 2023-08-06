<?php
require_once("header_admin.php")
?>
<!-- nội dung -->
            <div class="col-lg-9">
                <div class="title_item">DANH SÁCH ThƯƠNG HiỆU</div>
            <div class="scroll">
            <!-- START -->
            
               <!-- Nội dung -->
               <div class="container" style="margin-top:10px;">
               <button class="btn btn-success" id="btn-add" style="margin-bottom:10px;">Thêm thương hiệu</button>
            <table class="table table-striped table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Tên thương hiệu</th>
                    <th>Mô tả</th>
                    <th>Ảnh</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
                <?php
            $sql ="SELECT `brand_id`, `brand_name`, `brand_description`, `brand_img` FROM `tbl_brand` WHERE 1";
            $ketquatruyvan = $conn->query($sql);
            if($ketquatruyvan->num_rows>0){
                while($brand=$ketquatruyvan->fetch_assoc()){
                ?>
                <tr>
                    <td><?=$brand['brand_id']?></td>
                    <td ><?=$brand['brand_name']?></td>
                    <td ><?=$brand['brand_description']?></td>
                    <td >
                    <img width="50px" height="50px" src="../image-brand/<?=$brand['brand_img']?>" alt="">
                    </td>
                    <td>
                        <form action="./brand_sua.php" method="POST" id="btn-form_update" >
                            <button type="submit"  class="btn btn-info" name="btn-brand_id" id="btn-update_items" value="<?=$brand['brand_id']?>">Sửa</button>  
                        </form>
                    </td>
                    <td>
                    <a class="btn btn-danger" href="./brand_thuc_hien_xoa.php?brand_id=<?=$brand['brand_id']?>">Xóa</a>
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

<!-- Thêm thương HiỆU -->
   <!-- The Modal -->
   <div id="myModal" class="modal">
            <!-- Nội dung form đăng nhập -->
            <div class="modal-content">
                <form action="./brand_thuc_hien_them.php" class="form" method="POST">
                    <div class="modal-header">
                        <h2>Thêm thương hiệu</h2>
                        <span class="close">&times;</span>
                    </div>
                    <div class="modal-body">
                         <div class="form-group">
                            <label>Tên thương hiệu</label>
                            <br>
                            <input type="text" name="brand_name" class=" input_name  form-control">
                            <span class="form-massage"></span>
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <br>
                            <textarea name="brand_description" id="brand_description" cols="40" rows="10"></textarea>
                            <script>CKEDITOR.replace('brand_description');</script>
                        </div>
                        <div class="form-group">
                            <label>Ảnh </label>
                            <br>
                            <input type="file" name="brand_img" class="form-control">
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