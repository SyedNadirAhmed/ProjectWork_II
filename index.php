<?php include 'inc/header.php';?>
<?php include 'inc/slider.php';?>
	<!------------HEADER BOTTOM START---------------->
	<!------------MAIN SIDEBAR START---------------->
	<div class="header_bottom">
		<div id="header_bottom_sidebar">
			<aside>
				<h2>Categories</h2>
				<ul>
					<?php
						$getCat = $ctg->getAllcat();
						if ($getCat) {
						 	while ($result = $getCat->fetch_assoc()) {
					?>
					<li><a href="productsbycategory.php?catId=<?php echo $result['category_Id']?>"><?php echo $result['category_Name']?></a></li>
					<?php } } ?>
				</ul>
			</aside>
		</div>
		<!------------MAIN SIDEBAR END---------------->
		<!------------HEADER BOTTOM RIGHT, PRODUCTS---------------->
		<div class="header_bottom_right">	
			<div class="Products_group1">
				<?php
					$getlatestproOne = $prd->getLatestProOne();
					if ($getlatestproOne) {
						while ($result = $getlatestproOne->fetch_assoc()) {
				?>
				<div class="Products_group1_product1">
					<div class="listimg1">
						 <a href="preview.php?proid=<?php echo $result['productId'];?>"> <img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					</div>
				    <div class="listimg1_text">
						<h2>Computer</h2>
						<p><?php echo $result['productName'];?></p>
						<div class="button"><span><a href="preview.php?proid=<?php echo $result['productId'];?>">Add to cart</a></span></div>
				   </div>
			   </div>	
			  

			   <div class="Products_group1_product1">
					<div class="listimg1">
						 <a href="preview.php?proid=<?php echo $result['productId'];?>"> <img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					</div>
				    <div class="listimg1_text">
						<h2>Computer</h2>
						<p><?php echo $result['productName'];?></p>
						<div class="button"><span><a href="preview.php?proid=<?php echo $result['productId'];?>">Add to cart</a></span></div>
				   </div>
			   </div>
			    <?php } } ?>	


			  <?php
					$getlatestproTwo = $prd->getLatestProTwo();
					if ($getlatestproTwo) {
						while ($result = $getlatestproTwo->fetch_assoc()) {
				?>
				<div class="Products_group1_product1">
					<div class="listimg1">
						 <a href="preview.php?proid=<?php echo $result['productId'];?>"> <img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					</div>
				    <div class="listimg1_text">
						<h2>Computer</h2>
						<p><?php echo $result['productName'];?></p>
						<div class="button"><span><a href="preview.php?proid=<?php echo $result['productId'];?>">Add to cart</a></span></div>
				   </div>
			   </div>	
			  

			   <div class="Products_group1_product1">
					<div class="listimg1">
						 <a href="preview.php?proid=<?php echo $result['productId'];?>"> <img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					</div>
				    <div class="listimg1_text">
						<h2>Computer</h2>
						<p><?php echo $result['productName'];?></p>
						<div class="button"><span><a href="preview.php?proid=<?php echo $result['productId'];?>">Add to cart</a></span></div>
				   </div>
			   </div>
			    <?php } } ?>		
	
				<?php
					$getlatestproThree = $prd->getLatestProThree();
					if ($getlatestproThree) {
						while ($result = $getlatestproThree->fetch_assoc()) {
				?>
				<div class="Products_group1_product1">
					<div class="listimg1">
						 <a href="preview.php?proid=<?php echo $result['productId'];?>"> <img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					</div>
				    <div class="listimg1_text">
						<h2>Computer</h2>
						<p><?php echo $result['productName'];?></p>
						<div class="button"><span><a href="preview.php?proid=<?php echo $result['productId'];?>">Add to cart</a></span></div>
				   </div>
			   </div>	
			  

			   <div class="Products_group1_product1">
					<div class="listimg1">
						 <a href="preview.php?proid=<?php echo $result['productId'];?>"> <img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					</div>
				    <div class="listimg1_text">
						<h2>Computer</h2>
						<p><?php echo $result['productName'];?></p>
						<div class="button"><span><a href="preview.php?proid=<?php echo $result['productId'];?>">Add to cart</a></span></div>
				   </div>
			   </div>
			    <?php } } ?>

			    <?php
					$getlatestproFour = $prd->getLatestProFour();
					if ($getlatestproFour) {
						while ($result = $getlatestproFour->fetch_assoc()) {
				?>
			   <div class="Products_group1_product1">
					<div class="listimg1">
						 <a href="preview.php?proid=<?php echo $result['productId'];?>"> <img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					</div>
				    <div class="listimg1_text">
						<h2>Computer</h2>
						<p><?php echo $result['productName'];?></p>
						<div class="button"><span><a href="preview.php?proid=<?php echo $result['productId'];?>">Add to cart</a></span></div>
				   </div>
			   </div>
			   <?php } } ?>

				<?php
					$getlatestproFive = $prd->getLatestProFive();
					if ($getlatestproFive) {
						while ($result = $getlatestproFive->fetch_assoc()) {
				?>
			   <div class="Products_group1_product1">
					<div class="listimg1">
						 <a href="preview.php?proid=<?php echo $result['productId'];?>"> <img src="admin/<?php echo $result['image'];?>" alt="" /></a>
					</div>
				    <div class="listimg1_text">
						<h2>Computer</h2>
						<p><?php echo $result['productName'];?></p>
						<div class="button"><span><a href="preview.php?proid=<?php echo $result['productId'];?>">Add to cart</a></span></div>
				   </div>
			   </div>
			   <?php } } ?>		

			</div>
			
		</div>	
			<!------------HEADER BOTTOM RIGHT, PRODUCTS END---------------->
	</div>	

<!------------HEADER BOTTOM END---------------->



<!------------MAIN PRODUCT SECTION START---------------->
 <div class="main_product">
    		<div class="heading">
    		<h2>Products</h2>
    		</div>
	
	      <div class="main_product_group1">
	      		<?php
	      			$getProducts = $prd->getProducts();
	      			if ($getProducts) {
	      				while ($result = $getProducts->fetch_assoc()) {
	      			
	      		?>
				<div class="main_product_1">
					 <a href="preview.php?proid=<?php echo $result['productId'];?>">
					 	<img src="admin/<?php echo $result['image'];?>" alt="" />
					 </a>
					 <h2><?php echo $result['productName'];?></h2>
					 <p><?php echo  $fm->textShorten($result['body'],50);?></p>
					 <p><span class="price">$<?php echo $result['price'];?></span></p>
				     <div class="button"><span><a href="preview.php?proid=<?php echo $result['productId'];?>" class="details">Details</a></span></div>
				</div>
			
			<?php } } ?>

			</div>	
</div>
<!------------MAIN PRODUCT SECTION END---------------->
<?php include 'inc/footer.php';?>



