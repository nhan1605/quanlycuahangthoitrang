<?php
require_once("header_admin.php");
?>
<!-- nội dung -->
<div class="col-lg-9">
    <!--div Thêm tên -->
    <div class="title_item">CHƯƠNG TRÌNH KHUYẾN MÃI</div>
    <div class="scroll">
<!-- <div class="admin_item-content" style=" height:1000px; width:100%; "> -->
        <div class="container" style="margin-top:10px;">
            <button class="btn btn-success" id="btn-add" style="margin-bottom:10px;">Thêm mã khuyến mãi</button>
                <table class="table table-striped table-bordered">
                    <thead>            
                            <tr>
                                <th>ID</th>
                                <th width="15%">Tên khuyến mãi</th>
                                <th>Mô tả</th>
                                <th>Phằn trăm khuyến mãi</th>
                                <th>Thao tác</th>
                            </td>
                            </tr>                    
                    </thead>
                    <tbody> 
                    <?php
                            $sql="SELECT * FROM tbl_promotion";
                            $ketQuaTruyVan = $conn->query($sql);
                            if($ketQuaTruyVan -> num_rows>0)
                            {
                                while($maKM = $ketQuaTruyVan -> fetch_assoc())
                                {
                        ?>
                            <tr>
                                <td>
                                   <a href="./voucher_detail.php?promotion_id=<?php echo $maKM['promotion_id'];?>"> <?php echo $maKM['promotion_id'];?></a>
                                </td>
                                <td>
                                    <?php echo $maKM['promotion_name'];?>
                                </td>
                                <td>
                                    <?php echo $maKM['promotion_percent'];?>
                                </td>
                                <td>
                                    <?php echo $maKM['promotion_content'];?>
                                </td>
                                <td>
                                    <form action="update_voucher.php" method="POST" id="btn-form_update" >
                                        <button type="submit" class="btn btn-info" name="btn-promotion_id" id="btn-update_items" value="<?=$maKM['promotion_id']?>">Sửa</button>  
                                    </form> 
                                </td>
                                <td>    
                                <a class="btn btn-danger" href="./voucher_thuc_hien_xoa.php?voucher_id=<?=$maKM['promotion_id']?>">Xóa</a>
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
                <form action="add_voucher.php" method="post">
                    <div class="modal-header">
                        <h2>Thêm Mã khuyến mãi</h2>
                        <span class="close">&times;</span>
                    </div>
                    <div class="modal-body">
                         <div class="form-group">
                            <label>Tên khuyến mãi</label>
                            <br>
                            <input type="text" name="promotion_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for=""> Chiết khấu</label>
                            <input type="text" name="promotion_percent" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for=""> Mô tả</label>
                            <input type="text" name="promotion_content" class="form-control">
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
require_once("footer_admin.php");
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