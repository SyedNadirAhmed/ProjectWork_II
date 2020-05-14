<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/Category.php';?>
<?php include '../classes/Product.php';?>
<?php

    if(!isset($_GET['productId']) || $_GET['productId'] == NULL){
        echo "<script> window.location = 'productlist.php'; </script>";
    }else{
        $id = $_GET['productId'];
    }

    $prd = new Product();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
            $updateProduct = $prd->productUpdate($_POST,$_FILES,$id);
    }

?>
	
		
	<div class="viewsec">      
		<div class="addproduct">
			<div class="box">
				<h2>Update Product</h2>
				<div class="block"> 
				<?php 
					if(isset($updateProduct)){
						echo $updateProduct;
					}
				?>  
				<?php
					$getProduct = $prd->getProById($id);
					if ($getProduct) {
						while ($value = $getProduct->fetch_assoc()) {
							

				?>            
				 <form action="" method="post" enctype="multipart/form-data">
					<table class="form">
					   
						<tr>
							<td>
								<label>Name</label>
							</td>
							<td>
								<input type="text" name="productName" value="<?php echo $value['productName'];?>" class="medium" />
							</td>
						</tr>
						<tr>
							<td>
								<label>Category</label>
							</td>
							<td>
								<select id="select" name="category_Id">
									<option>Select Category</option>
										<?php
											$cat = new Category();
											$getcat = $cat->getAllcat();
											if($getcat){
												while($result = $getcat->fetch_assoc()){
											
										?>
									<option 
										<?php
											if ($value['category_Id'] == $result['category_Id']) { ?>
												selected = "selected"
											<?php } ?>

									value="<?php echo $result['category_Id'];?>"><?php echo $result['category_Name'];?> </option>

									<?php } } ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>
								<label>Brand</label>
							</td>
							<td>
								<select id="select" name="brandId">
									<option>Select Brand</option>
									<?php
										$brand = new Brand();
										$getBrand = $brand->getAllBrand();
										if($getBrand){
											while($result = $getBrand->fetch_assoc()){
										
									?>
									<option 
										<?php
											if ($value['brandId'] == $result['brandId']) { ?>
												selected = "selected"
											<?php } ?>

									value="<?php echo $result['brandId'];?>"><?php echo $result['brandName']; ?> 
									</option>

									<?php } } ?>
								</select>
							</td>
						</tr>
						
						 <tr>
							<td>
								<label>Description</label>
							</td>
							<td>
								<textarea name="body" class="txt">
									
									<?php echo $value['body'];?>
								</textarea>
							</td>
						</tr>
						<tr>
							<td>
								<label>Price</label>
							</td>
							<td>
								<input type="text" name="price" value="<?php echo $value['price'];?>" class="medium" />
							</td>
						</tr>
					
						<tr>
							<td>
								<label>Upload Image</label>
							</td>
							<td>
								<img src="<?php echo $value['image'];?>"/><br/>
								<input type="file" name="image"/>
							</td>
						</tr>
						
						<tr>
							<td>
								<label>Product Type</label>
							</td>
							<td>
								<select id="select" name="type">
									<option>Select Type</option>

									<?php
										if ($value['type'] == 0) { ?>	
											
										<option selected = "selected" value="0">Featured</option>
										<option value="1">Non-Featured</option>

									<?php	}  else { ?>	

									<option value="0">Featured</option>
									<option selected = "selected" value="1">Non-Featured</option>

									<?php } ?>

								</select>
							</td>
						</tr>

						<tr>
							<td></td>
							<td>
								<input type="submit" name="submit" Value="Update" />
							</td>
						</tr>
					</table>
					</form>

					<?php }} ?>

				</div>
			</div>
</div>
	</div>	
</div>	
	
</body>
	
	
	
	