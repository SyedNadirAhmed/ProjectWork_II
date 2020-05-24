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
		public function UpdateCart($cartId,$quantity){
			$cartId = mysqli_real_escape_string($this->db->link,$cartId);
			$quantity = mysqli_real_escape_string($this->db->link,$quantity);
			$query = "UPDATE tbl_cart SET quantity = '$quantity' WHERE cartId = '$cartId'";
			$updatedlistrow = $this->db->update($query);
			if($updatedlistrow ){
				header("Location:cart.php");
			}else{
				$msg =  "Quentity not update";
				return $msg;
			}			
		}
		public function delProductByCart($delid){
			$delid = mysqli_real_escape_string($this->db->link,$delid);
			$query = "DELETE FROM tbl_cart WHERE cartId = '$delid'";
			$delcatpro = $this->db->delete($query);
			if($delcatpro){
				echo "<script>window.location = 'cart.php';</script>";
			}else{
				$msg =  "Product Not Found";
				return $msg;
			}			
		}
		public function checkCartTable(){
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
			$result = $this->db->select($query);
			return $result;
		}
		public function delcustomercart(){
			$sId = session_id();
			$query = "DELETE FROM tbl_cart WHERE sId = '$sId'";
			$this->db->delete($query);
		}
		public function orderProduct($customerId){
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
			$getPro = $this->db->select($query);
			if ($getPro) {
				while ($result = $getPro->fetch_assoc()) {
					$productId = $result['productId'];
					$productName = $result['productName'];
					$quantity = $result['quantity'];
					$price = $result['price'] * $quantity;
					$image = $result['image'];
				}
			}
			$query = "INSERT INTO tbl_order(customerId,productId,productName,quantity,price,image) VALUES('$customerId','$productId','$productName','$quantity','$price','$image')";
		    	$insertproductrow = $this->db->insert($query);
		}
		public function paybleAmount($customerId){
			$query = "SELECT price FROM tbl_order WHERE customerId = '$customerId' AND date = now()";
			$result = $this->db->select($query);
			return $result;
		}
		public function getOrderProduct($customerId){
			$query = "SELECT * FROM tbl_order WHERE customerId = '$customerId' ORDER BY date DESC";
			$result = $this->db->select($query);
			return $result;
		}
		public function checkOrder($customerId){
			$query = "SELECT * FROM tbl_order WHERE customerId = '$customerId'";
			$result = $this->db->select($query);
			return $result;
		}

		//From Admin Panel Inbox Product view
		public function getAllOrderProduct(){
			$query = "SELECT * FROM tbl_order ORDER BY date DESC";
			$result = $this->db->select($query);
			return $result;
		}
		public function productshifted($id,$time,$price){
			$id = mysqli_real_escape_string($this->db->link,$id);
			$time = mysqli_real_escape_string($this->db->link,$time);
			$price = mysqli_real_escape_string($this->db->link,$price);

			$query = "UPDATE tbl_order SET status = '1' WHERE customerId = '$id' AND date = '$time' AND price = '$price'";
			$updatedlistrow = $this->db->update($query);
			if($updatedlistrow ){
				$msg = "update successfully";
				return $msg;
			}else{
				$msg =  "Not update"; 
				return $msg;
			}	
		}
		public function delProductshifted($id,$time,$price){
			$id 	= mysqli_real_escape_string($this->db->link,$id);
			$time 	= mysqli_real_escape_string($this->db->link,$time);
			$price 	= mysqli_real_escape_string($this->db->link,$price);

			$query = "DELETE FROM tbl_order WHERE customerId = '$id' AND date = '$time' AND price = '$price'";
			$deldata = $this->db->delete($query);
			if($deldata){
				$deldata = "Deleted successfully";
				return $deldata;
			}else{
				$deldata =  "Not Found";
				return $deldata;
			}
		}
		public function productshifConfirm($id,$time,$price){
			$id = mysqli_real_escape_string($this->db->link,$id);
			$time = mysqli_real_escape_string($this->db->link,$time);
			$price = mysqli_real_escape_string($this->db->link,$price);

			$query = "UPDATE tbl_order SET status = '2' WHERE customerId = '$id' AND date = '$time' AND price = '$price'";
			$updatedlistrow = $this->db->update($query);
			if($updatedlistrow ){
				$msg = "update successfully";
				return $msg;
			}else{
				$msg =  "Not update"; 
				return $msg;
			}		
		}
	}		
?>