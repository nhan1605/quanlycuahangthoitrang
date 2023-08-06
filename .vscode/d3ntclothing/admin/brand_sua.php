<?php
require_once("header_admin.php");
$brand_id = $_POST['btn-brand_id'];
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
                    <th>Thao tác</th>
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
                        <form action="" method="POST" id="btn-form_update" onsubmit="return false">
                            <button type="submit"  class="btn btn-info" name="btn-product_id" id="btn-update_items" value="<?=$brand['brand_id']?>">Sửa</button>  
                        </form>
                        <a class="btn btn-danger" href="./brand_thuc_hien_xoa.php<?=$brand['brand_id']?>">Xóa</a>
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

        <!-- Update thương hiệu -->
            <!-- The Modal -->
            <div id="modal-update_items" class="modal" style="display:block" >
            <!-- Nội dung form đăng nhập -->
            <div class="modal-content">
                <form action="./brand_thuc_hien_sua.php" method="POST" class="form-update">
                    <div class="modal-header">
                        <h2>Cập nhật thương hiệu</h2>
                        <span class="close_update_items close" onclick="Redirect()">&times;</span>
                        <input type="hidden" name="brand_id" class="id_brand" id="" value="<?=$brand_id?>">
                    </div>
                    <div class="modal-body">
                    <div class="form-group">
                    <?php
            $sql ="SELECT `brand_id`, `brand_name`, `brand_description`, `brand_img` FROM `tbl_brand` WHERE brand_id = '".$brand_id."'";
            $ketquatruyvan = $conn->query($sql);
            if($ketquatruyvan->num_rows>0){
                $i=1;
               $brand=$ketquatruyvan->fetch_assoc()
                ?>
                            <label>Tên thương hiệu</label>
                            <br>
                            <input type="text"  name="brand_name" class="form-control" value="<?=$brand['brand_name']?>">
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <br>
                            <textarea name="brand_description" id="brand_description" cols="30" rows="10"><?=$brand['brand_description']?></textarea>
                            <script>CKEDITOR.replace('brand_description');</script>
                        </div>
                        <div class="form-group">
                            <label>Ảnh </label>
                            <br>
                            <input type="file" name="brand_img" id="file_anh" class="form-control" value="<?=$brand['brand_img']?>">
                            <input type="hidden" name="brand_img-old" id="file_anh" class="form-control" value="<?=$brand['brand_img']?>">
                            <img src="../image-brand/<?=$brand['brand_img']?>" alt="" id="img_show" style="width:50px">
                        </div>
                    </div>
                   <div class="modal-footer">
                   <button type="button" id="btn-close_update_items"  onclick="Redirect()" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                   <button type="submit" name="update-product_item" class="btn btn-primary">Lưu</button>
                   </div>
                    <?php
          }

?>      
                </form>
            </div>
        </div>
        <!-- end modal -->

        <script>
        const fileUpload = document.querySelector('#file_anh');
        const img_show = document.querySelector('#img_show')
        const reader = new FileReader();
                
        // Lắng nghe trạng thái đăng tải tệp
        fileUpload.addEventListener("change", (event) => {
            // Lấy thông tin tập tin được đăng tải
            file = event.target.files;
            
            // Đọc thông tin tập tin đã được đăng tải
            reader.readAsDataURL(file[0])
            // Lắng nghe quá trình đọc tập tin hoàn thành
            reader.addEventListener("load", (event) => {
                // Lấy chuỗi Binary thông tin hình ảnh
                const img = event.target.result;
                // cho link vào thẻ img
                img_show.src =img;
            })
        })

        function Redirect() {
               window.location="./brand_admin.php";
            }
        

    </script>
<?php
require_once("footer_admin.php")
?>
