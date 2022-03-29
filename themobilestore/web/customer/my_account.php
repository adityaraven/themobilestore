<!DOCTYPE>
<?php 
session_start();
include("../functions/function.php");

?>
<?php
					if(!isset($_SESSION['customer_email']))
					{ header("Location: ../login.php"); }
					
					else {}
					?>
<html>
	<head>
		<title>My Account</title>
		<link href="../css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<meta name="keywords" content="Mobilestore iphone web template, Android web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
		<link href='//fonts.googleapis.com/css?family=Londrina+Solid|Coda+Caption:800|Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/responsiveslides.css">
		<script src="js/jquery.min.js"></script>
		<script src="js/responsiveslides.min.js"></script>
		  <script>
		    // You can also use "$(window).load(function() {"
			    $(function () {
			
			      // Slideshow 1
			      $("#slider1").responsiveSlides({
			        maxwidth: 1600,
			        speed: 600
			      });
			});
		  </script>
	</head>
	<body>
		<div class="wrap">
		<!----start-Header---->
		<div class="header">
			<div class="search-bar">
				<form>
					<input type="text"><input type="submit" value="Search" />
				</form>
			</div>
			<div class="clear"> </div>
			<div class="header-top-nav">
				<ul>
					<li><?php 
					if(isset($_SESSION['customer_email'])){
						 $user =$_SESSION['customer_email'];
						$get_user = "select * from customers where customer_email='$user'";
				  $run_user = mysqli_query($con , $get_user);
				  $row_user = mysqli_fetch_array($run_user);
				  $c_fname= $row_user['customer_fname'];
					echo  $c_fname;
					}
					else {
					echo "<a href='../customer_register.php'>Register</a>";
					}?></li>
					<li><?php
					if(!isset($_SESSION['customer_email'])){
					echo "<a href='../login.php'>Log in</a>";
					}
					else{
						echo "<a href='../logout.php'>Logout</a>";
					}
					?></li>
					<li><a href="#">Delivery</a></li>
					<li><a href="#">Checkout</a></li>
					<li><a href="my_account.php">My account</a></li>
					<li><a href="#"><span>shopping cart&nbsp;&nbsp;: </span></a><label> &nbsp;noitems</label></li>
				</ul>
			</div>
			<div class="clear"> </div>
		</div>
		</div>
		<div class="clear"> </div>
		<div class="top-header">
			<div class="wrap">
		<!----start-logo---->
			<div class="logo">
				<a href="index.html"><img src="../images/logo.png" title="logo" /></a>
			</div>
		<!----end-logo---->
		<!----start-top-nav---->
		<div class="top-nav">
			<ul>
				<li><a href="../index.php">Home</a></li>
				<li><a href="../about.html">About</a></li>
				<li><a href="../store.php">Store</a></li>
				<li><a href="../store.html">Featured</a></li>
				<li><a href="../blog.html">Blog</a></li>
				<li><a href="../contact.html">Contact</a></li>
			</ul>
		</div>
		<div class="clear"> </div>
		</div>
		</div>
		<div class="conatiner">
		<div class="sidebar_acc">
		 <?php
				  $user = $_SESSION['customer_email'];
				  $get_user = "select * from customers where customer_email='$user'";
				  $run_user = mysqli_query($con , $get_user);
				  $row_user = mysqli_fetch_array($run_user);
				  $c_fname= $row_user['customer_fname'];
				   $c_lname= $row_user['customer_lname'];
				   $c_country= $row_user['customer_country'];
				    $c_city= $row_user['customer_city'];
				    $c_phone= $row_user['customer_phone'];
				  ?>
				  <a href="../delivery.php">My Orders</a>
				  <a href="my_account.php?edit_account">Edit Account</a>
				  <a href="my_account.php?change_password">Change Password</a>
				  <a href="my_account.php?delete_account">Delete Account</a>
				</div>

				<div class="content_acc">
				 
				  <form action="my_account.php">
				 <?php 
				if(!isset($_GET['my_orders'])){
					if(!isset($_GET['edit_account'])){
						if(!isset($_GET['change_pass'])){
							if(!isset($_GET['delete_account'])){
							
				echo "
				<div class='row'>
      <div class='col-25'>
       <div class='imgcontainer'>
	    <img src='avatar1.png' alt='Avatar' class='avatar'>
    </div>
      </div>
      <div class='col-75'>
        
      </div>
    </div>
     <div class='row'>
      <div class='col-25'>
        <label for='fname'>First Name</label>
      </div>
      <div class='col-75'>
        <input type='text' id='fname' name='firstname' placeholder='$c_fname' disabled>
      </div>
    </div>
     <div class='row'>
      <div class='col-25'>
        <label for='lname'>Last Name</label>
      </div>
      <div class='col-75'>
        <input type='text' id='lname' name='lastname' placeholder='$c_lname' disabled>
      </div>
    </div>
     <div class='row'>
      <div class='col-25'>
        <label for='country'>Country</label>
      </div>
      <div class='col-75'>
         <input type='text' id='country' name='country' placeholder='$c_country' disabled>
      </div>
    </div>
	 <div class='row'>
      <div class='col-25'>
        <label for='city'>City</label>
      </div>
      <div class='col-75'>
         <input type='text' id='city' name='city' placeholder='$c_city' disabled>
      </div>
    </div>
    <div class='row'>
      <div class='col-25'>
        <label for='phone'>Phone</label>
      </div>
      <div class='col-75'>
        <input type='text' id='phone' name='phone' placeholder='$c_phone' disabled>
      </div>
    </div> "; 
							}
						}
					}
				}
				?> 
				<?php 
				if(isset($_GET['edit_account'])){
				include("edit_account.php");
				}
				?>
	  </form>
</div>

		
		</div>
		
		<div class="footer">
			<div class="wrap">
			<div class="section group">
				<div class="col_1_of_4 span_1_of_4">
					<h3>Our Info</h3>
					<p>M.Tech 1st year Mnnit Allahabad Students.</p>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h3>Latest-News</h3>
					<p>This website is under construction.</p>
					<p>This website is under construction.</p>
					<p>This website is under construction.</p>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h3>Store Location</h3>
					<p>Mnnit Allahabd</p>
					<h3>Order-online</h3>
					<p>6203135733</p>
					<p>7007999285</p>
				</div>
				<div class="col_1_of_4 span_1_of_4 footer-lastgrid">
					<h3>News-Letter</h3>
					<form>
						<input type="text"><input type="submit" value="go" />
					</form>
					<h3>Follow Us:</h3>
					 <ul>
					 	<li><a href="#"><img src="../images/twitter.png" title="twitter" />Twitter</a></li>
					 	<li><a href="#"><img src="../images/facebook.png" title="Facebook" />Facebook</a></li>
					 	<li><a href="#"><img src="../images/rss.png" title="Rss" />Rss</a></li>
					 </ul>
				</div>
			</div>
		</div>
		
		<div class="clear"> </div>
		<div class="wrap">
		<div class="copy-right">
			<p>&copy; 2019 Mobile Store. All Rights Reserved | Design by  Aditya , Sanghpriya and L. Brahma</p>
		</div>
		</div>
		</div>
	</body>
</html>