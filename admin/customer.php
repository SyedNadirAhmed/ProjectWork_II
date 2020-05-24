<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    $filepath = realpath(dirname(__File__));
    include($filepath.'/../classes/Customer.php');
?>  
<?php
    if(!isset($_GET['customerId']) || $_GET['customerId'] == NULL){
        echo "<script> window.location = 'inbox.php'; </script>";
    }else{
        $id = $_GET['customerId'];
    } 
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        echo "<script> window.location = 'inbox.php'; </script>";    
    }

?>
		
	<div class="viewsec">      
        <div class="addcat">
            <div class="box round first grid">
                <h2>Customer Details</h2>
               <div class="block copyblock"> 
                <?php
                    $cus = new Customer();
                    $getCus = $cus->getCustomerData($id);
                    if($getCus){
                        while($result = $getCus->fetch_assoc()){

                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>Name</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['name'];?>" class="medium" />

                            </td>
                        </tr>
                         <tr>
                            <td>Address</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['staddress'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['city'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['country'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Post Code</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['postcode'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['phoneno'];?>" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>Email</td>
                            <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['email'];?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Ok" />
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
	
	
	
	