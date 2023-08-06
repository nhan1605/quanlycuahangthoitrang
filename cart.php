<?php
require_once('./layout/header.php');

?>

<main class="main-content site-wrapper-reveal">
    <!--== Start Page Title Area ==-->
    <section class="page-title-area" data-bg-img="image_banner/product.jpg">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-title-content text-center">
              <h2 class="title text-white">YOUR SHOPPING CART</h2>
              <div class="bread-crumbs"><a href="index.html">Home<span class="breadcrumb-sep">/</span></a><span class="active">Your Shopping Cart</span></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Page Title Area ==-->

    <!--== Start Cart Area Wrapper ==-->
    <section class="cart-page-area">
      <div class="container pt-100 pb-100">
        <div class="row">
          <div class="col-12">
            <div class="cart-table table-responsive">
              <table>
                <thead>
                  <tr>
                    <th class="pro-thumbnail">Ảnh</th>
                    <th class="pro-title">Tên sản phẩm</th>
                    <th class="pro-price">Giá</th>
                    <th class="pro-quantity">Số lượng</th>
                    <th class="pro-subtotal">Tổng</th>
                    <th class="pro-remove">Xóa bỏ</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                if(isset($_SESSION['login_user']) && $_SESSION['login_user'] == 1){
                  if($_SESSION['gio_hang']['tong_so']==0){
                    ?>
                    <tr>
                        <td colspan="6" style="padding: 20px;">Bạn chưa mua sản phẩm nào</td>
                      </tr>
                </tbody>
                    <?php
                  }else{
                    $tong_tien =0;
                    foreach($_SESSION['all_gio_hang'] as $item){
                      $thanh_tien = $item[6]*$item[2];
                      $tong_tien= $tong_tien + $thanh_tien;
                      ?>
                      <!-- sản phẩm -->
                      <tr>
                        
                    <td class="pro-thumbnail">
                      <a href="#"><img src="./image-product/<?=$item[1]?>" alt="Alan-Shop"></a>
                    </td>
                    <td class="pro-title">
                      <h4><a href="#/" class="product_name"><?=$item[3]?></a></h4>
                      <span><?=$item[5]?> / <?=$item[4]?></span>
                    </td>
                    <td class="pro-price "><span class="price"><?=$item[6]?>VNĐ</span></td>
                    <td class="pro-quantity">
                      <div class="quick-product-action">
                        <!-- <div class="change-quantity"> -->
                        <div class="proqty">
                        <input type="text" readonly name="quantity"  style="width: 100%; height:100%; border:none;text-align:center;"  class="quantity" id="quantity" title="Quantity" value="<?=$item[2]?>" />
                        </div>
                      </div>
                    </td>
                    <td class="pro-subtotal"><span class=" total-price"><?=$thanh_tien?>VNĐ</span></td>
                    <td class="pro-remove"><a href="./cart-delete_item.php?product_id=<?=$item[0]?>">×</a></td>
                  </tr>
                  <!-- end -->
                      <?php
                    }
                    $_SESSION['gio_hang']['tong_tien']= $tong_tien;
                    ?>
                    </tbody>
                    <footer>
                  <tr>
                    <td colspan="4"></td>
                    <td>Tổng tiền</td>
                    <td><span class="total"> <?=$tong_tien?>VNĐ</span></td>
                  </tr>
                  <tr>
                    <td colspan="4"></td>
                    <td colspan="2">
                        <a  class=" btn-theme" href="./van_chuyen_thanh_toan.php" >Thanh toán</a>
                  </td>
                  </tr>
                </footer>
                    <?php
                  }
                }
                ?>   

               
              </table>
            </div>
          </div>
          <div class="col-12">
            <div class="cart-buttons">
              <?php
                if(isset($_SESSION['login_user']) && $_SESSION['login_user'] == 1){
                  if($_SESSION['gio_hang']['tong_so']==0){
                    ?>
                <a class="btn-shopping continue-shopping" onclick="window.location = './index.php'">Mua hàng</a>
              <?php
                  }else{
                    ?>
                    <a class="btn-shopping continue-shopping" onclick="redirect()">Tiếp tục mua hàng</a>
              <a class="btn-shopping" href="./cart-delete_all.php">Xóa hết</a>
                    <?php
                  }
                
                }
              ?>
            </div>
          </div>

        </div>
      </div>
    </section>
    <!--== End Cart Area Wrapper ==-->
  </main>
<?php
require_once('./layout/footer.php');
?>
<script>
  function redirect(){
    history.back();
  }

//   $('.quantity').each(function(index, item){
//     $(item).on("input", function() {
// var $quantity = $(this).val();
// var $parent = $(this).parents("tr");
// var $price = $parent.find(".price").text();
// var $total_price = $parent.find(".total-price");
// $total_price.text(($quantity * $price).toFixed(2));
// });
//     });

//     var total = document.querySelector('.total')
//     var total1 = document.querySelector('.total1')
//     var quantity = document.querySelectorAll('.quantity')
    

//     quantity.forEach(e=>{
//       e.onchange = function(){
//         var i = 0;
//         quantity.forEach(e=>{
//           if(e.classList.contains('active')){
//             e.classList.remove('active');
//           }
//         })
        
//         var a = e.parentElement.parentElement.parentElement.parentElement;
//         var b = a.querySelector('.total-price');
//         var product_name = a.querySelector('.product_name');
//         var price = a.querySelector('.price');

//         console.log(price.innerText)
//         console.log(e.value)

//         i = i  + Number(price.innerText)*e.value; 
        
//         e.classList.add('active')
//         quantity.forEach(e=>{
//           if(!e.classList.contains('active')){
//             var totalPrice = e.parentElement.parentElement.parentElement.parentElement.querySelector('.total-price');
//             i= i  + Number(totalPrice.innerText);
//           }
//         })
//         total.innerHTML= i.toFixed(2)
//         total1.value = i.toFixed(2)
//       }
//     })

</script>