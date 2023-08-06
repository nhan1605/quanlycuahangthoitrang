<?php
require_once('./layout/header.php');
?>

<main class="main-content site-wrapper-reveal">
    <!--== Start Page Title Area ==-->
    <section class="page-title-area" data-bg-img="image_banner/blog.jpg">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-title-content text-center">
              <h2 class="title text-white">Tin tức</h2>
              <div class="bread-crumbs"><a href="index.html">Trang chủ<span class="breadcrumb-sep">/</span></a><span class="active">Tin tức</span></div>
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
          <div class="col-lg-9">
            <div class="blog-content-area post-items-style2">
              <div class="row">
                 <?php
                    $sql = 'SELECT blog_id, blog_img, blog_name, blog_content, date_post, name  FROM  tbl_blog, tbl_admin where tbl_blog.admin_id=tbl_admin.admin_id';
                    $ketQuaTruyVan = $conn->query($sql);
                    if ($ketQuaTruyVan->num_rows > 0) {
                    $i = 0;
                    while ($matHang = $ketQuaTruyVan->fetch_assoc()) {
                    ?>
               <div class="col-md-6 col-lg-12">
                  <!--== Start Blog Post Item ==-->
                  <div class="post-item">
                    <div class="thumb">
                      <a href="blog_details.php?blog-id=<?=$matHang['blog_id']?>">
                      <img src="<?=$matHang['blog_img']?>" class="img-responsive" style="width: 1024px;; height: 512px;px;" alt="d3ntclothing"></a>                        
                      </div>
                    <div class="content">
                      <div class="inner-content">
                        <h4 class="title">
                          <a href="blog_details.php?blog-id=<?=$matHang['blog_id']?>"><?=$matHang['blog_name']?></a>
                        </h4>
                        <div class="meta">
                          <a class="post-date" href="blog_details.php?blog-id=<?=$matHang['blog_id']?>"><?=$matHang['date_post']?></a>
                          <span>/</span>
                          <a class="post-author" href="blog_details.php?blog-id=<?=$matHang['blog_id']?>"><?=$matHang['name']?></a>
                        </div>
                        <p><?=substr($matHang['blog_content'],0,60)?>...
                        <a class="btn-blog" href="blog_details.php?blog-id=<?=$matHang['blog_id']?>">Read More</a>
                      </p>
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
              <!-- <div class="pagination-area">
                <nav>
                  <ul class="page-numbers">
                    <li>
                      <a class="page-number disabled next" href="blog.html">
                        <i class="ion-ios-arrow-left"></i>
                        Prev
                      </a>
                    </li>
                    <li>
                      <a class="page-number active" href="blog.html">1</a>
                    </li>
                    <li>
                      <a class="page-number" href="blog.html">2</a>
                    </li>
                    <li>
                      <a class="page-number" href="blog.html">3</a>
                    </li>
                    <li>
                      <a class="page-number next" href="blog.html">
                        Next
                        <i class="ion-ios-arrow-right"></i>
                      </a>
                    </li>
                  </ul>
                </nav>
                <div class="total-pages">
                  <p>Showing 1 - 4 of 11 result</p>
                </div>
              </div> -->
            </div>
          </div>
          <div class="col-lg-3">
            <div class="sidebar-area mt-md-70">
              <div class="widget">
                <div class="widget-search-box">
                  <form action="#" method="post">
                    <div class="form-input-item">
                      <label for="search2" class="sr-only">Tìm kiếm ở đây</label>
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
require_once('./layout/footer.php');
?>