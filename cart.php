<?php include 'inc/header.php';?>
		<!------------CART HTML START---------------->

    <div class="cart_main">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
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
								<td><a href="">X</a></td>
							</tr>
							<?php $sum = $sum + $total ?>
						<?php } } ?>
						</table>
						<table class="tbltwo"> 
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
					</div>
					</div>  
					<div class="shopping">
						<div class="Con_shop">
							<a href="index.php"> <img src="images/shopping_cart_add.png" alt="ContinueShopping"/>Continue Shopping</a>
						</div>
						<div class="Check_shop">
							<a href="login.php"> <img src="images/iconfinder_check.png" alt="CheckOut" />CheckOut</a>
						</div>
				</div>
    </div>


<!------------CART HTML END---------------->

<?php include 'inc/footer.php';?>