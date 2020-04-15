<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Category.php';?>

<?php
	$cat = new Category();
	if(isset($_GET['deletecategory'])){
		$id = $_GET['deletecategory'];
		$deletecategory = $cat->deletecategoryById($id);
	}
?>
	
	<div class="viewsec">      
        <div class="catlist">
            <div class="box ">
                <h2>Category List</h2>
                <div class="block">        
                <?
                	if(isset($deletecategory)){
                		echo $deletecategory;
                	}
                ?>	
                    <table class="datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$getcat = $cat->getAllcat();
							if($getcat){
								$i = 0;
								while($result = $getcat->fetch_assoc()){
									$i++;
								
						?>
						<tr class="odd">
							<td><?php echo $i;?></td>
							<td><?php echo $result['category_Name'];?></td>
							<td><a href="catEdit.php?categoryId=<?php echo $result['category_Id'];?>">Edit</a> || <a onclick="return confirm('Are You Sure? you want to delete')" href="?deletecategory=<?php echo $result['category_Id'];?>">Delete</a></td>
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
	
	
	
	