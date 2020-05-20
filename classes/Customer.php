<?php 
	$filepath = realpath(dirname(__File__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>
<?php

	class Customer{
		private $db;
		private $fm;
		
		public function __construct(){	
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function customerRegistration($data){
			$name 		= mysqli_real_escape_string($this->db->link,$data['name']);
			$email 		= mysqli_real_escape_string($this->db->link,$data['email']);
			$pass 		= mysqli_real_escape_string($this->db->link,md5($data['pass']));
			$phoneno	= mysqli_real_escape_string($this->db->link,$data['phoneno']);
			$country 	= mysqli_real_escape_string($this->db->link,$data['country']);
			$city 		= mysqli_real_escape_string($this->db->link,$data['city']);
			$staddress 	= mysqli_real_escape_string($this->db->link,$data['staddress']);
			$postcode 	= mysqli_real_escape_string($this->db->link,$data['postcode']); 

			if($name == "" || $email == "" || $pass == "" || $phoneno == "" || $country == "" || $city =="" || $staddress == "" || $postcode == ""){

		    	$msg = "<span style='font-size:20px;padding:10px;color:#fff;'>Fields must not be empty</span>";
		    	return $msg;
		    }
		    $mailcheck = "SELECT * FROM tbl_customer WHERE email = '$email' LIMIT 1";
		    $mailchk = $this->db->select($mailcheck);
		    if ($mailchk == true) {
		    	$msg = "<span style='font-size:20px;padding:10px;color:#fff;'>Email alredy exist!</span>";
		    	return $msg;
		    }else{
		    	$query = "INSERT INTO tbl_customer(name,email,pass,phoneno,country,city,staddress,postcode) VALUES('$name','$email','$pass','$phoneno','$country','$city','$staddress','$postcode')";

		    	$insertcustomerrow = $this->db->insert($query);
				if ($insertcustomerrow) {
					$msg = "<span style='font-size:20px;padding:10px;color:#fff;'>Customer data inserted successfully</span>";
					return $msg;
				}
				else{
					$msg =  "<span style='font-size:20px;padding:10px;color:#fff;'>Customer data not inserted</span>";
					return $msg;
				}

		   }

		}
		public function customerLogin($data){
			$email 		= mysqli_real_escape_string($this->db->link,$data['email']);
			$pass 		= mysqli_real_escape_string($this->db->link,md5($data['pass']));
			if (empty($email) || empty($pass)) {
				$msg = "<span style='font-size:20px;padding:10px;color:#fff;'>Fields must not be empty</span>";
		    	return $msg;
			}
			 $query = "SELECT * FROM tbl_customer WHERE email = '$email' AND pass = '$pass'";
			 $result = $this->db->select($query);
			 if ($result == true) {
			 	$value = $result->fetch_assoc();
			 	Session::set("customerlogin",true);
			 	Session::set("customerId",$value['Id']);
			 	Session::set("customername",$value['name']);
			 	header("Location:cart.php");
			 }else{
			 	$msg = "<span style='font-size:20px;padding:10px;color:#fff;'>Email or Password doesn't match</span>";
		    	return $msg;
			 }
		}
		public function getCustomerData($id){
			$query = "SELECT * FROM tbl_customer WHERE Id = '$id'";
			$result = $this->db->select($query);
			return $result;
		}
		public function customerUpdate($data,$customerId){
			$name 		= mysqli_real_escape_string($this->db->link,$data['name']);
			$email 		= mysqli_real_escape_string($this->db->link,$data['email']);
			$phoneno	= mysqli_real_escape_string($this->db->link,$data['phoneno']);
			$country 	= mysqli_real_escape_string($this->db->link,$data['country']);
			$city 		= mysqli_real_escape_string($this->db->link,$data['city']);
			$staddress 	= mysqli_real_escape_string($this->db->link,$data['staddress']);
			$postcode 	= mysqli_real_escape_string($this->db->link,$data['postcode']); 

			if($name == "" || $email == "" || $phoneno == "" || $country == "" || $city =="" || $staddress == "" || $postcode == ""){

		    	$msg = "<span style='font-size:20px;padding:10px;color:#fff;'>Fields must not be empty</span>";
		    	return $msg;
		    }else{
				$query = "UPDATE tbl_customer 
						  SET
						 	name 		= '$name', 
							email 		= '$email', 
							phoneno 	= '$phoneno', 
							country 	= '$country', 
							city 		= '$city', 
							staddress 	= '$staddress', 
							postcode 	= '$postcode'

						WHERE Id = '$customerId'";
						$updatedlistrow = $this->db->update($query);
						if($updatedlistrow ){
							$msg = "Customer details updated successfully";
							return $msg;
						}else{
							$msg =  "Detalis not update";
							return $msg;
						}
		   		}

		}
	}	

?>