<?php 
	include_once '../lib/Database.php';
	include_once '../helpers/Format.php';
?>

<?php
class Category{
	private $db;
	private $fm;
	public function __construct(){

		$this->db = new Database();
		$this->fm = new Format();
	}
	public function catInsert($category_Name){
		$category_Name = $this->fm->validation($category_Name);	
		$category_Name = mysqli_real_escape_string($this->db->link,$category_Name);
		if(empty($category_Name)){
			$msg = "Category is empty";
			return $msg;		
		}else{
			$query = "INSERT INTO tbl_category(category_Name) VALUES('$category_Name')";
			$catinsert = $this->db->insert($query);
			if ($catinsert) {
				$msg = "category is inserted successfully";
				return $msg;
			}
			else{
			$msg =  "Category not inserted";
			return $msg;
		}
		}
	}
	public function getAllcat(){
		$query = "SELECT * FROM tbl_category ORDER BY category_Id DESC";
		$result = $this->db->select($query);
		return $result;
	} 
	public function getCatById($id){
		$query = "SELECT * FROM tbl_category WHERE category_Id = '$id'";
		$result = $this->db->select($query);
		return $result;
	}
	public function catUpdate($category_Name,$id){
		$category_Name = $this->fm->validation($category_Name);	
		$category_Name = mysqli_real_escape_string($this->db->link,$category_Name);
		$id = mysqli_real_escape_string($this->db->link,$id);
		if(empty($category_Name)){
			$msg = "Category is empty";
			return $msg;			
	}else{
		$query = "UPDATE tbl_category SET category_Name='$category_Name' WHERE category_Id = '$id'";
		$updatedlistrow = $this->db->update($query);
		if($updatedlistrow ){
			$msg = "Category is update successfully";
			return $msg;
		}else{
			$msg =  "Category not update";
			return $msg;
		}
	}
}
	public function deletecategoryById($id){
		$query = "DELETE FROM tbl_category WHERE category_Id = '$id'";
		$delcat = $this->db->delete($query);
		if($delcat){
			$msg = "Category deleted successfully";
			return $msg;
		}else{
			$msg =  "Category Not Found";
			return $msg;
		}
	}	
}
?>