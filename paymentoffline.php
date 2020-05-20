<?php include 'inc/header.php';?>
<?php
	$login = Session::get('customerlogin');
	if ($login == false) {
		header("Location:login.php");
	}
?>
<?php
	if (isset($_GET['orderid'] ) && $_GET['orderid'] = 'order'){
		$customerId = Session::get('customerId');
		$insertorder = $ct->orderProduct($customerId);
		$deldata = $ct->delcustomercart();
		header("Location:success.php");
	}
?>
<style>
	.header_bottom {
    border-bottom: 1px solid #ddd;
}
	.division{width: 50%;float: left;}
	.tblone{
		width: 500px;
		margin: 0 auto;
		border: 1px solid #ddd;
	}
	.tblone tr td{
		text-align: justify;
	}
	.tblone tr td a{
		display: block;
		text-align: center;
	}
	.tbltwo{
		width: 70%;
		margin: 5px;
		padding: 10px;
		border: 1px solid #ddd;
		font-size: 20px;
	}
	.ordernow{}
	.ordernow a{
		width: 200px;
		padding: 10px;
		background: #ff0000;
		color: #fff;
		border: 1px solid #ddd;
		font-size: 30px;
		display: block;
		margin: 10px auto;
		text-align: center;
		border-radius: 5px;
	}
</style>
	<div class="header_bottom">
		<div class="division">
	<table class="tblone">
				<tr>
					<th >No</th>
					<th>Product</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Total Price</th>
				</tr>
				<?php
					$getPro = $ct->getCartProduct();
					if ($getPro) {
						$i = 0; 
						$sum = 0;
						$qty = 0;
						while ($result = $getPro->fetch_assoc()) {
							$i++;
				?>
				<tr>
					<td><?php echo $i; ?></td>
					<td><?php echo $result['productName']; ?></td>
					<td>$<?php echo $result['price']; ?></td>
					<td><?php echo $result['quantity']; ?></td>
					<td>
						$<?php 
							$total = $result['price'] * $result['quantity'];
							echo $total;
						 ?>	
					</td>
				</tr>
				<?php
					 $qty = $qty + $result['quantity'];
					 $sum = $sum + $total;
				?>
				<?php } } ?>
			</table>
			<table class="tbltwo"> 

				<tr>
					<th>Sub Total : </th>
					<td>$ <?php echo $sum ?></td>
				</tr>
				<tr>
					<th>Tax : </th>
					<td>10% - $<?php echo $vat = $sum * 0.1;?></td>
				</tr>
				<tr>
					<th>Total :</th>
					<td> $
						<?php
							$vat = $sum * 0.1;
							$gtotal = $vat + $sum;
							echo $gtotal;
						?>
					</td>
				</tr>

				<tr>
					<th>Quentity : </th>
					<td><?php echo $qty ?></td>
				</tr>
		   </table>
		</div>
		<div class="division">
			<?php
				$id = Session::get("customerId");
				$getdata = $cus->getCustomerData($id);
				if ($getdata) {
					while ($result = $getdata->fetch_assoc()) {
			?>
			<table class="tblone">
				<tr>
					<th colspan="3">Your Profile</th>
				</tr>
				<tr>
					<td width="20%">Name</td>
					<td width="5%">:</td>
					<td><?php echo $result['name']?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td>:</td>
					<td><?php echo $result['email']?></td>
				</tr>
				<tr>
					<td>Phone</td>
					<td>:</td>
					<td><?php echo $result['phoneno']?></td>
				</tr>
				<tr>
					<td>Address</td>
					<td>:</td>
					<td><?php echo $result['staddress']?></td>
				</tr>
				<tr>
					<td>City</td>
					<td>:</td>
					<td><?php echo $result['city']?></td>
				</tr>
				<tr>
					<td>Post Code</td>
					<td>:</td>
					<td><?php echo $result['postcode']?></td>
				</tr>
				<tr>
					<td>Country</td>
					<td>:</td>
					<td><?php echo $result['country']?></td>
				</tr>
				<tr>
					<td colspan="3"><a href="editprofile.php">Update Details</a></td>
				</tr>

			</table>
			<?php } } ?>
		</div>
		
	</div>		
	<div class="ordernow">
			<a href="?orderid=order">Order Now</a>
	</div>	

<?php include 'inc/footer.php';?>