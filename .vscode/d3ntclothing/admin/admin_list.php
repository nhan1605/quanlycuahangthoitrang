<?php
require_once("header_admin.php") 
?>
<!-- nội dung -->
<div class="col-lg-9">
    <!--div Thêm tên -->
    <div class="title_item">DANH SÁCH NHÂN VIÊN</div>
    <div class="scroll">
<!-- <div class="admin_item-content" style=" height:1000px; width:100%; "> -->
        <div class="container" style="margin-top:10px;">
            <button class="btn btn-success" id="btn-add" style="margin-bottom:10px;">Bổ sung danh sách nhân viên</button>
                <table class="table table-striped table-bordered">
                    <thead>            
                            <tr>
                                <th>ID</th>
                                <th width="15%">Họ và tên</th>
                                <th width="15%">Email</th>
                                <th>Password</th>
                                <th>Số điện thoại</th>
                                <th>Thao tác</th>
                            </td>
                            </tr>                    
                    </thead>
                    <tbody>
                    <?php
                            $sql="SELECT * FROM tbl_admin";
                            $ketQuaTruyVan = $conn->query($sql);
                            if($ketQuaTruyVan -> num_rows>0)
                            {
                                while($admin = $ketQuaTruyVan -> fetch_assoc())
                                {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $admin['admin_id'];?>
                                </td>
                                <td>
                                    <?php echo $admin['name'];?>
                                </td>
                                <td>
                                    <?php echo $admin['email'];?>
                                </td>
                                <td>
                                    <?php echo $admin['password'];?>
                                </td>
                                <td>
                                    <?php echo $admin['phone'];?>
                                </td>
                                <td>
                                    <form action="update_admin.php" method="POST" id="btn-form_update" >
                                        <button type="submit" class="btn btn-info" name="btn-admin_id" id="btn-update_items" value="<?=$admin['admin_id']?>">Sửa</button>  
                                    </form> 
                                </td>
                                <td>    
                                <a class="btn btn-danger" href="./admin_list_xoa.php?admin_id=<?=$admin['admin_id']?>">Xóa</a>
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
            <!-- Nội dung form thêm -->
            <div class="modal-content">
                <form action="add_admin.php" method="post">
                    <div class="modal-header">
                        <h2>Bổ sung nhân viên</h2>
                        <span class="close">&times;</span>
                    </div>
                    <div class="modal-body">  
                    <div class="form-group">
                            <label>Tên nhân viên</label>
                            <br>
                            <input type="text" name="admin_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="admin_email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Mật khẩu</label>
                            <input type="text" name="admin_password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input type="text" name="admin_phone" class="form-control">
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