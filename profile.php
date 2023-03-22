<?php
  include 'inc/header.php';
  
?>
<?php
	
	$login_check = Session::get('customer_login'); 
	if($login_check==false){
		header('Location:login.php');
	}
		
?>
<style>
fieldset{
  border: 2px #eaeaea solid;
}
a.tblone
{
  font-size:15px;
  color: #fe5800;
  font-weight: bold;
}
a.muahang1 {
	float: right;
  padding: 10px 20px;
  border: none;						   
	color: #fff;
  cursor: pointer;
						}
		


</style>
  <!-- end nav --> 
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="account-login">
        <div class="page-title">          
          <h2>HỒ SƠ KHÁCH HÀNG</h2>
        </div>
		<div class="table-responsive">
          <fieldset>
        <table class="tblone">
				<?php
				$id = Session::get('customer_id');
				$get_customers = $cs->show_customers($id);
				if($get_customers){
					while($result = $get_customers->fetch_assoc()){

				?>
				<tbody>	
				<tr>
					<td>Tên khách hàng</td>
					<td>:</td>
					<td><?php echo $result['name'] ?></td>
				</tr>
				<tr>
					<td>Thành phố</td>
					<td>:</td>
					<td><?php echo $result['city'] ?></td>
				</tr>
				<tr>
					<td>Số điện thoại</td>
					<td>:</td>
					<td><?php echo $result['phone'] ?></td>
				</tr>
				
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><?php echo $result['email'] ?></td>
				</tr>
				<tr>
					<td>Địa chỉ</td>
					<td>:</td>
					<td><?php echo $result['address'] ?></td>
				</tr>
				<tr>
					<td colspan="3"><a class="tblone" href="editprofile.php">Cập nhật hồ sơ</a></td>
					
				</tr>
				
				<?php
					}
				}
				?>
					</tbody>
			</table>
			</div>
			<a class="muahang1" style="text-align: right;" href="index.php"> <img src="images/shop.png" alt=""></a>
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