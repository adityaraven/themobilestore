
<!DOCTYPE HTML>

<?php
    if(!isset($_SESSION['user_email'])){
  	echo "<script> window.open('login.php?not_admin=You are not Admin','_self')</script>";
    }
    else
   {
	include("includes/db.php");//including database connection

	if(isset($_GET['edit_pro'])){

	  $get_id=$_GET['edit_pro'];

	  $get_pro="select * from products where product_id='$get_id'";
	 $run_pro=mysqli_query($con,$get_pro);


	$row_pro=mysqli_fetch_array($run_pro);

	 	$product_id=$row_pro['product_id'];
	 	$product_title=$row_pro['product_title'];
	 	$pro_image=$row_pro['product_image'];
	 	$pro_price=$row_pro['product_price'];
	 	$pro_ram=$row_pro['product_ram'];
	 	$pro_rom=$row_pro['product_rom'];
	 	$pro_camera=$row_pro['product_camera'];
	 	$pro_battery=$row_pro['product_battery'];
	 	$pro_screen_size=$row_pro['product_screen_size'];
	 	$pro_quantity=$row_pro['product_quantity'];
	 	$pro_desc=$row_pro['product_desc'];
	 	$pro_keywords=$row_pro['product_keywords'];
	 	$pro_brand=$row_pro['product_brand'];
	 	$pro_os=$row_pro['product_cat'];
	 	$pro_processor=$row_pro['product_processor'];
	 
	 	

//fatching OS name from database
	 	$get_os="select * from os where os_id='$pro_os'";
	 	$run_os=mysqli_query($con,$get_os);
	 	$row_os=mysqli_fetch_array($run_os);
	 	$os_title=$row_os['os_title'];


//fatching processor name from database
	 	$get_pro="select * from processors where pro_id='$pro_processor'";
	 	$run_pro=mysqli_query($con,$get_pro);
	 	$row_pro=mysqli_fetch_array($run_pro);
	 	$pro_title=$row_pro['pro_title'];



//fatching brand name from database
	 	$get_brand="select * from brands where brand_id='$pro_brand'";
	 	$run_brand=mysqli_query($con,$get_brand);
	 	$row_brand=mysqli_fetch_array($run_brand);
	 	$brand_title=$row_brand['brand_title'];


	 }

?>

<html>
	<head>
		<title>Insert Mobiles</title>
		<script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea' });</script>

		  
	</head>
	<body>
	
	
	<form action="" method="post" enctype="multipart/form-data">
			
		<table align="center" width="785px" bgcolor="#d0e1e1" border="1" >
				
					<tr align="center">
						<td colspan="2"><h2 >Edit and Update Mobile</h2></td>
					</tr>

					

					<tr>
						<td align="left" ><b>Title</b></td>
						<td> <input type="text" name="product_title" size="90" value="<?php echo $product_title; ?>" /></td>
					</tr>

					



			       <tr>
				<td align="left"><b>Operating System</b></td>
				<td >
					<select name="product_cat" >
					 <!--  <option><?php echo $os_title ?></option>-->
					 <option>Select OS</option>
					   <?php 
							$get_os = "select * from os";
	
							$run_os = mysqli_query($con, $get_os);
	
							while ($row_os=mysqli_fetch_array($run_os)){
								$os_id = $row_os['os_id']; 
								$os_title = $row_os['os_title'];
								echo "<option value='$os_id'>$os_title</option>";
							 }
					
					    ?>
				    </select>
			   </td>
			</tr>


			   <tr>
				<td align="left"><b>Processor</b></td>
				<td >
					<select name="product_processor" >
					  <!-- <option><?php echo $pro_title ?></option>-->
					  <option>Select Processor</option>
					   <?php 
							$get_pro = "select * from processors";
	
							$run_pro = mysqli_query($con, $get_pro);
	
							while ($row_pro=mysqli_fetch_array($run_pro)){
								$pro_id = $row_pro['pro_id']; 
								$pro_title = $row_pro['pro_title'];
								echo "<option value='$pro_id'>$pro_title</option>";
							 }
					
					    ?>
				    </select>
			   </td>
			</tr>



			      
			

			<tr>
				<td align="left"><b>Brand</b></td>
				<td>
					<select name="product_brand" >
					   <!--<option><?php echo $brand_title ?></option>-->
					   <option>Select Brand</option>
					   <?php 
							$get_brands = "select * from brands";
	
							$run_brands = mysqli_query($con, $get_brands);
	
							while ($row_brands=mysqli_fetch_array($run_brands)){
								$brand_id = $row_brands['brand_id']; 
								$brand_title = $row_brands['brand_title'];
								echo "<option value='$brand_id'>$brand_title</option>";
							 }
					
					    ?>
				    </select>
			   </td>
			</tr>


			<tr>
				<td align="left"><b>Image</b></td>
				<td><input type="file" name="product_image" value="<?php echo $pro_image; ?>"/> <img src="product_images/<?php echo $pro_image;?>" width="40" height="80"></td>
			</tr>


			<tr>
				<td align="left"><b>Price</b></td>
				<td>Rs:<input type="text" name="product_price" value="<?php echo $pro_price; ?>" /></td> 
			</tr>


			<tr>
				<td align="left"><b>RAM</b></td>
				<td><input type="text" name="product_ram" size="10" value="<?php echo $pro_ram; ?>" />GB</td>
			</tr>

			<tr>
				<td align="left"><b>ROM</b></td>
				<td ><input type="text" name="product_rom" size="10" value="<?php echo $pro_rom; ?>" />GB</td>
			</tr>


			<tr>
				<td align="left"><b>Camera</b></td>
				<td>Primary:<input type="text" name="product_camera" size="10" value="<?php echo $pro_camera; ?>" />MP</td>
				<!--<td>Secondary:<input type="text" name="product_rom" size="10"/>MP</td>-->
			</tr>






			<tr>
				<td align="left"><b>Battery Capacity</b></td>
				<td ><input type="text" name="product_battery" size="10" value="<?php echo $pro_battery; ?>" />mAh
				</td>
			</tr>

			<tr>
				<td align="left"><b>Screen Size</b></td>
				<td ><input type="text" name="product_screen_size" size="10" value="<?php echo $pro_screen_size; ?>" />inch
				</td>
			</tr>


			<tr>
				<td align="left" ><b>Quantity</b></td>
				<td><input type="text" name="product_quantity" size="10" value="<?php echo $pro_quantity; ?>" /></td>
			</tr>



			<tr>
				<td align="top"><b>Product Description</b></td>
				<td><textarea name="product_desc"  cols="30" rows="20" ><?php echo $pro_desc; ?></textarea></td>
			</tr>


			<tr>
				<td align="left"><b>Product Keywords</b></td>
				<td ><input type="text" name="product_keywords" size="90" value="<?php echo $pro_keywords; ?>" /></td>
			</tr>


			<tr align="center">
				<td colspan="2"><input type="submit" name="update_post" value="Update"  /></td>
			</tr>
				
		</table>
	</form>
	<!---end of body--->
  </body>
</html>

<?php
	if(isset($_POST['update_post'])){
	    $update_id=$product_id;
	
		$product_title=$_POST['product_title'];
		$product_cat=$_POST['product_cat'];
		$product_processor=$_POST['product_processor'];
		$product_brand=$_POST['product_brand'];
		$product_price=$_POST['product_price'];
		$product_ram=$_POST['product_ram'];
		$product_rom=$_POST['product_rom'];
		$product_camera=$_POST['product_camera'];
		$product_battery=$_POST['product_battery'];
		$product_screen_size=$_POST['product_screen_size'];
		$product_quantity=$_POST['product_quantity'];
		$product_desc=$_POST['product_desc'];
		$product_keywords=$_POST['product_keywords'];
		

		
		
		
		$product_image = $_FILES['product_image']['name'];
		$product_image_tmp = $_FILES['product_image']['tmp_name'];
		
		move_uploaded_file($product_image_tmp,"product_images/$product_image");
		
		
		$update_product ="update products set product_title='$product_title',product_cat='$product_cat',product_ram='$product_ram',product_rom='$product_rom',product_battery='$product_battery',product_processor='$product_processor',product_camera='$product_camera',product_screen_size='$product_screen_size',product_quantity='$product_quantity',product_brand='$product_brand',product_price='$product_price',product_desc='$product_desc',product_image='$product_image',product_keywords='$product_keywords' where product_id='$update_id'";
		
		$run_product = mysqli_query($con, $update_product);
		
		if($run_product){
			
			echo"<script>alert('Mobile Successfully updated')</script>";
			echo"<script>window.open('index.php?view_products','_self')</script>";
		}
	}
?>
<?php }?>