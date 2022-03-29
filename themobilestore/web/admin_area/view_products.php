

<?php
 if(!isset($_SESSION['user_email'])){
  	echo "<script> window.open('login.php?not_admin=You are not Admin','_self')</script>";
  }
  else
  {

?>


<table width="785" align="center" bgcolor="#d0e1e1" border="1">
	<tr align="center">
		<td colspan="7"><h2>View All Mobiles</h2></td>
	</tr>

	<tr bgcolor="skyblue" align="center">
		<th>S.N</th>
		<th>Title</th>
		<th>Images</th>
		<th>Price</th>
		<th>Edit</th>
		<th>Delete</th>
		<th>Quantity</th>
	</tr>

	<?php
	 include("includes/db.php");
	 $get_product="select * from products";
	 $run_product=mysqli_query($con,$get_product);

	 $i=0;

	 while ($row_product=mysqli_fetch_array($run_product)) {
	 	$product_id=$row_product['product_id'];
	 	$product_title=$row_product['product_title'];
	 	$product_image=$row_product['product_image'];
	 	$product_price=$row_product['product_price'];
	 	$product_quantity=$row_product['product_quantity'];
	 	$i++;

	?>

	<tr align="center">
		<td><?php echo $i ?></td>
		<td><?php echo $product_title ?></td>
		<td><img src="product_images/<?php echo $product_image ?>" width="60" height="120" /></td>
		<td><?php echo $product_price ?></td>
		<td><a href="index.php?edit_pro=<?php echo $product_id?>">Edit</a></td>
		<td><a href="delete_pro.php?delete_pro=<?php echo $product_id ?>">Delete</a></td>
		<td><?php echo $product_quantity ?></td>
	</tr>
<?php } ?>
	
</table>


<?php } ?>