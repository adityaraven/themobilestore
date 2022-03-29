
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
		<title><h2>Insert Accessories</h2></title>
		<script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea' });</script>

		  
	</head>
	<body>
	
	
	<form action="" method="post" enctype="multipart/form-data">
			
		<table align="center" width="785px" bgcolor="#d0e1e1" border="1" >
				
					<tr align="center">
						<td colspan="2"><h2 >Insert Accessories</h2></td>
					</tr>

					

					<tr>
						<td align="left" ><b>Title</b></td>
						<td><input type="text" name="acc_title" size="50" required/>
							<b style="color: red"> **</b>
						</td>
						
					</tr>

					<tr>
						<td align="left"><b>Category<b></td>
						<td>
							<select name="acc_cat" >
							  <option>Select a Category</option>
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
					   <option>Select a Mobile</option>
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
				<td><input type="file" name="acc_image" required/>
					<b style="color: red"> **</b>
				</td> 

			</tr>


			<tr>
				<td align="left"><b>Price</b></td>
				<td>Rs:<input type="text" name="acc_price" required/>
					<b style="color: red"> **</b>
				</td>
				
			</tr>

			<tr>
				<td align="left"><b>Quantity</b></td>
				<td><input type="text" name="acc_quantity" /></td>
				
			</tr>



			<tr>
				<td align="left"><b>Accessory Description</b></td>
				<td><textarea name="acc_desc"  cols="30" rows="20"/></textarea></td>
			</tr>


			<tr>
				<td align="left"><b>Accessory Keywords</b></td>
				<td><input type="text" name="acc_keywords" size="50"required/>
					<b style="color: red"> **</b>
				</td>
				
			</tr>


			<tr align="center">
				<td colspan="2"><input type="submit" name="insert_post" value="Insert"   /></td>
			</tr>


				
		</table>
	</form>
	<!---end of body--->
  </body>
</html>

<?php
	if(isset($_POST['insert_post'])){
	
		$acc_title=$_POST['acc_title'];
		$acc_cat=$_POST['acc_cat'];
		$acc_brand=$_POST['acc_brand'];
		$acc_price=$_POST['acc_price'];
		$acc_desc=$_POST['acc_desc'];
		$acc_keywords=$_POST['acc_keywords'];
		$acc_quantity=$_POST['acc_quantity'];
		
		$acc_image = $_FILES['acc_image']['name'];
		$acc_image_tmp = $_FILES['acc_image']['tmp_name'];
		
		move_uploaded_file($acc_image_tmp,"images/$acc_image");
		
		
		$insert_acc ="insert into accessories(acc_title,acc_cat,acc_prod,acc_price,acc_desc,acc_image,acc_keywords,acc_quantity) 
		values('$acc_title','$acc_cat','$acc_brand','$acc_price','$acc_desc','$acc_image','$acc_keywords','$acc_quantity')";
		
		$insert_pro = mysqli_query($con, $insert_acc);
		
		if($insert_pro){
			
			echo"<script>alert('Product inserted Successfully')</script>";
			echo"<script>window.open('index.php?insert_accessories','_self')</script>";
		}
	}
?>
<?php }?>