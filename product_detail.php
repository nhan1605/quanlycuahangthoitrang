<?php
require_once("./layout/header.php");
$product_id = $_GET['product_id'];
?>
 <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
    <style>
        div.stars {
  width: 270px;
  display: inline-block;
}
 
input.star { display: none; }
 
label.star {
  float: right;
  padding: 10px;
  font-size: 36px;
  color: #444;
  transition: all .2s;
}
 
input.star:checked ~ label.star:before {
  content: '\f005';
  color: #FD4;
  transition: all .25s;
}
 
input.star-5:checked ~ label.star:before {
  color: #FE7;
  text-shadow: 0 0 20px #952;
}
 
input.star-1:checked ~ label.star:before { color: #F62; }
 
label.star:hover { transform: rotate(-15deg) scale(1.3); }
 
label.star:before {
  content: '\f006';
  font-family: FontAwesome;
}
    </style>
<main class="main-content site-wrapper-reveal">
    <!--== Start Page Title Area ==-->
    <section class="page-title-area" data-bg-img="image_banner/product.jpg">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-title-content text-center">
              <h2 class="title text-white">Chi tiết sản phẩm</h2>
              <div class="bread-crumbs"><a href="index.php">Trang chủ<span class="breadcrumb-sep">/</span></a><span class="active">Sản phẩm<span class="breadcrumb-sep">/</span></a><span class="active">Chi tiết </span> </span></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Page Title Area ==-->

    <!--== Start Shop Area ==-->
    <section class="product-area shop-single-product">
      <div class="container">
        <div class="row">
        <?php
                    $sql = "SELECT product_description, tbl_product.product_id,tbl_product.product_name,tbl_product.unit_price,
                    tbl_product.product_img,tbl_brand.brand_name,tbl_product.brand_id,tbl_product.unit_in_stock,tbl_product.unit_in_order, promotion_id 
                    FROM tbl_product INNER JOIN tbl_brand ON tbl_product.brand_id=tbl_brand.brand_id where product_id= '".$product_id."'";
                    $ketQuaTruyVan = $conn->query($sql);
                    if ($ketQuaTruyVan->num_rows > 0) {
                    $i = 0;
                    while ($product = $ketQuaTruyVan->fetch_assoc()) {
                    ?>
          <div class="col-lg-6">
            <div class="single-product-slider">
              <div class="single-product-thumb">
                <div class="zoom zoom-hover">
                  <div class="thumb-item">
                    <a class="lightbox-image" data-fancybox="gallery" href="./image-product/<?=$product['product_img']?>">
                    <img src="./image-product/<?=$product['product_img']?>" class="img-responsive" style="width:500px; height:500px;" alt="d3ntclothing">                                                  
                    </a>
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
                          <span class="ribbon ribbon-hot">Sale</span>
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
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="single-product-info">
                  <h3 class="title"><?=$product['product_name']?></h3>               
                  <!-- Đánh giá -->
              <div class="product-ratting">
                <div class="ratting-icons">
                <?php
                $sql ="SELECT `product_id`, count(product_id) as count, ROUND(AVG(`level_recorded`),0) as avg FROM `tbl_comment` WHERE product_id = '".$product['product_id']."' GROUP by product_id ;";
                $ketQuaTruyVan= $conn->query($sql);
                if($ketQuaTruyVan->num_rows>0){
                  $level1 = $ketQuaTruyVan->fetch_assoc();
                  for($p=1;$p<=$level1['avg'];$p++){
                    echo ' <i class="fa fa-star"></i>';
                  } 
                  for($p=$level1['avg']+1;$p<=5;$p++){
                    echo ' <i class="fa fa-star-o"></i>';
                  } 
                  echo ' <div class="ratting-caption"> '.$level1['count'].' Review</div>';
                }else{
                  echo 'Chưa có đánh giá nào!';
                }
                ?>
                 </div>
                <!-- <div class="ratting-icons">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-o"></i>
                </div> -->
               
              </div>
              <!-- End đánh giá -->
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
                          <span class="price"><?=$product['unit_price']-$product['unit_price']*$promotion2['promotion_percent']/100?>VNĐ</span>
                        <del class="price-old"><?=$product['unit_price']?>VNĐ</del>
                        <?php
                          }
                        }else{
                          ?>
                          <span class="price"><?=$product['unit_price']?>VNĐ</span>
                          <?php
                        }
                        ?>
              </div>
              <form action="./cart_add-in-detail.php" method="post">
              <div class="product-number"> 
                MSP: <span ><?=$product['product_id']?></span>
              </div>
              <div class="product-number"> 
                Số lượng: <span ><?=$product['unit_in_stock']?></span>
              </div>
              <div class="quick-product-action">
                <?php
                  if($product['unit_in_stock']==0){
                    ?>
                    <div class="action-top">
                  <input type="text" class="btn btn-black" value="Hết hàng">
                  <?php
                  if(isset($_SESSION['login_user']) && $_SESSION['login_user'] == 1){
                    $sql5 = "SELECT * FROM `tbl_wishlist` WHERE user_id= '".$_SESSION['user_id']."' and product_id = '".$product['product_id']."'";
                    $ketQuaTruyVan5 = $conn->query($sql5);
                    if($ketQuaTruyVan5->num_rows>0){
                      ?>
                    <!-- xoa khoi yeu thich -->
                      <a  class="action-wishlist" style="    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 30px;
    margin-left: 10px;
    color: #EBEBEB;" href="./product_wishlist_remove.php?product_id=<?=$product['product_id']?>"  title="Wishlist">
                        <i class="fa fa-heart heart-on"  aria-hidden="true"></i>
                      </a>
                      <?php
                    }else{
                      
                      ?>  
                <!-- them vao yeu thich -->
                      
                      <a  class="action-wishlist" style="    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 30px;
    margin-left: 10px;
    color: #EBEBEB;" href="./product_wishlist_add.php?product_id=<?=$product['product_id']?>" title="Wishlist">
                          <i class="fa fa-heart" aria-hidden="true"></i>
                        </a>
                      <?php
                    }
                  }else{
                    ?>
                    <a  class="action-wishlist" style=" display: flex;
    justify-content: center;
    align-items: center;
    font-size: 30px;
    margin-left: 10px;
    color: #EBEBEB;" href="./product_wishlist_add.php?product_id=<?=$product['product_id']?>" title="Wishlist">
                          <i class="fa fa-heart" aria-hidden="true"></i>
                        </a>
                    <?php
                  }
                    ?>
                </div>
                    <?php
                  }else{
                    ?>
                    <div class="action-top">
                      <input type="hidden" name="id" value="<?=$product['product_id']?>">
                    <input type="number" name="q" style="text-align: center;" id="quantity" min="1"  max="<?=$product['unit_in_stock']?>" title="Quantity" value="1" >
                  <input name="add_cart" type="submit" class="btn btn-black" value="Thêm giỏ hàng">
                  <?php
                  if(isset($_SESSION['login_user']) && $_SESSION['login_user'] == 1){
                    $sql5 = "SELECT * FROM `tbl_wishlist` WHERE user_id= '".$_SESSION['user_id']."' and product_id = '".$product['product_id']."'";
                    $ketQuaTruyVan5 = $conn->query($sql5);
                    if($ketQuaTruyVan5->num_rows>0){
                      ?>
                    <!-- xoa khoi yeu thich -->
                      <a  class="action-wishlist" style="    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 30px;
    margin-left: 10px;
    color: #EBEBEB;" href="./product_wishlist_remove.php?product_id=<?=$product['product_id']?>"  title="Wishlist">
                        <i class="fa fa-heart heart-on"  aria-hidden="true"></i>
                      </a>
                      <?php
                    }else{
                      
                      ?>  
                <!-- them vao yeu thich -->
                      
                      <a  class="action-wishlist" style="    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 30px;
    margin-left: 10px;
    color: #EBEBEB;" href="./product_wishlist_add.php?product_id=<?=$product['product_id']?>" title="Wishlist">
                          <i class="fa fa-heart" aria-hidden="true"></i>
                        </a>
                      <?php
                    }
                  }else{
                    ?>
                    <a  class="action-wishlist" style=" display: flex;
    justify-content: center;
    align-items: center;
    font-size: 30px;
    margin-left: 10px;
    color: #EBEBEB;" href="./product_wishlist_add.php?product_id=<?=$product['product_id']?>" title="Wishlist">
                          <i class="fa fa-heart" aria-hidden="true"></i>
                        </a>
                    <?php
                  }
                    ?>
                   
                </div>
                <div class="action-bottom">
                  <input class="btn-theme" name="mua" type="submit" value="Mua ngay" name="buy">
                </div>
                    <?php
                  }
                ?>
                </form>
                <br>
                <div class="product-number"> Số lượng đã bán: <?=$product['unit_in_order']?>
              </div>
              </div>
              <div class="widget-social-icons">
                <a class="facebook" href="#/"><i class="ion-social-facebook"></i> Facebook</a>
                <a class="twitter" href="#/"><i class="ion-social-twitter"></i> Twitter</a>
                <a class="google-plus" href="#/"><i class="ion-social-googleplus-outline"></i> Google+</a>
                <a class="pinterest" href="#/"><i class="ion-social-pinterest"></i> Pinterest</a>
              </div>
            </div>
          </div>
          <?php
                    }
                  }
                  ?>
        </div>
      </div>
    </section>
    <!--== End Shop Area ==-->

    <!--== Start Shop Tab Area ==-->
    <section class="product-area product-description-review-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="product-description-review">
              <ul class="nav nav-tabs product-description-tab-menu" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="product-desc-tab" data-bs-toggle="tab" data-bs-target="#productDesc" type="button" role="tab" aria-controls="productDesc" aria-selected="true">Mô tả</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="product-review-tab" data-bs-toggle="tab" data-bs-target="#productReview" type="button" role="tab" aria-controls="productReview" aria-selected="false">Đánh giá</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="product-custom-tab" data-bs-toggle="tab" data-bs-target="#productCustom" type="button" role="tab" aria-controls="productCustom" aria-selected="false">Chính sách vận chuyển</button>
                </li>
              </ul>
              <div class="tab-content product-description-tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="productDesc" role="tabpanel" aria-labelledby="product-desc-tab">
                  <div class="product-desc">
                    <?php
                    $sql = "SELECT `product_description` FROM `tbl_product` WHERE product_id =".$product_id;
                    $ketQuaTruyVan = $conn->query($sql);
                    $des = $ketQuaTruyVan->fetch_assoc();
                    echo "<p>".$des['product_description']."</p>"
                    ?>
                    
                  </div>
                </div>
                <div class="tab-pane fade" id="productReview" role="tabpanel" aria-labelledby="product-review-tab">
                  <div class="product-review">
                    <div class="review-header">
                      <h4 class="title">Đánh giá của khách hàng</h4>
                      <div class="review-info">
                        <!-- <ul class="review-rating">
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star-o"></i></li>
                        </ul>
                        <span class="review-caption">Based on 1 review</span> -->
                        <?php
                      $sql = "SELECT * FROM `tbl_comment`,tbl_user WHERE tbl_comment.user_id = tbl_user.user_id and product_id = '".$product_id."'";
                      $ketQuaTruyVan = $conn->query($sql);
                      $com=0;
                      if($ketQuaTruyVan->num_rows>0){
                      while($comment= $ketQuaTruyVan->fetch_assoc()){
                        if($comment['user_id']== $_SESSION['user_id']){
                          $com++;
                        }
                      }
                      }
                      if($com != 0 ){
                        echo '<span style="color:#f4a460">Bạn đã đánh giá sản phẩm này</span>';;
                      }else{
                        echo '<span class="review-write-btn">Viết đánh giá</span>';
                      }
                        ?>

                      </div>
                    </div>
                    <div class="product-review-form">
                      <h4 class="title">Viết đánh giá</h4>
                      <form action="./comment.php" method="post">
                        <div class="review-form-content">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="rating">
                                <div style="float: left;">
                                <input class="star star-5" id="star-5" type="radio" value="5" name="star"/>
                            <label class="star star-5" class="star-5" for="star-5"></label>
                               <input class="star star-4" id="star-4" type="radio" value="4" name="star"/>
                              <label class="star star-4" for="star-4"></label>
                                <input class="star star-3" id="star-3" type="radio" value="3" name="star" />
                              <label class="star star-3" for="star-3"></label>
                              <input class="star star-2" id="star-2" type="radio" value="2" name="star"/>
                        <label class="star star-2" for="star-2"></label>
                         <input class="star star-1" id="star-1" type="radio" value="1" name="star"/>
                              <label class="star star-1" for="star-1"></label>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="reviewReviewTitle">Tiêu đề</label>
                                <input class="form-control" id="reviewReviewTitle" type="text" placeholder="Nhập tiêu đề" required="" name="comment_title">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="reviewFormTextarea">Nội dung <span>(1500)</span></label>
                                <textarea class="form-control textarea" id="reviewFormTextarea" name="comment_content" rows="7" placeholder="Nhập nội dung đánh giá" required=""></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group pull-right">
                                <input type="hidden" name="product_id" value="<?=$product_id?>">
                                <button class="btn btn-theme" type="submit">Gửi đánh giá</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                    <?php
                    $sql = "SELECT * FROM `tbl_comment`,tbl_user WHERE tbl_comment.user_id = tbl_user.user_id and product_id = '".$product_id."'";
                    $ketQuaTruyVan = $conn->query($sql);
                    if($ketQuaTruyVan->num_rows>0){
                      while($comment= $ketQuaTruyVan->fetch_assoc()){
                        ?>
                    <div class="review-content" style="border-bottom:1px solid #ECECEC; padding-top:10px">
                      <div class="review-item">
                      <ul class="review-rating">
                        <?php
                        for($m=1;$m<=$comment['level_recorded'];$m++){
                          echo '<li><i class="fa fa-star"></i></li>';
                        }
                        for($m=$comment['level_recorded']+1;$m<=5;$m++){
                          echo '<li><i class="fa fa-star-o"></i></li>';
                        }
                        ?>
                        </ul>
                        <!-- <ul class="review-rating">
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star"></i></li>
                          <li><i class="fa fa-star-o"></i></li>
                        </ul> -->
                        <h4 class="title"><?=$comment['comment_title']?></h4>
                        <h5 class="review-date"><span><?=$comment['user_name']?></span> on <span><?=$comment['date']?></span></h5>
                        <p><?=$comment['comment_content']?></p>
                        <a class="review-report" href="#/">Báo cáo đánh giá</a>
                      </div>
                    </div>
                        <?php
                      }
                    }else{
                      ?>
                      <div class="container" style="display:flex; justify-content:center;align-content:center;">
                        <h5>Chưa có đánh giá nào</h5>
                      </div>
                      <?php
                    }
                    ?>
                    
                  </div>
                </div>
                <div class="tab-pane fade" id="productCustom" role="tabpanel" aria-labelledby="product-custom-tab">
                  <div class="product-shipping-policy">
                    <div class="section-title">
                      <h2 class="title">Chính sách vận chuyển của cửa hàng</h2>
                      <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate</p>
                    </div>
                    <ul class="shipping-policy-list">
                      <li>1-2 business days (Typically by end of day)</li>
                      <li><a href="#">30 days money back guaranty</a></li>
                      <li>24/7 live support</li>
                      <li>odio dignissim qui blandit praesent</li>
                      <li>luptatum zzril delenit augue duis dolore</li>
                      <li>te feugait nulla facilisi.</li>
                    </ul>
                    <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum</p>
                    <p>claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per</p>
                    <p>seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>
                  </div>
                </div>
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Shop Tab Area ==-->
  </main>
<?php
require_once("./layout/footer.php");
?>