<?php 
	$filepath = realpath(dirname(__File__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>
<?php

	class Cart{
		private $db;
		private $fm;
		
		public function __construct(){	
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function addToCart($quantity,$id){
			$quantity = $this->fm->validation($quantity);	
			$quantity = mysqli_real_escape_string($this->db->link,$quantity);
			$productId = mysqli_real_escape_string($this->db->link,$id);
			$sId = session_id();

			$squery = "SELECT * FROM tbl_product WHERE productId = '$productId'";
			$result = $this->db->select($squery)->fetch_assoc(); 

			$productName = $result['productName'];
			$price = $result['price'];
			$image = $result['image'];


			$chquery = "SELECT * FROM tbl_cart WHERE productId = '$productId' AND sId = '$sId'";
			$getPro = $this->db->select($chquery);
			if ($getPro) {
				$msg = "Product Already Added !";
				return $msg;
			}else{
				$query = "INSERT INTO tbl_cart(sId,productId,productName,price,quantity,image) VALUES('$sId','$productId','$productName','$price','$quantity','$image')";

		    	$insertproductrow = $this->db->insert($query);
				if ($insertproductrow) {
					header("Location:cart.php");
				}
				else{
					header("Location:404.php");
				}
		  	}	
		}
		public function getCartProduct(){
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
			$result = $this->db->select($query);
			return $result;
		}

	}	
?>