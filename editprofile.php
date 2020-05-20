<?php include 'inc/header.php';?>
<?php
	$login = Session::get('customerlogin');
	if ($login == false) {
		header("Location:login.php");
	}
?>
<?php
	$customerId = Session::get('customerId');
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
            $updateCMR = $cus->customerUpdate($_POST,$customerId);
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
	.tblone input[type="text"]{width: 400px;padding: 5px;font-size: 15px;}
	.tblone input[type="submit"]{padding: 10px; font-size: 16px;margin: 0 auto;display: block;}
</style>
	<div class="header_bottom">
		<?php
			$id = Session::get("customerId");
			$getdata = $cus->getCustomerData($id);
			if ($getdata) {
				while ($result = $getdata->fetch_assoc()) {
		?>
		<form action="" method="POST">
		<table class="tblone">
			<?php
				if (isset($updateCMR)) {
					echo	"<tr><th colspan='2'>".$updateCMR."</th></tr>";
				}
			?>
			
			<tr>
				<th colspan="2">Update Your Profile</th>
			</tr>
			<tr>
				<td width="20%">Name</td>
				<td><input type="text" name="name" value="<?php echo $result['name']?>"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $result['email']?>"></td>
			</tr>
			<tr>
				<td>Phone</td>
				<td><input type="text" name="phoneno" value="<?php echo $result['phoneno']?>"></td>
			</tr>
			<tr>
				<td>Address</td>
				<td><input type="text" name="staddress" value="<?php echo $result['staddress']?>"></td>
			</tr>
			<tr>
				<td>City</td>
				<td><input type="text" name="city" value="<?php echo $result['city']?>"></td>
			</tr>
			<tr>
				<td>Post Code</td>
				<td><input type="text" name="postcode" value="<?php echo $result['postcode']?>"></td>
			</tr>
			<tr>
				<td>Country</td>
				<td><input type="text" name="country" value="<?php echo $result['country']?>"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Save"></td>
			</tr>

		</table>
		</form>
	<?php } } ?>
						
	</div>	

<?php include 'inc/footer.php';?>