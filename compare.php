<?php include 'inc/header.php';?>
<?php
	$login = Session::get('customerlogin');
	if ($login == false) {
		header("Location:login.php");
	}
?>
<style>
	.tblone{width: 100%;}
	.tblone img { width: 80px;height: 50px;}
</style>
		<!------------CART HTML START---------------->
    <div class="cart_main">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Compare</h2>
						<table class="tblone">
							<tr>
								<th>SL</th>
								<th>Product Name</th>
								<th>Price</th>
								<th>Image</th>
								<th>Remove</th>
							</tr>
							<?php
								$customerId = Session::get('customerId');
								$getPr = $prd->getCompareData($customerId);
								if ($getPr) {
									$i = 0; 
									while ($result = $getPr->fetch_assoc()) {
										$i++;
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $result['productName']; ?></td>
								<td>$<?php echo $result['price']; ?></td>
								<td><img src="admin/<?php echo $result['image']; ?>" alt=""/></td>
								<td><a href="preview.php?proid=<?php echo $result['productId'];?>">View</a></td>
							</tr>
						<?php } } ?>
						</table>
					</div>
					</div>  
					<div class="shopping">
						<div class="Con_shop">
							<a href="index.php"> <img src="images/shopping_cart_add.png" alt="ContinueShopping"/>Continue Shopping</a>
						</div>
				</div>
    </div>


<!------------CART HTML END---------------->

<?php include 'inc/footer.php';?>