<?php include 'inc/header.php';?>
<?php
    if(!isset($_GET['proid']) || $_GET['proid'] == NULL){
        echo "<script> window.location = '404.php'; </script>";
    }else{
        $id = $_GET['proid'];
    }
   
  
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $quantity = $_POST['quantity'];
            $addCart = $ct->addToCart($quantity,$id);
    }
   
?>


	<!------------HEADER BOTTOM START---------------->
	<!------------MAIN SIDEBAR START---------------->
	<div class="header_bottom">
		<div id="header_bottom_sidebar">
			<aside>
				<h2>Categories</h2>
				<ul>
					<li><a href="#">Products</a></li>
					<li><a href="#">Products</a></li>
					<li><a href="#">Products</a></li>
					<li><a href="#">Products</a></li>
					<li><a href="#">Products</a></li>
					<li><a href="#">Products</a></li>
					<li><a href="#">Products</a></li>
					<li><a href="#">Products</a></li>
					<li><a href="#">Products</a></li>
					<li><a href="#">Products</a></li>
					<li><a href="#">Products</a></li>
					<li><a href="#">Products</a></li>
					<li><a href="#">Products</a></li>
				</ul>
			</aside>
		</div>
		<!------------MAIN SIDEBAR END---------------->
		<!------------HEADER BOTTOM RIGHT---------------->
		<div class="header_bottom_right">
			
		</div>	
			<!------------HEADER BOTTOM RIGHT--------------->
		<div class="details_main">	
			<?php
				$getpd = $prd->getSingleProduct($id);
				if ($getpd) {
					while ($result = $getpd->fetch_assoc()) {

			?>
				<div class="pre_con">
					<div class="details_img">
						<img src="admin/<?php echo $result['image'];?>" alt="" />
					</div>
				<div class="pre_details">
					<h2><?php echo $result['productName'];?></h2>				
					<div class="price">
						<p>Price:$<?php echo $result['price'];?></p>
						<p>Category:<?php echo $result['category_Name'];?></p>
						<p>Brand:<?php echo $result['brandName'];?></p>
					</div>
				<div class="add_cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>				
				</div>
				<span style="color: red;font-size: 18px;">
					<?php
						if (isset($addCart)) {
							echo $addCart;
						}

					?>
				</span>	
			</div>
			</div>
			<div class="product_details">
				<h2>Product Details</h2>
				<?php echo $result['body'];?>
			</div>	
		<?php } } ?>				
	</div>	

<!------------HEADER BOTTOM END---------------->

</div>

<!------------MAIN PRODUCT SECTION START---------------->
 <div class="main_product">
    		<div class="heading">
    		<h2>Products</h2>
    		</div>
	
	      <div class="main_product_group1">
				<div class="main_product_1">
					 <a href="preview.php"><img src="images/pic4.png" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>
					 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
					 <p><span class="price">$505.22</span></p>
				     <div class="button"><span><a href="preview.php" class="details">Details</a></span></div>
				</div>
				<div class="main_product_1">
					 <a href="preview.php"><img src="images/pic4.png" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>
					 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
					 <p><span class="price">$505.22</span></p>
				     <div class="button"><span><a href="preview.php" class="details">Details</a></span></div>
				</div>
				<div class="main_product_1">
					 <a href="preview.php"><img src="images/pic4.png" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>
					 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
					 <p><span class="price">$505.22</span></p>
				     <div class="button"><span><a href="preview.php" class="details">Details</a></span></div>
				</div>
				<div class="main_product_1">
					 <a href="preview.php"><img src="images/pic4.png" alt="" /></a>
					 <h2>Lorem Ipsum is simply </h2>
					 <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
					 <p><span class="price">$505.22</span></p>
				     <div class="button"><span><a href="preview.php" class="details">Details</a></span></div>
				</div>
				


			</div>	
</div>
<!------------MAIN PRODUCT SECTION END---------------->



<?php include 'inc/footer.php';?>