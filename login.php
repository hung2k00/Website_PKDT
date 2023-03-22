<?php
  include 'inc/header.php';
  
?>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
        
        $login_Customers = $cs->login_customers($_POST);
        
    }
?>
  <!-- end nav --> 
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="account-login">
        <div class="page-title">
          
          <h2>Đăng nhập hoặc tạo tài khoản</h2>
        </div>
        <fieldset class="col2-set">
          <legend>Đăng nhập hoặc tạo tài khoản</legend>
          <div class="col-1 new-users"><strong>ĐĂNG KÍ</strong>
            <div class="content">
              <p>Bằng cách tạo tài khoản với cửa hàng của chúng tôi, bạn sẽ có thể thực hiện quy trình thanh toán nhanh hơn, lưu trữ nhiều địa chỉ giao hàng, xem và theo dõi đơn đặt hàng trong tài khoản của bạn và hơn thế nữa.</p>
              <div class="buttons-set">
                <button onclick="window.location='http://localhost:81/Website_PK%C4%90T/register.php';" class="button create-account" type="button"><span>TẠO TÀI KHOẢN</span></button>
              </div>            
            </div>
          </div>
          <div class="col-2 registered-users"><strong>ĐĂNG NHẬP</strong>
            <div class="content">
              <p>Nếu bạn đã có tài khoản, vui lòng đăng nhập</p>
              <ul class="form-list">
              <?php
              if(isset($login_Customers)){
                  echo $login_Customers;
                }       
                  ?>
              <form action="" method="post">
                <li>
                  <label for="email">Email <span class="required">*</span></label>
                  <br>
                  <input type="email"  class="input-text required-entry"  name="email" >
                </li>
                <li>
                  <label for="pass">Password <span class="required">*</span></label>
                  <br>
                  <input type="password" class="input-text required-entry validate-password"  name="password">
                </li>
              </ul>        
              <p class="required">* Phần bắt buộc</p>
              <div class="buttons-set">            
                <div id="send2"><div><input type="submit" name="login" class="button login" value="Đăng nhập"></div></div>     
                <a class="forgot-word" href="http://demo.magentomagik.com/computerstore/customer/account/forgotpassword/">Quên mật khẩu?</a> </div>
            </div>
            </form>
          </div>
        </fieldset>
      </div>
      <br>
      <br>
      <br>
      <br>
      <br>
    </div>
  </section>
  <!-- Footer -->
  <?php
  include 'inc/footer.php';
?>
  <!-- End Footer --> 
</div>
<div class="social">
  <ul>
    <li class="fb"><a href="#"></a></li>
    <li class="tw"><a href="#"></a></li>
    <li class="googleplus"><a href="#"></a></li>
    <li class="rss"><a href="#"></a></li>
    <li class="pintrest"><a href="#"></a></li>
    <li class="linkedin"><a href="#"></a></li>
    <li class="youtube"><a href="#"></a></li>
  </ul>
</div>

<!-- JavaScript --> 
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
</body>

<!-- Mirrored from htmldemo.magikcommerce.com/ecommerce/inspire-html-template/digital/login.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Aug 2015 08:05:17 GMT -->
</html>