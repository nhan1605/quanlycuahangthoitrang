<?php
require_once("header_admin.php");
$user_id = $_GET['user_id'];
?>
<!-- nội dung -->
            <div class="col-lg-9">
                <div class="title_item">CHI TIẾT KHÁCH HÀNG</div>
            <div class="scroll">
            <!-- START -->
                <div class="container" style="padding: 20px;">
                    <div class="row">
                        <div class="col-4">
                            <img width="300px" height="300px" src="https://znews-photo.zingcdn.me/w660/Uploaded/qhj_yvobvhfwbv/2018_07_18/Nguyen_Huy_Binh1.jpg" alt="">
                        </div>
                        <?php
                            $sql="SELECT `user_id`, `user_name`, `password`, city,district,ward, `specific_location`, `email`, `phone`, `birthday` 
                            FROM `tbl_user` WHERE user_id ='".$user_id."' ";
                            $ketQuaTruyVan = $conn->query($sql);
                            if($ketQuaTruyVan -> num_rows>0)
                            {
                                
                                $customer = $ketQuaTruyVan -> fetch_assoc()
                                
                        ?>
                        <div class="col-8">
                            <div class="customer_info">
                                <h3>Tên khách hàng: <?=$customer['user_name']?></h3>
                                <h5>Email:  <?=$customer['email']?></h5>
                                <h5>Mật khẩu:  <?=$customer['password']?></h5>
                                <h5>Số điện thoại:  <?=$customer['phone']?></h5>
                                <h5>Ngày sinh:  <?=$customer['birthday']?></h5>
                                <h5>Địa chỉ:  <?=$customer['city']?>- <?=$customer['district']?>- <?=$customer['ward']?></h5>
                                <h5>Địa chỉ cụ thể:  <?=$customer['specific_location']?></h5>
                            </div>
                        </div>
                    </div>
                    <?php
                                }
                        ?>
                    <div class="order_customer"><span>Đơn hàng đã mua</span></div>
                    <div class="container" style="margin-top:10px;">
                    <table class="table table-striped table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Trang thái</th>
                    </tr>
                    <?php
                            $sql="SELECT invoice_id, order_date,total_price,tbl_status.status_describe
                            FROM tbl_invoice , tbl_status , tbl_product
                            WHERE tbl_invoice.status_id= tbl_status.status_id
                            and tbl_invoice.user_id = '".$user_id."'
                            GROUP BY invoice_id";
                            $ketQuaTruyVan = $conn->query($sql);
                            if($ketQuaTruyVan -> num_rows>0)
                            {
                                
                                while($donHang = $ketQuaTruyVan -> fetch_assoc())
                                {
                        ?>
                            <tr>
                                <td>
                                <form action="./invoice_detail.php" method="post">    
                                    <input type="hidden" name ="invoice_id" value="<?php echo $donHang['invoice_id'];?>" >
                                    <button class="btn text-primary" type ="submit" style="margin-bottom:10px;" ><?php echo $donHang['invoice_id'];?></button>                             
                                </form>
                                </td>
                                <td>
                                    <?php echo $donHang['order_date'];?>
                                </td>
                                <td>
                                    <?php echo $donHang['total_price'];?>
                                </td>
                                <td>
                                    <?php echo $donHang['status_describe'];?>
                                </td>
                            </tr>
                            <?php
                                }
                            }
                        ?>
                    </table>
                    </div>
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
