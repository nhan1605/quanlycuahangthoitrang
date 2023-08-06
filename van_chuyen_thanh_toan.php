<?php
require_once("./layout/header.php");
if(isset($_SESSION['login_user']) && $_SESSION['login_user'] == 1){
?>
<style>
  .w-16, .w-20, .w-25, .w-30, .w-33, .w-40, .w-50, .w-60, .w-70, .w-75, .w-80, .w-100 {
    float: left;
}
.w-100 {
    width: 100%;
} 

  .radio-wrapper
  {
    
    margin: 5px; 
  }
  #money{
    font-size: 15px;
  }
  #paymentMethod
  {
    font-size: 15px;
  } 
  
  </style>
<main class="main-content">
    <!--== Start Product Area Wrapper ==-->
    <form action="mua_hang_thanh_cong.php" method="post" enctype="application/x-www-form-urlencoded">
      <div class="container">
        <div class="product-information">
        <div class="edit-checkout-head">
                <div class="breadcrumb-area">
                  <ul>
                    <li><a href="shop_cart.php">Giỏ hàng</a><i class="fa fa-angle-right"></i></li>
                    <li class="active"><strong style="color: #f4a460;"> Thông tin</strong><i class="fa fa-angle-right"></i></li>
                    <li>Hoàn thành</li>
                  </ul>
                </div>
              </div>
          <div class="row">
            <div class="col-lg-4">
              <div class="edit-checkout-information">
                <div class="edit-checkout-form">
                  <h3 class="title">Thông tin nhận hàng</h3>
                  <?php
                    $sql = "SELECT `user_id`, `user_name`, `password`, `specific_location`, `email`, `phone`, `birthday`, `city`, `district`, `ward` 
                    FROM `tbl_user` WHERE user_id = '".$_SESSION['user_id']."'";
                    $ketQuaTruyVan = $conn->query($sql);
                    if($ketQuaTruyVan->num_rows>0){
                      $user = $ketQuaTruyVan->fetch_assoc();
                      ?>
                      
                     
                  <div class="row row-gutter-12">
                    <div class="col-lg-12">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInputGrid" placeholder="name" value="<?=$user['user_name']?>">
                        <label for="floatingInputGrid">Tên </label>
                      </div>
                    </div>
                   <div class="col-lg-12">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInputGrid" placeholder="name" value="<?=$user['phone']?>">
                        <label for="floatingInputGrid">Số điện thoại </label>
                      </div>
                    </div>
                          <!-- Tỉnh -->
                          <div class="col-lg-12">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInputGrid" placeholder="name" value="<?=$user['city']?>">
                        <label for="floatingInputGrid">Tỉnh </label>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInputGrid" placeholder="name" value="<?=$user['district']?>">
                        <label for="floatingInputGrid">Huyện </label>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInputGrid" placeholder="name" value="<?=$user['ward']?>">
                        <label for="floatingInputGrid">Xã </label>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInputGrid" placeholder="name" value="<?=$user['specific_location']?>">
                        <label for="floatingInputGrid">Địa chỉ </label>
                      </div>
                      </div>
                      <?php
                    }
                  ?>
                    <div class="col-12">
                      <div class="btn-box">
                        <a class="btn-return" href="./cart.php"><svg focusable="false" aria-hidden="true" class="icon-svg icon-svg--color-accent icon-svg--size-10 previous-link__icon" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 10"><path d="M8 1L7 0 3 4 2 5l1 1 4 4 1-1-4-4"></path></svg>Return to cart</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
          
            <div class="edit-checkout-form">
              <h4 class="title">Vận chuyển</h4>
                <div class="row row-gutter-12">
                      <div>
                      <p>Phương thức giao hàng</p>
                      <div class="content-box" >											
                        <div class="content-box__row">
                          <div class="radio-wrapper">
                            <div class="radio__input" style="padding: 8px; border:1px solid #dee2e6">
                              <input type="radio" class="input-radios" value="Giao hàng nhanh"  name="shippingMethod" required > 
                              <input class= "money" value="30000" name = "money" type = "hidden" >
                              <label for="paymentMethod-558897" class="radio__label">
														<span class="radio__label__primary" style="padding-left: 10px;">Giao hàng nhanh</span>
														<span class="radio__label__accessory">
															<span class="radio__label__icon">
																<i class="payment-icon payment-icon--16"></i>
															</span>
														</span>
													</label>
                            </div>                         
                          </div>
                          <div class="radio-wrapper">
                            <div class="radio__input"  style="padding: 8px; border:1px solid #dee2e6">
                              <input type="radio" class="input-radios"  value="Giao hàng tiết kiệm" name="shippingMethod" required > 
                              <input class= "money" value="30000" name = "money" type = "hidden">
                              <label for="paymentMethod-558897" class="radio__label">
														<span class="radio__label__primary" style="padding-left: 10px;">Giao hàng tiết kiệm</span>
														<span class="radio__label__accessory">
															<span class="radio__label__icon">
																<i class="payment-icon payment-icon--16"></i>
															</span>
														</span>
													</label>
                            </div>                         
                          </div>
                          <div class="radio-wrapper">
                            <div class="radio__input"  style="padding: 8px; border:1px solid #dee2e6">
                              <input type="radio" class="input-radios" name="shippingMethod" value="Giao hàng hỏa tốc" required> 
                              <input class= "money" value="30000" name = "money" type = "hidden">
                              <label for="paymentMethod-558897" class="radio__label">
														<span class="radio__label__primary" style="padding-left: 10px;">Giao hàng hỏa tốc</span>
														<span class="radio__label__accessory">
															<span class="radio__label__icon">
																<i class="payment-icon payment-icon--16"></i>
															</span>
														</span>
													</label>
                            </div>                         
                          </div>
                        </div>										
                      </div>
<br>
                    <div class="col-lg-12">
                      <div class="form-floating"> 
                        <p>Phương thức thanh toán</p>
                        <div class="radio-wrapper">
													<div class="radio__input"  style="padding: 8px; border:1px solid #dee2e6">
														<input name="paymentMethod" id="paymentMethod-558897" type="radio" class="input-radio" value="1" data-bind="paymentMethod" required>
                            
                            <label for="paymentMethod-558897" class="radio__label">
														<span class="radio__label__primary" style="padding-left: 10px;">Thanh toán qua Momo ATM</span>
														<!-- Chèn logo của phương thức thanh toán -->
                            <!-- <span class="radio__label__accessory">
															<span class="radio__label__icon">
																<i class="payment-icon payment-icon--16"></i>
															</span>
														</span> -->
													</label>
                          </div>
												</div>	
                        <div class="radio-wrapper">
													<div class="radio__input"  style="padding: 8px; border:1px solid #dee2e6">
														<input name="paymentMethod" id="paymentMethod-558897" type="radio" class="input-radio" value="2" data-bind="paymentMethod" required>
                            <label for="paymentMethod-558897" class="radio__label">
														<span class="radio__label__primary" style="padding-left: 10px;">Thanh toán qua Momo QR</span>
														
													</label>
                          </div>
												</div>
                        <div class="radio-wrapper" >
													<div class="radio__input"  style="padding: 8px; border:1px solid #dee2e6">
														<input name="paymentMethod" id="paymentMethod-558897" type="radio" class="input-radio" value="3" data-bind="paymentMethod" required>
                            <label for="paymentMethod-558897" class="radio__label">
														<span class="radio__label__primary" style="padding-left: 10px;">Thanh toán khi nhận hàng</span>
														
													</label>
                          </div>
												</div>
                   </div>
                   </div>
                   <div class="col-12">     
                   </div>
                  </div>
                  </div>
                </div>
              
            </div>

<!-- Tạo div thanh toán -->

            <div class="col-lg-4">
            <h4 class="title">Đơn hàng</h4>
              <div class="shipping-cart-subtotal-wrapper">
                <div class="shipping-cart-subtotal" style="width: 100%;">
                    <div class="scroll" style="height:400px; overflow:scroll; padding-top:10px; padding-right:20px">
                    <?php
                // 3 là số lượng t chọn, lấy số lượng chính xác từ giỏ hàng
                    foreach($_SESSION['all_gio_hang'] as $item){
                      $thanh_tien = $item[6]*$item[2];
                      $tong_tien= $tong_tien + $thanh_tien;
                    ?>
                    <div class="shipping-cart-item">
                    <div class="thumb">
                      <img src="./image-product/<?=$item[1]?>" alt="d3ntclothing">
                      <span class="quantity"><?=$item[2]?></span>
                    </div>
                    <div class="content">
                      <h4 class="title"><?=$item[3]?></h4>
                      <span class="info"><?=$item[5]?> / <?=$item[4]?> </span>
                      <span class="price"><?=$item[6]?>VNĐ</span>
                    </div>
                  </div>
                    <?php
                    }
                  ?>    
                    </div>
                 
                  <div class="shipping-subtotal">
                    <p><span>Tổng phụ</span><span><?=$_SESSION['gio_hang']['tong_tien']?>VNĐ<span></p>
                    <p>
                      <span>Phương thức vận chuyển</span>
                      <br>
                      <br>
                      <p>
                        <span>
                          <input type = "text" id = "paymentMethod" style="border: none; text-align: left" size="20" readonly>
                        </span>
                        <span>
                          <input type = "text" name="moneyMethod" id = "Money" style="border: none; text-align: right" size="6" readonly>
                        </span>
                      </p>
                    </p>
                  </div>
                  <div class="shipping-total" style="text-align: center;">
                    <p class="total" >Tất cả</p>
                    <p class="price"><strong class="usd"></strong>VNĐ</p>
                  </div>
                  <div class="col-12">
                      <div class="btn-box" style="text-align: center; margin-top:20px">   
                        <input  type ="submit" name="dat_hang" class="btn-shipping normal d-block" style="border:none; padding:10px; display:none" value="Đặt hàng">
                        <input type ="submit" name="dat_hang-momo" class="btn-shipping momo " style="border:none; padding:10px; display:none" value="Đặt hàng momo">
                        <input type ="submit" name="dat_hang-momo-atm" class="btn-shipping momo-atm " style="border:none; padding:10px; display:none" value="Đặt hàng momo ATm">
                  </div>
                </div>
                </div>       
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!--== End Product Area Wrapper ==-->

  </main>
  <script>  
        // function myCourseFunction(paymentMethod)
        // {  
        //     document.getElementById("paymentMethod").value = paymentMethod;     
        // }  

        var paymentText = document.querySelector('#paymentMethod')
        var paymentMoney = document.querySelector('#Money')
        var inputRadio = document.querySelectorAll('.input-radios');
        var thanhtoan = document.querySelectorAll('.input-radio');
          var normal = document.querySelector('.normal');
          var momo = document.querySelector('.momo');
          var momoAtm = document.querySelector('.momo-atm');
          var usd = document.querySelector('.usd');
        inputRadio.forEach(e => 
        {
          e.onclick = function(){
            var a = e.parentElement.querySelector('.money');
            paymentText.value =e.value;
            paymentMoney.value =  a.value;
            usd.innerHTML = '<?=$_SESSION['gio_hang']['tong_tien'] + 30000?>'
            
          }
        });
        thanhtoan.forEach(e=>{
          e.onclick = function(){
            if(e.value==2){
                normal.classList.remove('d-block');
                momo.classList.add('d-block');
                momoAtm.classList.remove('d-block');
            }
            if(e.value==3){

                normal.classList.add('d-block');
                momo.classList.remove('d-block');
                momoAtm.classList.remove('d-block');
            }
            if(e.value==1){
              
                normal.classList.remove('d-block');
                momo.classList.remove('d-block');
                momoAtm.classList.add('d-block');
            }
            
          }
        })

    </script>  
<?php
}
require_once("./layout/footer.php");
?>