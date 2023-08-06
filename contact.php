<?php
require_once("./layout/header.php");
?>
 
<main class="main-content site-wrapper-reveal">
    <!--== Start Page Title Area ==-->
    <section class="page-title-area" data-bg-img="./image_banner/contact.png">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-title-content text-center">
              <h2 class="title text-white">Liên hệ</h2>
              <div class="bread-crumbs">
                <a href="index.php">Trang chủ
                  <span class="breadcrumb-sep">/</span>
                </a>
                <span class="active">Liên hệ</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Page Title Area ==-->

    <!--== Start Contact Area ==-->
    <section class="contact-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="contact-form">
              <form class="contact-form-wrapper"  action="./contact_add.php" method="post">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="section-title">
                      <h2 class="title">Để lại lời nhắn cho chúng tôi</h2>
                      
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <input class="form-control" type="text" name="name" placeholder="Tên của bạn *">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <input class="form-control" type="email" name="email" placeholder="Email *">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <input class="form-control" type="text" name="title" placeholder="Chủ đề">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group mb-0">
                          <textarea class="form-control textarea" name="content" placeholder="Nhập tin nhắn của bạn dưới đây"></textarea>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group mb-0">
                          <button class="btn btn-theme" type="submit">Gửi tin nhắn</button>
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
          <div class="col-lg-6">
            <div class="row">
              <div class="col-lg-12">
                <div class="section-title mt-md-30">
                  <h2 class="title">Địa chỉ liên hệ</h2>
                  
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="contact-info-content">
                  <div class="contact-info-item">
                    <div class="content">
                      <h4>Dịa chỉ </h4>
                      <p>Ngõ 12, Chùa Bộc, Đống Đa, Hà Nội</p>
                    </div>
                  </div>
                  <div class="contact-info-item">
                    <div class="content">
                      <h4>Liên hệ</h4>
                      <p> <a href="tel:01234 567 890">0981486775</a> 
                    </div>
                  </div>
                  <div class="contact-info-item mb-0 pb-0">
                    <div class="content">
                      <h4>Web Address</h4>
                      <p><a href="email:d3ntclothing@gmail.com">d3ntclothing@gmail.com</a> <br>www.d3ntclothing.com</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="contact-map-area pt-80">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.601945382976!2d105.8262388147546!3d21.008587493842928!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac8041a9648d%3A0xe487dd495fdfd676!2zMTIgUC4gQ2jDuWEgQuG7mWMsIFRydW5nIExp4buHdCwgxJDhu5FuZyDEkGEsIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1672673096647!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Contact Area ==-->
  </main>
  <?php
require_once("./layout/footer.php");
?>