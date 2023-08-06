<?php
require_once("header_admin.php")

?>
<!-- nội dung -->
            <div class="col-lg-9">
                <!-- <div></div>  Tên trang -->
                <div class="title_item">DANH SÁCH KHÁCH HÀNG</div>
            <div class="scroll">
            <!-- START -->
               <!-- Nội dung -->
               <div class="container" style="margin-top:10px;">
            <table class="table table-striped table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Tên khách hàng</th>
                    <th>Email</th>
                    <th>Mật khẩu</th>
                    <th>Chi tiết</th>
                    <th>Xóa</th>
                </tr>
                <?php
                            $sql="SELECT `user_id`, `user_name`, `password`, `city`, `district`, `ward`, `specific_location`, `email`, `phone`, `birthday` 
                            FROM `tbl_user` WHERE 1";
                            $ketQuaTruyVan = $conn->query($sql);
                            if($ketQuaTruyVan -> num_rows>0)
                            {
                                
                                while($customer = $ketQuaTruyVan -> fetch_assoc())
                                {
                        ?>
                            <tr>
                <tr>
                    <td><?=$customer['user_id']?></td>
                    <td><?=$customer['user_name']?></td>
                    <td><?=$customer['email']?></td>
                    <td><?=$customer['password']?></td> 
                    <td>
                    <a class="btn btn-info" href="customer_details.php?user_id=<?=$customer['user_id']?>">Chi tiết</a>  
                    </td>
                    
                    <td> 
                        <a class="btn btn-danger" href="customer_xoa.php?user_id=<?=$customer['user_id']?>">Xóa</a>
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