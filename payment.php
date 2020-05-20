<?php include 'inc/header.php';?>
<?php
	$login = Session::get('customerlogin');
	if ($login == false) {
		header("Location:login.php");
	}
?>
<style>
	.payment{
		max-width: 700px;
		min-height: 500px;
		border: 1px solid #ddd;
		margin: 5px auto;
		text-align: center;
	}
	.payment h2{width:80%;margin: 0 auto;font-size: 26px;font-weight: bold;padding: 20px;color: #A8A8A8;border-bottom: 1px solid #ddd;margin-bottom: 30px;}
	.payment a{
		background: #F92447;
		color: #ddd;
		padding: 10px 30px;
		font-size: 26px;
		border-radius: 3px;
		border: 1px solid #0C1021;
	}
	.back a{width: 150px;margin: 5px auto;display: block;text-align:center;padding:10px;color: #fff;background: #282923;font-size: 26px;border: 1px solid #A6E22C;border-radius: 3px;}
</style>
	<div class="header_bottom">
		
		<div class="payment">
			<h2>Payment Option</h2>
			 <a href="paymentoffline.php">Offline Payment</a>
			 <a href="paymentonline.php">Online Payment</a>
		</div>
		<div class="back">
			<a href="cart.php">Previous</a>
		</div>
	</div>	

<?php include 'inc/footer.php';?>