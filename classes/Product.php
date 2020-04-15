<?php 
	include_once '../lib/Database.php';
	include_once '../helpers/Format.php';
?>

<?php

	class Product{
		
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

	}
?>