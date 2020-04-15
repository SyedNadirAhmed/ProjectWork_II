<?php include 'inc/header.php';?>
		<!------------CART HTML START---------------->

    <div class="cart_main">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
						<table class="tblone">
							<tr>
								<th class="th_1">Image</th>
								<th  class="th_2">Product Name</th>
								<th class="th_3">Price</th>
								<th class="th_4">Quantity</th>
								<th class="th_5">Total Price</th>
								<th class="th_6">Remove</th>
							</tr>
							<tr>
								<td><img src="images/new-pic1.jpg" alt=""/></td>
								<td>Product Title</td>
								<td>Tk. 20000</td>
								<td>
									<form action="" method="post">
										<input type="number" name="" value="1"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td>Tk. 40000</td>
								<td><a href="">X</a></td>
							</tr>
						</table>
						<table class="tbltwo"> 
							<tr>
								<th>Sub Total : </th>
								<td>TK. 1000</td>
							</tr>
							<tr>
								<th>Tax : </th>
								<td>TK. 3500</td>
							</tr>
							<tr>
								<th>Total :</th>
								<td>TK. 4500 </td>
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