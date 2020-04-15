<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Category.php';?>
<?php
    if(!isset($_GET['categoryId']) || $_GET['categoryId'] == NULL){
        echo "<script> window.location = 'catlist.php'; </script>";
    }else{
        $id = $_GET['categoryId'];
    }
    $cat = new Category();
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $category_Name = $_POST['category_Name'];
            $UpdateCat = $cat->catUpdate($category_Name,$id);
    }

?>
		
	<div class="viewsec">      
        <div class="addcat">
            <div class="box round first grid">
                <h2>Update Category</h2>
               <div class="block copyblock"> 
                <?php
                    if (isset($UpdateCat)){
                        echo $UpdateCat;
                    }
                ?>
                <?php
                    $getcat = $cat->getCatById($id);
                    if($getcat){
                        while($result = $getcat->fetch_assoc()){

                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="category_Name" value="<?php echo $result['category_Name'];?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php
                         }}
                    ?>

                </div>
            </div>
        </div>
	</div>	
</div>	
	
</body>
	
	
	
	