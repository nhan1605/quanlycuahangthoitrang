<?php
require_once('../connect/connect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>D3NTCLOTHING - ADMIN</title>

    <!--== Favicon ==-->
    <link rel="shortcut icon" href="../image_banner/favicon.png" type="image/x-icon" />

    <!--== Google Fonts ==-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,400i,500,600,700" rel="stylesheet">

    <!--== Bootstrap CSS ==-->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet"/>
    <!--== Themify Icons CSS ==-->
    <link href="../assets/css/themify-icons.css" rel="stylesheet"/>
    <!--== Font-awesome Icons CSS ==-->
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet"/>
    <!--== Ionicons CSS ==-->
    <link href="../assets/css/ionicons.min.css" rel="stylesheet"/>
    <!--== Animate CSS ==-->
    <link href="../assets/css/animate.css" rel="stylesheet"/>
    <!--== Aos CSS ==-->
    <link href="../assets/css/aos.css" rel="stylesheet"/>
    <!--== FancyBox CSS ==-->
    <link href="../assets/css/jquery.fancybox.min.css" rel="stylesheet"/>
    <!--== Slicknav CSS ==-->
    <link href="../assets/css/slicknav.css" rel="stylesheet"/>
    <!--== Swiper CSS ==-->
    <link href="../assets/css/swiper.min.css" rel="stylesheet"/>
    <!--== Main Style CSS ==-->
    <link href="../assets/css/style.css" rel="stylesheet" />

    <!-- Modal css -->
    <link rel="stylesheet" href="./modal.css">
    <script src="ckeditor/ckeditor.js"></script>
    <style>
      .ad_onclick{
        padding-left: 20px;
      }
      .admin_click{
        cursor: pointer;
      }
      .admin_item{
        padding: 10px;
        border-bottom: 1px solid rgb(206, 206, 206);
      }
      .admin_item:hover{
        background-color: antiquewhite;

      }
      .admin_text{
        color: #000;
      }
      .ad_click_item{
        padding: 8px;
        border-bottom: 1px solid rgb(206, 206, 206);
      }
      .title_item{
        font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        margin-left: -15px;
        padding: 20px;
        text-align: center;
        background-color: aliceblue;
        font-size: 30px;
        font-weight: 800;
        color: red;
      }
      .scroll{
        height: 420px;
        overflow: scroll;
      }
      .table-bordered{
        border: 1px solid #888;
      }
      .order_customer{
        margin: 20px;
        padding: 10px;
        text-align: center;
        font-size: 20px;
        border-top: 1px solid #888;
        font-weight: 800;
      }
      .form-massage{
        float: right;
    color: red;
}
    </style>
</head>
<body>
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
          <header class="header-area header-default sticky-header" style="background-color: antiquewhite;">
            <div class="container">
              <div class="row align-items-center">
                <div class="col-5 col-sm-3 col-md-3 col-lg-2 pr-0">
                  <div class="header-logo-area">
                    <a href="index.html">
                      <img class="logo-main" src="../image_banner/logo.jpg" alt="Logo" />
                      <img class="logo-light" src="../image_banner/logo.jpg" alt="Logo" />
                    </a>
                  </div>
                </div>
                <div class="col-7 col-sm-9 col-md-9 col-lg-10">
                  <div class="header-align">
                    <div class="header-navigation-area">
                      <span>XIN CHÀO</span>
                    </div>
                    <div class="header-action-area">
                        <!-- khi đã login -->
                       <?php if(isset($_SESSION['login']) && $_SESSION['login'] ==1){
                      echo " <div class='header-action-usermenu'>
                        <div class='icon-usermenu'><img src='./image/logined.jpg' alt='' width='40px' height='40px' style='border-radius:50%;' ></div>
                        <span>&nbsp&nbsp ".$_SESSION['admin_name']."</span>
                        <ul class='user-menu'>
                          <li><a href='./logout_admin.php'>Đăng xuất</a></li>
                        </ul>
                      </div> ";
                       }else { 
                        // <!-- Khi chưa login -->
                        echo "
                        <div class='header-action-usermenu'>
                        <div class='icon-usermenu'><i class='fa fa-user-circle-o' aria-hidden='true' style='font-size: 30px;'></i></div>
                         <span>&nbsp&nbsp ADMIN</span>
                        <ul class='user-menu'>
                          <li><a href='./login_admin.php'>Đăng nhập</a></li>
                        </ul>
                      </div> ";
                       }
                       ?> 
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </header>
        <!--== End Header  ==-->
        <main class="main-content" style="background-color: #fff;min-height: 500px;">
          <section class="product-area product-grid-area" style="padding: 0;">
            <div class="container">
              <div class="row">
                <!-- slide-bar -->
                <div class="col-lg-3" style="background-color: rgb(245, 245, 245); padding-top: 20px;">
                  <div class="widget-item">
                    <ul class="about-widget">
                      <li class="admin_item ad_over" ><a class="admin_text" href="./index_admin.php"> Tổng quan</a></li>
                      <li class="admin_click admin_item" data-bs-toggle="collapse" data-bs-target="#order">Đơn hàng
                        <div  class="collapse" id="order" style="float: right;"> <i class="fa fa-angle-down" aria-hidden="true"></i></div>
                        <div class="collapse show" id="order" style="float: right;" > <i class="fa fa-angle-right" aria-hidden="true"></i></div>  
                      </li>
                        <ul class="ad_order_click ad_onclick collapse" id="order">
                          <li class="ad_click_item" ><a class="admin_text" href="./invoice_list.php">Danh sách đơn hàng</a> </li>
                          <li class="ad_click_item"><a class="admin_text" href="./invoice_list_success.php">Danh sách đơn hàng thành công</a></li>
                        </ul>
                      <li class="admin_click admin_item" data-bs-toggle="collapse" data-bs-target="#product">Quản lý sản phẩm
                        <div class="collapse" id="product" style="float: right;"> <i class="fa fa-angle-down" aria-hidden="true"></i></div>
                        <div class="collapse show" id="product" style="float: right;" > <i class="fa fa-angle-right" aria-hidden="true"></i></div>
                      </li> 
                      <ul class="ad_product_click ad_onclick collapse" id="product">
                          <li class="ad_click_item"><a class="admin_text" href="./list_product.php">Danh sách sản phẩm</a> </li>
                          <li class="ad_click_item"><a class="admin_text" href="./brand_admin.php"> Thương hiệu</a> </li>
                          <li class="ad_click_item"><a class="admin_text" href="./category_admin.php">Loại hàng</a> </li>                    
                        </ul>
                      <li class="admin_item ad_customer"><a class="admin_text" href="./customer_admin.php"> Khách hàng</a></li>
                      <li class="admin_item ad_promotion"><a class="admin_text" href="./voucher_list.php"> Khuyến mãi</a></li>
                      <li class="admin_item ad_promotion"><a class="admin_text" href="./blog_list.php"> Tin tức</a></li>
                      <li class="admin_item ad_admin"><a class="admin_text" href="./admin_list.php">Danh sách nhân viên</a> </li>
                      <li class="admin_item ad_admin"><a class="admin_text" href="./contact_admin.php">Liên hệ của khách hàng</a></li>
                    </ul>          
                  </div>
                </div>
    <!-- End header.php -->