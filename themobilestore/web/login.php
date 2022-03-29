<!DOCTYPE>
<?php 
session_start();
include("functions/functions.php");

?>
<?php
					if(isset($_SESSION['customer_email']))
					{ header("Location: index.php"); }
					
					else {}
					?>
<html>
	<head>
		<title>Login</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
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
					<input type="text" placeholder="Search a Product"><input type="submit" value="Search"/>
				</form>
			</div>
			<div class="clear"> </div>
			<div class="header-top-nav">
				<ul>
					<li><?php 
					if(isset($_SESSION['customer_email'])){
					echo "Welcome: " . $_SESSION['customer_email'];
					}
					else {
					echo "<a href='customer_register.php'>Register</a>";
					}?></li>
					<li><?php
					if(!isset($_SESSION['customer_email'])){
					echo "<a href='login.php'>Log in</a>";
					}
					else{
						echo "<a href='logout.php'>Logout</a>";
					}
					?></li>
					<li><a href="login.php">Delivery</a></li>
					<li><?php
					if(!isset($_SESSION['customer_email'])){
					echo "<a href='login.php'>Checkout</a>";
					}
					else{
						echo "<a href='checkout.php'>Checkout</a>";
					}
					?></li>
					<li><a href="login.php">My account</a></li>
					<li><?php
					if(!isset($_SESSION['customer_email'])){
					echo "<a href='login.php'><span>shopping cart&nbsp;&nbsp; </span></a>";
					}
					else{
						echo "<a href='cart.php'><span>shopping cart&nbsp;&nbsp;: </span>"; total_items();
					}
					?></li>
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
				<a href="index.php"><img src="images/logo.png" title="logo" /></a>
			</div>
		<!----end-logo---->
		<!----start-top-nav---->
		<div class="top-nav">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="store.php">Store</a></li>
				<li><a href="store.php">Featured</a></li>
				<li><a href="contact.php">Contact</a></li>
			</ul>
		</div>
		<div class="clear"> </div>
		</div>
		</div>
		<div class="container">
		<form action="login.php" method="post" enctype="multipart/form-data">
					
					<div class="row">
							<div class="col-25">
							<label for="email">email id</label>
							</div>
						<div class="col-75">
							<input type="email" id="email" name="email" placeholder="email Id" required>
						</div>
						</div>
				
						<div class="row">
						<div class="col-25">
						  <label for="password">Password</label>
						</div>
						<div class="col-75">
						  <input type="password"  name="customer_pass" value="" placeholder="******" required>
						</div>
						</div>
						
							<div class="row2">
						<input type="submit" value="Submit" name="login">
					  </div>
					  <br>
					  <h1 style="float:right; padding-right:50px;"><a href="customer_register.php" style="text-decoration:none;">New? Register Here</a></h1>
				      </br>
				</form>
			</div>
		
		<br><br>
		
		<div class="footer">
			<div class="wrap">
			<div class="section group">
				<div class="col_1_of_4 span_1_of_4">
					<h3>Our Info</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h3>Latest-News</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h3>Store Location</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
					<h3>Order-online</h3>
					<p>080-1234-56789</p>
					<p>080-1234-56780</p>
				</div>
				<div class="col_1_of_4 span_1_of_4 footer-lastgrid">
					<h3>News-Letter</h3>
					<form>
						<input type="text"><input type="submit" value="go" />
					</form>
					<h3>Follow Us:</h3>
					 <ul>
					 	<li><a href="#"><img src="images/twitter.png" title="twitter" />Twitter</a></li>
					 	<li><a href="#"><img src="images/facebook.png" title="Facebook" />Facebook</a></li>
					 	<li><a href="#"><img src="images/rss.png" title="Rss" />Rss</a></li>
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

<?php 
	if(isset($_POST['login'])){
	
		$c_email = $_POST['email'];
		$c_pass = $_POST['customer_pass'];
		
		$sel_c = "select * from customers where customer_pass='$c_pass' AND customer_email='$c_email'";
	
		$run_c = mysqli_query($con, $sel_c);
		
		$check_customer = mysqli_num_rows($run_c); 
		
		if($check_customer==0){
		
		echo "<script>alert('Password or email is incorrect, plz try again!')</script>";
		exit();
		}
		else{
	/*	$ip = getIp(); 
		
		$sel_cart = "select * from cart where ip_add='$ip'";
		
		$run_cart = mysqli_query($con, $sel_cart); 
		
		$check_cart = mysqli_num_rows($run_cart); 
		
		if($check_customer>0 AND $check_cart==0){
		
		 */
		$_SESSION['customer_email']=$c_email;
		
		echo "<script>alert('You logged in successfully, Thanks!')</script>";
		echo "<script>window.open('index.php','_self')</script>";
		}
		
		/*else {
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('You logged in successfully, Thanks!')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
		
		
		}*/
	}
	
	
	?>