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
	if(isset($_GET['confirmid'])){
     	$id = $_GET['confirmid'];
     	$time = $_GET['time'];
     	$price = $_GET['price'];
     	$shifted_confirm = $ct->shifted_confirm($id,$time,$price);
    }
?>
<style>
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
          <h2>CHI TIẾT ĐƠN HÀNG CỦA BẠN</h2>
        </div>
        <div class="clear"></div>
    		<div class="box_left">
			<div class="table-responsive">
				<fieldset>
				<table class="data-table cart-table" id="shopping-cart-table">
				<thead>
						<tr class="first last">
							<th >&nbsp;</th>
							<th rowspan="1"><span class="nobr">Tên sản phẩm</span></th>
							<th colspan="1" class="a-center"><span class="nobr">Giá sản phẩm</span></th>
							<th class="a-center" rowspan="1">Số lượng</th>
							<th rowspan="1">Ngày đặt hàng</th>
							<th colspan="1" class="a-center">Trạng thái </th>
							<th class="a-center" rowspan="1">Hành động</th>
							</tr>
				</thead>	
				<tbody>	
							<?php
							$customer_id = Session::get('customer_id');
							$get_cart_ordered = $ct->get_cart_ordered($customer_id);
							if($get_cart_ordered){
								$i = 0;
								$qty = 0;
								$total = 0;
								while($result = $get_cart_ordered->fetch_assoc()){
									$i++;
									$total = $result['price']*$result['quantity'];
							?>
							<tr>
							
								<td><img src="admin/uploads/<?php echo $result['image'] ?>"  height="150px" width="120" alt=""/></td>
								<td><?php echo $result['productName'] ?></td>		
								<td><?php echo $fm->format_currency($result['price'])." "."VNĐ" ?></td>
								<td>
									
										
										<?php echo $result['quantity'] ?>
									
									
								</td>
								<td><?php echo $fm->formatDate($result['date_order']) ?></td>
								<td>
									<?php
									if($result['status']=='0'){
										echo 'Đang chờ';
									}elseif($result['status']==1){ 
									?>
									<span>Đang giao hàng</span>
									
									<?php
									}elseif($result['status']==2){
										echo 'Đã nhận';
									}

									 ?>


								</td>
								<?php
								if($result['status']=='0'){
								?>
								<td><?php echo 'Không thể xoá';?></td>
								<?php
								
								}elseif($result['status']=='1'){
								
								?>
								<td><a class="tblone" href="?confirmid=<?php echo $customer_id ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?>">Xác nhận</a></td>
								<?php
							}else{
								?>
								<td><?php echo 'Hoàn thành'; ?></td>
								<?php
								}	
								?>
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