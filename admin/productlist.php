<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Product.php';?>
<?php include_once '../helpers/Format.php';?>

<?php 
	$prd = new Product();
	$fm = new Format();
?>
		
<div class="viewsec">      
		<div class="addproduct">
<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>SL</th>
					<th>Product Name</th>
					<th>Category</th>
					<th>Brand Name</th>
					<th>Description</th>
					<th>Price</th>
					<th>Image</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$getPrd = $prd->getAllProduct();
					if($getPrd){
						$i = 0;
						while ($result = $getPrd->fetch_assoc()) {
							$i++;
				?>
				<tr class="odd">
					<td><?php echo $i;?></td>
					<td><?php echo $result['productName'];?></td>
					<td><?php echo $result['category_Name'];?></td>
					<td><?php echo $result['brandName'];?></td>
					<td><?php echo $fm->textShorten($result['body'], 50);?></td>
					<td>$<?php echo $result['price'];?></td>
					<td><img src="<?php echo $result['image'];?>"/></td>
					<td>
						
						<?php 
							if($result['type'] == 0) {
								echo "Fetured";
							}else{
								echo "NonFeatured";
							}
						?>

					</td>
					<td><a href="productEdit.php?productId=<?php echo $result['productId'];?>">Edit</a> || <a onclick="return confirm('Are You Sure? you want to delete')" href="?deleteproduct=<?php echo $result['productId'];?>">Delete</a></td>
				</tr>

				<?php }}?>

			</tbody>
		</table>

       </div>
    </div>
</div>
	</div>	
</div>	
	
</body>
	
	
	
	