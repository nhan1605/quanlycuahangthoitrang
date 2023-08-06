<?php
require_once("./layout/header.php");
$blog_id = $_GET['blog-id'];
?>

<main class="main-content site-wrapper-reveal">
    <!--== Start Page Title Area ==-->
    <section class="page-title-area" data-bg-img="image_banner/blog.jpg">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-title-content text-center">
              <h2 class="title text-white">Các tin tức cập nhật</h2>
              <div class="bread-crumbs">
                <a href="index.html">Trang chủ
                  <span class="breadcrumb-sep">/</span>
                </a>
                <a href="blog.html">Tin tức
                  <span class="breadcrumb-sep">/</span>
                </a>
                <span class="active">Các tin tức cập nhật</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Page Title Area ==-->

    <!--== Start Blog Area Wrapper ==-->
    <section class="blog-grid-area">
      <div class="container">
        <div class="row flex-row-reverse">
        <?php
                    $sql = "SELECT * FROM tbl_blog, tbl_admin  where tbl_blog.admin_id= tbl_admin.admin_id and blog_id =".$blog_id; 
                    $ketQuaTruyVan = $conn->query($sql);
                    if ($ketQuaTruyVan->num_rows > 0) {
                    $i = 0;
                    while ($matHang = $ketQuaTruyVan->fetch_assoc()) {
                    ?>
          <div class="col-lg-9">
            <div class="post-details-content">
              <div class="post-details-body">
                <div class="content">
                  <h4><?=$matHang['blog_name']?></h4>
                  <ul class="meta">
                    <li class="date"><?=$matHang['date_post']?></li>
                    <li class="author"><?=$matHang['name']?></li>
                  </ul>
                  <p><?=$matHang['blog_content']?></p>
                  
                  <div class="category-social-content">
                    <div class="category-items">
                      
                    </div>
                    <div class="social-items">
                      <span>Chia sẻ :</span>
                      <a href="#/"><i class="ion-social-facebook"></i></a>
                      <a href="#/"><i class="ion-social-twitter"></i></a>
                      <a href="#/"><i class="ion-social-pinterest"></i></a>
                      <a href="#/"><i class="ion-social-googleplus"></i></a>
                    </div>
                  </div>
                </div>
                
              </div>
              
            </div>
          </div>
          <?php
              }
            }
            ?>
          <div class="col-lg-3">
            <div class="sidebar-area mt-md-50">
              <div class="widget">
                <div class="widget-search-box">
                  <form action="#" method="post">
                    <div class="form-input-item">
                      <label for="search2" class="sr-only">Search Here</label>
                      <input type="text" id="search2" placeholder="Tìm kiếm trong cửa hàng chúng tôi">
                      <button type="submit" class="btn-src">
                        <i class="ion-ios-search-strong"></i>
                      </button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="widget">
                <h3 class="widget-title">Bài viết gần đây</h3>
                <?php
                    $sql = 'SELECT * FROM tbl_blog 
                    order by date_post desc'; 
                    $ketQuaTruyVan = $conn->query($sql);
                    if ($ketQuaTruyVan->num_rows > 0) {
                    $i = 0;
                    while ($a= $ketQuaTruyVan->fetch_assoc()) {
                  ?>
                <div class="widget-blog-post">
                  <ul>
                    <li>
                      <div class="thumb">
                        <a href="blog_details.php?blog-id=<?=$a['blog_id']?>"><img src="<?=$a['blog_img']?>" alt="Image-HasTech"></a>
                      </div>
                      <div class="content">
                        <a href="blog_details.php?blog-id=<?=$a['blog_id']?>"><?=$a['blog_name']?></a>
                        <span><?=$a['date_post']?></span>
                      </div>
                    </li>
                  </ul>
                </div>
                <?php
                }
              }
              ?>
              </div>
              <div class="widget mb-0 pb-3">
                <h3 class="widget-title">Theo dõi chúng tôi</h3>
                <div class="widget-socials">
                  <a href="#/"><i class="fa fa-facebook"></i></a>
                  <a href="#/"><i class="fa fa-twitter"></i></a>
                  <a href="#/"><i class="fa fa-instagram"></i></a>
                  <a href="#/"><i class="fa fa-skype"></i></a>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Blog Area Wrapper ==-->
  </main>
  <?php
require_once("./layout/footer.php");
?>