<?php include 'inc/header.php';?>
<?php
	$login = Session::get('customerlogin');
	if ($login == false) {
		header("Location:login.php");
	}
?>
<style>
	.main{
		width: 100%;
		height: 300px;
	}
	.npage{
		text-align: center;
	}
	.npage h2{
		line-height: 100px;
		font-size: 50px;
	}
	.tblone{
		width: 100%;
	}
</style>
		<!------------CART HTML START---------------->
		<?php
			$login = Session::get('customerlogin');
			if ($login == false) {
				header("Location:login.php");
			}
		?>
		<?php
			if (isset($_GET['customerId'])) {
				$id 	= $_GET['customerId'];
				$time 	= $_GET['time'];
				$price 	= $_GET['price'];

				$confirm = $ct->productshifConfirm($id,$time,$price);
			}
		?>
<div class="main">
	<div class="npage">
		<h2>Your Order Details</h2>
		<table class="tblone">
		<tr>
			<th>No</th>
			<th>Image</th>
			<th>Product Name</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Order Date</th>
			<th>Status</th>
			<th>Remove</th>
		</tr>
		<?php
			$customerId = Session::get('customerId');
			$getOrder = $ct->getOrderProduct($customerId);
			if ($getOrder) {
				$i = 0; 
				while ($result = $getOrder->fetch_assoc()) {
					$i++;
		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><img src="admin/<?php echo $result['image']; ?>" alt=""/></td>
			<td><?php echo $result['productName']; ?></td>
			<td><?php echo $result['quantity']; ?></td>
			<td>
				$<?php 
					echo $result['price'];
				 ?>	
			</td>
			<td><?php echo $fm->formatDate($result['date']); ?></td>
			<td>
				<?php
					if ($result['status'] == '0') {
						echo "Pending";
					}elseif ($result['status'] == '1') {
						echo "Shifted";
					}else{
						echo "Ok";
					}
				?>
			</td>
			
				<?php
					if ($result['status'] == '1') { ?>
						<td><a href="?customerId=<?php echo $customerId;?>&price=<?php echo  $result['price'];?>&time=<?php echo $result['date'];?>">Confirm</a></td>

					<?php	}elseif($result['status'] == '2'){?>
						<td>Ok</td>
				<?php	}elseif ($result['status'] == '0') {?>
					<td>N/A</td>
				<?php	} ?>
		</tr>
	<?php } } ?>
	</table>
	</div>

</div>


<!------------CART HTML END---------------->

<?php include 'inc/footer.php';?>