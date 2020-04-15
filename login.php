<?php include 'inc/header.php';?>
		
    	 <div class="login_form">
			<div class="login_contant">
        	 <h2>Existing Customers</h2>
			 <form name="loginform" action="" method="get" id="member" onsubmit="return validateform();">
					<label>Username</label>
					<input type="text" placeholder="Enter Username" name="uname" required>
					<label>Password</label>
					<input type="password" placeholder="Enter Password" name="psw" required>
					
					<input type="submit" value="SUBMIT">
					
					<p>Forgot your passoword, click <a href="#">Here</a></p>
			</form>		
			</div>	  
         </div>
<?php include 'inc/footer.php';?>
