
<?php
 if(!isset($_SESSION['user_email'])){
  	echo "<script> window.open('login.php?not_admin=You are not Admin','_self')</script>";
  }
  else
  {

?>


<table width="785" align="center" bgcolor="#d0e1e1" border="1">
	<tr align="center">
		<td colspan="7"><h2>View All Accessories</h2></td>
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
	 $get_pro="select * from accessories";
	 $run_pro=mysqli_query($con,$get_pro);

	 $i=0;

	 while ($row_pro=mysqli_fetch_array($run_pro)) {
	 	$pro_id=$row_pro['acc_id'];
	 	$pro_title=$row_pro['acc_title'];
	 	$pro_image=$row_pro['acc_image'];
	 	$pro_price=$row_pro['acc_price'];
	 	$pro_quantity=$row_pro['acc_quantity'];
	 	$i++;

	?>

	<tr align="center">
		<td><?php echo $i ?></td>
		<td><?php echo $pro_title ?></td>
		<td><img src="images/<?php echo $pro_image ?>" width="60" height="120" /></td>
		<td><?php echo $pro_price ?></td>
		<td><a href="index.php?edit_acc=<?php echo $pro_id?>">Edit</a></td>
		<td><a href="delete_acc.php?delete_acc=<?php echo $pro_id ?>">Delete</a></td>
		<td><?php echo $pro_quantity ?></td>
	</tr>
<?php } ?>
	
</table>


<?php } ?>