<!DOCTYPE>
<?php 
session_start();
$ua=$_SESSION['customer_email'];
include("functions/function.php");
include("includes/db.php");
?>
<html>
	<head>
		<title>Order Details</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<meta name="keywords" content="Mobilestore Nokia, Samsung, LG, Sony Ericsson, Motorola" />
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
					$user =$_SESSION['customer_email'];
						$get_user = "select * from customers where customer_email='$user'";
				  $run_user = mysqli_query($con , $get_user);
				  $row_user = mysqli_fetch_array($run_user);
				  $c_fname= $row_user['customer_fname'];
					echo  $c_fname;
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
					<li><a href="login.php">Checkout</a></li>
					<li><a href="login.php">My account</a></li>
					<li><?php
					if(!isset($_SESSION['customer_email'])){
					echo "<a href='login.php'><span>shopping cart&nbsp;&nbsp; </span></a>";
					}
					else{
						echo "<a href='login.php'><span>shopping cart&nbsp;&nbsp;: </span>"; total_items();
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
				<li><a href="contact.php">About</a></li>
				<li><a href="store.php">Store</a></li>
				<li><a href="store.php">Featured</a></li>
				<li><a href="contact.php">Contact</a></li>
			</ul>
		</div>
		<div class="clear"> </div>
		</div>
		</div>
		<!----End-top-nav---->
		<!----End-Header---->
	
		    	
		    <div class="content-grids">
			
		    					
				<div class="section group">
		    	
				<form action="" method="post" enctype="multipart/form-data">
			
				<table align="center" width="1050" bgcolor="#f1f1f1">
					
					<tr align="center">
					
						<th>Order Id</th>
						<th>Products</th>
						<th>Quantity</th>

					</tr>
	
					</tr>
					</br>
					
		<?php 

	
		
		global $con; 
		
		
		
		
		$query1 = "select * from orders where user_id='$user'";
		//echo $sel_price;
		$run_query1 = mysqli_query($con, $query1); 
		$i=1;
		while($p_run1=mysqli_fetch_array($run_query1)){
			
			$order_id = $p_run1['order_id']; 
			//echo $pro_id;
			
			$query2 = "select * from orderdetails where order_id='$order_id'";
			
			
			$run_query2 = mysqli_query($con,$query2); 
			
			while ($p_run2 = mysqli_fetch_array($run_query2)){
				
				
			
			$product_id = $p_run2['product_id'];
			$qty= $p_run2['quantity'];
			$query3 = "select * from products where product_id='$product_id'";
			
			$run_query3 = mysqli_query($con,$query3); 
			
					
			while ($p_run3 = mysqli_fetch_array($run_query3)){
			
					$product_image = $p_run3['product_image'];
					$product_title = $p_run3['product_title'];
				
			
					
					?>
					
					<tr align="center">
						<td><?php echo $order_id; ?></td>
						<td><?php echo $product_title; ?><br>
						<img src="images/<?php echo $product_image;?>" width="60" height="60"/>
						</td>
						<td><?php echo $qty ?></td>
						
		<?php } }$i++;}?></tr>
					</table> 
			
			</form>
					
					
					
				
			
	
				
				</div>
			
			</div>
		</div>
				
				
			</div>
			
				
			</div>

		    
		    	</div>
		    	<div class="content-sidebar">
		    		<ul><h4>Brands</h4>
						<ul>
							<?php
						getBrands();
					?>
					
						</ul>
						<h4>Categories</h4>
						<ul>
							<?php
						getCats();
					?>
					
						</ul>
						</ul>
						
		    	</div>
		    
		    <div class="clear"> </div>
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

