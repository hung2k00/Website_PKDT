<?php
  include 'inc/header.php';
  include 'inc/slider.php';
?>

 <!-- header service -->
 <div class="header-service">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="content">
            <div class="icon-truck">&nbsp;</div>
            <span><strong>FREE SHIP</strong> với đơn hàng từ 500.000</span></div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="content">
            <div class="icon-support">&nbsp;</div>
            <span><strong>Dịch vụ hỗ trợ</strong> ngường dùng</span></div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="content">
            <div class="icon-money">&nbsp;</div>
            <span>Đảm bảo<strong> 3 ngày hoàn trả lại tiền</strong></span></div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="content">
            <div class="icon-dis">&nbsp;</div>
            <span><strong class="orange">Giảm giá 5%</strong> với đơn hàng trên 500.000</span></div>
        </div>
      </div>
    </div>
  </div>
  <!-- end header service -->   
  
  <!-- offer banner section -->
  <div class="offer-banner-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-xs-12 col-md-4 col-sm-4 wow"><a href="#"><img alt="offer banner1" src="images/promo-banner1.jpg"></a></div>
        <div class="col-lg-4 col-xs-12 col-md-4 col-sm-4 wow"><a href="#"><img alt="offer banner1" src="images/promo-banner2.jpg"></a></div>
        <div class="col-lg-4 col-xs-12 col-md-4 col-sm-4 wow"><a href="#"><img alt="offer banner1" src="images/promo-banner3.jpg"></a></div>
      </div>
    </div>
  </div>
  <!-- end offer banner section --> 
  <!-- main container -->
  <section class="featured-pro wow animated parallax parallax-3">
    <div class="container">
      <div class="std">
        <div class="slider-items-products">
          <div class="featured_title center">
            <h2>Sản phẩm mới nhất</h2>
          </div>
          <div id="featured-slider" class="product-flexslider hidden-buttons">
            <div class="slider-items slider-width-col4"> 
            <?php
                  $product_new = $product->getproduct_new();
                  if($product_new){
                    while($result_new = $product_new->fetch_assoc()){

                  ?>  
              <!-- Item -->
              <div class="item">
                <div class="col-item">
                  <div class="sale-label sale-top-right">Sale</div>
                  <div class="images-container"> <a class="product-image" title="Sample Product" href="product_detail.php?proid=<?php echo $result_new['productId'] ?>"> <img src="admin/uploads/<?php echo $result_new['image'] ?>" width="200x" height ="270px" alt="" />  </a>
                    <div class="actions">
                      <div class="actions-inner">
                        <button type="button" title="Add to Cart" class="button btn-cart"><span>Thêm giỏ hàng </span></button>
                        <ul class="add-to-links">
                          <li><a href="wishlist.php" title="Add to Wishlist" class="link-wishlist"><span>Add to Wishlist</span></a></li>
                          <li><a href="compare.php" title="Add to Compare" class="link-compare "><span>Add to Compare</span></a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="qv-button-container"> <a href="product_detail.php" class="qv-e-button btn-quickview-1"><span><span>Quick View</span></span></a> </div>
                  </div>
                  <div class="info">
                    <div class="info-inner">
                      <div class="item-title"> <a title=" Sample Product" href="product_detail.php"> <?php echo $result_new['productName'] ?>  </a> </div>
                      <!--item-title-->
                      <div class="item-content">
                        <div class="ratings">
                          <div class="rating-box">
                            <div style="width:60%" class="rating"></div>
                          </div>
                        </div>
                        <div class="price-box">
                        <p class="special-price"> <span class="price"><?php echo $fm->format_currency($result_new['price'])." "."VNĐ" ?></span> </p>

                        </div>
                      </div>
                      <!--item-content--> 
                    </div>
                    <!--info-inner-->
                    
                    <div class="clearfix"> </div>
                  </div>
                </div>
              </div>
            
              <!-- End Item --> 
              <?php
				}
			}
				?>
            </div>
          </div>
        </div>
         <!-- promo banner section -->
        <div class="promo-banner-section container wow">
          <div class="container">
            <div class="row"> <img alt="promo-banner3" width="850 px" src="images/bottom_banner.png"></div>
          </div>
        </div>
  <!-- End promo banner section --> 
      </div>
    </div>
  </section>
  <!-- End main container --> 
  

  <!-- Featured Slider -->
  <section class="featured-pro wow animated parallax parallax-2">
    <div class="container">
      <div class="std">
        <div class="slider-items-products">
          <div class="featured_title center">
            <h2>Sản phẩm nổi bật</h2>
          </div>
          <div id="featured-slider" class="product-flexslider hidden-buttons">
            <div class="slider-items slider-width-col4"> 
            <?php
	      		$product_feathered = $product->getproduct_feathered();
	      		if($product_feathered){
	      			while($result = $product_feathered->fetch_assoc()){
	      	?>
              <!-- Item -->
              <div class="item">
                <div class="col-item">
                  <div class="sale-label sale-top-right">Sale</div>
                  <div class="images-container"> <a class="product-image" title="Sample Product" href="product_detail.php?proid=<?php echo $result['productId'] ?>"> <img src="admin/uploads/<?php echo $result['image'] ?>" width="200x" height ="270px" alt="" />  </a>
                    <div class="actions">
                      <div class="actions-inner">
                        <button type="button" title="Add to Cart" class="button btn-cart"><span>Thêm giỏ hàng </span></button>
                        <ul class="add-to-links">
                          <li><a href="#" title="Add to Wishlist" class="link-wishlist"><span>Add to Wishlist</span></a></li>
                          <li><a href="#" title="Add to Compare" class="link-compare "><span>Add to Compare</span></a></li>
                        </ul>
                      </div>
                    </div>
                    <div class="qv-button-container"> <a href="quick_view.php" class="qv-e-button btn-quickview-1"><span><span>Quick View</span></span></a> </div>
                  </div>
                  <div class="info">
                    <div class="info-inner">
                      <div class="item-title"> <a title=" Sample Product" href="product_detail.php"> <?php echo $result['productName'] ?>  </a> </div>
                      <!--item-title-->
                      <div class="item-content">
                        <div class="ratings">
                          <div class="rating-box">
                            <div style="width:60%" class="rating"></div>
                          </div>
                        </div>
                        <div class="price-box">
                        <p class="special-price"> <span class="price"><?php echo $fm->format_currency($result['price'])." "."VNĐ" ?></span> </p>

                        </div>
                      </div>
                      <!--item-content--> 
                    </div>
                    <!--info-inner-->
                    
                    <div class="clearfix"> </div>
                  </div>
                </div>
              </div>
              <!-- End Item --> 
              <?php
				}
			}
				?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Featured Slider --> 
 
  
 
  <?php
  include 'inc/footer.php';
?>
