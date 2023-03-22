<?php
  include 'inc/header.php';
  
?>
<?php
   
   if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
	   
	   $insertCustomers = $cs->insert_customers($_POST);
	   
   }
?>
  <!-- end nav --> 
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="account-login">
        <div class="page-title">
          
          <h2>Đăng kí tài khoản</h2>
        </div>
        <fieldset class="col2-set">
          <legend>Đăng kí tài khoản</legend>
          <div class="col-1 new-users">
		  <?php
    		if(isset($insertCustomers)){
    			echo $insertCustomers;
    		}
    		?>
            <div class="content">

              <form action="" method="post">
              <ul class="form-list">
                <li>
                  <label for="name">Tên khách hàng <span class="required">*</span></label>
                  <br>
                  <input type="text"  class="input-text required-entry"  name="name">
                </li>
				<li>
                  <label for="city">Thành phố </span></label>
                  <br>
                  <input type="text"  class="input-text required-entry "  name="city">
                </li>
				<li>
                  <label for="city">ZipCode</span></label>
                  <br>
                  <input type="text"  class="input-text required-entry "  name="zipcode">
                </li>         
				<li>
                  <label for="email">Email <span class="required">*</span></label>
                  <br>
                  <input type="email"  class="input-text required-entry "  name="email">
                </li>
              </ul>
                       
            </div>
          </div>
          <div class="col-2 registered-users"><strong></strong>
            <div class="content">       
              <ul class="form-list">            
			  <li>
                  <label for="diachi">Địa chỉ  <span class="required">*</span></label>
                  <br>
                  <input type="text"  class="input-text required-entry "  name="address">
                </li>
				
				<li>
                  <label for="phone">Country </span></label>
                  <br>
                  <input type="country"  class="input-text required-entry "  name="country">
                </li>
                  <label for="phone">Số điện thoại <span class="required">*</span></label>
                  <br>
                  <input type="number"  class="input-text required-entry "  name="phone">
                </li>          
				<li>
                  <label for="pass">Password <span class="required">*</span></label>
                  <br>
                  <input type="password" class="input-text required-entry validate-password"  name="password">
                </li>
              </ul>
            
              <p class="required">* Phần bắt buộc</p>
			         <div class="buttons-set">
			 	        <input type="submit" name="submit"  class="button create-account" value="TẠO TÀI KHOẢN">
                 <button onclick="window.location='http://localhost:81/Website_PK%C4%90T/login.php';" class="button create-account" type="button"><span>Đăng nhập</span></button>
     				
              </div>
              
            </div>
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