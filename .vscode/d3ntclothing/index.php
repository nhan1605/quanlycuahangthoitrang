<?php
require_once('./layout/header.php');
?>

<main class="main-content">
    <!--== Start Hero Area Wrapper ==-->
    <section class="home-slider-area slider-default">
      <div class="home-slider-content">
        <div class="swiper-container home-slider-container">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <!-- Start Slide Item -->
              <div class="home-slider-item bg-img-cover" data-bg-img="image_banner/banner1.jpg">
                <div class="slider-content-area">
                  <div class="container">
                    <div class="row">
                      <div class="col-12">
                        <div class="content m-auto">
                          <div class="inner-content">
                            <div class="tittle-wrp">
                              <h2>Các sản phẩm mới nhất</h2>
                            </div>
                            <div class="btn-wrp">
                              <a href="shop.html" class="btn-link">Shop Now</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Slide Item -->
            </div>
            <div class="swiper-slide">
              <!-- Start Slide Item -->
              <div class="home-slider-item bg-img-cover" data-bg-img="image_banner/banner2.jpg">
                <div class="slider-content-area">
                  <div class="container">
                    <div class="row">
                      <div class="col-12">
                        <div class="content m-auto">
                          <div class="inner-content">
                            <div class="tittle-wrp">
                              <h2>Các sản phẩm nổi bật</h2>
                            </div>
                            <div class="btn-wrp">
                              <a href="shop.html" class="btn-link">Shop Now</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Slide Item -->
            </div>
            <div class="swiper-slide">
              <!-- Start Slide Item -->
              <div class="home-slider-item bg-img-cover" data-bg-img="image_banner/banner3_.jpg">
                <div class="slider-content-area">
                  <div class="container">
                    <div class="row">
                      <div class="col-12">
                        <div class="content m-auto">
                          <div class="inner-content">
                            <div class="tittle-wrp">
                              <h2>Các sản phẩm khuyến mãi</h2>
                            </div>
                            <div class="btn-wrp">
                              <a href="shop.html" class="btn-link">Shop Now</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Slide Item -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Hero Area Wrapper ==-->

    <!--== Start Product Area Wrapper ==-->
    <section class="product-area latest-product-area" data-aos="fade-up" data-aos-duration="1000">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-lg-6 m-auto">
            <div class="section-title text-center">
              <h2 class="title"> <b>Sản phẩm mới nhất</b> </h2>
              <p>Bộ sưu tập mới nhất năm 2023</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="swiper-container product4-slider-container">
              <div class="swiper-wrapper">
                <?php
            $sql = "SELECT `product_id`, `product_name`, `brand_id`, `category_id`, `unit_price`, `unit_in_stock`, `unit_in_order`, `product_img`, `product_description`, `color_id`, `size_id`, `release_date`,`promotion_id` FROM `tbl_product` 
            WHERE 1  order by release_date DESC LIMIT 5 ;";
              $ketQuaTruyVan = $conn->query($sql);
            if($ketQuaTruyVan->num_rows>0){
              while($product = $ketQuaTruyVan->fetch_assoc()){
                  ?>
                  <div class="swiper-slide">
                  <!-- Start Product Item -->
                  <div class="product-item">
                    <div class="product-thumb">
                      <a href="product_detail.php?product_id=<?=$product['product_id']?>">
                        <img class="product_img" style="width:3000px; height:300px;" src="./image-product/<?=$product['product_img']?>" alt="d3ntclothing">
                        <?php
                        if($product['unit_in_stock']==0){
                          ?>
                          <div class="ribbons">
                          <span class="ribbon-soldout">Hết hàng</span>
                        </div>
                          <?php
            
                        }
                           if($product['promotion_id']!= null){
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
                      <div class="product-action" style="display:flex; flex-direction:row;">
                      <!-- yÊU THÍCH -->
                      <?php
                      if(isset($_SESSION['login_user']) && $_SESSION['login_user'] == 1){

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
                    }}else{
                      ?>
                      <a type="submit" class="action-wishlist" href="./product_wishlist_add.php?product_id=<?=$product['product_id']?>" title="Wishlist">
                          <i class="fa fa-heart" aria-hidden="true"></i>
                        </a>
                      <?php
                    }
                    ?>
                        <!-- END -->
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
                  }
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Product Area Wrapper ==-->

    <!--== Start Offer Area Wrapper ==-->
    <section class="offer-area" data-aos="fade-up" data-aos-duration="1000">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <div class="single-offer">
              <div class="thumb">
                <a href="product_detail.php?product_id=<?=$product['product_id']?>">
                  <img src="image_banner/sale30.jpg" alt="d3ntclothing">
                </a>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="single-offer">
              <div class="thumb">
                <a href="product_detail.php?product_id=<?=$product['product_id']?>">
                  <img src="image_banner/sale50.jpg" alt="d3ntclothing">
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Offer Area Wrapper ==-->

    <!--== Start Featured Product Area Wrapper ==-->
    <section class="product-area featured-product-area" data-aos="fade-up" data-aos-duration="1000">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-lg-6 m-auto">
            <div class="section-title text-center">
              <h2 class="title">Sản phẩm nổi bật</h2>
              <p>Các sản phẩm bán chạy nhất của chúng tôi</p>
            </div>
          </div>
        </div>
        <div class="row">
            <?php
            $sql1 = "SELECT `product_id`, `product_name`, `brand_id`, `category_id`, `unit_price`, `unit_in_stock`, `unit_in_order`, `product_img`, `product_description`, `color_id`, `size_id`, `release_date`,`promotion_id` FROM `tbl_product` 
            WHERE 1 order by unit_in_order DESC LIMIT 8 ;";
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
                    if(isset($_SESSION['login_user']) && $_SESSION['login_user'] == 1){
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
                    }}else{
                      ?>
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
                  <span class="price">$<?=$product['unit_price']-$product['unit_price']*$promotion['promotion_percent']/100?></span>
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
    <!--== End Featured Product Area Wrapper ==-->

    <!--== Start Newsletter Area Wrapper ==-->
    <section class="newsletter-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-6 m-auto" data-aos="fade-up" data-aos-duration="1000">
            <div class="section-title text-center">
              <h2 class="title">Nhận thông tin khuyến mãi </h2>
              <p>Bạn sẽ không bỏ lỡ những khuyến mãi khi tham gia cùng chúng tôi</p>
            </div>
            <form class="input-btn-group">
              <input class="form-control" type="text" placeholder="Nhập E-mail của bạn">
              <button class="btn btn-theme btn-black" type="button">Gửi!</button>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!--== End Newsletter Area Wrapper ==-->

    <!--== Start Blog Area Wrapper ==-->
    <section class="blog-area blog-default-area">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-lg-6 m-auto" data-aos="fade-up" data-aos-duration="1000">
            <div class="section-title text-center">
              <h2 class="title">Tin tức mới nhất</h2>
              <p>Theo dõi tin tức của chúng tôi để cập nhật thông tin mới nhất</p>
            </div>
          </div>
        </div>
        <div class="row" data-aos="fade-up" data-aos-duration="1000">
          <?php
          $sql = "SELECT *, tbl_admin.name FROM `tbl_blog`,tbl_admin WHERE tbl_blog.admin_id = tbl_admin.admin_id limit 2";
          $ketQuaTruyVan = $conn->query($sql);
          if($ketQuaTruyVan->num_rows>0){
            while($blog= $ketQuaTruyVan->fetch_assoc()){
              ?>
          <div class="col-md-6">
            <!--== Start Blog Post Item ==-->
            <div class="post-item mb-sm-30">
              <div class="thumb">
                <a href="./blog_details.php?blog-id=<?=$blog['blog_id']?>"><img src="<?=$blog['blog_img']?>" alt="Alan-Blog"></a>
              </div>
              <div class="content">
                <div class="inner-content">
                  <h4 class="title">
                    <a href="./blog_details.php?blog-id=<?=$blog['blog_id']?>"><?=$blog['blog_name']?></a>
                  </h4>
                  <div class="meta">
                    <a class="post-date" href="./blog_details.php?blog-id=<?=$blog['blog_id']?>"><?=$blog['date_post']?></a>
                    <span>/</span>
                    <a class="post-author" href="./blog_details.php?blog-id=<?=$blog['blog_id']?>"><?=$blog['name']?></a>
                  </div>
                  <p><?=substr($blog['blog_content'],0,60)?>...
                  <a class="btn-blog" href="./blog_details.php?blog-id=<?=$blog['blog_id']?>">Thêm</a></p>
                </div>
              </div>
            </div>
            <!--== End Blog Post Item ==-->
          </div>
              <?php
            }
          }
          ?>
        </div>
      </div>
    </section>
    <!--== End Blog Area Wrapper ==-->
  </main>

<?php
require_once('./layout/footer.php');
?>