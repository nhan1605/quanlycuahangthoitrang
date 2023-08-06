<?php
require_once("./header_admin.php")
?>
<!-- nội dung -->
<div class="col-lg-9">
    <!--div Thêm tên -->
    <div class="title_item">DANH SÁCH ĐƠN HÀNG THÀNH CÔNG</div>
    <div class="scroll">
<!-- <div class="admin_item-content" style=" height:1000px; width:100%; "> -->


<table class="table table-striped table-bordered">
    <thead>            
            <tr>
                <th>ID</th>
                <th>Ngày đặt</th>
                <th width="15%">Khách hàng</th>
                <th>Thành tiền</th>
                <th>Trạng thái</th>
            </tr>
    </thead>
    <tbody>
                        <?php
                            $sql="SELECT tbl_invoice.invoice_id,tbl_invoice.user_id,tbl_invoice.order_date,tbl_invoice.total_price, tbl_status.status_describe 
                            FROM tbl_invoice join tbl_status 
                            ON tbl_invoice.status_id = tbl_status.status_id 
                            WHERE tbl_status.status_describe = 'Thành công' 
                            ORDER BY invoice_id";
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
                                    <?php echo $donHang['user_id'];?>
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
        </div>       
      </div>
    </section>
  </main>
  <!-- Cập nhật trạng thái đơn hàng -->
  <div id="myModal" class="modal">
            <!-- Nội dung form cập nhật -->
            <div class="modal-content">
                <form action="update_status_invoice.php" method="post">
                    <div class="modal-header">
                        <h3>Cập nhật trạng thái đơn hàng</h3>
                        <span class="close">&times;</span>
                        <input type="hidden" name = "invoice_id"  id="invoice_id">
                    </div>
                    <div class="modal-body">
                        <select name="status_id" class="form-control form-select">
                        <?php 
                        $sql = "SELECT * FROM tbl_status";
                        $ketQuaTruyVan = mysqli_query($conn,$sql);
                        if($ketQuaTruyVan->num_rows >0)
                        {   
                            while($trangThai = $ketQuaTruyVan->fetch_assoc())
                            {
                            echo "<option value='".$trangThai['status_id']."'>".$trangThai['status_describe']." </option>";
                            }
                        }
                        ?>
                    </select>
                    </div>
                    
                   <div class="modal-footer">
                   <button type="button" id="btn-close" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                   <button type="submit" name="update"  class="btn btn-primary">Lưu</button>
                   </div>
                </form>
            </div>
        </div>
<?php
require_once("./footer_admin.php")
?>
<script>
    // lấy phần Modal
    var modal = document.getElementById('myModal');
    var invoiceId = document.getElementById('invoice_id');
    // var idBrand = document.querySelector('.id_brand')
  
    // Lấy phần button mở Modal
    var btn = document.querySelectorAll("#btn-add");

  
    // Lấy phần span đóng Modal
    var span = document.getElementsByClassName("close")[0];
    var btnSpan = document.getElementById('btn-close');
    // Khi button được click thi mở Modal

    btn.forEach(e => {
        e.onclick = function(){
            modal.style.display = 'block';
            invoiceId.value = e.value
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
     
  
    // Khi click ngoài Modal thì đóng Modal
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
       
    }
</script>