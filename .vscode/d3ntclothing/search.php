
<?php
require_once("./layout/header.php");

if(isset($_GET['search']))
{
    $search = $_GET['search'];
}
else
{
    $search ="";
}
echo $search;
if(isset($_GET['size_id']))
{   
    $size_id = $_GET['size_id'];
}
else
{
    $size_id ="";
}
echo $size_id ;

if(isset($_GET['color_id']))
{   
    $color_id = $_GET['color_id'];   
}
else
{
    $color_id = "";
}
echo $color_id;
if(isset($_GET['brand_id']))
{   
    $brand_id = $_GET['brand_id'];
}
else
{    
    $brand_id = "";
}

//phân trang
$per_page_record = 9;  // Number of entries to show in a page.
// Look for a GET variable page if not found default is 1.
if (isset($_GET['page'])) {
$page  = $_GET['page'];
}
else {
$page=1;
}
$start_from = ($page-1) * $per_page_record;

//end

?>
<style>
  .check-search {
    height: 20px!important;
    width: 80%;
    display: flex;
    justify-content: start;
    align-items: center;
    margin: 0 auto;
  }
  .check-item{
    margin-right: 20px;
  }
</style>
<main class="main-content site-wrapper-reveal">
    <!--== Start Page Title Area ==-->
    <section class="page-title-area" data-bg-img="image_banner/product.jpg">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-title-content text-center">
              <h2 class="title text-white">Sản phẩm</h2>
              <div class="bread-crumbs"><a href="index.html">Trang chủ<span class="breadcrumb-sep">/</span></a><span class="active">Sản phẩm</span></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Page Title Area ==-->

    <!--== Start Shop Area Wrapper ==-->
    <section class="product-area product-grid-area">
      <div class="container">
        <div class="row flex-row-reverse e">
          <div class="col-lg-9">
            <div class="row">
              <div class="col-12">
                <div class="shop-topbar-wrapper">
                  <div class="collection-shorting">
                    <div class="shop-topbar-left  ">
                      <div class="view-mode">
                        <nav>
                          <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab" data-bs-target="#nav-grid" type="button" role="tab" aria-controls="nav-grid" aria-selected="true"><i class="fa fa-th"></i></button>
                            <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab" data-bs-target="#nav-list" type="button" role="tab" aria-controls="nav-list" aria-selected="false"><i class="fa fa-list-ul"></i></button>
                          </div>
                        </nav>
                      </div>
                      
                    </div>
                    <div class="product-sorting-wrapper">
                      <div class="product-show">
                        <label for="SortBy">Sort by</label>
                        <select class="form-select" id="SortBy" aria-label="Default select example">
                          <option value="manual">Featured</option>
                          <option value="best-selling">Best Selling</option>
                          <option value="title-ascending" selected>Alphabetically, A-Z</option>
                          <option value="title-descending">Alphabetically, Z-A</option>
                          <option value="price-ascending">Price, low to high</option>
                          <option value="price-descending">Price, high to low</option>
                          <option value="created-descending">Date, new to old</option>
                          <option value="created-ascending">Date, old to new</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
                <div class="row">
                    <?php
                    $query = "SELECT tbl_product.product_id, 
                    tbl_product.product_name, 
                    tbl_product.unit_price, 
                    tbl_product.product_img, 
                    tbl_product.size_id,
                    tbl_product.color_id,
                    tbl_product.unit_in_stock,
                    tbl_product.promotion_id,
                    tbl_brand.brand_name, 
                    tbl_product.brand_id 
                    FROM tbl_product INNER JOIN tbl_brand 
                    ON tbl_product.brand_id=tbl_brand.brand_id 
                    WHERE tbl_product.product_name like '%".$search."%' and
                    tbl_product.brand_id like '%".$brand_id."%' and
                    tbl_product.color_id like '%".$color_id."%' and
                    tbl_product.size_id like '%".$size_id."%'  LIMIT 
                              $start_from, $per_page_record";
                    
                    $rs_result = mysqli_query ($conn, $query);                                  
                    // // // $sql = 'SELECT tbl_product.product_id,tbl_product.product_name,tbl_product.unit_price,tbl_product.product_img,tbl_brand.brand_name,tbl_product.brand_id 
                    // FROM tbl_product INNER JOIN tbl_brand 
                    // ON tbl_product.brand_id=tbl_brand.brand_id ';
                    // // // $ketQuaTruyVan = $conn->query($sql);
                    // // // if ($ketQuaTruyVan->num_rows > 0) {
                    // // // $i = 0;
                    // while ($matHang = $ketQuaTruyVan->fetch_assoc()) 
                    while ($product = mysqli_fetch_array($rs_result)){
                    {
                    ?>
                  <div class="col-md-6 col-xl-4">
                    <!-- Start Product Item -->
                    <div class="product-item">
                    <div class="product-thumb">
                      <a href="product_detail.php?product_id=<?=$product['product_id']?>">
                        <img width="270px" height="270px" class="product_img" src="./image-product/<?=$product['product_img']?>"  alt="d3ntclothing">
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
                    </div>
                    <div class="product-info">
                      <h4 class="title"><a href="product_detail.php?product_id=<?=$product['product_id']?>"><?=$product['product_name']?></a></h4>
                      <div class="prices">
                        <span class="price">$<?=$product['unit_price']?></span>
                        <?php
                         if($product['promotion_id']!= null){
                          $sql2 ="SELECT promotion_percent FROM `tbl_product`,tbl_promotion 
                          WHERE tbl_product.promotion_id = tbl_promotion.promotion_id 
                          and tbl_product.product_id='".$product['product_id']."' and tbl_product.promotion_id='".$product['promotion_id']."'";
                          $ketQuaTruyVan2= $conn->query($sql2);
                          if($ketQuaTruyVan2->num_rows>0){
                            $promotion2 = $ketQuaTruyVan2->fetch_assoc()
                          ?>
                        <del class="price-old">$<?=$product['unit_price']*$promotion2['promotion_percent']/100?></del>
                        <?php
                          }
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
              <div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                <div class="row">
                <?php
                    $sql =  "SELECT tbl_product.product_id, 
                    tbl_product.product_name, 
                    tbl_product.unit_price, 
                    tbl_product.product_img, 
                    tbl_product.size_id,
                    tbl_product.color_id,
                    tbl_product.unit_in_stock,
                    tbl_product.promotion_id,
                    product_description,
                    tbl_brand.brand_name, 
                    tbl_product.brand_id 
                    FROM tbl_product INNER JOIN tbl_brand 
                    ON tbl_product.brand_id=tbl_brand.brand_id 
                    WHERE tbl_product.product_name like '%".$search."%' and
                    tbl_product.brand_id like '%".$brand_id."%' and
                    tbl_product.color_id like '%".$color_id."%' and
                    tbl_product.size_id like '%".$size_id."%'  LIMIT 
                              $start_from, $per_page_record";
                    $ketQuaTruyVan = $conn->query($sql);
                    if ($ketQuaTruyVan->num_rows > 0) {
                    $i = 0;
                    while ($product = $ketQuaTruyVan->fetch_assoc()) {
                    ?>
                  <div class="col-12">
                    <!-- Start Product Item -->
                    <div class="product-item product-item-list">
                      <div class="product-thumb">
                        <a href="product_detail.php?product_id=<?=$product['product_id']?>">
                          <img src="./image-product/<?=$product['product_img']?>" class="img-responsive" style="width:270px; height:270px;" alt="d3ntclothing">                                                  
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
                      </div>
                      <div class="product-info">
                        <h4 class="title"><a href="product_detail.php?product_id=<?=$product['product_id']?>"><?=$product['product_name']?></a></h4>
                        <div class="prices"><?=$product['unit_price']?>
                        </div>
                        <p><?=$product['product_description']?></p>
                        <div class="product-action">
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
                        } }else{
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
            <div class="pagination-area">
              <nav>
              <ul class="page-numbers">
            <?php
                  $query = "SELECT COUNT(*)  FROM tbl_product 
                  WHERE tbl_product.product_name like '%".$search."%' and
                  tbl_product.brand_id like '%".$brand_id."%' and
                  tbl_product.color_id like '%".$color_id."%' and
                  tbl_product.size_id like '%".$size_id."%' ";
                  $rs_result = mysqli_query($conn, $query);
                  $row = mysqli_fetch_row($rs_result);
                  $total_records = $row[0];
                  echo "</br>";
                  // Number of pages required.
                  $total_pages = ceil($total_records / $per_page_record);
                  $pagLink = "";
                  if($page>=2)
                  {
                      echo "<li> <a class='page-number' href='search.php?page=".($page-1)."&search=".$search."&brand_id=".$brand_id."&color_id=".$color_id."&size_id=".$size_id."'>  Prev </a> </li>";
                  }
                  for ($i=1; $i<=$total_pages; $i++)
                  {
                  if ($i == $page) {
                  $pagLink .= "<li> <a class = 'page-number active' href='search.php?page=".$i."&search=".$search."&brand_id=".$brand_id."&color_id=".$color_id."&size_id=".$size_id."'>".$i." </a> </li>";
                  }
                  else  {
                  $pagLink .= "<li> <a class='page-number' href='search.php?page=".$i."&search=".$search."&brand_id=".$brand_id."&color_id=".$color_id."&size_id=".$size_id."'>".$i." </a></li>";
                  }
                  };
                  echo $pagLink;
                  if($page<$total_pages){
                  echo "<li><a class='page-number' href='search.php?page=".($page+1)."&search=".$search."&brand_id=".$brand_id."&color_id=".$color_id."&size_id=".$size_id."'>  Next </a></li>";
                  }
                  ?>
                  </ul>
              </nav>
              
            </div>
          </div>
          <div class="col-lg-3">
            <div class="shop-sidebar-area">
            <div class="widget">
                <h3 class="widget-title mb-25">Danh mục tùy chọn</h3>
                <div class="widget-categories-menu">
                  <ul>
                  <li><a href="./index.php">Trang chủ</a></li>
                  <li><a href="./shop_product.php">Sản phẩmc</a></li>
                    <li><a href="./blog.php">Tin tức</a></li>
                    <li><a href="./about.php">Giới thiệu</a></li>
                    <li><a href="./contact.php">Liên hệ</a></li>
                  </ul>
                </div>
              </div>
              <div class="widget">
                <h3 class="widget-title">Loại sản phẩm</h3>
                <div class="widget-categories-menu">
                  <ul>
                  <?php
                    $sql = "SELECT * FROM `tbl_category` WHERE 1";
                    $ketQuaTruyVan= $conn->query($sql);
                    if($ketQuaTruyVan->num_rows>0){
                      while($category = $ketQuaTruyVan->fetch_assoc()){
                        echo '<li><a href="#/">'.$category['category_name'].'</a></li>';
                      }
                    }
                    ?>
                  </ul>
                </div>
              </div>
              <div class="widget">
                <h3 class="widget-title">Search</h3>
                <div class="widget-search-box">
                  <form action="search.php" method="get">
                    <div class="form-input-item">
                      <label for="search" class="sr-only">Search Here</label>
                      <input type="text" name="search" id="search" placeholder="Tìm kiếm tên sản phẩm" required>
                      <button type="submit" class="btn-src"><i class="ion-ios-search-strong"></i></button>
                  </div>
                  </form>
                </div>
              </div>
              <div class="widget-search-box">
              <form action="search.php" method="get">
              
              <div class="widget">
                <h3 class="widget-title">Thương hiệu</h3>
                <div class="widget-list-style">
                  
                  <?php
                  $sql = "SELECT `brand_id`, `brand_name` FROM `tbl_brand` WHERE 1";
                    $ketQuaTruyVan = $conn->query($sql);
                  if($ketQuaTruyVan->num_rows>0){
                    while($brand= $ketQuaTruyVan->fetch_assoc()){
                    ?>
                  <div class="check-search">
                    <input type="radio" class="check-item"  name="brand_id" id="brand_id" value="<?=$brand['brand_id']?>"><label for=""><?=$brand['brand_name']?></label>
                  </div>
                     <?php
                    }
                  }

                  ?>
                </div>
              </div>
              <div class="widget">
                <h3 class="widget-title">Màu sắc</h3>
                <div class="widget-list-style">
                  <?php
                  $sql = "SELECT `color_id`, `color_name` FROM `tbl_color` WHERE 1";
                    $ketQuaTruyVan = $conn->query($sql);
                  if($ketQuaTruyVan->num_rows>0){
                    while($color= $ketQuaTruyVan->fetch_assoc()){
                      ?>
                  <div class="check-search">
                    <input type="radio" class="check-item"  name="color_id" id="color_id" value="<?=$color['color_id']?>"><label for=""><?=$color['color_name']?></label>
                  </div>
                      <?php
                    }
                  }

                  ?>
              </div>
              </div>
              <div class="widget">
                <h3 class="widget-title">Kích cỡ</h3>
                <div class="widget-size-list">
                <?php
                  $sql = "SELECT `size_id`, `size_name` FROM `tbl_size` WHERE 1";
                    $ketQuaTruyVan = $conn->query($sql);
                  if($ketQuaTruyVan->num_rows>0){
                    while($size= $ketQuaTruyVan->fetch_assoc()){
                      ?>
                  <div class="check-search">
                    <input type="radio" class="check-item"  name="size_id" id="size_id" value="<?=$size['size_id']?>"><label for=""><?=$size['size_name']?></label>
                  </div>
                      <?php
                    }
                  }
                  ?>
                </div>
              </div>
                   <input style="background-color:#f4a460; color: #fff; align-items: center;" width="100%" height="50px" type="submit" class="btn form-input-item" value="Tìm kiếm theo thuộc tính">
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Shop Area Wrapper ==-->
  </main>
<?php
require_once("./layout/footer.php");
?>
<script>
function go2Page()
{
var page = document.getElementById("page").value;
page = ((page><?php echo $total_pages; ?>)?<?php echo $total_pages; ?>:((page<1)?1:page));
window.location.href = 'search.php?page='+page;
}
</script>