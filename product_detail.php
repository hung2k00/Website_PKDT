<?php
  include 'inc/header.php';

?>
<?php

if(!isset($_GET['proid']) || $_GET['proid']==NULL){
     echo "<script>window.location ='404.php'</script>";
  }else{
      $id = $_GET['proid']; 
  }
 $customer_id = Session::get('customer_id');
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])) {

      $productid = $_POST['productid'];
      $insertCompare = $product->insertCompare($productid, $customer_id);
      
  }
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wishlist'])) {

      $productid = $_POST['productid'];
      $insertWishlist = $product->insertWishlist($productid, $customer_id);
      
  }
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

      $quantity = $_POST['quantity'];
      $insertCart = $ct->add_to_cart($quantity, $id);
      
  }
  if(isset($_POST['binhluan_submit'])){
     $binhluan_insert = $cs->insert_binhluan();
     }
?>

  <section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="row">
        <?php
          $get_product_details = $product->get_details($id);
          if($get_product_details){
            while($result_details = $get_product_details->fetch_assoc()){
          ?>
          <div class="product-view wow">
            <div class="product-essential">
              <form action="#" method="post" id="product_addtocart_form">
                <div class="product-img-box col-lg-6 col-sm-6 col-xs-12">
                  <ul class="moreview" id="moreview">
                    <li class="moreview_thumb thumb_1"> <img class="moreview_thumb_image" src="admin/uploads/<?php echo $result_details['image'] ?>"> <img class="moreview_source_image" src="admin/uploads/<?php echo $result_details['image'] ?>" alt=""> <span class="roll-over">Roll over image to zoom in</span> </li>
     
                  </ul>
                  <div class="moreview-control"> <a style="right: 42px;" href="javascript:void(0)" class="moreview-prev"></a> <a style="right: 42px;" href="javascript:void(0)" class="moreview-next"></a> </div>
                </div>
                
                <!-- end: more-images -->
                
                <div class="product-shop col-lg-6 col-sm-6 col-xs-12">
                  <div class="product-next-prev"> <a class="product-next" href="#"><span></span></a> <a class="product-prev" href="#"><span></span></a> </div>
                  <div class="product-name">
                    <h1><?php echo $result_details['productName'] ?></h1>
                  </div>
                  <div class="ratings">
                    <div class="rating-box">
                      <div style="width:60%" class="rating"></div>
                    </div>
                    <p class="rating-links"> <a href="#">ĐÁNH GIÁ(s)</a> <span class="separator">|</span> <a href="#">THÊM ĐÁNH GIÁ</a> </p>
                  </div>
               
                  <div class="price-block">
                    <div class="price-box">
                      <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> <?php echo $fm->format_currency($result_details['price'])." "."VNĐ" ?></span> </p>
                    </div>
                  </div>
                  <div class="short-description">
                    <h2>MÔ TẢ</h2>
                    <p><?php echo $fm->textShorten($result_details['product_desc'],250) ?></p>
                  </div>
                  <div class="add-to-box">
                    <div class="add-to-cart">
                      <label for="qty">sỐ LƯỢNG</label>
                      <div class="pull-left">
                        <div class="custom pull-left">
                        <form action="" method="post">
                          <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="icon-plus">&nbsp;</i></button>
                          <input type="number" class="input-text qty" title="Qty" value="1" min="1" maxlength="12" id="qty" name="quantity">
                          <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="icon-minus">&nbsp;</i></button>
                           
                        </div>
                        
                      </div>
                      <input type="submit" class="button btn-cart" class="icon-basket" name="submit" value="THÊM VÀO GIỎ HÀNG "/>
                     <br>
                    </div>
                    <?php
                      if(isset($insertCart)){
                        echo $insertCart;
                      }
				        	?>	

                    </form>	
                    <div class="email-addto-box">
                      <ul class="add-to-links">
                         <li>
                          <form action="" method="POST">					
                          <input type="hidden" name="productid" value="<?php echo $result_details['productId'] ?>"/>					
                          <?php	
                          $login_check = Session::get('customer_login'); 
                            if($login_check){
                              
                              echo '<input type="submit" class="buysubmit" name="wishlist" value="Thêm vào để yêu thích"/>';
                            }else{
                              echo '';
                            }
                              
                          ?>					
                          </form>
                        </li>
                       
                
                       
                      </ul>
                      <!-- <p class="email-friend"><a href="#" class=""><span>Email to Friend</span></a></p> -->
                    </div>
                  </div>
                
                </div>
              </form>
             
                <?php
                if(isset($insertWishlist)){
                  echo $insertWishlist;
                }
                ?>
                 <?php
                if(isset($insertCompare)){
                  echo $insertCompare;
                }
                ?>
					
             
            </div>
            <div class="product-collateral">
              <div class="col-sm-12 wow">
                <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                  <li class="active"> <a href="#product_tabs_description" data-toggle="tab">Mô tả sản phẩm </a> </li>           
                  <li> <a href="#reviews_tabs" data-toggle="tab">Viết bình luận</a> </li>
                </ul>
                <div id="productTabContent" class="tab-content">
                  <div class="tab-pane fade in active" id="product_tabs_description">
                    <div class="std">
                    <p><?php echo ($result_details['product_desc']) ?></p>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="product_tabs_tags">
                    <div class="box-collateral box-tags">
                      <div class="tags">
                        <form id="addTagForm" action="#" method="get">
                          <div class="form-add-tags">
                            <label for="productTagName">Add Tags:</label>
                            <div class="input-box">
                              <input class="input-text required-entry" name="productTagName" id="productTagName" type="text" style="width:35%;">
                              <button type="button" title="Add Tags" class=" button btn-add" onClick="submitTagForm()"> <span>Add Tags</span> </button>
                            </div>
                            <!--input-box--> 
                          </div>
                        </form>
                      </div>
                      <!--tags-->
                      <p class="note">Use spaces to separate tags. Use single quotes (') for phrases.</p>
                    </div>
                  </div>
                  <?php
                    }
                  }
                  ?>
                  <div class="tab-pane fade" id="reviews_tabs"> 
                    <div class="box-collateral box-reviews" id="customer-reviews">
                      <div class="box-reviews1">
                        <div class="form-add">
                          <form action="" method="POST" >
                            <h3>Viết bình luận của ban</h3>
                            <fieldset>
                              <?php
                              if (isset($binhluan_insert)){
                                echo $binhluan_insert;
                              }
                              ?>
                              <p><input type="hidden" value="<?php echo $id?>" name ="product_id_binhluan"></p>
                              <h4>Bạn thấy sản phẩm như thế nào? <em class="required">*</em></h4>
                              <span id="input-message-box"></span>                         
                              <div class="review1">
                                <ul class="form-list">
                                  <li>
                                    <label class="required" for="nickname_field">Tên người bình luận<em>*</em></label>
                                    <div class="input-box">
                                      <input type="text" class="input-text required-entry" id="nickname_field" name="tennguoibinhluan">
                                    </div>
                                  </li>
                                 
                                </ul>
                              </div>
                              <div class="review2">
                                <ul>
                                  <li>
                                    <label class="required label-wide" for="review_field">Bình luận<em>*</em></label>
                                    <div class="input-box">
                                      <textarea class="required-entry" rows="3" cols="5" id="review_field" name="binhluan"></textarea>
                                    </div>
                                  </li>
                                </ul>
                                <div class="buttons-set">
                                  <p><input type="submit" name="binhluan_submit" value="Gửi bình luận"></p>
                                 
                                </div>
                              </div>
                            </fieldset>
                          </form>
                        </div>
                      </div>
                 
                      <div class="clear"></div>
                    </div>
                  </div>
              
                  
              </div>
              <div class="col-sm-12">
                <div class="box-additional">
                  <div class="related-pro wow">
                    <div class="slider-items-products">
                      <div class="new_title center">
                       
                      </div>
                      <div id="related-products-slider" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col4"> 
                          
                         
                        
                          
                        </div>
                      </div>
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
  <!--End main-container --> 
  
  <?php
  include 'inc/footer.php';
?>  
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
 
 
<script type="text/javascript" src="js/jquery.jcarousel.min.js"></script> 
<script type="text/javascript" src="js/cloudzoom.js"></script> 
 
<script type="text/javascript" src="js/common.js"></script> 
<script type="text/javascript" src="js/owl.carousel.min.js"></script>
</body>

<!-- Mirrored from htmldemo.magikcommerce.com/ecommerce/inspire-html-template/digital/product_detail.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Aug 2015 08:05:54 GMT -->
</html>