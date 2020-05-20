<?php include 'inc/header.php';?>

<?php

	if(!isset($_GET['catId']) || $_GET['catId'] == NULL){
	    echo "<script> window.location = '404.php'; </script>";
	}else{
	    $id = $_GET['catId'];
	}

?>

<!------------MAIN PRODUCT SECTION START---------------->
 <div class="main_product">
    		<div class="heading">
    		<h2>Category Products</h2>
    		</div>
			
	      <div class="main_product_group1">
				<?php
					$getproductbycat = $prd->productByCat($id);
					if ($getproductbycat) {
						while ($result = $getproductbycat->fetch_assoc()) {
				?>
				<div class="main_product_1">
					 <a href="preview.php?proid=<?php echo $result['productId'];?>"> <img src="admin/<?php echo $result['image'];?>" alt="" /></a> 
					 <p><?php echo $result['productName'];?></p>
					 <p><?php echo  $fm->textShorten($result['body'],50);?></p>
					 <p><span class="price">$<?php echo $result['price'];?></span></p>
				     <div class="button"><span><a href="preview.php?proid=<?php echo $result['productId'];?>" class="details">Details</a></span></div>
				</div>
 				<?php } } else{
 					echo "<p style='font-size:26px;padding:20px;text-align:center;color:red;'>Products of this category are not available</p>";
 				} ?>
		</div>
<!------------MAIN PRODUCT SECTION END---------------->
<?php include 'inc/footer.php';?>
