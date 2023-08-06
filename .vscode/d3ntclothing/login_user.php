<?php
require_once("layout/header.php");
?> 
 
<main class="main-content site-wrapper-reveal">
    <!--== Start Page Title Area ==-->
    <section class="page-title-area" data-bg-img="./image_banner/blog.jpg">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-title-content text-center">
              <h2 class="title text-white">Đăng nhập</h2>
              <div class="bread-crumbs">
                <a href="index.php">Trang chủ
                  <span class="breadcrumb-sep">/</span>
                </a>
                <span class="active">Đăng nhập</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Page Title Area ==-->

    <!--== Start Contact Area ==-->
    <section class="account-login-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 m-auto">
            <div class="login-form">
              <form class="login-form-wrapper form" id="login-form" action="login_user_thuc_hien.php" method="post">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="section-title text-center">
                      <h2 class="title">Đăng nhập</h2>
                      <p>Vui lòng đăng nhập bằng tài khoản chi tiết dưới đây.</p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="row">
                      <div class="col-md-12">
                      <div class="form-group">
                          <label >Email</label>
                          <input class="form-control email" name="email" type="text" placeholder="Email">
                          <span class="form-massage"></span>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group mb-0" style="position: relative;">
                          <label for="">Mật khẩu</label>
                          <input class="form-control password"  name="password" type="password" placeholder="Mật khẩu">
                          <span class="show-btn">
                            <div style="position: absolute; top:50%; right:5%; font-size:20px;">
                              <i class="fa fa-eye " aria-hidden="true"></i>
                            <i class="fa fa-eye-slash  d-none"  aria-hidden="true"></i>
                            </div>
                          </span>
                          <span class="form-massage"></span>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group mb-0 form-group-info">
                          <button class="btn btn-theme" type="submit">ĐĂNG NHẬP</button>
                          <a class="btn-forgot" href="./quen_mat_khau.php">Quên mật khẩu</a>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group mb-0">
                          <a class="btn-create" href="./register.php">Tạo tài khoản?</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <!-- Message Notification -->

          </div>
        </div>
      </div>
    </section>
    <!--== End Contact Area ==-->
  </main>
  <?php
require_once("./layout/footer.php");
?>
<script >
  var email = document.querySelector(".email")
var passWord = document.querySelector(".password")
var submit = document.querySelector(".submit")
var form =document.querySelector(".form")


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
form.onsubmit = function(e){
   let a =  checkEmpty([email,passWord]);
    if(a==false){
         e.preventDefault();  
    }else{
        let b = checkPass(passWord);   
            let d = checkEmail(email);
            if(b== false ||d == false ){
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
function checkRePass(passWord,repassword){
    var isEmpty = true;
    if(repassword.value == passWord.value){
        success(rePassWord);
        isEmpty =   true;
    }
    else{
        error(rePassWord,"Mật khẩu nhập lại không đúng!");
        isEmpty=  false;

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