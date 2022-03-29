
<!DOCTYPE HTML>

<?php
    if(!isset($_SESSION['user_email'])){
  	echo "<script> window.open('login.php?not_admin=You are not Admin','_self')</script>";
     }
    else
    {
	   include("includes/db.php");//including database connection
?>

<html>
	<head>
		<title><h2>Insert Products</h2></title>
		<script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea' });</script>

		  
	</head>
	<body>
	
	
	<form action="" method="post" enctype="multipart/form-data">
			
		<table align="center" width="785px" bgcolor="#d0e1e1" border="1" >
				
					<tr align="center">
						<td colspan="3"><h2 >Insert New Mobile</h2></td>
					</tr>

					

					<tr>
						<td align="left" ><b>Title</b></td>
						<td colspan="2"><input type="text" name="product_title" size="90" required/></td>
					</tr>

					<!--<tr>
						<td align="left"><b>Product Category<b></td>
						<td>
							<select name="product_cat" >
							  <option>Select a Category</option>
							    <?php 
		               			 $get_cats = "select * from categories";
	
								  $run_cats = mysqli_query($con, $get_cats);
	
								  while ($row_cats=mysqli_fetch_array($run_cats)){
	
									$cat_id = $row_cats['cat_id']; 
									$cat_title = $row_cats['cat_title'];
	
									echo "<option value='$cat_id'>$cat_title</option>";
					 			 }
					           ?>
				          </select>
				
				       </td>
			       </tr>-->



			       <tr>
				<td align="left"><b>Operating System</b></td>
				<td colspan="2">
					<select name="os" >
					   <option>Select Operating System</option>
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
				<td colspan="2">
					<select name="os" >
					   <option>Select Processor</option>
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
				<td align="left"><b>Brand</b></td>
				<td colspan="2">
					<select name="product_brand" >
					   <option>Select a Brand</option>
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
				<td colspan="2"><input type="file" name="product_image" required/></td>
			</tr>


			<tr>
				<td align="left"><b>Price</b></td>
				<td colspan="2"><input type="text" name="product_price" required/>Rs.</td> 
			</tr>


			<tr>
				<td align="left"><b>RAM</b></td>
				<td colspan="2"><input type="text" name="product_ram" size="10"/>
					<input type="radio" name="gb" />GB
					<input type="radio" name="mb" />MB
				</td>
			</tr>

			<tr>
				<td align="left"><b>ROM</b></td>
				<td colspan="2"><input type="text" name="product_rom" size="10"/>
					<input type="radio" name="gb" />GB
					<input type="radio" name="mb" />MB
				</td>
			</tr>


			<tr>
				<td align="left"><b>Camera</b></td>
				<td>Primary:<input type="text" name="product_rom" size="10"/>MP</td>
				<td>Secondary:<input type="text" name="product_rom" size="10"/>MP</td>
			</tr>






			<tr>
				<td align="left"><b>Battery Capacity</b></td>
				<td colspan="2"><input type="text" name="product_ram" size="10"required/>mAh
				</td>
			</tr>

			<tr>
				<td align="left"><b>Screen Size</b></td>
				<td colspan="2"><input type="text" name="product_screen" size="10"required/>inch
				</td>
			</tr>



			<tr>
				<td align="left"><b>Product Description</b></td>
				<td colspan="2"><textarea name="product_desc"  cols="30" rows="20"/></textarea></td>
			</tr>


			<tr>
				<td align="left"><b>Product Keywords</b></td>
				<td colspan="2"><input type="text" name="product_keywords" size="90"required/></td>
			</tr>


			<tr align="center">
				<td colspan="3"><input type="submit" name="insert_post" value="Insert"  /></td>
			</tr>
				
		</table>
	</form>
	<!---end of body--->
  </body>
</html>

<?php
	if(isset($_POST['insert_post'])){
	
		$product_title=$_POST['product_title'];
		$product_cat=$_POST['product_cat'];
		$product_brand=$_POST['product_brand'];
		$product_price=$_POST['product_price'];
		$product_desc=$_POST['product_desc'];
		$product_keywords=$_POST['product_keywords'];
		
		$product_image = $_FILES['product_image']['name'];
		$product_image_tmp = $_FILES['product_image']['tmp_name'];
		
		move_uploaded_file($product_image_tmp,"product_images/$product_image");
		
		
		$insert_product ="insert into products(product_title,product_cat,product_brand,product_price,product_desc,product_image,product_keywords) 
		values('$product_title','$product_cat','$product_brand','$product_price','$product_desc','$product_image','$product_keywords')";
		
		$insert_pro = mysqli_query($con, $insert_product);
		
		if($insert_pro){
			
			echo"<script>alert('Product inserted Successfully')</script>";
			echo"<script>window.open('index.php?insert_product','_self')</script>";
		}
	}
?>
<?php }?>