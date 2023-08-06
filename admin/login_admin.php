<?php
require_once('../connect/connect.php');
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
        margin-left: -15px;
        padding: 20px;
        text-align: center;
        background-color: aliceblue;
        font-size: 30px;
        font-weight: 800;
        color: red;
      }
      .scroll{
        height: 700px;
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
                      <!-- <div class="header-action-usermenu">
                        <div class="icon-usermenu"><img src="" alt="" width="30px" height="30px" style="border-radius:50%;" ></div>
                        <span>&nbsp&nbsp Nguyễn Mạnh Đat</span>
                        <ul class="user-menu">
                          <li><a href="account.html">My Account</a></li>
                          <li><a href="shop-wishlist.html">Wishlist</a></li>
                          <li><a href="about.html">About Us</a></li>
                          <li><a href="contact.html">Contact Us</a></li>
                          <li><a href="blog.html">Blog</a></li>
                          <li><a href="login.html">Login</a></li>
                        </ul>
                      </div> --> 
                      <!-- Khi chưa login -->
                      <div class="header-action-usermenu">
                        <div class="icon-usermenu"><i class="fa fa-user-circle-o" aria-hidden="true" style="font-size: 30px;"></i></div>
                         <span>&nbsp&nbsp ADMIN</span>
                        <ul class="user-menu">
                          <li><a href="./login_admin.php">Đăng nhập</a></li>
                        </ul>
                      </div>
                      
                     
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </header>
       
    <!-- End header.php -->
    
  <main class="main-content site-wrapper-reveal">

    <!--== Start Contact Area ==-->
    <section class="account-login-area">
      <div class="container" >
        <div class="row">
          <div class="col-lg-6 m-auto">
            <div class="login-form" style="margin:45px 0px;">
              <form class="login-form-wrapper" id="login-form" action="./login_thuc_hien.php" method="post">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="section-title text-center">
                    <div class="icon-usermenu"><i class="fa fa-user-circle-o" aria-hidden="true" style="font-size: 60px;"></i></div>
                      <h2 class="title">Đăng nhập trang quản lý</h2>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <input class="form-control email" name="email" type="email" placeholder="Email">
                          <span class="form-massage"></span>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group mb-0" style="position: relative;">
                          <input class="form-control password" name="password" type="password" placeholder="Password" >
                          <span class="show-btn">
                            <div style="position: absolute; top:0; right:5%; font-size:20px;">
                                <i class="fa fa-eye " aria-hidden="true"></i>
                              <i class="fa fa-eye-slash  d-none"  aria-hidden="true"></i>
                            </div>
                          </span>
                          <span class="form-massage"></span>
                        </div>
                      </div>
                      <div class="col-md-12" style="width: 100%; text-align: center;">
                        <div class="form-group mb-0 form-group-info">
                          <button class="btn btn-theme"  type="submit">SIGN IN</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <!-- Message Notification -->
            <div class="form-message"></div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Contact Area ==-->
  </main>

<?php
require_once("footer_admin.php")
?>
<script>
    var email = document.querySelector('.email');
    var passWord = document.querySelector('.password');
    var loginForm = document.querySelector('#login-form');

    // lỗi
function error(input,message){
    var parent = input.parentElement;
    var small = parent.querySelector('.form-massage');
    small.innerHTML = message;
}
function success(input){
    var parent = input.parentElement;
    var small = parent.querySelector('.form-massage');
    small.innerHTML = '';
}
// click button
loginForm.onsubmit = function(e){

   let a =  checkEmpty([email,passWord]);
    if(a==false){
         e.preventDefault();  
    }else{
        let b = checkPass(passWord);   
        let c = checkEmail(email);
            if(b== false|| c== false){
                e.preventDefault();      
            }
    }                   
        }

function checkEmpty(listInput){
    var isEmpty = true;
    listInput.forEach(input => {
        if(input.value.trim() == ""){
            error(input,'Không được để trống');
            isEmpty=  false;
        }else{
            success(input);
            isEmpty =   true;
        }
    });
    return  isEmpty;
}
//
function checkPass(input){
    var isEmpty = true;
    if(input.value.length < 6){
        error(input,'Mật khẩu phải lớn hơn 6 kí tự');
        isEmpty=  false;

    }else{
        success(input);
        isEmpty =   true;
    }
    return  isEmpty;
}
function checkEmail(email){
    var isEmpty = true;
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
   if(!filter.test(email.value)){
    error(email,'Vui lòng nhập đúng email!');
    isEmpty=  false;
   }else{
    success(email)
    isEmpty =   true;
   }
   return  isEmpty;
}

var eye = document.querySelector('.fa-eye');
var eyeSlash = document.querySelector('.fa-eye-slash');

eye.onclick = function(){
    eye.classList.add('d-none');
    eyeSlash.classList.remove('d-none');
    passWord.type='text'
}
eyeSlash.onclick = function(){
    eyeSlash.classList.add('d-none');
    eye.classList.remove('d-none');
    passWord.type='password';
}

</script>