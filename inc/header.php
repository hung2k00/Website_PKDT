<?php
  ob_start();
?>
<?php
    include 'lib/session.php';
    Session::init();
?>
<?php
	
	include 'lib/database.php';
	include 'helpers/format.php';
// tự động lấy các class
	spl_autoload_register(function($class){
		include_once "classes/".$class.".php";
	});
	$db = new Database();
	$fm = new Format();
	$ct = new cart();
	//$us = new user();
	$br = new brand();
	$cat = new category();
	$cs = new customer();
	$product = new product();	      	 	
?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>
<!-- Mirrored from htmldemo.magikcommerce.com/ecommerce/inspire-html-template/digital/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Aug 2015 08:00:59 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<meta charset="utf-8">
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Web bán đồ điện tử</title>
<!-- Favicons Icon -->
<link rel="icon" href="http://demo.magikthemes.com/skin/frontend/base/default/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="http://demo.magikthemes.com/skin/frontend/base/default/favicon.ico" type="image/x-icon" />
<!-- Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- CSS Style -->
<style>
.success{
	color:green;
	font-size: 18px;
}
.error{
	color:red;
	font-size: 18px;
  
}
.tblone {
  border: 1px solid #fff;
  margin-bottom: 12px;
  width: 100%;
}
.tblone th {
  background: #999 none repeat scroll 0 0;
  color: #fff;
  font-size: 18px;
  padding: 5px 8px;
  text-align: center;
}
.tblone td{padding:10px;text-align:center;}

table.tblone tr:nth-child(2n+1){background:#fff;height:30px;}
table.tblone tr:nth-child(2n){background:#fdf0f1;height:30px;}
table.tblone input[type="number"] {
  border: 1px solid #ddd;
  padding: 2px;
  width: 60px;
}
table.tblone input[type="submit"] {
  background: #333 none repeat scroll 0 0;
  border: 1px solid #000;
  border-radius: 3px;
  color: #fff;
  cursor: pointer;
  font-size: 14px;
  padding: 1px 5px;
}
table.tblone a {
  color: #fe5800;
  font-weight: bold;
  text-decoration: none;
}
table.tblone a:hover{color: #000;}
table.tblone img {
  height: 20px;
  width: 30px;
}
.buysubmit{
	background: #134758;
	border: 1px solid rgba(0, 0, 0, 0.1);
	color: #fff;
	font-family: Arial,"Helvetica Neue","Helvetica",Tahoma,Verdana,sans-serif;
	font-size: 15px;
	padding: 7px 15px;
	text-shadow: 0 -1px 1px rgba(0, 0, 0, 0.25);
	cursor:pointer;
	outline:none;
}
.search-box {
  width: 80%;
}
#search{
  width: 82%;
}

</style>
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="stylesheet" href="css/revslider.css" type="text/css">
<link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="css/owl.theme.css" type="text/css">
<link rel="stylesheet" href="css/font-awesome.css" type="text/css">
<!-- Google Fonts -->
<link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
</head>
<body class="cms-index-index">
<div class="page"> 
  <!-- Header -->
  <header class="header-container">
    <div class="header-top">
      <div class="container">
        <div class="row"> 
          <!-- Header Language -->
          <div class="col-xs-6">
            <div class="dropdown block-language-wrapper"> <a role="button" data-toggle="dropdown" data-target="#" class="block-language dropdown-toggle" href="#"> <img src="images/english.png" alt="language"> English <span class="caret"></span> </a>
              <ul class="dropdown-menu" role="menu">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><img src="images/english.png" alt="language"> English </a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><img src="images/francais.png" alt="language"> French </a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><img src="images/german.png" alt="language"> German </a></li>
              </ul>
            </div>
            <!-- End Header Language --> 
            <!-- Header Currency -->
            <div class="dropdown block-currency-wrapper"> <a role="button" data-toggle="dropdown" data-target="#" class="block-currency dropdown-toggle" href="#"> USD <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"> $ - Dollar </a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"> £ - Pound </a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#"> € - Euro </a></li>
              </ul>
            </div>
            <!-- End Header Currency -->   
          </div>
          <div class="col-xs-6"> 
            <!-- Header Top Links -->
            <div class="toplinks">
              <div class="links">
                <div class="myaccount"><a title="My Account" href="login.php"><span class="hidden-xs"></span></a></div>
                <div class="wishlist"><a title="My Wishlist" href="wishlist.php"><span class="hidden-xs"></span></a></div>
                <div class="check"><a title="Checkout" href="checkout.php"><span class="hidden-xs"></span></a></div>
                <div class="phone hidden-xs">1 800 123 1234</div>
              </div>
            </div>
            <!-- End Header Top Links --> 
          </div>
        </div>
      </div>
    </div>
    <div class="header container">
      <div class="row">
        <div class="col-lg-2 col-sm-3 col-md-2 col-xs-12"> 
          <!-- Header Logo --> 
          <a class="logo" title="Magento Commerce" href="index.php"><img width="170" height="50" alt="Magento Commerce" src="images/logo12.png"></a> 
          <!-- End Header Logo --> 
        </div>
        <div class="col-lg-7 col-sm-4 col-md-6 col-xs-12"> 
          <!-- Search-col -->
          <div class="search-box">
            <form action="" method="POST" id="search_mini_form" name="Categories">          
              <input type="text" placeholder="Tìm kiếm tại đây..." value=""  class="" name="search" id="search">
              <button id="submit-button" class="search-btn-bg"><span>Tìm kiếm</span></button>
            </form>
          </div>
          <!-- End Search-col --> 
        </div>
        <!-- Top Cart -->
        <div class="col-lg-3 col-sm-5 col-md-4 col-xs-12">
          <div class="top-cart-contain">
            <div class="mini-cart">
              <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle"> <a href="shopping_cart.php"> <i class="icon-cart"></i>
                <div class="cart-box"><span class="title">Giỏ hàng</span><span id="cart-total"> * </span></div>
                </a></div>
              <div>
                <div class="top-cart-content arrow_box">
                 
                  
                  <div class="top-subtotal">Tổng tiền: <span class="price">
                    	<?php
									$check_cart = $ct->check_cart();
										if($check_cart){
											$sum = Session::get("sum");
											$qty = Session::get("qty");
                      echo $fm->format_currency($sum).' '.'VNĐ' ;
											}else{
											echo 'Empty';
										}
									?>
								</span></div>
                  <div class="actions">
                    <button class="btn-checkout" type="button"><a href="payment.php" title="viewcart"><span>Thanh toán</span></button>
                    <button class="view-cart" type="button"><a href="shopping_cart.php" title="viewcart"> <span>View Cart</span></button>
                  </div>
                </div>
              </div>
            </div>
            <div id="ajaxconfig_info" style="display:none"> <a href="#/"></a>
              <input value="" type="hidden">
              <input id="enable_module" value="1" type="hidden">
              <input class="effect_to_cart" value="1" type="hidden">
              <input class="title_shopping_cart" value="Go to shopping cart" type="hidden">
            </div>
          </div>
          <div class="signup"><a title="Login" href="register.php"><span>Đăng kí </span></a></div>
          <span class="or"> | </span>
            <?php 
            
            if(isset($_GET['customer_id'])){
              $customer_id = $_GET['customer_id'];  
              $delCart = $ct->del_all_data_cart();
              // $delCompare = $ct->del_compare($customer_id);
              Session::destroy();
             ob_end_flush();
              
            }
          ?>
          <div class="login">
            <?php
            // kiểm tra người dùng đã đăng nhập chưa 
            $login_check = Session::get('customer_login'); 
            if($login_check==false){
              echo '<a href="login.php">Đăng nhập</a></div>';
            }else{
              echo '<a href="?customer_id='.Session::get('customer_id').'">Đăng xuất</a></div>';
            }
            ?>
           
          </div>
         
        </div>
        <!-- End Top Cart --> 
      </div>
    </div>
  </header>
  <!-- end header --> 
  
    <!-- Navbar -->
    <nav>
      <div class="container">
        <div class="nav-inner"> 
          
        
          
          <ul id="nav" class="hidden-xs">
            <li class="level0 parent drop-menu"><a href="index.php" class=""><span>Trang chủ</span> </a>
   
            </li>
            <li class="level0 parent drop-menu"><a href="#"><span>Danh mục sản phẩm</span> </a>
              <ul class="level1">
                  <?php
                  $cate = $cat->show_category();
                  if($cate){
                    while($result_new = $cate->fetch_assoc()){
                  ?>
                  
                <li class="level1 first"><a href="productbycat.php?catid=<?php echo $result_new['catId'] ?>"><?php echo $result_new['catName'] ?></a></li>
                <?php
	          	}
	          } 
	          ?>        
              </ul>
            </li>
            <li class="level0 parent drop-menu"><a href=""><span>Thương hiệu</span> </a>
              <ul style="display: none;" class="level1">
                  <?php
                $brand = $br->show_brand_home();
                if($brand){
                  while($result_new = $brand->fetch_assoc()){

                ?>  
                        	
                <li class="level1 first"><a href="topbrand.php?brandid=<?php echo $result_new['brandId'] ?>"><?php echo $result_new['brandName'] ?></a> </li>
                <?php
	          	}
	          } 
	          ?>
              </ul>
            </li>   
            <li class="level0 parent drop-menu"><a href="shopping_cart.php"><span>Giỏ hàng</span> </a></li>             
            <li class="level0 parent drop-menu">
              <?php
                $customer_id = Session::get('customer_id');
                $check_order = $ct->check_order($customer_id); 
                if($check_order==false){
                  echo '';
                }else{
                  echo '<li><a href="orderdetails.php"><span>Đơn hàng</span></a> </li>';
                }
              ?>
              <?php
              $login_check = Session::get('customer_login'); 
              if($login_check==false){
                echo '';
              }else{
                echo '<li><a href="profile.php"><span> Tài khoản</span></a> </li>';
              }
              ?>
           
              <?php
            
                $login_check = Session::get('customer_login'); 
                if($login_check){
                  echo '<li><a href="wishlist.php"><span>Yêu thích</span></a> </li>';
                }
					
			          ?>             
            
              <ul style="display: none;" class="level1">
                
              </ul>
            </li>
           
          </ul>
        </div>
      </div>
    </nav>
        <!-- end nav --> 