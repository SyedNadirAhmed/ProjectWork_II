<?php include '../classes/Adminlogin.php';?>
	<?php
		$al = new Adminlogin();
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			$adminUser = $_POST['adminUser'];
			$adminPass = md5($_POST['adminPass']);

			$loginCheck = $al->adminLogin($adminUser,$adminPass);
		}
	?>

<!DOCTYPE HTML>
<head>
<title>Admin Login</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">
<link href="login.css" rel="stylesheet"/>
</head>
<body>
<div class="wrapper">		
    	 <div class="login_form">
			<div class="login_contant">
        	 <h2>Admin Login</h2>
        	 <span style="color:#FFF;font-size: 25px;">
        	 	<?php
        	 		if(isset($loginCheck)){
        	 			echo $loginCheck;
        	 		}
        	 	?>
        	 </span>
			 <form name="loginform" action="" method="POST">
					<label>Username</label>
					<input type="text" placeholder="Enter Username" name="adminUser">
					<label>Password</label>
					<input type="password" placeholder="Enter Password" name="adminPass">
					
					<input type="submit" value="SUBMIT">
					
			</form>		
			</div>	  
         </div>
</div>
</body>
</html>
