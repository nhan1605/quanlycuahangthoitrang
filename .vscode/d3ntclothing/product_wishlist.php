<?php
require_once("./layout/header.php");
?>
<main class="main-content site-wrapper-reveal">
    <!--== Start Page Title Area ==-->
    <section class="page-title-area" data-bg-img="./image_banner/wishlist.png">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-title-content text-center">
              <h2 class="title text-white">Danh sách yêu thích</h2>
              <div class="bread-crumbs"><a href="index.php">Trang chủ<span class="breadcrumb-sep">/</span></a><span class="active">Danh sách yêu thích</span></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Page Title Area ==-->

    <!--== Start Product Area Wrapper ==-->
    <section class="product-area wishlist-area">
      <div class="container">
        <div class="row">
           
        <?php
            $sql1 = "SELECT * FROM `tbl_product` ,tbl_user, tbl_wishlist 
            WHERE tbl_product.product_id = tbl_wishlist.product_id and  tbl_wishlist.user_id = tbl_user.user_id  ";
            $ketQuaTruyVan = $conn->query($sql1);
            if($ketQuaTruyVan->num_rows>0){
              while($product = $ketQuaTruyVan->fetch_assoc()){
                // Hết hàng
                  ?>
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
            <!-- Start Product Item -->
            <div class="product-item">
              <div class="product-thumb">
                <a href="product_detail.php?product_id=<?=$product['product_id']?>">
                  <img class="product_img" src="./image-product/<?=$product['product_img']?>" alt="d3ntclothing">
                  <?php
                        if($product['unit_in_stock']==0){
                          ?>
                          <div class="ribbons">
                          <span class="ribbon-soldout">Hết hàng</span>
                        </div>
                          <?php
                        }

                          if($product['promotion_id']!=null){
                            ?>
                            <div class="ribbons">
                            <span class="ribbon ribbon-hot">Giảm giá</span>
                          <?php
                          $sql1 ="SELECT promotion_percent FROM `tbl_product`,tbl_promotion 
                          WHERE tbl_product.promotion_id = tbl_promotion.promotion_id 
                          and tbl_product.product_id='".$product['product_id']."' and tbl_product.promotion_id='".$product['promotion_id']."'";
                          $ketQuaTruyVan1= $conn->query($sql1);
                          if($ketQuaTruyVan1->num_rows>0){
                            $promotion = $ketQuaTruyVan1->fetch_assoc()
                          ?>
                          <span class="ribbon ribbon-onsale align-right">-<?=$promotion['promotion_percent']?>%</span>
                          <?php
                        }
                          ?>
                           
                        </div>
                        <?php

                          }
                        ?>
                </a>
                    <div class="product-action"  style="display:flex; flex-direction:row;">
                    <?php
                    $sql5 = "SELECT * FROM `tbl_wishlist` WHERE user_id= '".$_SESSION['user_id']."' and product_id = '".$product['product_id']."'";
                    $ketQuaTruyVan5 = $conn->query($sql5);
                    if($ketQuaTruyVan5->num_rows>0){
                      ?>
                    <!-- xoa khoi yeu thich -->
                      <a type="submit" class="action-wishlist" href="./product_wishlist_remove.php?product_id=<?=$product['product_id']?>"  title="Wishlist">
                        <i class="fa fa-heart heart-on"  aria-hidden="true"></i>
                      </a>
                      <?php
                    }else{
                      ?>  
                <!-- them vao yeu thich -->
                      <a type="submit" class="action-wishlist" href="./product_wishlist_add.php?product_id=<?=$product['product_id']?>" title="Wishlist">
                          <i class="fa fa-heart" aria-hidden="true"></i>
                        </a>
                      <?php
                    }
                    ?>
                   
                      <?php
                        // Không cho thêm vào giỏ hàng
                        if($product['unit_in_stock']==0){
                          ?>
                          <a class="action-cart" href="#/">
                            <i class="fa fa-opencart"></i>
                          </a>
                          <?php
                          }else{
                            // Cho thêm vào giỏ
                            ?>
                          <a class="action-cart" href="./cart_add.php?id=<?=$product['product_id']?>&q=1">
                            <i class="fa fa-opencart"></i>
                            <?php
                          }
                          ?>
                </div>
              </form>
              </div>
              <div class="product-info">
                <h4 class="title"><a href="product_detail.php?product_id=<?=$product['product_id']?>"><?=$product['product_name']?></a></h4>
                <div class="prices">
                  
                  <?php
                         if($product['promotion_id']!= null){
                          $sql2 ="SELECT promotion_percent FROM `tbl_product`,tbl_promotion 
                          WHERE tbl_product.promotion_id = tbl_promotion.promotion_id 
                          and tbl_product.product_id='".$product['product_id']."' and tbl_product.promotion_id='".$product['promotion_id']."'";
                          $ketQuaTruyVan2= $conn->query($sql2);
                          if($ketQuaTruyVan2->num_rows>0){
                            $promotion2 = $ketQuaTruyVan2->fetch_assoc()
                          ?>
                        <span class="price">$<?=$product['unit_price']-$product['unit_price']*$promotion2['promotion_percent']/100?></span>
                        <del class="price-old">$<?=$product['unit_price']?></del>
                        <?php
                          }
                        }else{
                          ?>
                          <span class="price">$<?=$product['unit_price']?></span>
                          <?php
                        }
                        ?>
                </div>
              </div>
            </div>
            <!-- End Product Item -->
          </div>
                  <?php
                }}
                    ?>
        </div>
      </div>
    </section>
    <!--== End Product Area Wrapper ==-->
  </main>
<?php
require_once("./layout/footer.php");
?>