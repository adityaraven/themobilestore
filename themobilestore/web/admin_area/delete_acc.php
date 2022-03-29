<?php
 include("includes/db.php");
 if(isset($_GET['delete_acc'])){
 	$delete_id=$_GET['delete_acc'];
 	$delete_acc="delete from accessories where acc_id='$delete_id'";
 	$run_delete=mysqli_query($con,$delete_acc);
 	if($run_delete){
 		echo "<script> alert('A Product has been deleted!')</script>";
 		echo "<script>window.open('index.php?view_accessories','_self')</script>";
 	}
 }



?>