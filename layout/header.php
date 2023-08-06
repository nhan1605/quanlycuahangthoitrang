<?php
require_once('./connect/connect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>D3NTCLOTHING - SHOP THỜI TRANG</title>

    <!--== Favicon ==-->
    <link rel="shortcut icon" href="image_banner/favicon.png" type="image/x-icon" />

    <!--== Google Fonts ==-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,400i,500,600,700" rel="stylesheet">

    <!--== Bootstrap CSS ==-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
    <!--== Themify Icons CSS ==-->
    <link href="assets/css/themify-icons.css" rel="stylesheet"/>
    <!--== Font-awesome Icons CSS ==-->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet"/>
    <!--== Ionicons CSS ==-->
    <link href="assets/css/ionicons.min.css" rel="stylesheet"/>
    <!--== Animate CSS ==-->
    <link href="assets/css/animate.css" rel="stylesheet"/>
    <!--== Aos CSS ==-->
    <link href="assets/css/aos.css" rel="stylesheet"/>
    <!--== FancyBox CSS ==-->
    <link href="assets/css/jquery.fancybox.min.css" rel="stylesheet"/>
    <!--== Slicknav CSS ==-->
    <link href="assets/css/slicknav.css" rel="stylesheet"/>
    <!--== Swiper CSS ==-->
    <link href="assets/css/swiper.min.css" rel="stylesheet"/>
    <!--== Main Style CSS ==-->
    <link href="assets/css/style.css" rel="stylesheet" />
   
    <style>
        .cart-notify{
            display: flex;
            justify-content: center;
            align-content: center;
            height: 200px;
        }
        .cart-mani{
            padding: 8px;
            text-align: center;
            background-color: rgb(142, 141, 141);
        }
        .cart-mani:hover{
            background-color: rgb(164, 162, 162);
        }
        .cart-login{
          
            position: relative;
        }
        .cart-login:after{
            content: "";
            position: absolute;
            background-color: #000;
            height: 100%;
            width: 1px;
            right: 0;
            top: 0;
        }
        .header-action-usermenu{
          padding: 0px!important;
          margin: 0 37px;
        }

        .form-massage{
          color: red;
        }
        .btn-cart:hover{
          border: none;
        }
        .change-quantity{
    border-radius: 5px;
    color: #626262;
    display: inline-block;
    padding: 0;
    position: relative;
    height: 40px;
    text-align: center;
    width: 100px;
        }
        .proqty{
          border: 1px solid #ddd;
    border-radius: 5px;
    color: #626262;
    display: inline-block;
    padding: 0;
    position: relative;
    height: 40px;
    text-align: center;
    width: 100px;
        }
        .font_header{
          font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .heart-on{
          color: red;
        }
    </style>
</head>

<body>
        <!-- Chat bot -->
        
<!--wrapper start-->
<div class="wrapper home-default-wrapper">

  <!--== Start Preloader Content ==-->
  <div class="preloader-wrap">
    <div class="preloader">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!--== End Preloader Content ==-->

  <!--== Start Header  ==-->
  <header class="header-area header-default sticky-header">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-5 col-sm-3 col-md-3 col-lg-2 pr-0">
          <div class="header-logo-area">
            <a href="./shop_product.php">
              <img class="logo-main" src="image_banner/logo.jpg" alt="Logo" />
              <img class="logo-light" src="image_banner/logo.jpg" alt="Logo" />
            </a>
          </div>
        </div>
        <div class="col-7 col-sm-9 col-md-9 col-lg-10">
          <div class="header-align">
            <div class="header-navigation-area">
              <ul class="main-menu nav justify-content-center">
                <li class=" active font_header"><a href="./index.php">Trang chủ</a></li>
                <li class="has-submenu font_header"><a href="./shop_product.php">Sản phẩm</a>
                  <ul class="submenu-nav">
                     <?php
                     $sql ="SELECT * FROM `tbl_category` WHERE 1";
                     $ketQuaTruyVan= $conn->query($sql);
                     if($ketQuaTruyVan->num_rows>0){
                      while($category = $ketQuaTruyVan->fetch_assoc()){
                        ?>
                        <li><a href="./shop_product.php"><?=$category['category_name']?></a></li>
                        <?php
                      }
                     }
                     ?>
                  </ul>
                </li>
                <li><a href="blog.html" ><a href="./blog.php" class="font_header">Tin tức</a> </a>
                </li>
                <li><a href="./about.php" class="font_header">Giới thiệu</a></li>
                <li><a href="./contact.php" class="font_header">Liên hệ</a></li>
                <li><a href="./admin/login_admin.php" class="font_header">ADMIN</a></li>
              </ul>
            </div>
            <div class="header-action-area">
                <!-- khi đã login -->
                <?php
                if(isset($_SESSION['login_user']) ){
                  $sql = "SELECT * FROM `tbl_user` WHERE user_id=".$_SESSION['user_id'];
                  $ketQuaTruyVan = $conn->query($sql);
                  if($ketQuaTruyVan->num_rows>0){
                    $user = $ketQuaTruyVan->fetch_assoc();
                    $username = $user['user_name'];
                    // $userimg = $ketQuaTruyVan['']
                    ?>
                <div class='header-action-usermenu'>
                <div class='icon-usermenu'><img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRC6iPDSqcgCcAtdEz_rPY0B-sxqMd7hz0Hlg&usqp=CAU' alt='' width='30px' height='30px' style='border-radius:50%;' ></div>
                <span><?=$username?></span>
                <ul class='user-menu'>
                  <li><a href='./account_user.php'>My Account</a></li>
                  <li><a href='./đoi_mat_khau.php'>Change password</a></li>
                  <li><a href='./product_wishlist.php'>Wishlist</a></li>
                  <li><a href='./logout.php'> Đăng xuất</a></li>
                </ul>
              </div> 
              <?php
                  }
                }
                // <!-- Khi chưa login -->
                else{
                ?>
                      <div class='header-action-usermenu' >
                  <div class='icon-usermenu'><i class='fa fa-user-circle-o' aria-hidden='true' style='font-size: 30px;'></i></div>
                  <span>&nbsp&nbsp User</span>
                  <ul class='user-menu'>
                    <li><a href='./login_user.php'>Đăng nhập</a></li>
                    <li><a href='./register.php'>Đăng ký</a></li>
                  </ul>
                </div>
                    <?php
                }
                ?><!-- Khi đã đăng nhập -->


              <div class='header-action-cart'>
                        <?php
                        if(isset($_SESSION['login_user']) && $_SESSION['login_user'] == 1){
                          ?>
                          <a class='cart-icon' href='./cart.php'>
                            <span class="cart-count"><?=$_SESSION["gio_hang"]["tong_so"]?></span>
                            <i class='ti-shopping-cart'></i>
                          </a>
                          <?php
                        }else{
                          ?>
                          <a class='cart-icon' href='#/'>
                            <span class="cart-count">0</span>
                            <i class='ti-shopping-cart'></i>
                          </a>
                          <?php
                        }
                          ?>
                          <?php
                if(isset($_SESSION['login_user']) && $_SESSION['login_user'] == 1){
                  ?>
                    <div class="cart-dropdown-menu">
                        <?php
                        if($_SESSION["gio_hang"]["tong_so"] == 0){
                          ?>
                          <div class="minicart-action">
                          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQvjDt1L5vdIyVa-qJVpE9x97aw6gpV9JbmjQ&usqp=CAU" alt="">
                          <div style="padding-top:20px ;padding-bottom:30px ; text-align:center;">Bạn chưa thêm sản phẩm nào</div>
                        </div>
                          <?php
                        }else{
                          // $i=0;
                          $tong_tien =0;
                        foreach($_SESSION['all_gio_hang'] as $item){
                          // $i++;
                          // if($i ==3){
                          //   break;
                          // }
                      $thanh_tien = $item[6]*$item[2];
                      $tong_tien= $tong_tien+ $thanh_tien;
                      ?>
                       <div class="minicart-action">
                           <div class="minicart-item">
                          <div class="thumb">
                            <img src="./image-product/<?=$item[1]?>" alt="d3ntclothing">
                          </div>
                          <div class="content">
                            <h4 class="title"><a href="#/"><?=$item[3]?> - <?=$item[5]?> / <?=$item[4]?></a></h4>
                            <h6 class="nrbQ">Số lượng: <?=$item[2]?></h6>
                            <p class="price">$<?=$item[6]*$item[2]?></p>
                          </div>
                        </div>
                        <?php
                        }
                        ?>
                        </div>
                        <div class="shopping-cart-total">
                          <h4>Tổng <span>$<?=$tong_tien?></span></h4>
                        </div>
                        <div class="shopping-cart-btn">
                          <a class="btn-theme m-0" href="./cart.php">Vào giỏ hàng</a>
                          <a class="btn-theme m-0" href="./van_chuyen_thanh_toan.php">Thanh toán</a>
                        </div>
                          <?php
                        }
                        ?>
                    </div>
                    <?php
                }
                // <!-- Khi chưa login -->
                else{
                  ?>
                 <div class="cart-dropdown-menu">
                    <div class="cart-notify">
                        <span style="padding-top:20px ;">Bạn chưa đăng nhập</span>
                    </div>
                    <div class="row" >
                        <div class="col-6 cart-mani cart-login"><a href="./login_user.php" style="color: #fff;">Đăng nhập</a></div>
                        <div class="col-6 cart-mani"><a href="./register.php" style="color: #fff;">Đăng ký</a></div>
                    </div>
                </div>
                <?php
                }
                ?>
                
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!--== End Header Wrapper ==-->
  

  <!--== Start Footer Area Wrapper ==-->
  <!-- <footer class="footer-area">
    <div class="footer-main">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="widget-item">
              <h4 class="widget-title">Thông tin giới thiệu</h4>
              <ul class="about-widget">
                <li><p>abcd</p></li>
                <li>Địa chỉ</li>
                <li>Giờ làm việc</li>
                <li>Hotline:</li>
                <li>Email</li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="widget-item widget-menu-item">
              <h4 class="widget-title">Về chúng tôi</h4>
              <nav class="widget-menu-wrap">
                <ul class="nav-menu nav">
                  <li><a href="#">Trang chủ</a></li>
                  <li><a href="#">Giới thiệu</a></li>
                  <li><a href="#">Sản phẩm</a></li>
                  <li><a href="#">Liên hệ</a></li>
                  <li><a href="#">Tin tức</a></li>
                  <li><a href="#">Danh sách yêu thích</a></li>
                </ul>
              </nav>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="widget-item">
              <h4 class="widget-title">Hỗ trợ khách hàng</h4>
              <nav class="widget-menu-wrap">
                <ul class="nav-menu nav">
                  <li><a href="#/">Hướng dẫn mua hàng</a></li>
                  <li><a href="#/">Hướng dẫn thanh toán</a></li>
                  <li><a href="#/">Hướng dẫn nhận hàng</a></li>
                  <li><a href="#/">Điều khoản dịch vụ</a></li>
                </ul>
              </nav>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="widget-item">
              <h4 class="widget-title">Theo dõi chúng tôi trên</h4>
              <p class="mb-0">Theo dõi để cập nhật thông tin dễ dàng</p>
              <ul class="widget-contact-info" style="margin-left: 60px;">
                <li class="info-phone"><a href="#"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTYIpzz09A5HUD5i3UL4Zl7i3jl6BP1f6vaGQ&usqp=CAU" alt="" style="border-radius: 5px" height="30px" width="30px ">&nbsp&nbsp Facebook</a></li>
                <li class="info-mail"><a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Instagram_logo_2022.svg/1200px-Instagram_logo_2022.svg.png"  style="border-radius: 5px" alt="" height="30px" width="30px ">&nbsp&nbsp Instagram</a></li>
                <li class="info-mail"><a href="#"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS4n_urpJ9XpwOTdzBVbGvactwHrPagYQrTJPYjxfxLGkSyu7nJZVqRVGAeohnPgKMrnKE&usqp=CAU"  style="border-radius: 5px" alt="" height="30px" width="30px ">&nbsp&nbsp Twitter</a></li>
                <li class="info-mail"><a href="#"><img src="https://sf-tb-sg.ibytedtos.com/obj/eden-sg/uhtyvueh7nulogpoguhm/tiktok-icon2.png"  style="border-radius: 5px" alt="" height="30px" width="30px ">&nbsp&nbsp Tiktok</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="footer-bottom-content">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="widget-copyright text-center">
                <p>© 2025 - <span>D3NTCLOTHING</span>. Made with <i class="fa fa-heart"></i> by <a target="_blank" href="https://www.hasthemes.com">Nhóm 7</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer> -->
  <!--== End Footer Area Wrapper ==-->
  
  <!--== Scroll Top Button ==-->
  <!-- <div class="scroll-to-top"><span class="fa fa-angle-double-up"></span></div> 
</div>
  </body>

</html> -->

