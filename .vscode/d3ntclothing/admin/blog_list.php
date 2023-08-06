<?php
require_once("header_admin.php");
?>
<!-- nội dung -->
<div class="col-lg-9">
    <!--div Thêm tên -->
    <div class="title_item">DANH SÁCH TIN TỨC</div>
    <div class="scroll">
<!-- <div class="admin_item-content" style=" height:1000px; width:100%; "> -->
        <div class="container" style="margin-top:10px;">
            <button class="btn btn-success" id="btn-add" style="margin-bottom:10px;">Tạo blog</button>
                <table class="table table-striped table-bordered">
                    <thead>            
                            <tr>
                                <th>ID</th>
                                <th width="15%">Tiêu đề</th>
                                <th>Ảnh</th>
                                <th width="15%">Tác giả</th>
                                <th>Nội dung</th>
                                <th>Ngày đăng</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </td>
                            </tr>                    
                    </thead>
                    <tbody>
                    <?php
                            $sql="SELECT blog_id,blog_name,tbl_admin.name,blog_content,date_post , blog_img
                            FROM tbl_blog,tbl_admin where tbl_blog.admin_id = tbl_admin.admin_id";
                            $ketQuaTruyVan = $conn->query($sql);
                            if($ketQuaTruyVan -> num_rows>0)
                            {
                                while($blog = $ketQuaTruyVan -> fetch_assoc())
                                {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $blog['blog_id'];?>
                                </td>
                                <td>
                                    <?php echo $blog['blog_name'];?>
                                </td>
                                <td>
                                    <img src=" <?php echo $blog['blog_img'];?>" alt="">
                                </td>
                                <td>
                                    <?php echo $blog['name'];?>
                                </td>
                                <td>
                                    <?php echo $blog['blog_content'];?>
                                </td>
                                <td>
                                    <?php echo $blog['date_post'];?>
                                </td>
                                <td>
                                    <form action="./update_blog.php?blog_id=<?php echo $blog['blog_id'];?>" method="POST" id="btn-form_update" >
                                        <button type="submit" class="btn btn-info" name="btn-blog_id" id="btn-update_items" value="<?=$blog['blog_id']?>">Sửa</button>  
                                    </form> 
                                </td>
                                <td>    
                                <a class="btn btn-danger" href="./delete_blog.php?blog_id=<?php echo $blog['blog_id'];?>">Xóa</a>
                                </td>
                            </tr>
                            <?php
                                }
                            }
                        ?>
                    </tbody> 

                </table>
        </div>
    </div>
            </div>
        </div>       
      </div>
    </section>
</main>
        <div id="myModal" class="modal">
        <!-- <script src="ckeditor/ckeditor.js"></script> -->
            <!-- Nội dung form thêm -->
            <div class="modal-content">
                <form action="add_blog.php" method="post">
                    
                    <div class="modal-header">
                        <h2>Tạo blog</h2>
                        <span class="close">&times;</span>
                    </div>
                    <div class="modal-body">   
                    <div class="form-group">
                            <label>Tên blog</label>
                            <br>
                            <input type="text" name="blog_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Tác giả</label>
                            <br>
                            <?php
                            echo ' <input type="hidden" class="form-control" name="admin_id" id="" value="'.$_SESSION['admin_id'].'">';                           
                            echo ' <input type="text" class="form-control" id="" value="'.$_SESSION['admin_name'].'">';                           
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="">Ảnh</label>
                            <br>
                            <input type="text" name="blog_img">
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung</label>
                            <textarea name="blog_content" id ="blog_content"class="form-control"></textarea>
                            <script>CKEDITOR.replace('blog_content');</script>
                        </div>
                        <div class="form-group">
                            <label for="">Ngày đăng</label>
                            <input type="date" name="date_post"placeholder="dd-mm-yyyy" value=""min="1997-01-01" max="2030-12-31"> 
                        </div>
                    </div>
                   <div class="modal-footer">
                   <button type="button" id="btn-close" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                   <button type="submit" name="registerbtn" class="btn btn-primary">Thêm</button>
                   </div>
                </form>
            </div>
        </div>    
<?php
require_once("footer_admin.php")
?>
<script>
    // lấy phần Modal
    var modal = document.getElementById('myModal');
    var modalUpdateItems = document.getElementById('modal-update_items');
    // var idBrand = document.querySelector('.id_brand')
  
    // Lấy phần button mở Modal
    var btn = document.getElementById("btn-add");
    var btnUpdateItems = document.querySelectorAll("#btn-update_items");
  
    // Lấy phần span đóng Modal
    var span = document.getElementsByClassName("close")[0];
    var btnSpan = document.getElementById('btn-close');

        // Lấy phần span đóng Modal update
    var spanUpdateItems = document.getElementById("close_update_items");
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
        if (event.target == modalUpdateItems) {
            modalUpdateItems.style.display = "none"; 
        }
    }
   
</script>