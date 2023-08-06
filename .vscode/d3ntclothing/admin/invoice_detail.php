
<?php
require_once("header_admin.php");
$invoice_id = $_POST['invoice_id'];

?>
<!-- nội dung -->
<div class="col-lg-9">
    <!--div Thêm tên -->
    <div class="title_item">CHI TIẾT ĐƠN HÀNG</div>
    <div class="scroll">



<table class="table table-striped table-bordered">
    <thead>            
            <tr>
                <th>ID</th>
                <th width="15%">Tên sản phẩm</th>
                <th >Hình minh họa</th>
                <th>Kích thước</th>
                <th>Màu sắc</th>
                <th>Số lượng</th>
                <th>Giá</th>
            </tr>
    </thead>
    <tbody>
    <?php
                            $sql="SELECT  `invoice_id`, tbl_invoice_detail.product_id, `unit_price`, `quantity`, tbl_product.product_img, tbl_size.size_name,tbl_color.color_img
                            FROM tbl_invoice_detail, tbl_product, tbl_color, tbl_size
                            WHERE invoice_id= '".$invoice_id."' and tbl_invoice_detail.product_id = tbl_product.product_id
                            and tbl_product.color_id = tbl_color.color_id and tbl_product.size_id = tbl_size.size_id";
                            $ketQuaTruyVan = $conn->query($sql);
                            if($ketQuaTruyVan -> num_rows>0)
                            {
                                while($donHang = $ketQuaTruyVan -> fetch_assoc())
                                {
                        ?>
                            <tr>
                                <td>    
                                    <?php echo $donHang['invoice_id'];?>
                                </td>
                                <td>
                                    <?php echo $donHang['product_id'];?>
                                </td>
                                <td>
                                    <img width="50px" height="50px" src="../image-product/<?php echo $donHang['product_img'];?>" alt="">
                                </td>
                                <td>
                                <?php echo $donHang['size_name'];?>
                                </td>
                                <td>
                                <img width="20px" height="50px" src="<?php echo $donHang['color_img'];?>" alt="">
                                </td>
                                <td>
                                    <?php echo $donHang['unit_price'];?>
                                </td>
                                <td>
                                    <?php echo $donHang['quantity'];?>
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
<?php
require_once("footer_admin.php")
?>