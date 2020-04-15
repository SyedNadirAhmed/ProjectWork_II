<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Category.php';?>
<?php

    $cat = new Category();
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $category_Name = $_POST['category_Name'];
            $insertCat = $cat->catInsert($category_Name);
    }

?>
		
	<div class="viewsec">      
        <div class="addcat">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                <?php
                    if (isset($insertCat)){
                        echo $insertCat;
                    }
                ?>
                 <form action="addcat.php" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="category_Name" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
	</div>	
</div>	
	
</body>
	
	
	
	