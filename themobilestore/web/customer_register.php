<!DOCTYPE>
<?php 
session_start();
include("functions/function.php");
include("includes/db.php");
?>
<html>
	<head>
		<title>Create an Account</title>
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
		  <script> 
		  function isNumber(event){
			  var keycode=event.keyCode;
			  if(keycode>48 && keycode<57)
			  {
				  return true;
			  }
			  return false;
		  }
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
				<li><a href="about.html">About</a></li>
				<li><a href="store.php">Store</a></li>
				<li><a href="store.html">Featured</a></li>
				<li><a href="contact.html">Contact</a></li>
			</ul>
		</div>
		<div class="clear"> </div>
		</div>
		</div>
		<div class="container">
		<form action="customer_register.php" method="post" enctype="multipart/form-data">
					
					<h1 align="center"> <b>Create an Account </b></h1>
					<br>
						<div class="row">
							<div class="col-25">
							<label for="fname">First Name</label>
							</div>
						<div class="col-75">
							<input type="text" id="fname" name="fname" placeholder="Your name" required>
						</div>
						</div>
						
						
						<div class="row">
						<div class="col-25">
						<label for="lname">Last Name</label>
						</div>
						<div class="col-75">
						<input type="text" id="lname" name="lastname" placeholder="Your last name" required>
						</div>
						</div>
						
						<div class="row">
						<div class="col-25">
						<label for="dob">Date of Birth</label>
						</div>
						<div class="col-75">
						<input type="date" id="dob" name="dob" placeholder="Date of Birth">
						</div>
						</div>
						
						
						 <div class="row">
						<div class="col-25">
						  <label for="email">Customer Email:</label>
						</div>
						
						<div class="col-75">
						  <input type="email" id="c_email" name="customer_email" value="" placeholder="Email id" required>
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
						
						<div class="row">
						<div class="col-25">
						  <label for="country">Country</label>
						</div>
						<div class="col-75">
						  <select id="country" name="country">
						  <option value="select your Country" disabled selected>select your Country</option>
							<option value="australia">Australia</option>
							<option value="canada">Canada</option>
							<option value="usa">USA</option>
							<option value="Afghanistan">Afghanistan</option>
								<option value="India">India</option>
								<option value="Japan">Japan</option>
								<option value="Pakistan">Pakistan</option>
								<option value="Israel">Israel</option>
								<option value="Nepal">Nepal</option>
								<option value="United Arab Emirates">United Arab Emirates</option>
								
						  </select>
						</div>
					  </div>
						<div class="row">
						<div class="col-25">
						<label for="city">City</label>
						</div>
						<div class="col-75">
						<input type="text" id="city" name="city" placeholder="city" required>
						</div>
						</div>
						<div class="row">
						<div class="col-25">
						<label for="phone">Phone</label>
						</div>
						<div class="col-75">
						<input type="text" id="phone" name="phone" maxlength="10" max="9999999999" placeholder="phone" onkeypress='return isNumber(event)'required>
						</div>
						</div>
						<br>
					<div class="row2">
						<input type="submit" value="Submit" name="register">
					  </div>
					  </form>
					</div>
		
		<br><br>
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
	if(isset($_POST['register'])){
	

  
		$ip = getIp();
		
		$c_fname = $_POST['fname'];
		$c_lname = $_POST['lastname'];
		$c_email = $_POST['customer_email'];
		$c_pass = sha1(sha1($_POST['customer_pass']).sha1("mySalt@$#(%"));
		$c_country = $_POST['country'];
		$c_city = $_POST['city'];
		
		$c_dob = $_POST['dob'];
		$c_phone = $_POST['phone'];
		
		
		
		 $insert_c = "insert into customers (customer_ip,customer_fname,customer_lname,customer_email,customer_pass,customer_country,customer_city,customer_dob,customer_phone) values ('$ip','$c_fname','$c_lname','$c_email','$c_pass','$c_country','$c_city','$c_dob','$c_phone')";
	
		$run_c = mysqli_query($con, $insert_c); 
		
		if($run_c)
		{
			 
			echo"<script>alert('Account created successfully, Please Login to continue!')</script>";
			echo "<script>window.open('login.php','_self')</script>";
		}
		/*$sel_cart = "select * from cart where ip_add='$ip'";
		
		$run_cart = mysqli_query($con, $sel_cart); 
		
		$check_cart = mysqli_num_rows($run_cart); 
		
		if($check_cart==0){
		
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('Account has been created successfully, Thanks!')</script>";
		echo "<script>window.open('customer/my_account.php','_self')</script>";
		
		}
		else {
		
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('Account has been created successfully, Thanks!')</script>";
		
		echo "<script>window.open('checkout.php','_self')</script>";
		
		
		}*/
	}





?>

