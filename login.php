<?php include 'inc/header.php';?>
<?php
	$login = Session::get('customerlogin');
	if ($login == true) {
		header("Location:order.php");
	}
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
            $customerLog = $cus->customerLogin($_POST);
    }
?>		

    	 <div class="login_form">
			<div class="login_contant">
				<?php
					if (isset($customerLog)) {
						echo  $customerLog;
					}
				?>
        	 <h2>Existing Customers</h2>
			 <form name="loginform" action="" method="post"">
					<label>Email</label>
					<input type="text" placeholder="Enter Email" name="email">
					<label>Password</label>
					<input type="password" placeholder="Enter Password" name="pass">
					
					<input type="submit" name="login" value="SUBMIT">
					
					<p>Forgot your passoword, click <a href="#">Here</a></p>
			</form>		
			</div>	  
         </div>
<?php include 'inc/footer.php';?>
