<?php
require_once("header_admin.php");
$category_id = $_POST['btn-category_id'];
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
                    <th>Thao tác</th>
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
                        <form action="./brand_sua.php" method="POST" id="btn-form_update" >
                            <button type="submit"  class="btn btn-info" name="btn-brand_id" id="btn-update_items" value="<?=$category['category_id']?>">Sửa</button>  
                        </form>
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

        

<?php
require_once("footer_admin.php")
?>
 <!-- Update thương hiệu -->
            <!-- The Modal -->
            <div id="modal-update_items" class="modal" style="display:block" >
            <!-- Nội dung form đăng nhập -->
            <div class="modal-content">
                <form action="./category_thuc_hien_sua.php" method="POST" class="form-update">
                    <div class="modal-header">
                        <h2>Cập nhật loại hàng</h2>
                        <span class="close_update_items close" onclick="Redirect()">&times;</span>
                        <input type="hidden" name="category_id" class="id_brand" id="" value="<?=$category_id?>">
                    </div>
                    <div class="modal-body">
                    <div class="form-group">
                    <?php
            $sql ="SELECT `category_id`, `category_name`, `category_discription` FROM `tbl_category` WHERE category_id = '".$category_id."'";
            $ketquatruyvan = $conn->query($sql);
            if($ketquatruyvan->num_rows>0){
                $i=1;
               $category=$ketquatruyvan->fetch_assoc()
                ?>
                            <label>Tên thương hiệu</label>
                            <br>
                            <input type="text"  name="category_name" class="form-control" value="<?=$category['category_name']?>">
                        </div>
                        <div class="form-group">
                            <label>Mô tả</label>
                            <br>
                            <textarea name="category_description" id="category_description" cols="30" rows="10"><?=$category['category_discription']?></textarea>
                            <script>CKEDITOR.replace('category_description');</script>                        
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
            function Redirect() {
               window.location="./category_admin.php";
            }
        </script>