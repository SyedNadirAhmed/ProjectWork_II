<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
	$filepath = realpath(dirname(__File__));
	include($filepath.'/../classes/Cart.php');
	$ct = new Cart();
	$fm = new Format();
?>	
<?php
	if (isset($_GET['shiftid'])) {
		$id = $_GET['shiftid'];
		$time = $_GET['time'];
		$price = $_GET['price'];

		$shift = $ct->productshifted($id,$time,$price);
	}

	if(isset($_GET['delproduct'])) {
		$id = $_GET['delproduct'];
		$time = $_GET['time'];
		$price = $_GET['price'];

		$delorder = $ct->delProductshifted($id,$time,$price);
	}
?>
	<div class="viewsec">      
        <div class="catlist">
            <div class="box ">
                <h2>Inbox</h2>
                <?php 
                	if (isset($shift)) {
                		echo $shift;
                	}
                	if (isset($delorder)) {
                		echo $delorder;
                	}
                ?>
                <div class="block">        
            	
                    <table class="datatable" id="example">
					<thead>
						<tr>
							<th>ID</th>
							<th>Date & Time</th>
							<th>Products</th>
							<th>Quentity</th>
							<th>Cus-ID</th>
							<th>Price</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$ct = new Cart();
							$fm = new Format();
							$getOrder = $ct->getAllOrderProduct();
							if ($getOrder) {
								while ($result = $getOrder->fetch_assoc()){
						?>
						<tr class="odd">
							<td><?php echo $result['id'];?></td>
							<td><?php echo $fm->formatDate($result['date']);?></td>
							<td><?php echo $result['productName'];?></td>
							<td><?php echo $result['quantity'];?></td>
							<td><?php echo $result['customerId'];?></td>
							<td>$<?php echo $result['price'];?></td>
							<td><a href="customer.php?customerId=<?php echo $result['customerId'];?>">View Details</a></td>
							<?php
								if ($result['status'] == '0') { ?>
									<td><a href="?shiftid=<?php echo $result['customerId'];?>&price=<?php echo $result['price'];?>&time=<?php echo $result['date'];?>">Shifted</a></td>
									<?php } elseif($result['status'] == '1'){?>
										
										<td>Pending</td>

									<?php }else {?>
									<td><a href="?delproduct=<?php echo $result['customerId'];?>&price=<?php echo $result['price'];?>&time=<?php echo $result['date'];?>">Delete</a></td>
							<?php } ?>
						</tr>
					<?php } }?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
	</div>	
</div>	
	
</body>
	
	
	
	