<?php include 'inc/header.php';?>
<?php
    if(!isset($_GET['proid']) || $_GET['proid'] == NULL){
        echo "<script>window.location = '404.php';</script>";
    }else{
    	$id = $_GET['proid'];
    }
   
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
            $quantity = $_POST['quantity'];
            $addCart = $ct->addToCart($quantity,$id);
    }
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Compare'])){
    		$productId = $_POST['productId'];
            $insertCompare = $prd->insertCompareDate($productId,$customerId);
    }
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wlist'])){
            $saveWlist = $prd->saveWishListData($id,$customerId);
    }
?>
<style>
	.add_cart form{padding: 5px;}
</style>
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
						if (isset($saveWlist)) {
							echo $saveWlist;
						}
					?>
				</span>	
				<?php
					if (isset($insertCompare)) {
						echo $insertCompare;
					}
				?>
				
					<?php
						$login = Session::get('customerlogin');
						if ($login == true) {?>
				<div class="add_cart">
					<form action="" method="post">
					<input type="hidden" class="buyfield" name="productId" value="<?php echo $result['productId'];?>"/>
						<input type="submit" class="buysubmit" name="Compare" value="Add To Compare"/>
					</form>		

					<form action="" method="post">
						<input type="submit" class="buysubmit" name="wlist" value="Wish List"/>
					</form>			
				</div>
			<?php } ?>
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

<?php include 'inc/footer.php';?>