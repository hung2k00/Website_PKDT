<?php
  include 'inc/header.php';

?>
?>
<?php
	
	$login_check = Session::get('customer_login'); 
	if($login_check==false){
		header('Location:login.php');
	}
		
?>
<?php
	if(isset($_GET['cartid'])){
        $cartid = $_GET['cartid']; 
        $delcart = $ct->del_product_cart($cartid);
    }
 	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
 		$cartId = $_POST['cartId'];
        $quantity = $_POST['quantity'];
        $update_quantity_cart = $ct->update_quantity_cart($quantity, $cartId);
        if($quantity<=0){
        	$delcart = $ct->del_product_cart($cartId);
        }
    }
?>
<?php
	if(!isset($_GET['id'])){
		echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
	}
?>
  <!-- end nav -->
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="cart wow">
          <div class="page-title">
            <br>
            <h2>Giỏ hàng</h2>
            <?php
			    	 if(isset($update_quantity_cart)){
			    	 	echo $update_quantity_cart;
			    	 }
			    	?>
			   
          </div>
          <div class="table-responsive">
            <form method="post" action="#updatePost/">
              <input type="hidden" value="Vwww7itR3zQFe86m" name="form_key">
              <fieldset>
                <table class="data-table cart-table" id="shopping-cart-table">
               
                  <thead>
                    <tr class="first last">
                      <th rowspan="1">&nbsp;</th>
                      <th rowspan="1"><span class="nobr">Tên sản phẩm</span></th>
                      <th rowspan="1"></th>
                      <th colspan="1" class="a-center"><span class="nobr">Giá sản phẩm</span></th>
                      <th class="a-center" rowspan="1">Số lượng</th>
                      <th colspan="1" class="a-center">Tổng </th>
                      <th class="a-center" rowspan="1">&nbsp;</th>
                    </tr>
                    <?php
                    $get_product_cart = $ct->get_product_cart();
                    if($get_product_cart){
                      $subtotal = 0;
                      // $qty = 0;
                      while($result = $get_product_cart->fetch_assoc()){
						      	?>
                  </thead>
               
                  <tbody>
                    <tr class="first odd">
                      <td class="image"><a class="product-image" title="Sample Product" href="#/women-s-crepe-printed-black/"><img height="150px" width="120" src="admin/uploads/<?php echo $result['image'] ?>" alt=""/></a></td>
                      <td><h2 class="product-name"> <a href="#/women-s-crepe-printed-black/"><?php echo $result['productName'] ?></a> </h2></td>
                      <td class="a-center"><a title="Edit item parameters" class="edit-bnt" href="#configure/id/15945/"></a></td>
                      <td class="a-right"><span class="cart-price"> <span class="price"><?php echo $fm->format_currency($result['price'])." "."VNĐ" ?></span> </span></td>
                      <td class="a-center movewishlist">
                   
                        <form action="" method="post">
                            <input type="hidden" name="cartId" value="<?php echo $result['cartId'] ?>"/>
                            <input type="number" class="input-text qty" name="quantity" min="0"  value="<?php echo $result['quantity'] ?>"/>
                            <input type="submit" name="submit" value="Update"/>
									      </form>
                      </td>
                      <td class="a-right movewishlist"><span class="cart-price"> <span class="price">
                        <?php
                        $total = $result['price'] * $result['quantity'];
                        echo $fm->format_currency($total)." "."VNĐ";
                        ?>
                      </td>
                      <td class="a-center last"><a class="button remove-item" onclick="return confirm('Bạn có muốn xóa không?');" href="?cartid=<?php echo $result['cartId'] ?>"></a></td>

                    </tr>

                   
                  </tbody>
                
                  <?php
							      $subtotal += $total;
							// $qty = $qty + $result['quantity'];
							}
						}
						?>
                </table>
              </fieldset>
            </form>
          </div>
          <!-- BEGIN CART COLLATERALS -->
          <div class="cart-collaterals row">
            <div class="col-sm-4">
              
            </div>
            <div class="col-sm-4">
            
            </div>
            <?php
							$check_cart = $ct->check_cart();
								if($check_cart){
								?>
            <div class="totals col-sm-4">
              <h3 style="font-weight:bold">TỔNG GIỎ HÀNG MUA SẮM</h3>
              <div class="inner">
                <table class="table shopping-cart-table-total" id="shopping-cart-totals-table">
                 
   
                  <tbody>
                  <tr>
                      <td colspan="1" class="a-left" style=""><strong>Tổng tiền : </strong></td>
                      <td class="a-right" style=""><strong><span class="price">
                      <?php 
                        echo $fm->format_currency($subtotal)." "."VNĐ";
                        Session::set('sum',$subtotal);
                        Session::set('qty',$qty);
                        ?>
                      </span></strong></td>
                    </tr>
                    <tr>
                      <td colspan="1" class="a-left" style=""><strong>VAT: </strong></td>
                      <td class="a-right" style=""><strong><span class="price">10%</span></strong></td>
                      
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="1" class="a-left" style=""><strong>Tổng tiền phải trả : </strong></td>
                      <td class="a-right" style=""><strong><span class="price">
                      <?php 
                      $vat = $subtotal * 0.1;
                      $gtotal = $subtotal + $vat;
                      echo $fm->format_currency($gtotal)." "."VNĐ";
                      ?>
                      </span></strong></td>
                    </tr>
                  </tfoot>
                </table>
              
              
              </div>
              <!--inner--> 
              
            </div>
            <?php
					}else{
						echo 'Your Cart is Empty ! Please Shopping Now';
					}
					  ?>
					<?php
					$check_cart = $ct->check_cart();
					if(Session::get('customer_id')==true && $check_cart){ 
					?>
          
						<a class="muahang" href="payment.php"> <img src="images/check.png" alt=""></a>
            <a  style="text-align: right;" href="index.php"> <img src="images/shop.png" alt=""></a>
					
					</div>
					<?php
					}else{ 
					?>
						<a class="muahang" style="text-align: right;" href="index.php"> Mua hàng<img src="images/shop.png" alt=""></a>
					<?php
					} 
					?>
    	</div>  	<style type="text/css">
						a.muahang {
						    float: right;
						    padding: 10px 20px;
						    border: none;
						   
						    color: #fff;
						    cursor: pointer;
						}
					</style>
          </div>
          
          <!--cart-collaterals--> 
          
        </div>
     
                      <!--item-content--> 
                    </div>
                    <!--info-inner--> 
                    
                    <!--actions-->
                    
                    <div class="clearfix"> </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
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

<!-- Mirrored from htmldemo.magikcommerce.com/ecommerce/inspire-html-template/digital/shopping_cart.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Aug 2015 08:05:17 GMT -->
</html>