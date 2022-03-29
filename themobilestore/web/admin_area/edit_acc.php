
<!DOCTYPE HTML>

<?php
    if(!isset($_SESSION['user_email'])){
  	echo "<script> window.open('login.php?not_admin=You are not Admin','_self')</script>";
    }
    else
   {
	include("includes/db.php");//including database connection

	if(isset($_GET['edit_acc'])){

	  $get_id=$_GET['edit_acc'];

	  $get_acc="select * from accessories where acc_id='$get_id'";
	 $run_acc=mysqli_query($con,$get_acc);


	$row_acc=mysqli_fetch_array($run_acc);

	 	$acc_id=$row_acc['acc_id'];
	 	$acc_title=$row_acc['acc_title'];
	 	$acc_image=$row_acc['acc_image'];
	 	$acc_price=$row_acc['acc_price'];
	 	$acc_quantity=$row_acc['acc_quantity'];
	 	$acc_desc=$row_acc['acc_desc'];
	 	$acc_keywords=$row_acc['acc_keywords'];
	 	$acc_cat=$row_acc['acc_cat'];
	 	$acc_prod=$row_acc['acc_prod'];

//fatching categories name from database
	 	$get_cat="select * from accessories_cat where acc_cat_id='$acc_cat'";
	 	$run_cat=mysqli_query($con,$get_cat);
	 	$row_cat=mysqli_fetch_array($run_cat);
	 	$category_title=$row_cat['acc_cat_title'];

//fatching product name from database
	 	$get_prod="select * from products where product_id='$acc_prod'";
	 	$run_brand=mysqli_query($con,$get_prod);
	 	$row_brand=mysqli_fetch_array($run_brand);
	 	$brand_title=$row_brand['product_title'];


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
						<td colspan="2"><h2 >Update Accessories</h2></td>
					</tr>

					

					<tr>
						<td align="left" ><b>Title</b></td>
						<td><input type="text" name="acc_title" size="50" value="<?php echo $acc_title; ?>"/>
							<b style="color: red"> **</b>
						</td>
						
					</tr>

					<tr>
						<td align="left"><b>Category<b></td>
						<td>
							<select name="acc_cat" >
							 <!-- <option><?php echo $category_title ?></option>-->
							 <option>Select Category</option>
							    <?php 
		               			 $get_cats = "select * from accessories_cat";
	
								  $run_cats = mysqli_query($con, $get_cats);
	
								  while ($row_cats=mysqli_fetch_array($run_cats)){
	
									$cat_id = $row_cats['acc_cat_id']; 
									$cat_title = $row_cats['acc_cat_title'];
	
									echo "<option value='$cat_id'>$cat_title</option>";
					 			 }
					           ?>
				          </select>
				
				       </td>
			       </tr>


			      
			

			<tr>
				<td align="left"><b>Accessories for</b></td>
				<td>
					<select name="acc_brand" >
					  <!-- <option><?php echo $brand_title ?></option>-->
					  <option>Select Brand</option>
					   <?php 
							$get_prod = "select * from products";
	
							$run_prod = mysqli_query($con, $get_prod);
	
							while ($row_prod=mysqli_fetch_array($run_prod)){
								$prod_id = $row_prod['product_id']; 
								$prod_title = $row_prod['product_title'];
								echo "<option value='$prod_id'>$prod_title</option>";
							 }
					
					    ?>
				    </select>
			   </td>
			</tr>


			<tr>
				<td align="left"><b>Image</b></td>
				<td><input type="file" name="acc_image" value="<?php echo $acc_image; ?>"/> <img src="images/<?php echo $acc_image;?>" width="40" height="80">
					<b style="color: red"> **</b>
				</td> 

			</tr>


			<tr>
				<td align="left"><b>Price</b></td>
				<td>Rs:<input type="text" name="acc_price" value="<?php echo $acc_price; ?>"/>
					<b style="color: red"> **</b>
				</td>
				
			</tr>



			<tr>
				<td align="top"><b>Description</b></td>
				<td><textarea name="product_desc"  cols="30" rows="20" ><?php echo $acc_desc; ?></textarea></td>
			</tr>


			<tr>
				<td align="left"><b>Keywords</b></td>
				<td><input type="text" name="acc_keywords" size="50" value="<?php echo $acc_keywords; ?>"/>
					<b style="color: red"> **</b>
				</td>
				
			</tr>


			<tr align="center">
				<td colspan="2"><input type="submit" name="update_acc" value="Update"   /></td>
			</tr>


				
		</table>
	</form>
	<!---end of body--->
  </body>
</html>
<?php
	if(isset($_POST['update_acc'])){

	    $update_id=$acc_id;
	
		$acc_title=$_POST['acc_title'];
		$acc_cat=$_POST['acc_cat'];
		$acc_brand=$_POST['acc_brand'];
		$acc_price=$_POST['acc_price'];
		$acc_desc=$_POST['acc_desc'];
		$acc_keywords=$_POST['acc_keywords'];
		
		$acc_image = $_FILES['acc_image']['name'];
		$acc_image_tmp = $_FILES['acc_image']['tmp_name'];
		
		move_uploaded_file($acc_image_tmp,"product_images/$product_image");
		
		
		$update_acc ="update accessories set acc_cat='$acc_cat',acc_prod='$acc_brand',acc_title='$acc_title',acc_price='$acc_price',acc_desc='$acc_desc',acc_image='$acc_image',acc_keywords='$acc_keywords',acc_quantity=$acc_quantity where acc_id='$update_id'";	

	   $run_acc = mysqli_query($con, $update_acc);
		if($run_acc){
			echo"<script>alert('Product has been Successfully Updated!')</script>";
			echo"<script>window.open('index.php?view_accessories','_self')</script>";
		}
	}
?>
<?php } ?>