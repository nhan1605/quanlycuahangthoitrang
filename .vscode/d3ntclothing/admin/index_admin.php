
<?php
require_once("header_admin.php");

?>
<style>
  .item{
    width: 100%;
    height: 100px;
    background-color: #F7F9FD;
    border-radius: 20px;
    box-shadow: 1px 1px 5px 1px #000;
  }
  .item-body{
    display: flex;
    font-size: 20px;
    justify-content: space-around;
    align-items: center;
    height: 100%;
  }
  .item-icon{
    position: relative;
    padding: 10px;
    text-align: center;
  }
  .item-icon::after{
    content: "";
    position: absolute;
    width: 1px;
    height: 100%;
    left: 0;
    top: 0;
    background-color: #000;
  }
</style>
<!-- nội dung -->
<div class="col-lg-9">
    <!--div Thêm tên -->
    <div class="title_item">TỔNG QUAN</div>
    <div class="scroll">
<!-- <div class="admin_item-content" style=" height:1000px; width:100%; "> -->
    <div class="container" style="padding: 20px;">
        <div class="row">
            <div class="col-3">
                 <div class="item">
                    <div class="item-body">
                      <div class="item-content">
                        <span style="color:#00EE00">Doanh thu</span>
                        <br>
                        <div style="text-align: center;" >20</div>
                      </div>
                      <div class="item-icon" style="    font-size: 40px;"><i class="fa fa-money" aria-hidden="true"></i></div>
                    </div>
                 </div> 
            </div>
            <div class="col-3">
                 <div class="item">
                    <div class="item-body">
                      <div class="item-content">
                        <span style="color:#FF9900">Đơn hàng</span>
                        <br>
                        <div style="text-align: center;" >20</div>
                      </div>
                      <div class="item-icon" style="    font-size: 40px;"><i class="fa fa-shopping-cart" aria-hidden="true"></i></div>
                    </div>
                 </div> 
            </div>
            <div class="col-3">
                 <div class="item">
                    <div class="item-body">
                      <div class="item-content">
                        <span style="color:#0099FF">Bình luận</span>
                        <br>
                        <div style="text-align: center;" >20</div>
                      </div>
                      <div class="item-icon" style="    font-size: 40px;"><i class="fa fa-comments-o" aria-hidden="true"></i></div>
                    </div>
                 </div> 
            </div>
            <div class="col-3">
                 <div class="item">
                    <div class="item-body">
                      <div class="item-content">
                        <span style="color:#FF0033">Lượt xem</span>
                        <br>
                        <div style="text-align: center;" >20</div>
                      </div>
                      <div class="item-icon" style="    font-size: 40px;"><i class="fa fa-street-view" aria-hidden="true"></i></div>
                    </div>
                 </div> 
            </div>
        </div>
    </div>

      </div>
            </div>
        </div>       
      </div>
    </section>
  </main>
<?php
require_once("footer_admin.php")
?>