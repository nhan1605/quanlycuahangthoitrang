
<?php
require_once("./layout/header.php");
$SortBy = $_GET['SortBy'];

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
$query = "SELECT * FROM tbl_product LIMIT $start_from, $per_page_record";
$rs_result = mysqli_query ($conn, $query);
// end
if ($SortBy ==1)
{
  $sql = "SELECT *,tbl_brand.brand_name 
          FROM tbl_product  inner join tbl_brand 
          on tbl_product.brand_id = tbl_brand.brand_id
          WHERE tbl_product.promotion_id is not null
          LIMIT $start_from, $per_page_record";

  $sql1 = "select count(*) from tbl_product where tbl_product.promotion_id is not null";
}
elseif ($SortBy == 2 )
{
  // Lọc theo tên sản phẩm theo thứ tự từ A-Z
  $sql = "SELECT *,tbl_brand.brand_name 
  FROM tbl_product  inner join tbl_brand 
  on tbl_product.brand_id = tbl_brand.brand_id
  ORDER BY tbl_product.product_name ASC 
  LIMIT $start_from, $per_page_record";
  $sql1 = "select count(*) from tbl_product ";

}
elseif ($SortBy == 3 )
{
  // Lọc theo tên sản phẩm theo thứ tự từ Z-A
  $sql = "SELECT *,tbl_brand.brand_name 
  FROM tbl_product  inner join tbl_brand 
  on tbl_product.brand_id = tbl_brand.brand_id
  ORDER BY tbl_product.product_name DESC
  LIMIT $start_from, $per_page_record";
  $sql1 = "select count(*) from tbl_product ";
}
elseif ($SortBy == 4 )
{
  // Lọc theo tên sản phẩm theo giá giảm dần
  $sql = "SELECT *,tbl_brand.brand_name 
  FROM tbl_product  inner join tbl_brand 
  on tbl_product.brand_id = tbl_brand.brand_id
  ORDER BY tbl_product.unit_price DESC
  LIMIT $start_from, $per_page_record";
  $sql1 = "select count(*) from tbl_product  ";
}
elseif ($SortBy ==5 )
{
  // Lọc theo tên sản phẩm theo giá tăng dần
  $sql = "SELECT *,tbl_brand.brand_name 
  FROM tbl_product  inner join tbl_brand 
  on tbl_product.brand_id = tbl_brand.brand_id
  ORDER BY tbl_product.unit_price ASC
  LIMIT $start_from, $per_page_record";
  $sql1 = "select count(*) from tbl_product ";
}
elseif($SortBy ==6)
{
  // Lọc theo tên sản phẩm theo thời gian từ mới đến cũ
  $sql = "SELECT *,tbl_brand.brand_name 
  FROM tbl_product  inner join tbl_brand 
  on tbl_product.brand_id = tbl_brand.brand_id
  ORDER BY tbl_product.released_date DESC
  LIMIT $start_from, $per_page_record";
  $sql1 = "select count(*) from tbl_product  ";
}
elseif($SortBy ==7)
{
  // Lọc theo tên sản phẩm theo thời gian từ cũ đến mới
  $sql = "SELECT *,tbl_brand.brand_name 
  FROM tbl_product  inner join tbl_brand 
  on tbl_product.brand_id = tbl_brand.brand_id
  ORDER BY tbl_product.released_date ASC
  LIMIT $start_from, $per_page_record";
  $sql1 = "select count(*) from tbl_product ";
}
// ?>
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
                    <form action="shop_sort.php" method="get">
                    <div class="product-sorting-wrapper">
                      <div class="product-show">
                        <label for="SortBy">Sort by</label>
                        <input name ="Sort"style="background-color:#f4a460; color: #fff; align-items: center;" width="100%" height="50px" type="submit" class="btn form-input-item" value="Lọc">
                        <select class="form-select" id="SortBy" aria-label="Default select example">
                          <option value="manual">Featured</option>
                          <option value="1">Sale off</option>
                          <option value="2">Alphabetically, A-z </option>
                          <option value="3">Alphabetically, Z-A </option>
                          <option value="4">Price, low to high</option>
                          <option value="5">Price, high to low</option>
                          <option value="6">Date, new to old</option>
                          <option value="7">Date, old to new</option>
                        </select>
                        <input type="hidden" class="SortBy" name="SortBy" value="" >
                      </div>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
                <div class="row">
                <?php
                    $query = $sql;
                    $rs_result = mysqli_query ($conn, $query);                                  
                    while ($matHang = mysqli_fetch_array($rs_result)){
                    {
                    ?>
                  <div class="col-md-6 col-xl-4">
                    <!-- Start Product Item -->
                    <div class="product-item">
                      <div class="product-thumb">
                        <a href="simple_product.php?product_id=<?=$matHang['product_id']?>">
                          <img src="./image-product/<?=$matHang['product_img']?>" class="img-responsive" style="width:100%; height:300px;" alt="d3ntclothing">                         
                          <?php
                        if($matHang['unit_in_stock']==0){
                          ?>
                          <div class="ribbons">
                          <span class="ribbon-soldout">Hết hàng</span>
                        </div>
                          <?php
            
                        }
                           if($matHang['promotion_id']!= null){
                          ?>
                            <div class="ribbons">
                          <span class="ribbon ribbon-hot">Giảm giá</span>
                          <?php
                          $sql1 ="SELECT promotion_percent FROM `tbl_product`,tbl_promotion 
                          WHERE tbl_product.promotion_id = tbl_promotion.promotion_id 
                          and tbl_product.product_id='".$matHang['product_id']."' and tbl_product.promotion_id='".$matHang['promotion_id']."'";
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
                        <div class="product-action">
                        <?php
                      if(isset($_SESSION['login_user']) && $_SESSION['login_user'] == 1){
                        $sql5 = "SELECT * FROM `tbl_wishlist` WHERE user_id= '".$_SESSION['user_id']."' and product_id = '".$matHang['product_id']."'";
                        $ketQuaTruyVan5 = $conn->query($sql5);
                        if($ketQuaTruyVan5->num_rows>0){
                          ?>
                        <!-- xoa khoi yeu thich -->
                          <a type="submit" class="action-wishlist" href="./product_wishlist_remove.php?product_id=<?=$matHang['product_id']?>"  title="Wishlist">
                            <i class="fa fa-heart heart-on"  aria-hidden="true"></i>
                          </a>
                          <?php
                        }else{
                          ?>  
                    <!-- them vao yeu thich -->
                          <a type="submit" class="action-wishlist" href="./product_wishlist_add.php?product_id=<?=$matHang['product_id']?>" title="Wishlist">
                              <i class="fa fa-heart" aria-hidden="true"></i>
                            </a>
                          <?php
                      }}else{
                        ?>
                        <a type="submit" class="action-wishlist" href="./product_wishlist_add.php?product_id=<?=$matHang['product_id']?>" title="Wishlist">
                              <i class="fa fa-heart" aria-hidden="true"></i>
                            </a>
                        <?php
                      }
                    ?>
                           <?php
                        // Không cho thêm vào giỏ hàng
                          if($matHang['unit_in_stock']==0){
                            ?>
                          <a class="action-cart" href="#/">
                            <i class="fa fa-opencart"></i>
                          </a>
                            <?php
                          }else{
                            // Cho thêm vào giỏ
                            ?>
                            <a class="action-cart" href="./cart_add.php?id=<?=$matHang['product_id']?>&q=1">
                            <i class="fa fa-opencart"></i>
                            <?php
                          }
                        ?>
                        </div>
                      </div>
                      <div class="product-info">
                       <h4 class="title"><a href="update_shop.php?id=<?=$matHang['product_id']?>"><?=$matHang['product_name']?></a></h4>
                        <div class="prices">
                        <?php
                         if($matHang['promotion_id']!= null){
                          $sql2 ="SELECT promotion_percent FROM `tbl_product`,tbl_promotion 
                          WHERE tbl_product.promotion_id = tbl_promotion.promotion_id 
                          and tbl_product.product_id='".$matHang['product_id']."' and tbl_product.promotion_id='".$matHang['promotion_id']."'";
                          $ketQuaTruyVan2= $conn->query($sql2);
                          if($ketQuaTruyVan2->num_rows>0){
                            $promotion2 = $ketQuaTruyVan2->fetch_assoc()
                          ?>
                        <span class="price">$<?=$matHang['unit_price']-$matHang['unit_price']*$promotion2['promotion_percent']/100?></span>
                        <del class="price-old">$<?=$matHang['unit_price']?></del>
                        <?php
                          }
                        }else{
                          ?>
                           <span class="price">$<?=$matHang['unit_price']?></span>
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
              <div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                <div class="row">
                <?php
                $query = $sql;
                    $rs_result = mysqli_query ($conn, $query);                                  
                    while ($matHang = mysqli_fetch_array($rs_result)){
                    {
                    ?>
                  <div class="col-12">
                    <!-- Start Product Item -->
                    <div class="product-item product-item-list">
                      <div class="product-thumb">
                        <a href="simple_product.php">
                          <img src="./image-product/<?=$matHang['product_img']?>" class="img-responsive" style="width:100%; height:300px;" alt="d3ntclothing">                                                  
                          <?php
                        if($matHang['unit_in_stock']==0){
                          ?>
                          <div class="ribbons">
                          <span class="ribbon-soldout">Hết hàng</span>
                        </div>
                          <?php
            
                        }
                           if($matHang['promotion_id']!= null){
                          ?>
                            <div class="ribbons">
                          <span class="ribbon ribbon-hot">Giảm giá</span>
                          <?php
                          $sql1 ="SELECT promotion_percent FROM `tbl_product`,tbl_promotion 
                          WHERE tbl_product.promotion_id = tbl_promotion.promotion_id 
                          and tbl_product.product_id='".$matHang['product_id']."' and tbl_product.promotion_id='".$matHang['promotion_id']."'";
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
                        <h4 class="title"><a href="update_shop.php/?id=<?=$matHang['product_id']?>"><?=$matHang['product_name']?></a></h4>
                        <?php
                         if($matHang['promotion_id']!= null){
                          $sql2 ="SELECT promotion_percent FROM `tbl_product`,tbl_promotion 
                          WHERE tbl_product.promotion_id = tbl_promotion.promotion_id 
                          and tbl_product.product_id='".$matHang['product_id']."' and tbl_product.promotion_id='".$matHang['promotion_id']."'";
                          $ketQuaTruyVan2= $conn->query($sql2);
                          if($ketQuaTruyVan2->num_rows>0){
                            $promotion2 = $ketQuaTruyVan2->fetch_assoc()
                          ?>
                        <span class="price">$<?=$matHang['unit_price']-$matHang['unit_price']*$promotion2['promotion_percent']/100?></span>
                        <del class="price-old">$<?=$matHang['unit_price']?></del>
                        <?php
                          }
                        }else{
                          ?>
                           <span class="price">$<?=$matHang['unit_price']?></span>
                          <?php
                        }
                        ?>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia,</p>
                        <div class="product-action">
                        <?php
                        if(isset($_SESSION['login_user']) && $_SESSION['login_user'] == 1){
                          $sql5 = "SELECT * FROM `tbl_wishlist` WHERE user_id= '".$_SESSION['user_id']."' and product_id = '".$matHang['product_id']."'";
                          $ketQuaTruyVan5 = $conn->query($sql5);
                          if($ketQuaTruyVan5->num_rows>0){
                            ?>
                          <!-- xoa khoi yeu thich -->
                            <a type="submit" class="action-wishlist" href="./product_wishlist_remove.php?product_id=<?=$matHang['product_id']?>"  title="Wishlist">
                              <i class="fa fa-heart heart-on"  aria-hidden="true"></i>
                            </a>
                            <?php
                          }else{
                            ?>  
                      <!-- them vao yeu thich -->
                            <a type="submit" class="action-wishlist" href="./product_wishlist_add.php?product_id=<?=$matHang['product_id']?>" title="Wishlist">
                                <i class="fa fa-heart" aria-hidden="true"></i>
                              </a>
                            <?php
                        } }else{
                          ?>
                          <a type="submit" class="action-wishlist" href="./product_wishlist_add.php?product_id=<?=$matHang['product_id']?>" title="Wishlist">
                                <i class="fa fa-heart" aria-hidden="true"></i>
                              </a>
                          <?php
                        }
                    ?>
                          <?php
                        // Không cho thêm vào giỏ hàng
                          if($matHang['unit_in_stock']==0){
                            ?>
                          <a class="action-cart" href="#/">
                            <i class="fa fa-opencart"></i>
                          </a>
                            <?php
                          }else{
                            // Cho thêm vào giỏ
                            ?>
                            <a class="action-cart" href="./cart_add.php?id=<?=$matHang['product_id']?>&q=1">
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
                  $query = $sql1;
                  $rs_result = mysqli_query($conn, $query);
                  $row = mysqli_fetch_row($rs_result);
                  $total_records = $row[0];
                  echo "</br>";
                  // Number of pages required.
                  $total_pages = ceil($total_records / $per_page_record);
                  $pagLink = "";
                  if($page>=2)
                  {
                      echo "<li> <a class='page-number' href='shop_sort.php?page=".($page-1)."&SortBy=".$SortBy."'>  Prev </a> </li>";
                  }
                  for ($i=1; $i<=$total_pages; $i++)
                  {
                  if ($i == $page) {
                  $pagLink .= "<li> <a class='page-number active' href='shop_sort.php?page=".$i."&SortBy=".$SortBy."'>".$i." </a> </li>";
                  }
                  else  {
                  $pagLink .= "<li> <a class='page-number' href='shop_sort.php?page=".$i."&SortBy=".$SortBy."'>".$i." </a></li>";
                  }
                  };
                  echo $pagLink;
                  if($page<$total_pages){
                  echo "<li><a class='page-number' href='shop_sort.php?page=".($page+1)."&SortBy=".$SortBy."'>  Next </a></li>";
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
                    <li><a href="#/">Sản phẩm nổi bật <span>(17)</span></a></li>
                    <li><a href="#/">Sản phẩm mới<span>(16)</span></a></li>
                  </ul>
                </div>
              </div>
              <div class="widget">
                <h3 class="widget-title">Search</h3>
                <div class="widget-search-box">
                  <form action="search.php" method="GET">
                    <div class="form-input-item">
                      <label for="search" class="sr-only">Search Here</label>
                      <input type="text" name="search" id="search" placeholder="Tìm kiếm tên sản phẩm" required>
                      <button type="submit" class="btn-src"><i class="ion-ios-search-strong"></i></button>
                  </div>
                  </form>
                </div>
              </div>
              <div class="widget-search-box">
              <form action="search.php" method="GET">
              
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
window.location.href = 'shop_sort.php?page='+page;
}
</script>
<script>  
        var select_option = document.querySelector('.form-select');
        var sortBy = document.querySelector('.SortBy');
        console.log(select_option)
        select_option.onchange = function(){
        sortBy.value = this.value
        }
</script>