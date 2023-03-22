<?php
  include 'inc/header.php';
  
?>
<?php
	
	$login_check = Session::get('customer_login'); 
	if($login_check==false){
		header('Location:login.php');
	}
		
?>
<?php

 $id = Session::get('customer_id');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
   
    $UpdateCustomers = $cs->update_customers($_POST, $id);
    
}
?>
  <!-- end nav --> 
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="account-login">
        <div class="page-title">          
          <h2>CẬP NHẬT HỒ SƠ KHÁCH HÀNG</h2>
        </div>
        <form action="" method="post">
			<table class="tblone">
				<tr>
					
						<?php
						if(isset($UpdateCustomers)){
							echo '<td colspan="3">'.$UpdateCustomers.'</td>';
						}
						?>
					
				</tr>
				<?php
				$id = Session::get('customer_id');
				$get_customers = $cs->show_customers($id);
				if($get_customers){
					while($result = $get_customers->fetch_assoc()){

				?>
				<tr>
					<td>Tên khách hàng</td>
					<td>:</td>
					<td><input type="text" name="name" value="<?php echo $result['name'] ?>"></td>
				</tr>
				<!-- <tr>
					<td>City</td>
					<td>:</td>
					<td><input type="text" name="name" value="<?php echo $result['city'] ?>"></td>
					
				</tr> -->
				<tr>
					<td>Số điện thoại</td>
					<td>:</td>
					<td><input type="text" name="phone" value="<?php echo $result['phone'] ?>"></td>
				
				</tr>
			
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><input type="email" name="email" value="<?php echo $result['email'] ?>"></td>
					
				</tr>
				<tr>
					<td>Địa chỉ</td>
					<td>:</td>
					<td><input type="text" name="address" value="<?php echo $result['address'] ?>"></td>
					
				</tr>
				<tr>
					<td colspan="3"><input type="submit" name="save" value="Lưu thông tin"></td>
					
				</tr>
				
				<?php
					}
				}
				?>
			</table>
			</form>
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