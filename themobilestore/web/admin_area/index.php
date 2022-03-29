<?php 
  session_start();
  if(!isset($_SESSION['user_email'])){
  	echo "<script> window.open('login.php?not_admin=You are not Admin','_self')</script>";
  }
  else
  {

 ?>


<!DOCTYPE>
<html>
 <head>
 	<title>Admin Panel</title>
 	<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
 </head>
 <body>
 	<div class="main_wrapper">
 		<div id="header">Admin Panel</div>
 		<div id="left" >
 			<h2 style="text-align: center; color: white;"><u>Manage Content</u></h2>

 			<a href="index.php?insert_product">Insert New Mobile</a>
 			<a href="index.php?view_products">View All Mobile</a>
 			<a href="index.php?insert_accessories">Insert New Accessories</a>
 			<a href="index.php?view_accessories">View All Accessories</a>
 			<a href="index.php?view_customers">View Customers</a>
 			<a href="index.php?view_orders">View Orders</a>
 			<a href="index.php?view_payment">View Payment</a>
 			<a href="logout.php">Logout</a>
 		</div>


 		<div id="right" >
 			<?php  
 			 if(isset($_GET['insert_product']))
 			 {
 			 	include("insert_products.php");
 			 }


 			 if(isset($_GET['view_products']))
 			 {
 			 	include("view_products.php");
 			 }

 			 if(isset($_GET['edit_pro']))
 			 {
 			 	include("edit_pro.php");
 			 }

 			 if(isset($_GET['edit_acc']))
 			 {
 			 	include("edit_acc.php");
 			 }

 			 if(isset($_GET['view_customers']))
 			 {
 			 	include("view_customers.php");
 			 }

 			 if(isset($_GET['insert_accessories']))
 			 {
 			 	include("insert_accessories.php");
 			 }

 			  if(isset($_GET['view_accessories']))
 			 {
 			 	include("view_accessories.php");
 			 }
 			?>


 			
 		</div>
 		
        <div id="footer">
        	<p>&copy; 2019 Mobile Store. All Rights Reserved | Design by  Aditya , Sanghpriya and L. Brahma</p>
        </div>
 		
 	</div>


 </body>

 </html>

<?php } ?>
 