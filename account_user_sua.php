<?php
require_once("./layout/header.php");
?>
<style>
 table {
    border: none;
  }

  #customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 70%;
    font-size: 16px;
    height: -10%;
    border-collapse: collapse;


  }

  #customers td,
  #customers th {
    border: 1px solid #ddd;
    padding: 10px;
    border: none;
  }

  #customers th {
    padding-top: 20px;
    padding-bottom: 22px;
    text-align: left;
    height: 30px;
    background-color: #7FAD39;
    color: white;
    border: none;
  }

  input[type=texts],
  select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    height: 20px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  }
  input[type=location],
  select {
    width: 32%;
    padding: 12px 20px;
    margin: 8px 0;
    height: 20px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  }

  input[type=password],
  select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    height: 30px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  }

  #td1 {
    font-weight: bold;
    font-size: 20px;
  }
  .container{
    padding-top: 40px;
  }
</style>
<main class="main-content site-wrapper-reveal">
    <!--== Start Page Title Area ==-->
    <section class="page-title-area" data-bg-img="assets/img/photos/bg-page-title.webp">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-title-content text-center">
              <h2 class="title text-white">Quản lý tài khoản của bạn</h2>
              <div class="bread-crumbs">
                <a href="index.php">Trang chủ
                  <span class="breadcrumb-sep">/</span>
                </a>
                <span class="active">My account</span>
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

    <div class="checkout__form">
      <center>
      <div class="img_user">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTYmkp9a2rrD1Sskb9HLt5mDaTt4QaIs8CcBg&amp;usqp=CAU"  alt="">
                  <?php
                if(isset($_SESSION['login_user']) && $_SESSION['login_user'] == 1){
                    echo "<h1 style='text-align:center;'>ID:".$_SESSION['user_id']."</h1>";?>
              </div>
      </center>
      <?php
                    $sql = "SELECT * FROM `tbl_user` WHERE user_id=".$_SESSION['user_id'];
                  $ketQuaTruyVan = $conn->query($sql);
                  if($ketQuaTruyVan->num_rows>0){
                    $user = $ketQuaTruyVan->fetch_assoc();
                    ?>
      <form action="./account_user_thuc_hien_sua.php" method="post">
        <div class="srow">
          <center>
            <table id="customers">
                  <tr>
                    <td id="td1">Email</td>
                    <td></td>
                    <td>
                      <input type="texts" name="name" value="<?=$user['email']?>">
                      <input type="hidden" name="password" value="<?=$user['password']?>">
                      <input type="hidden" name="user_id" value="<?=$user['user_id']?>">
                    </td>

                  </tr>

                  <tr>
                    <td id="td1">Tên khách hàng </td>
                    <td></td>
                    <td><input type="texts" name="email" value="<?=$user['user_name']?>"></td>

                  </tr>
                  <tr>
                    <td id="td1">Số điện thoại </td>
                    <td></td>
                    <td><input type="texts" name="phone" value="<?=$user['phone']?>"></td>

                  </tr>
                  <tr>
                    <td id="td1">Ngày sinh</td>
                    <td></td>
                    <td><input type="texts" name="birthday" value="<?=$user['birthday']?>"></td>

                  </tr>
                  <tr>
                    <td id="td1">Địa chỉ </td>
                    <td></td>
                    <td>
                        <select class="form-select form-select-sm mb-3 ward" name="ward" id="ward" aria-label=".form-select-sm">
                              <option value="<?=$user['ward']?>" selected><?=$user['ward']?></option>           
                          </select>
                          <input type="hidden" class="ward1">
                          <select class="form-select form-select-sm mb-3 district" name="district" id="district" aria-label=".form-select-sm">
                            <option value="<?=$user['district']?>" selected><?=$user['district']?></option>
                          </select>
                          <input type="hidden" class="district1">
                          <select class="form-select form-select-sm city" name="city" id="city" aria-label=".form-select-sm">
                              <option value="<?=$user['city']?>" selected><?=$user['city']?></option>
                          </select>
                          <input type="hidden" class="city1">
                    </td>

                  </tr>
                  <tr>
                    <td id="td1">Địa chỉ cụ thể </td>
                    <td></td>
                    <td><input type="texts" name="specific_location" value="<?=$user['specific_location']?>"></td>

                  </tr>
            </table>
          </center>
        </div>
        <?php
                }
              }
                ?>

        <center><button type="submit" style="  background-color: #4CAF50; /* Green */
                                    font-weight: bold;
                                    border: none;
                                    color: white;
                                    padding: 10px 20px;
                                    text-align: center;
                                    text-decoration: none;
                                    font-size: 18px;" name="submit">Cập nhật</button></center>
      </form>
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
            </script>