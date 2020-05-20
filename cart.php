<?php include 'inc/header.php';?>
		<!------------CART HTML START---------------->
<?php
	
	if (isset ($_GET['delpro'])) {
		$delid = $_GET['delpro'];
		$delProduct = $ct->delProductByCart($delid);
	}
?>
<?php
	 if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $cartId = $_POST['cartId'];
        $quantity = $_POST['quantity'];
        $UpdateCart = $ct->UpdateCart($cartId,$quantity);
        if ($quantity <= 0) {
        	$delProduct = $ct->delProductByCart($cartId);
        }
	}
?>
<?php
	if (!isset($_GET['id'])) {
		echo "<meta http-equiv='refresh' content='0;URL=?id=live'/>";
	}
?>
    <div class="cart_main">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
			    	<?php
						if (isset($UpdateCart)) {
							echo $UpdateCart;
						}
					?>
					<?php
						if (isset($delProduct)) {
							echo $delProduct;
						}
					?>
						<table class="tblone">
							<tr>
								<th class="">SL</th>
								<th class="th_1">Image</th>
								<th  class="th_2">Product Name</th>
								<th class="th_3">Price</th>
								<th class="th_4">Quantity</th>
								<th class="th_5">Total Price</th>
								<th class="th_6">Remove</th>
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
								<td><img src="admin/<?php echo $result['image']; ?>" alt=""/></td>
								<td><?php echo $result['productName']; ?></td>
								<td>$<?php echo $result['price']; ?></td>
								<td>


									<form action="" method="post">
										<input type="hidden" name="cartId" value="<?php echo $result['cartId']; ?>"/>

										<input type="number" name="quantity" value="<?php echo $result['quantity']; ?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>


								</td>
								<td>
									$<?php 
										$total = $result['price'] * $result['quantity'];
										echo $total;
									 ?>	
									</td>
								<td><a onclick="return confirm('Are you sure to delete this product');" href="?delpro=<?php echo $result['cartId']; ?>">X</a></td>
							</tr>
							<?php
								 $qty = $qty + $result['quantity'];
								 $sum = $sum + $total;
								 Session::set("qty", $qty); 
								 Session::set("sum", $sum); 
							?>
						<?php } } ?>
						</table>
						<table class="tbltwo"> 
							<?php
								$getData = $ct->checkCartTable();
								 if ($getData) {
							?>
							<tr>
								<th>Sub Total : </th>
								<td>$ <?php echo $sum ?></td>
							</tr>
							<tr>
								<th>Tax : </th>
								<td>10%</td>
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
					   </table>
					   <?php
					   	}else{
					   		header("Location:index.php");
					   		//echo "Cart Empty";
					   	}
					   ?>
					</div>
					</div>  
					<div class="shopping">
						<div class="Con_shop">
							<a href="index.php"> <img src="images/shopping_cart_add.png" alt="ContinueShopping"/>Continue Shopping</a>
						</div>
						<div class="Check_shop">
							<a href="payment.php"> <img src="images/iconfinder_check.png" alt="CheckOut" />CheckOut</a>
						</div>
				</div>
    </div>


<!------------CART HTML END---------------->

<?php include 'inc/footer.php';?>