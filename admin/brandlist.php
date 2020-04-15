<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>

<?php
	$brand = new Brand();
	if(isset($_GET['deletebrand'])){
		$id = $_GET['deletebrand'];
		$deletebrand = $brand->deletebrandById($id);
	}
?>
	
	<div class="viewsec">      
        <div class="catlist">
            <div class="box ">
                <h2>Brand List</h2>
                <div class="block">        
                <?
                	if(isset($deletebrand)){
                		echo $deletebrand;
                	}
                	
                ?>	
                    <table class="datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Brand Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$getBrand = $brand->getAllBrand();
							if($getBrand){
								$i = 0;
								while($result = $getBrand->fetch_assoc()){
									$i++;
								
						?>
						<tr class="odd">
							<td><?php echo $i;?></td>
							<td><?php echo $result['brandName'];?></td>
							<td><a href="brandEdit.php?brandId=<?php echo $result['brandId'];?>">Edit</a> || <a onclick="return confirm('Are You Sure? you want to delete')" href="?deletebrand=<?php echo $result['brandId'];?>">Delete</a></td>
						</tr>
                       <?php } } ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
	</div>	
</div>	
	
</body>
	
	
	
	