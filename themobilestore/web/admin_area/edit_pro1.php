
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

	 	$pro_id=$row_pro['product_id'];
	 	$pro_title=$row_pro['product_title'];
	 	$pro_image=$row_pro['product_image'];
	 	$pro_price=$row_pro['product_price'];
	 	$pro_desc=$row_pro['product_desc'];
	 	$pro_keywords=$row_pro['product_keywords'];
	 	$pro_os=$row_pro['product_os'];
	 	$pro_brand=$row_pro['product_brand'];

//fatching categories name from database
	 	$get_cat="select * from categories where cat_id='$pro_cat'";
	 	$run_cat=mysqli_query($con,$get_cat);
	 	$row_cat=mysqli_fetch_array($run_cat);
	 	$category_title=$row_cat['cat_title'];

//fatching brand name from database
	 	$get_brand="select * from brands where brand_id='$pro_brand'";
	 	$run_brand=mysqli_query($con,$get_brand);
	 	$row_brand=mysqli_fetch_array($run_brand);
	 	$brand_title=$row_brand['brand_title'];


	 }

?>

<html>
	<head>
		<title><h2>Update Products</h2></title>
		<script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea' });</script>

		  
	</head>
	<body>
	
	
	<form action="" method="post" enctype="multipart/form-data">
			
		<table align="center" width="785px" bgcolor="#d0e1e1" border="1" >
				
					<tr align="center">
						<td colspan="7"><h2 >Edit and Update Mobiles</h2></td>
					</tr>

					

					<tr>
						<td align="left" ><b>Product Title</b></td>
						<td><input type="text" name="product_title" size="50" value="<?php echo $pro_title; ?>" /></td>
					</tr>

					<tr>
						<td align="left"><b>Product Category<b></td>
						<td>
							<select name="product_cat" >
							  <option><?php echo $category_title ?></option>
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
			       </tr>
			

			<tr>
				<td align="left"><b>Product Brand</b></td>
				<td>
					<select name="product_brand" >
					   <option><?php echo $brand_title ?></option>
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
				<td align="left"><b>Product Image</b></td>
				<td><input type="file" name="product_image" value="<?php echo $pro_image; ?>"/> <img src="product_images/<?php echo $pro_image;?>" width="40" height="80"></td>
			</tr>


			<tr>
				<td align="left"><b>Product Price</b></td>
				<td><input type="text" name="product_price" value="<?php echo $pro_price; ?>"/></td>
			</tr>


			<tr>
				<td align="top"><b>Product Description</b></td>
				<td><textarea name="product_desc"  cols="30" rows="20" ><?php echo $pro_title; ?></textarea></td>
			</tr>


			<tr>
				<td align="left"><b>Product Keywords</b></td>
				<td><input type="text" name="product_keywords" size="50" value="<?php echo $pro_title; ?>"/></td>
			</tr>

			<tr align="center">
				<td colspan="20"><input type="submit" name="update_product" value="Update Product"  /></td>
			</tr>
				
		</table>
	</form>
	<!---end of body--->
  </body>
</html>
<?php
	if(isset($_POST['update_product'])){

	    $update_id=$pro_id;
	
		$product_title=$_POST['product_title'];
		$product_cat=$_POST['product_cat'];
		$product_brand=$_POST['product_brand'];
		$product_price=$_POST['product_price'];
		$product_desc=$_POST['product_desc'];
		$product_keywords=$_POST['product_keywords'];
		
		$product_image = $_FILES['product_image']['name'];
		$product_image_tmp = $_FILES['product_image']['tmp_name'];
		
		move_uploaded_file($product_image_tmp,"product_images/$product_image");
		
		
		$update_product ="update products set product_cat='$product_cat',product_brand='$product_brand',product_title='$product_title',product_price='$product_price',product_desc='$product_desc',product_image='$product_image',product_keywords='$product_keywords' where product_id='$update_id'";	

	   $run_product = mysqli_query($con, $update_product);
		if($run_product){
			echo"<script>alert('Product has been Successfully Updated!')</script>";
			echo"<script>window.open('index.php?view_products','_self')</script>";
		}
	}
?>
<?php } ?>