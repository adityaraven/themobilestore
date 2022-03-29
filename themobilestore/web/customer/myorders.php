<div class="content-grids">
			
		    					
				<div class="section group">
		    	
				<form action="" method="post" enctype="multipart/form-data">
			
				<table align="center" width="1050" bgcolor="#9ACD32">
					
					<tr align="center">
						<th>Order Id</th>
						<th>Product(S)</th>
						<th>Quantity</th>

					</tr>
					</br>
					
		<?php 

	
		
		global $con; 
		
		
		
		
		$query1 = "select * from orders where user_id='$user'";
		//echo $sel_price;
		$run_query1 = mysqli_query($con, $query1); 
		
		while($p_run1=mysqli_fetch_array($run_query1)){
			
			$order_id = $p_run1['order_id']; 
			//echo $pro_id;
			
			$query2 = "select * from orderdetails where order_id='$order_id'";
			
			
			$run_query2 = mysqli_query($con,$query2); 
			
			while ($p_run2 = mysqli_fetch_array($run_query2)){
				
				
			
			$product_id = $p_run2['product_id'];
			$qty= $p_run2['quantity'];
			$query3 = "select * from products where product_id='$product_id'";
			
			$run_query3 = mysqli_query($con,$query3); 
			
			while ($p_run3 = mysqli_fetch_array($run_query3)){
			
					$product_image = $p_run3['product_image'];
					$product_title = $p_run3['product_title'];
				
			
					
					?>
					
					<tr align="center">
						<td><?php echo $order_id; ?></td>
						<td><?php echo $product_title; ?><br>
						<img src="images/<?php echo $product_image;?>" width="60" height="60"/>
						</td>
						<td><?php echo $qty ?></td>
						
		<?php } }}?></tr>
					</table> 
			
			</form>
					
					
					
				
			
	
				
				</div>
			
			</div>
		</div>
				
				
			</div>
			
				
			</div>

		    
		    	</div>
		    	<div class="content-sidebar">
		    		<ul><h4>Brands</h4>
						<ul>
							<?php
						getBrands();
					?>
					
						</ul>
						<h4>Categories</h4>
						<ul>
							<?php
						getCats();
					?>
					
						</ul>
						</ul>
						
		    	</div>
		    
		    <div class="clear"> </div>
		    </div>