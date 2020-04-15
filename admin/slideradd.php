<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
    
	
	

<div class="viewsec">      
		<div class="slideradd_opt">
			<div class="box">
				<h2>Add New Slider</h2>
					<div class="block">               
						 <form action="slideradd.php" method="post" enctype="multipart/form-data">
							<table class="form">     
								<tr>
									<td>
										<label>Title</label>
									</td>
									<td>
										<input type="text" name="title" placeholder="Enter Slider Title..." class="medium" />
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
	
	
	
	