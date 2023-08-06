<?php
require_once("./layout/header.php");
?>

<main class="main-content site-wrapper-reveal">
    <!--== Start Page Title Area ==-->
    <section class="page-title-area" data-bg-img="./image_banner/blog.jpg">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-title-content text-center">
              <h2 class="title text-white">Đăng ký</h2>
              <div class="bread-crumbs">
                <a href="index.php">Trang chủ
                  <span class="breadcrumb-sep">/</span>
                </a>
                <span class="active">Đăng ký</span>
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
              <form class="login-form-wrapper form" id="login-form" action="./register_thuc_hien.php" method="post">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="section-title text-center">
                      <h2 class="title">Đăng ký</h2>
                      
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="row">
                          <?php 
                        $sql = "SELECT email FROM tbl_user";
                        $ketQuaTruyVan = mysqli_query($conn,$sql);
                        if($ketQuaTruyVan->num_rows >0)
                        {   
                            while($trangThai = $ketQuaTruyVan->fetch_assoc())
                            {
                            echo "<input class='form-control emailed' type='hidden' value='".$trangThai['email']."'>";
                            }
                        }
                        ?>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label >Email</label>
                          <input class="form-control email" name="email" type="text" placeholder="Email">
                          <span class="form-massage"></span>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group mb-0">
                          <label>Họ và tên</label>
                          <input class="form-control name" name="name" type="text" placeholder="Họ và tên">
                          <span class="form-massage"></span>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group mb-0" style="position: relative;">
                          <label for="">Mật khẩu</label>
                          <input class="form-control password" name="password" type="password" placeholder="Mật khẩu">
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
                        <div class="form-group mb-0" style="position: relative;">
                          <label for="">Nhập lại mật khẩu</label>
                          <input class="form-control repassword" type="password" placeholder="Nhập lại mật khẩu">
                          <span class="show-btn">
                            <div style="position: absolute; top:50%; right:5%; font-size:20px;">
                                <i class="fa fa-eye re" aria-hidden="true"></i>
                              <i class="fa fa-eye-slash reslash d-none"  aria-hidden="true"></i>
                            </div>
                          </span>
                          <span class="form-massage"></span>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group mb-0">
                          <label for="">Số điện thoại</label>
                          <input class="form-control phone" name="phone" type="text" placeholder="Số điện thoại">
                          <span class="form-massage"></span>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group mb-0">
                          <label for="">Ngày sinh</label>
                          <input class="form-control birthday" name="birthday" type="date" placeholder="Ngày sinh">
                          <span class="form-massage"></span>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="row">
                          <!-- Tỉnh -->
                          <div class="col-md-4">
                        <div class="form-group mb-0">
                          <label for="">Tỉnh</label>
                          <select class="form-select form-select-sm mb-3 city" name="city" id="city" aria-label=".form-select-sm">
                              <option value="" selected>Chọn tỉnh thành</option>           
                          </select>
                          <span class="form-massage"></span>
                          <input type="hidden" class="city1">
                        </div>
                        </div>
                        <!-- Huyện -->
                        <div class="col-md-4">
                        <div class="form-group mb-0">
                          <label for="">Huyện</label>
                          <select class="form-select form-select-sm mb-3 district" name="district" id="district" aria-label=".form-select-sm">
                            <option value="" selected>Chọn quận huyện</option>
                          </select>
                          <span class="form-massage"></span>
                          <input type="hidden" class="district1">
                        </div>
                        </div>
                        <!-- Xã -->
                        <div class="col-md-4">
                        <div class="form-group mb-0">
                          <label for="">Xã</label>
                          
                          <select class="form-select form-select-sm ward" name="ward" id="ward" aria-label=".form-select-sm">
                              <option value="" selected>Chọn phường xã</option>
                          </select>
                          <span class="form-massage"></span>
                          <input type="hidden" class="ward1">
                        </div>
                        </div>
                      </div>
                      </div>
                         <div class="col-md-12">
                          <div class="form-group mb-0">
                          <label for="">Địa chỉ cụ thể</label>
                          <input class="form-control specific_location" name="specific_location" type="text" placeholder="Địa chỉ cụ thể">
                          <span class="form-massage"></span>
                        </div>
                      </div>


                      <div class="col-md-12">
                        <div class="form-group mb-0 form-group-info">
                          <button class="btn btn-theme" type="submit">ĐĂNG KÝ</button>
                        
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
<script src="./layout/log.js"></script>
<script>
            var citis = document.getElementById("city");
          var districts = document.getElementById("district");
          var wards = document.getElementById("ward");
          var city1 = document.querySelector(".city1");
          var district1 = document.querySelector(".district1");
          var ward1 = document.querySelector(".ward1");

        function validateSelectBox(obj)
{
    // Lấy danh sách các options
    var options = obj.children;
 
    // Biến lưu trữ các chuyên mục đa chọn
    var html = '';
 
    // lặp qua từng option và kiểm tra thuộc tính selected
    for (var i = 0; i < options.length; i++){
        if (options[i].selected){
            html += '<li>'+options[i].value+'</li>';
        }
    }
 
    // Gán kết quả vào div#result
    document.getElementById('result').innerHTML = html;
}


        var Parameter = {
          url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json", 
          method: "GET", 
          responseType: "application/json", 
        };
        var promise = axios(Parameter);
        promise.then(function (result) {
          renderCity(result.data);
        });
        
        function renderCity(data) {
          for (const x of data) {
            citis.options[citis.options.length] = new Option(x.Name, x.Name);
        }
            citis.onchange = function () {
              console.log(this.value)
                district.length = 1;
                ward.length = 1;
                if(this.value != ""){
                city1.value= (this.value)
              const result = data.filter((n) => n.Name === this.value);
              console.log(result)
              for (const k of result[0].Districts) {
                district.options[district.options.length] = new Option(k.Name, k.Name);
              }
            }
          };
          district.onchange = function () {
            ward.length = 1;
            const dataCity = data.filter((n) => n.Name === citis.value);
            if (this.value != "") {
                district1.value= (this.value)
              const dataWards = dataCity[0].Districts.filter(n => n.Name === this.value)[0].Wards;
        
              for (const w of dataWards) {
                wards.options[wards.options.length] = new Option(w.Name, w.Name);
              }
            }
          };
          ward.onchange = function () {
            const dataDistrict = data.filter((n) => n.Id === districts.value);
            if (this.value != "") {
                ward1.value= (this.value)
            }
          };
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

var re = document.querySelector('.re');
var reSlash = document.querySelector('.reslash');

        re.onclick = function(){
    re.classList.add('d-none');
    reSlash.classList.remove('d-none');
    rePassWord.type='text'
}
reSlash.onclick = function(){
    reSlash.classList.add('d-none');
    re.classList.remove('d-none');
    rePassWord.type='password';
}
            </script>