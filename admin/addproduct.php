<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/Category.php';?>
<?php include '../classes/Product.php';?>
<?php

    $prd = new Product();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
            $insertProduct = $prd->productInsert($_POST,$_FILES);
    }

?>
	
		
	<div class="viewsec">      
		<div class="addproduct">
			<div class="box">
				<h2>Add New Product</h2>
				<div class="block"> 
				<?php 
					if(isset($insertProduct)){
						echo $insertProduct;
					}
				?>              
				 <form action="" method="post" enctype="multipart/form-data">
					<table class="form">
					   
						<tr>
							<td>
								<label>Name</label>
							</td>
							<td>
								<input type="text" name="productName" placeholder="Enter Product Name" class="medium" />
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
									<option value="<?php echo $result['category_Id'];?>"><?php echo $result['category_Name'];?></option>

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
									<option value="<?php echo $result['brandId'];?>"><?php echo $result['brandName'];?></option>

									<?php } } ?>
								</select>
							</td>
						</tr>
						
						 <tr>
							<td>
								<label>Description</label>
							</td>
							<td>
								<textarea name="body" class="txt"></textarea>
							</td>
						</tr>
						<tr>
							<td>
								<label>Price</label>
							</td>
							<td>
								<input type="text" name="price" placeholder="Enter Price..." class="medium" />
							</td>
						</tr>
					
						<tr>
							<td>
								<label>Upload Image</label>
							</td>
							<td>
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
									<option value="0">Featured</option>
									<option value="1">Non-Featured</option>
								</select>
							</td>
						</tr>

						<tr>
							<td></td>
							<td>
								<input type="submit" name="submit" Value="Save" />
							</td>
						</tr>
					</table>
					</form>
				</div>
			</div>
</div>
	</div>	
</div>	
	
</body>
	
	
	
	