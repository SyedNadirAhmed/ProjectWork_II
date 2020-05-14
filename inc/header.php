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
								<span class="no_product">(empty)</span>
						</a>
					</div>
			     </div>
				<div class="loginRegister">
						<a href="login.php"><span class="login">Login</span></a>
						<a href="register.php"><span class="register">Register</span></a>	
				</div>
			</div>
			
		</div>
 
 <!-----MAIN MENU START----->
 
		<div id="menu">
			<ul>
			  <li><a href="index.php">Home</a></li>
			  <li><a href="products.php">Products</a> </li>
			  <li><a href="topbrands.php">Top Brands</a></li>
			  <li><a href="cart.php">Cart</a></li>
			  <li><a href="contact.php">Contact</a> </li>
			</ul>
		</div>
		<!-----MAIN MENU END----->		