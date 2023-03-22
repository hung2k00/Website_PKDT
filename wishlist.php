<?php
  include 'inc/header.php';
 
?>
<?php
	 if(isset($_GET['proid'])){
	 	$customer_id = Session::get('customer_id');
         $proid = $_GET['proid']; 
         $delwlist = $product->del_wlist($proid,$customer_id);
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
      <div class="col-main">
        <div class="cart wow">
          <div class="page-title">
            <h2>SẢN PHẨM YÊU THÍCH</h2>
           
          </div>
          <div class="table-responsive">
          <fieldset>
		  <table class="data-table cart-table" id="shopping-cart-table">
		  	<thead>
		
							<tr class="first last">
							
							<th >&nbsp;</th>
							<th rowspan="1"><span class="nobr">Tên sản phẩm</span></th>
							<th colspan="1" class="a-center"><span class="nobr">Giá sản phẩm</span></th>
							<th class="a-center" rowspan="1">Hành động</th>
							<th >&nbsp;</th>
							</tr>
				</thead>
				<tbody>		
        <?php
							$customer_id = Session::get('customer_id');
							$get_wishlist = $product->get_wishlist($customer_id);
							if($get_wishlist){
								$i = 0;
								while($result = $get_wishlist->fetch_assoc()){
									$i++;
							?>
							<tr>
								
								<td><img src="admin/uploads/<?php echo $result['image'] ?>"  height="150px" width="120" alt=""/></td>
								<td><?php echo $result['productName'] ?></td>								
								<td><?php echo $fm->format_currency($result['price'])." "."VNĐ" ?></td>
								<td><a class="tblone" href="product_detail.php?proid=<?php echo $result['productId'] ?>">Mua ngay</a></td>
                <td class="a-center last"><a class="button remove-item" onclick="return confirm('Bạn có muốn xóa không?');" href="?proid=<?php echo $result['productId'] ?>"></a></td>
							</tr>
						<?php
							
							}
						}
						?>
							</tbody>
						</table></div>
        </div>
       
      </div>
      <a class="muahang1" style="text-align: right;" href="index.php"> <img src="images/shop.png" alt=""></a>
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

<!-- Mirrored from htmldemo.magikcommerce.com/ecommerce/inspire-html-template/digital/compare.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Aug 2015 08:05:54 GMT -->
</html>