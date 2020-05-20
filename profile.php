<?php include 'inc/header.php';?>
<?php
	$login = Session::get('customerlogin');
	if ($login == false) {
		header("Location:login.php");
	}
?>
<style>
	.tblone{
		width: 650px;
		margin: 0 auto;
		border: 1px solid #ddd;
	}
	.tblone tr td{
		text-align: justify;
	}
	.tblone tr td a{
		display: block;
		text-align: center;
	}
</style>
	<div class="header_bottom">
		<?php
			$id = Session::get("customerId");
			$getdata = $cus->getCustomerData($id);
			if ($getdata) {
				while ($result = $getdata->fetch_assoc()) {
		?>
		<table class="tblone">
			<tr>
				<th colspan="3">Your Profile</th>
			</tr>
			<tr>
				<td width="20%">Name</td>
				<td width="5%">:</td>
				<td><?php echo $result['name']?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td><?php echo $result['email']?></td>
			</tr>
			<tr>
				<td>Phone</td>
				<td>:</td>
				<td><?php echo $result['phoneno']?></td>
			</tr>
			<tr>
				<td>Address</td>
				<td>:</td>
				<td><?php echo $result['staddress']?></td>
			</tr>
			<tr>
				<td>City</td>
				<td>:</td>
				<td><?php echo $result['city']?></td>
			</tr>
			<tr>
				<td>Post Code</td>
				<td>:</td>
				<td><?php echo $result['postcode']?></td>
			</tr>
			<tr>
				<td>Country</td>
				<td>:</td>
				<td><?php echo $result['country']?></td>
			</tr>
			<tr>
				<td colspan="3"><a href="editprofile.php">Update Details</a></td>
			</tr>

		</table>
	<?php } } ?>
						
	</div>	

<?php include 'inc/footer.php';?>