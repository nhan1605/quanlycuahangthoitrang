<?php
require_once("header_admin.php");
$promotion_id=$_GET['promotion_id'];
?>
<!-- nội dung -->
<div class="col-lg-9">
    <!--div Thêm tên -->
    <div class="title_item">KhUYẾN MÃI</div>
    <div class="scroll">
<!-- <div class="admin_item-content" style=" height:1000px; width:100%; "> -->
        <div class="container" style="margin-top:10px;">
            <button class="btn btn-success" id="btn-add" style="margin-bottom:10px;">Áp dụng thêm cho sản phẩm</button>
                <table class="table table-striped table-bordered">
                    <thead>            
                            <tr>
                                <th>ID</th>
                                <th width="15%">Mã khuyến mãi</th>
                                <th width="15%">Chiết khấu</th>
                                <th>Mô tả</th>
                                <th>Sản phẩm đã sử dụng</th> 
                                <th>Xóa</th>
                            </td>
                            </tr>                    
                    </thead> 
                    <tbody>
                    <?php
                            $sql="SELECT * 
                            FROM tbl_promotion JOIN tbl_product
                            ON tbl_promotion.promotion_id = tbl_product.promotion_id";
                            $ketQuaTruyVan = $conn->query($sql);
                            if($ketQuaTruyVan -> num_rows>0)
                            {
                                while($maKM = $ketQuaTruyVan -> fetch_assoc())
                                {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $maKM['promotion_id'];?>
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
                                    <?php echo $maKM['product_name'];?>
                                </td>
                                <td>    
                                <a class="btn btn-danger" href="./unapply_voucher.php?product_id=<?php echo $maKM['product_id'];?>">Xóa</a>
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
        <div id="myModal" class="modal" >
            <!-- Nội dung form thêm -->
            <div class="modal-content">
                <form action="apply_voucher.php" method="post">
                    <div class="modal-header">
                        <h2>Áp dụng thêm mã khuyến mãi cho sản phẩm</h2>
                        <span class="close">&times;</span>
                    </div>
                    <div class="modal-body">
                         <div class="form-group">
                         <input type="text" value="<?=$promotion_id?>" name="promotion_id">
                            <?php 
                            $sql = "SELECT product_id, product_name FROM tbl_product
                            where promotion_id is null";
                            $ketQuaTruyVan = mysqli_query($conn,$sql);
                            if($ketQuaTruyVan->num_rows >0)
                            {
                                while($sanpham = $ketQuaTruyVan->fetch_assoc())
                                {
                                ?>
                                <div>
                                    <input type="checkbox" id="<?php echo $sanpham['product_id'];?>" value="<?php echo $sanpham['product_id'];?>" name="apply[]">
                                    <label for="<?php echo $sanpham['product_id'];?>"><?php echo $sanpham['product_name'];?></label>
                                </div>
                                <?php
                                }
                            }
                            ?>
                        
                    </div>
                   <div class="modal-footer">
                   <button type="button" id="btn-close" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                   <button type="submit" name="registerbtn" class="btn btn-primary">Thêm</button>
                   </div>
                </form>
            </div>
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