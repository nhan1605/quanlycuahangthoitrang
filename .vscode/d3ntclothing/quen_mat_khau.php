<?php
require_once("./layout/header.php");
?>

<main class="main-content site-wrapper-reveal">
    <!--== Start Page Title Area ==-->
    <section class="page-title-area" data-bg-img="assets/img/photos/bg-page-title.webp">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-title-content text-center">
              <h2 class="title text-white">Quên mật khẩu</h2>
              <div class="bread-crumbs">
                <a href="index.php">Trang chủ
                  <span class="breadcrumb-sep">/</span>
                </a>
                <span class="active">Quên mật khẩu</span>
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
              <form class="login-form-wrapper form" id="login-form" action="./khach_hang_quen_mat_khau_thuc_hien.php" method="post">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="section-title text-center">
                      <h2 class="title">Lấy lại mật khẩu</h2>
                    </div>
                  </div>
                </div>
               <div class="row">
                  <div class="col-lg-12">
                    <div class="row">
                    <?php 
                        $sql = "SELECT email FROM tbl_user";
                        $user = mysqli_query($conn,$sql);
                        if($user->num_rows >0)  
                        {   
                            while($trangThai = $user->fetch_assoc())
                            {
                            echo "<input class='form-control emailed' name='email' type='hidden' value='".$trangThai['email']."'>";
                            }
                        }
                        ?>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label >Tên đăng nhập</label>
                          <input class="form-control email" name="email" type="text" placeholder="Tên đăng nhập" required="" name="name" id="name"/>
                          <span class="form-massage"></span>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group mb-0">
                          <label>Mật khẩu cũ</label>
                          <input class="form-control name" name="name" type="text"  placeholder="Mật khẩu cũ" required="" name="password" id="password"/>
                          <span class="form-massage"></span>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group mb-0">
                          <label for="">Mật khẩu mới</label>
                          <input class="form-control password" name="password" type="password" placeholder="Mật khẩu mới " required="" name="txtPassword" id="txtPassword"/>
                          <span class="form-massage"></span>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group mb-0">
                          <label for="">Nhập lại mật khẩu mới</label>
                          <input class="form-control repassword" type="password" placeholder="Nhập lại mật khẩu mới" required="" name="txtRePassword" id="txtRePassword"/>
                          <span class="form-massage"></span>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group mb-0 form-group-info">
                        <input type="hidden" name="txtID" value="<?php echo $row['user_id'];?>"><button class="btn btn-theme" type="submit">Đổi mật khẩu</button>
                        
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
require_once("../d3ntclothing/layout/footer.php");
?>