<?php
require_once("header_admin.php");
$admin_id = $_POST['btn-admin_id'];
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
                                    <form action="" method="POST" id="btn-form_update" >
                                        <button type="submit" class="btn btn-info" name="btn-admin_id" id="btn-update_items" value="<?=$admin['admin_id']?>">Sửa</button>  
                                    </form> 
                                </td>
                                <td>    
                                <a class="btn btn-danger" href="">Xóa</a>
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
<div id="modal-update_items" class="modal" style="display:block" >
        <div class="modal-content" >
            <?php
                            $sql="SELECT * FROM tbl_admin 
                                  WHERE admin_id =".$admin_id;
                            $ketQuaTruyVan = $conn->query($sql);
                 if ($ketQuaTruyVan->num_rows > 0) 
                 {
                     while ($admin = $ketQuaTruyVan->fetch_assoc())                     
                    {                        
                        $admin_name = $admin['name'];
                        $admin_email = $admin['email'];
                        $admin_password = $admin['password'];
                        $admin_phone = $admin['phone'];    
                    }
                 }
            ?>     
            <form action="update_admin_sql.php" method="post">
                <div class="modal-header">
                        <h2>Cập nhật thông tin nhân viên</h2>
                        <span class="close" id ="close_update_items"  onclick="Redirect()">&times;</span>
                    </div>
                    <div class="modal-body">
                    <input type="text" name ="admin_id"  value="<?php echo $admin_id?>">
                         <div class="form-group">
                            <label>Tên nhân viên</label>
                            <br>
                            <input type="text" name="admin_name" class="form-control" value="<?php echo $admin_name?>">   
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="admin_email" class="form-control" value="<?php echo $admin_email?>">
                        </div>
                        <div class="form-group">
                            <label for="">Mật khẩu</label>
                            <input type="text" name="admin_password" class="form-control"value="<?php echo $admin_password?>">
                        </div>
                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input type="text" name="admin_phone" class="form-control"value="<?php echo $admin_phone?>">
                        </div>
                    </div>
                   <div class="modal-footer">
                   <button type="button" id="btn-close_update_items" class="btn btn-secondary" data-dismiss="modal"  onclick="Redirect()">Đóng</button>
                   <button type="submit" name="registerbtn" class="btn btn-primary">Lưu</button>
                   </div>         
                </form>
            </div>
        </div>
<?php
require_once("footer_admin.php")
?>
<script>
   function Redirect() 
   {
               window.location="./admin_list.php";
    }
   
</script>