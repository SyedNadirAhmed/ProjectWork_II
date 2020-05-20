<?php include 'inc/header.php';?>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
            $customerReg = $cus->customerRegistration($_POST);
    }
?>
     <div class="registration_form">

			<div class="registration_contant">
				<h2>Customer Registration</h2>
				<?php
					if (isset($customerReg)) {
						echo $customerReg;
					}
				?>
				<form name="registerform" action="" method="POST" onsubmit="return validateform();">
				   <input type="text" name="name" placeholder="Name*">
				   <input type="text" name="email" placeholder="E-mail*">
				   <input type="password" name="pass" placeholder="password*">
				   
				   <p>Address Details</P>
				   <input type="text" name="phoneno" placeholder="Phone no*">
				   <input type="text" name="country" placeholder="Country*">
				   <input type="text" name="city" placeholder="City*">
				   <input type="text" name="staddress" placeholder="Street address*"> 
				   <input type="text" name="postcode" placeholder="Post code*">
				   <div style="color:#fff;font-size:20px;" id="show"> </div>
				   <input type="submit" name="submit" value="Submit">
				</form>
				<script>
					function validateform(){
						var name = document.registerform.name;
						var email = document.registerform.email;
						var pass = document.registerform.pass;
						var phoneno = document.registerform.phoneno;
						var country = document.registerform.country;
						var city = document.registerform.city;
						var staddress = document.registerform.staddress;
						var post = document.registerform.post;
						if(name.value == ""){
							document.getElementById("show").innerHTML="Please Enter Your Name";
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
						if(phoneno.value == ""){
							document.getElementById("show").innerHTML="Please Enter Your PhoneNumber";
							return false;
						}
						if(country.value == ""){
							document.getElementById("show").innerHTML="Please Enter Your Country Address";
							return false;
						}
						if(city.value == ""){
							document.getElementById("show").innerHTML="Please Enter Your City Address";
							return false;
						}
						if(staddress.value == ""){
							document.getElementById("show").innerHTML="Please Enter Your Address";
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
