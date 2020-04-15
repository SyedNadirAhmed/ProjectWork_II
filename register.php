<?php include 'inc/header.php';?>

     <div class="registration_form">
			<div class="registration_contant">
			
				<h2>Registration Form</h2>
				//login.php
				<form name="registerform" action="" method="get" onsubmit="return validateform();">
				   <input type="text" name="username" placeholder="Username*">
				   	<input type="text" name="firstname" placeholder="First name*">
				   <input type="text" name="lastname" placeholder="Last name*">
				   <input type="text" name="email" placeholder="E-mail*">
				   <input type="password" name="pass" placeholder="password*">
				   <input type="password" name="repass" placeholder="Retype password*">
				   
				   <p>Address Details</P>
				   <input type="text" name="phoneno" placeholder="Phone no*">
				   <input type="text" name="address" placeholder="Street address*">
				   <input type="text" name="city" placeholder="City*">
				   <input type="text" name="post" placeholder="Post code*">
				   <div style="color:#fff;font-size:20px;" id="show"> </div>
				   <input type="submit" name="submit" value="Submit">
				 

				</form>
				<script>
					function validateform(){
						var Username = document.registerform.username;
						var firstname = document.registerform.firstname;
						var lastname = document.registerform.lastname;
						var email = document.registerform.email;
						var pass = document.registerform.pass;
						var repass = document.registerform.repass;
						var phoneno = document.registerform.phoneno;
						var address = document.registerform.address;
						var city = document.registerform.city;
						var post = document.registerform.post;
						if(Username.value == ""){
							document.getElementById("show").innerHTML="Please Enter Your Username";
							return false;
						}
						if(firstname.value == ""){
							document.getElementById("show").innerHTML="Please Enter Your FirstName";
							return false;
						}
						if(lastname.value == ""){
							document.getElementById("show").innerHTML="Please Enter Your LastName";
							return false;
						}
						if((email.value.indexOf('@',0) < 0) || (email.value.indexOf('.',0) < 0)){
							document.getElementById("show").innerHTML="Please Enter a Valid Email Address";
							return false;
						}
						if(pass.value == ""){
							document.getElementById("show").innerHTML="Please Enter Your PassWord";
							return false;
						}
						if(repass.value == ""){
							document.getElementById("show").innerHTML="Please Retype password";
							return false;
						}
						if(phoneno.value == ""){
							document.getElementById("show").innerHTML="Please Enter Your PhoneNumber";
							return false;
						}
						if(address.value == ""){
							document.getElementById("show").innerHTML="Please Enter Your Address";
							return false;
						}
						if(city.value == ""){
							document.getElementById("show").innerHTML="Please Enter Your City Address";
							return false;
						}
						if(post.value == ""){
							document.getElementById("show").innerHTML="Please Enter Your PostCode";
							return false;
						}
					}
				</script>
			</div>	  
      </div>

<?php include 'inc/footer.php';?>
