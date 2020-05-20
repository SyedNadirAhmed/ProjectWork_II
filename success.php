<?php include 'inc/header.php';?>
<?php
	$login = Session::get('customerlogin');
	if ($login == false) {
		header("Location:login.php");
	}
?>
<style>
	.success{
		max-width: 700px;
		min-height: 500px;
		border: 1px solid #ddd;
		margin: 5px auto;
		text-align: center;
	}
	.success h2{width:80%;margin: 0 auto;font-size: 26px;font-weight: bold;padding: 20px;color: #A8A8A8;border-bottom: 1px solid #ddd;margin-bottom: 30px;}
	.success p{text-align: left;font-size: 18px;padding-left: 5px;}
</style>
	<div class="header_bottom">
		
		<div class="success">
			<h2>Success</h2>
			<?php
				$customerId = Session::get('customerId');
				$amount = $ct->paybleAmount($customerId); 
				if ($amount) {
					$sum = 0;
					while ($result = $amount->fetch_assoc()) {
						$price = $result['price'];
						$sum = $sum + $price;
					}
				}
			?>
			<p>Total Payable Amount(Including Vat) : $
				<?php
					$vat = $sum * 0.1;
					$total =  $sum + $vat ;
					echo $total;
				?>
			</p>
			<p>Thanks for purchase.Receive your order successfully.We will contact you as soon as possible.Here is your order details.....<a href="orderdetails.php">Visit Here</a></p>
		</div>
	</div>	

<?php include 'inc/footer.php';?>