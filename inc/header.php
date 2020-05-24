<?php 
	include 'lib/Session.php';
	Session::init();
	include 'lib/Database.php';
	include 'helpers/Format.php';

	spl_autoload_register(function($class){
		include_once "classes/".$class.".php";
	});

	$db 	= new Database();
	$fm 	= new Format();
	$prd 	= new Product();
	$ct 	= new Cart();
	$ctg    = new Category();
	$cus    = new Customer();
?>

<!DOCTYPE HTML>
<head>
<title>Project Work II</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet"/>
<link href="css/slider.css" rel="stylesheet"/>
<link href="css/responsive.css" rel="stylesheet"/>
</head>
<body>
	<div class="wrapper">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logo.png" alt="Company Logo" /></a>
			</div>
			<div class="header_top_right">
			    <div class="search_box">
				    <form>
				    	<input type="text" value="Search for Products">
						<input type="submit" value="Search">
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="cart.php">
								<span class="cart_title">Cart</span>
								<span class="no_product">
								 <?php
								 	$getData = $ct->checkCartTable();
								 	if ($getData) {
								 		$sum = Session::get("sum");
								 		$qty = Session::get("qty");
								 		echo "$".$sum." | Q: ".$qty; 
								 	}else{
								 		echo "(Empty)";
								 	}
								 ?>
								</span>
						</a>
					</div>
			     </div>
			    <?php
			    	if (isset($_GET['cid'])) {
			    		$customerId = Session::get('customerId');
			    		$deldata = $ct->delcustomercart();
			    		$delcomparedata = $prd->delCompareData($customerId);
			    		Session::destroy();
			    	}

			    ?> 
				<div class="loginRegister">
						<?php
							$login = Session::get('customerlogin');
							if ($login == false) {?>
								<a href="login.php"><span class="login">Login</span></a>
						<?php	} else{ ?>
								<a href="?cid=<?php Session::get('customerId') ?>"><span class="login">Logout</span></a>
						<?php } ?>
						<a href="register.php"><span class="register">Register</span></a>	
				</div>
			</div>
			
		</div>
 
 <!-----MAIN MENU START----->
 
		<div id="menu">
			<ul>
			  <li><a href="index.php">Home</a></li>
			  <li><a href="topbrands.php">Top Brands</a></li>
			  <?php
			  	$chkcart = $ct-> checkCartTable();
			  		if ($chkcart) {  ?>
			  			<li><a href="cart.php">Cart</a></li>
			  			<li><a href="payment.php">Payment</a></li>
			  <?php	}  ?>

				<?php
				$customerId = Session::get('customerId');
			  	$chkOrder = $ct->checkOrder($customerId);
			  		if ($chkOrder) {  ?>
			  			<li><a href="orderdetails.php">Order Details</a></li>
			  	<?php	}  ?>			  
			 
			  <?php
			  	$login = Session::get("customerlogin");
			  	if ($login == true) {   ?>
			  		<li><a href="profile.php">Profile</a> </li>
			   <?php	}   ?>

			   <?php
			   $customerId = Session::get('customerId');
				$getPr = $prd->getCompareData($customerId);
				if ($getPr) {	
			   ?>
			 	 <li><a href="compare.php">Compare</a> </li>
				<?php } ?>

				 <?php
				 $customerId = Session::get('customerId');
				  $chkwlist = $prd->getWlistData($customerId);
					if ($chkwlist) { ?>
			 	 <li><a href="wishlist.php">WishList</a> </li>
				<?php } ?>
			  <li><a href="contact.php">Contact</a> </li> 
			</ul>
		</div>
		<!-----MAIN MENU END----->		