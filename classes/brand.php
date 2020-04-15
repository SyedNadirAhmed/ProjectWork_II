<?php 
	include_once '../lib/Database.php';
	include_once '../helpers/Format.php';
?>
<?php

class Brand{
	
	private $db;
	private $fm;
	public function __construct(){

		$this->db = new Database();
		$this->fm = new Format();

	}
	public function brandInsert($brandName){
		$brandName = $this->fm->validation($brandName);	
		$brandName = mysqli_real_escape_string($this->db->link,$brandName);
		if(empty($brandName)){
			$msg = "Brand field is empty";
			return $msg;		
		}else{
			$query = "INSERT INTO tbl_brand(brandName) VALUES('$brandName')";
			$brandinsert = $this->db->insert($query);
			if ($brandinsert) {
				$msg = "Brand name inserted successfully";
				return $msg;
			}else{
				$msg =  "Brand not inserted";
				return $msg;
			}
		}
	}
	public function getAllBrand(){
		$query = "SELECT * FROM tbl_brand ORDER BY brandId DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function getBrandById($id){
		$query = "SELECT * FROM tbl_brand WHERE brandId = '$id'";
		$result = $this->db->select($query);
		return $result;

	}

	public function brandUpdate($brandName,$id){
		$brandName = $this->fm->validation($brandName);	
		$brandName = mysqli_real_escape_string($this->db->link,$brandName);
		$id = mysqli_real_escape_string($this->db->link,$id);
		if(empty($brandName)){
			$msg = "Brand empty";
			return $msg;			
	}else{
		$query = "UPDATE tbl_brand SET brandName='$brandName' WHERE brandId = '$id'";
		$updatedbreandrow = $this->db->update($query);
		if($updatedbreandrow ){
			$msg = "Brand update successfully";
			return $msg;
		}else{
			$msg =  "Brand not update";
			return $msg;
		}
	 }
	} 
	public function deletebrandById($id){
		$query = "DELETE FROM tbl_brand WHERE brandId = '$id'";
		$delbrand = $this->db->delete($query);
		if($delbrand){
			$msg = "Brand deleted successfully";
			return $msg;
		}else{
			$msg =  "Brand Not Found";
			return $msg;
		}
	}
}
?>