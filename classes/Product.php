<?php 
	$filepath = realpath(dirname(__File__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>

<?php

	class Product {
		
	private $db;
	private $fm;
	public function __construct(){

		$this->db = new Database();
		$this->fm = new Format();
	}
	public function productInsert($data,$file){
		$productName = mysqli_real_escape_string($this->db->link,$data['productName']);
		$category_Id = mysqli_real_escape_string($this->db->link,$data['category_Id']);
		$brandId = mysqli_real_escape_string($this->db->link,$data['brandId']);
		$body = mysqli_real_escape_string($this->db->link,$data['body']);
		$price = mysqli_real_escape_string($this->db->link,$data['price']);
		$type = mysqli_real_escape_string($this->db->link,$data['type']);


		$permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name = $file['image']['name'];
	    $file_size = $file['image']['size'];
	    $file_temp = $file['image']['tmp_name'];

	    $div = explode('.', $file_name);
	    $file_ext = strtolower(end($div));
	    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "uploads/".$unique_image;

	    if($productName == "" || $category_Id == "" || $brandId == "" || $body == "" || $price == "" || $file_name =="" || $type == ""){

	    	$msg = "***Fields not be empty";
	    	return $msg;

		    }elseif ($file_size >1048567) {

			     echo "Image Size should be less then 1MB!";

			}elseif (in_array($file_ext, $permited) === false) {

		     echo "You can upload only:-".implode(', ', $permited);

   		   }else{
	    	move_uploaded_file($file_temp, $uploaded_image);
	    	$query = "INSERT INTO tbl_product(productName,category_Id,brandId,body,price,image,type) VALUES('$productName','$category_Id','$brandId','$body','$price','$uploaded_image','$type')";

	    	$insertproductrow = $this->db->insert($query);
			if ($insertproductrow) {
				$msg = "Product inserted successfully";
				return $msg;
			}
			else{
			$msg =  "Product not inserted";
			return $msg;
		}

	    }

	}
	public function getAllProduct(){
		$query = "SELECT  p.*,c.category_Name,b.brandName
			FROM tbl_product AS p, tbl_category AS c, tbl_brand AS b
			WHERE P.category_Id = c.category_Id AND p.brandId = b.brandId
			ORDER BY P.productId DESC; 
		";
		$result = $this->db->select($query);
		return $result;
	}
	public function getProById($id){
		$query = "SELECT * FROM tbl_product WHERE productId = '$id'";
		$result = $this->db->select($query);
		return $result;
	}

	public function productUpdate($data,$file,$id){
	
		$productName = mysqli_real_escape_string($this->db->link,$data['productName']);
		$category_Id = mysqli_real_escape_string($this->db->link,$data['category_Id']);
		$brandId = mysqli_real_escape_string($this->db->link,$data['brandId']);
		$body = mysqli_real_escape_string($this->db->link,$data['body']);
		$price = mysqli_real_escape_string($this->db->link,$data['price']);
		$type = mysqli_real_escape_string($this->db->link,$data['type']);


		$permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name = $file['image']['name'];
	    $file_size = $file['image']['size'];
	    $file_temp = $file['image']['tmp_name'];

	    $div = explode('.', $file_name);
	    $file_ext = strtolower(end($div));
	    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "uploads/".$unique_image;

	    if($productName == "" || $category_Id == "" || $brandId == "" || $body == "" || $price == "" || $type == ""){

	    	$msg = "***Fields not be empty";
	    	return $msg;

		    }else{
		    	if (!empty($file_name)) {

					    if ($file_size >1048567) {

						     echo "Image Size should be less then 1MB!";

						}elseif (in_array($file_ext, $permited) === false) {

					     echo "You can upload only:-".implode(', ', $permited);

			   		   }else{
					    	move_uploaded_file($file_temp, $uploaded_image);
					    	$query = "UPDATE 
					    				tbl_product
					    				SET
					    				productName = '$productName',
					    				category_Id = '$category_Id',
					    				brandId 	= '$brandId',
					    				body 		= '$body',
					    				price 		= '$price',
					    				image 		= '$uploaded_image',
					    				type 		= '$type'
					    				WHERE productId = '$id'";

					    	$updatedproductrow = $this->db->update($query);
							if ($updatedproductrow) {
								$msg = "Product updated successfully";
								return $msg;
							}
							else{
								$msg =  "Product not updated";
								return $msg;
							}
					}		
				} else{
					    	$query = "UPDATE 
					    				tbl_product
					    				SET
					    				productName = '$productName',
					    				category_Id = '$category_Id',
					    				brandId 	= '$brandId',
					    				body 		= '$body',
					    				price 		= '$price',
					    				type 		= '$type'
					    				WHERE productId = '$id'";

					    	$updatedproductrow = $this->db->update($query);
							if ($updatedproductrow) {
								$msg = "Product updated successfully";
								return $msg;
							}
							else{
								$msg =  "Product not updated";
								return $msg;
							}
				}
					
	    }
	}
	public function deleteProductById($id){
		$query = "SELECT * FROM  tbl_product WHERE productId = '$id'";
		$getdata  = $this->db->select($query);
		if ($getdata) {
			while ($delImg = $getdata->fetch_assoc()) {
				$dellink = $delImg['image'];
				unlink($dellink);
			}
		}
		$delquery = "DELETE FROM tbl_product WHERE productId = '$id'";
		$deldata = $this->db->delete($delquery);
		if($deldata){
			$msg = "Product deleted successfully";
			return $msg;
		}else{
			$msg =  "Product Not Found";
			return $msg;
		}
	}

	public function getProducts(){
		$query = "SELECT * FROM tbl_product WHERE type='0' ORDER BY productId DESC LIMIT 4";
		$result = $this->db->select($query);
		return $result;
	}
	public function getSingleProduct($id){
		$query = "SELECT  p.*,c.category_Name,b.brandName
			FROM tbl_product AS p, tbl_category AS c, tbl_brand AS b
			WHERE P.category_Id = c.category_Id AND p.brandId = b.brandId AND p.productId = '$id'";
		$result = $this->db->select($query);
		return $result;
	}



	//Home page slider bottom section product
	public function getLatestProOne(){
		$query = "SELECT * FROM tbl_product WHERE brandId = '1' ORDER BY productId DESC LIMIT 2";
		$result = $this->db->select($query);
		return $result;
	}
	public function getLatestProTwo(){
		$query = "SELECT * FROM tbl_product WHERE brandId = '2' ORDER BY productId DESC LIMIT 2";
		$result = $this->db->select($query);
		return $result;
	}
	public function getLatestProThree(){
		$query = "SELECT * FROM tbl_product WHERE brandId = '3' ORDER BY productId DESC LIMIT 2";
		$result = $this->db->select($query);
		return $result;
	}
	public function getLatestProFour(){
		$query = "SELECT * FROM tbl_product WHERE brandId = '4' ORDER BY productId DESC LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
	public function getLatestProFive(){
		$query = "SELECT * FROM tbl_product WHERE brandId = '5' ORDER BY productId DESC LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}


	//=====================================
	public function productByCat($id){
		$category_Id = mysqli_real_escape_string($this->db->link,$id);
		$query = "SELECT * FROM tbl_product WHERE category_Id = '$category_Id'";
		$result = $this->db->select($query);
		return $result;
	}

	public function insertCompareDate($compareid,$customerId){
		$productId 	= mysqli_real_escape_string($this->db->link,$compareid);
		$customerId = mysqli_real_escape_string($this->db->link,$customerId);
		
		$cquery = "SELECT * FROM tbl_compare WHERE customerId = '$customerId' AND productId = '$productId'";
		$chk = $this->db->select($cquery);
		if ($chk) {
			$msg =  "Already Added";
			return $msg;
		}

		$query = "SELECT * FROM tbl_product WHERE productId = '$productId'";
		$result = $this->db->select($query)->fetch_assoc();
		if ($result) {
				$productId = $result['productId'];
				$productName = $result['productName'];
				$price = $result['price'];
				$image = $result['image'];
		}
		$query = "INSERT INTO tbl_compare(customerId,productId,productName,price,image) VALUES('$customerId','$productId','$productName','$price','$image')";
	    	$insertproductrow = $this->db->insert($query);
	    	if ($insertproductrow) {
		    	$msg = "Added to compare";
				return $msg;
				}else{
					$msg =  "Not added";
					return $msg;
			}
	    }
	    public function getCompareData($customerId){
	    	$query = "SELECT * FROM tbl_compare WHERE customerId = '$customerId' ORDER BY id DESC";
	    	$result = $this->db->select($query);
	    	return $result;

	    }
	    public function delCompareData($customerId){
	    	$query = "DELETE FROM tbl_compare WHERE customerId = '$customerId'";
			$deldata = $this->db->delete($query);
	    }
	    public function saveWishListData($id,$customerId){
	    	$cquery = "SELECT * FROM tbl_wlist WHERE customerId = '$customerId' AND productId = '$id'";
				$chk = $this->db->select($cquery);
				if ($chk) {
					$msg =  "Already Added On Wishlist";
					return $msg;
				}

	    	$query = "SELECT * FROM tbl_product WHERE productId = '$id'";
			$result = $this->db->select($query)->fetch_assoc();
			if ($result) {
					$productId = $result['productId'];
					$productName = $result['productName'];
					$price = $result['price'];
					$image = $result['image'];
			
			$query = "INSERT INTO tbl_wlist(customerId,productId,productName,price,image) VALUES('$customerId','$productId','$productName','$price','$image')";
		    	$insertproductrow = $this->db->insert($query);
			    if ($insertproductrow) {
			    	$msg = "Added to Wishlist";
					return $msg;
					}else{
						$msg =  "Not added";
						return $msg;
					}	
	    	}
	   } 
	   public function getWlistData($customerId){
	   		$query = "SELECT * FROM tbl_wlist WHERE customerId = '$customerId' ORDER BY id DESC";
			$result = $this->db->select($query);
			return $result;
	   }
	   public function delWlistData($productId,$customerId){
	   		$query = "DELETE FROM tbl_wlist WHERE customerId = '$customerId' AND productId = '$productId'";
			$deldata = $this->db->delete($query);
	   }
 }
?>