
<?php 

if(!isset($_SESSION['user_email'])){
  	echo "<script> window.open('login.php?not_admin=You are not Admin','_self')</script>";
  }
  else
  {


?>




<table width="785" align="center" bgcolor="#d0e1e1" border="1">
	<tr align="center">
		<td colspan="6"><h2>View All Customers</h2></td>
	</tr>

	<tr bgcolor="skyblue" align="center">
		<th>S.N</th>
		<th>Name</th>
		<th>Email</th>
	
		<th>Delete</th>
	</tr>

	<?php
	 include("includes/db.php");
	 $get_c="select * from customers";
	 $run_c=mysqli_query($con,$get_c);

	 $i=0;

	 while ($row_c=mysqli_fetch_array($run_c)) {
	 	$c_id=$row_c['customer_id'];
	 	$c_fname=$row_c['customer_fname'];
	 	$c_lname=$row_c['customer_lname'];
	 	$c_email=$row_c['customer_email'];
	 	//$c_image//=$row_c['customer_image'];
	 	$i++;

	?>

	<tr align="center">
		<td><?php echo $i ?></td>
		<td><?php echo $c_fname." ".$c_lname?></td>
		<td><?php echo $c_email ?></td>
		<!--<td><img src="../customer/customer_images/<?php echo $c_image ?>" width="60" height="120" /></td>-->
		<td><a href="delete_c.php?delete_c=<?php echo $c_id ?>">Delete</a></td>
	</tr>
<?php } ?>
	
</table>

<?php } ?>