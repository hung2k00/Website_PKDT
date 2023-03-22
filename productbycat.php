<?php
  include 'inc/header.php';
  
?>

  <?php
	if(!isset($_GET['catid']) || $_GET['catid']==NULL){
       echo "<script>window.location ='404.php'</script>";
    }else{
        $id = $_GET['catid']; 
    }

  	if(isset($_GET['trang'])){
      $trang = $_GET['trang'];
    }else{
      $trang = 1;
    }
?>
<style>
a.phantrang {
    border: 1px solid #ddd;
    padding: 10px;
    background: #414045;
    color: #fff;
    cursor: pointer;}
</style>
  
  <!-- Two columns content -->
  <section class="main-container col2-left-layout">
    <div class="main container">
      <div class="row">
      <?php
	     	 $name_cat = $cat->get_name_by_cat($id);
	      	 if($name_cat){
	      	 	while($result_name = $name_cat->fetch_assoc()){
	      	?>
        <section class="col-main col-sm-9 col-sm-push-3 wow">
          <div class="category-title">
            <h1>Danh mục : <?php echo $result_name['catName'] ?></h1>
          </div>
              <?php
          }}
          ?>
          <div class="category-products">
            
            <ul class="products-grid">
                  <?php
                  
                $productbycat = $cat->get_product_by_cat($id);
                if($productbycat){
                  while($result = $productbycat->fetch_assoc()){
                ?>
              <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6">
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
              </li>
                          <?php
                  }

                }else{
                  echo 'Danh mục hiện tại chưa có sản phẩm';
                }
                $productbycat = $cat->show_category_product($id);
                $result_allproduct = $productbycat->fetch_assoc();
                $product_category_count = mysqli_num_rows($productbycat);
				        $product_category_button = ceil(	$product_category_count/6);
                $i = 1;
                echo '<p>Trang : </p>';
                for($i=1;$i<=$product_category_button;$i++){
                  ?>
                  <a class="phantrang" <?php if($i==$trang){ echo 'style="background:orange"';} ?> style="margin:0 10px;" href="productbycat.php?trang=<?php echo $i ?>&catid=<?php echo $result_allproduct['catId'] ?>"><?php echo $i ?></a>	
        
                  <?php
                  
                }
                
                ?>
		          
            </ul>
          </div>       
        </section>
        <aside class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9 wow">
          <div class="side-nav-categories">
            <div class="block-title"> 
              Danh mục: 
            </div>
            <!--block-title--> 
            <!-- BEGIN BOX-CATEGORY -->
            <div class="box-content box-category">
              <ul>
              <?php 
                $getall_category = $cat->show_category_fontend();
                  if($getall_category){
                    while($result_allcat = $getall_category->fetch_assoc()){
                ?>
                    <li><a href="productbycat.php?catid=<?php echo $result_allcat['catId'] ?>"><?php echo $result_allcat['catName'] ?></a></li>
                  <?php
                    }
                }
                  ?>
                
              </ul>
            </div>
            <!--box-content box-category--> 
          </div>
    </div>
  </section>
  <!-- End Two columns content -->

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

<!-- Mirrored from htmldemo.magikcommerce.com/ecommerce/inspire-html-template/digital/productbycat.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Aug 2015 08:05:41 GMT -->
</html>