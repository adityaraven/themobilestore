<!DOCTYPE>
<?php 
session_start();
include("functions/function.php");
include("includes/db.php");
?>
<html>
	<head>
		<title>Mobilestore Website Template | single :: W3layouts</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<meta name="keywords" content="Mobilestore iphone web template, Android web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
		<link href='//fonts.googleapis.com/css?family=Londrina+Solid|Coda+Caption:800|Open+Sans' rel='stylesheet' type='text/css'>
		<script src="js/jquery.min.js"></script>
		<script src="js/jqzoom.pack.1.0.1.js" type="text/javascript"></script>
		<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
		<script src="js/imagezoom.js"></script>
		<!-- FlexSlider -->
					<script defer src="js/jquery.flexslider.js"></script>
					<script>
						// Can also be used with $(document).ready()
						$(window).load(function() {
						  $('.flexslider').flexslider({
							animation: "slide",
							controlNav: "thumbnails"
						  });
						});
					</script>
					<!----->
					<script>
		$(document).ready(function(){
			$(".menu_body").hide();
			//toggle the componenet with class menu_body
			$(".menu_head").click(function(){
				$(this).next(".menu_body").slideToggle(600); 
				var plusmin;
				plusmin = $(this).children(".plusminus").text();
				
				if( plusmin == '+')
				$(this).children(".plusminus").text('-');
				else
				$(this).children(".plusminus").text('+');
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
		<!----End-top-nav---->
		<!----End-Header---->
		    
		    	
				

	<?php 
				
				
	if(isset($_GET['pro_id'])){
	
	$product_id = $_GET['pro_id'];
	
	$get_pro = "select * from products where product_id='$product_id'";

	$run_pro = mysqli_query($con, $get_pro); 
	
	while($row_pro=mysqli_fetch_array($run_pro)){
	
		$pro_id = $row_pro['product_id'];
		$pro_title = $row_pro['product_title'];
		$pro_price = $row_pro['product_price'];
		$pro_image = $row_pro['product_image'];
		$pro_desc = $row_pro['product_desc'];
		$pro_qty=$row_pro['product_quantity'];
		
		$x;
		if($pro_qty>5)
						{
			    		$x= "Instock";
						}
						else if($pro_qty>0 && $pro_qty<=5){
							
							$x= "few left";
							
						}
						else
						{
							$x= "out of stock";
						}
	
		echo "
					<div class='clear'> </div>
		    <div class='wrap'>
		    <div class='content'>
		    <div class='content-grids'>
			
		    	<div class='details-page'>
		    		<div class='back-links'>
		    			<ul>
		    				<li><a href='index.php'>Home</a><img src='images/arrow.png' alt=''></li>
		    				<li><a href='store.php'>Product</a><img src='images/arrow.png' alt=''></li>
		    				<li><a href='single.php'>Product-Details</a><img src='images/arrow.png' alt=''></li>
		    			</ul>
		    		</div>
		    	</div>
					<div class='detalis-image'>
		    		<div class='flexslider'>
						<ul class='slides'>
							<li data-thumb='images/$pro_image'>
								<div class='thumb-image'> <img src='images/$pro_image' data-imagezoom='true' class='img-responsive' alt='' /> </div>
							</li>
							<li data-thumb='images/$pro_image'>
								<div class='thumb-image'> <img src='images/$pro_image' data-imagezoom='true' class='img-responsive' alt='' /> </div>
							</li>
							<li data-thumb='images/$pro_image'>
								<div class='thumb-image'> <img src='images/$pro_image' data-imagezoom='true' class='img-responsive' alt='' /> </div>
							</li>
						</ul>
					</div>
		    	</div>
				<div class='detalis-image-details'>
		    		<div class='details-categories'>
		    			<ul>
		    				<li><h3>Category:</h3></li>
		    				<!--<li class='active1'><a href='#'><span>Nokia Mobiles</span></a></li>-->
		    				<li><a href='#'>Android Mobiles</a></li>
		    				<li><a href='#'>Iphone Mobiles</a></li>
		    				<li><a href='#'>Mobiles Accessories</a></li>
		    			</ul>
		    		</div><br />
		    		<div class='brand-value'>
		    			<h3>Product-Complete Details With Value</h3>
		    			<div class='left-value-details'>
			    			<ul>
			    				<li>Price:</li>
			    				
			    				<li><h5>₹ $pro_price</h5></li>
			    				<br />
			    				<li><p>Not rated</p></li>
			    			</ul>
		    			</div>
		    			<div class='right-value-details'>
						$x
			    			
		    			</div>
		    			<div class='clear'> </div>
		    		</div>
		    		<div class='brand-history'>
					
		    			<h3>Description :</h3>
		    			<p>$pro_desc</p>
		    			<a href='single.php?add_cart=$pro_id'>Addcart</a>
		    		</div>
		    		<div class='share'>
		    			<ul>
		    				<li> <a href='https://www.facebook.com'><img src='images/facebook.png' title='facebook' /> Facebook</a></li>
		    				<li> <a href='https://www.twitter.com'><img src='images/twitter.png' title='Twiiter' />Twiiter</a></li>
		    				<li> <a href='#'><img src='images/rss.png' title='Rss' />Rss</a></li>
		    			</ul>
		    		</div>
		    		<div class='clear'> </div>
		    		
		    		</div>
		    		<div class='clear'> </div>
		    	<div class='menu_container'>
						
						<p class='menu_head'>About Product<span class='plusminus'></span></p>
							
							
							<p>$pro_desc</p>
							
							
							<br>
							<br>
							
							
					</div>
			</div>
			
		    	</div>
		
		
		";
	
	}
	}
	else if(isset($_GET['acc_id'])){
	
	$product_id = $_GET['acc_id'];
	
	$get_pro = "select * from accessories where acc_id='$product_id'";

	$run_pro = mysqli_query($con, $get_pro); 
	
	while($row_pro=mysqli_fetch_array($run_pro)){
	
		$pro_id = $row_pro['acc_id'];
		$pro_title = $row_pro['acc_title'];
		$pro_price = $row_pro['acc_price'];
		$pro_image = $row_pro['acc_image'];
		$pro_desc = $row_pro['acc_desc'];
	
		echo "
					<div class='clear'> </div>
		    <div class='wrap'>
		    <div class='content'>
		    <div class='content-grids'>
			
		    	<div class='details-page'>
		    		<div class='back-links'>
		    			<ul>
		    				<li><a href='index.php'>Home</a><img src='images/arrow.png' alt=''></li>
		    				<li><a href='store.php'>Product</a><img src='images/arrow.png' alt=''></li>
		    				<li><a href='single.php'>Product-Details</a><img src='images/arrow.png' alt=''></li>
		    			</ul>
		    		</div>
		    	</div>
					<div class='detalis-image'>
		    		<div class='flexslider'>
						<ul class='slides'>
							<li data-thumb='images/$pro_image'>
								<div class='thumb-image'> <img src='images/$pro_image' data-imagezoom='true' class='img-responsive' alt='' /> </div>
							</li>
							<li data-thumb='images/$pro_image'>
								<div class='thumb-image'> <img src='images/$pro_image' data-imagezoom='true' class='img-responsive' alt='' /> </div>
							</li>
							<li data-thumb='images/$pro_image'>
								<div class='thumb-image'> <img src='images/$pro_image' data-imagezoom='true' class='img-responsive' alt='' /> </div>
							</li>
						</ul>
					</div>
		    	</div>
				<div class='detalis-image-details'>
		    		<div class='details-categories'>
		    			<ul>
		    				<li><h3>Category:</h3></li>
		    				<!--<li class='active1'><a href='#'><span>Nokia Mobiles</span></a></li>-->
		    				<li><a href='#'>Andrid Mobiles</a></li>
		    				<li><a href='#'>Iphone Mobiles</a></li>
		    				<li><a href='#'>Mobiles Accessories</a></li>
		    			</ul>
		    		</div><br />
		    		<div class='brand-value'>
		    			<h3>Product-Complete Details With Value</h3>
		    			<div class='left-value-details'>
			    			<ul>
			    				<li>Price:</li>
			    				
			    				<li><h5>₹ $pro_price</h5></li>
			    				<br />
			    				<li><p>Not rated</p></li>
			    			</ul>
		    			</div>
		    			<div class='right-value-details'>
			    			<a href='#'>Instock</a>
			    			<p>No reviews</p>
		    			</div>
		    			<div class='clear'> </div>
		    		</div>
		    		<div class='brand-history'>
					
		    			<h3>Description :</h3>
		    			<p>$pro_desc</p>
		    			<a href='single.php?acc_cart=$pro_id'>Addcart</a>
		    		</div>
		    		<div class='share'>
		    			<ul>
		    				<li> <a href='#'><img src='images/facebook.png' title='facebook' /> Facebook</a></li>
		    				<li> <a href='#'><img src='images/twitter.png' title='Twiiter' />Twiiter</a></li>
		    				<li> <a href='#'><img src='images/rss.png' title='Rss' />Rss</a></li>
		    			</ul>
		    		</div>
		    		<div class='clear'> </div>
		    		
		    		</div>
		    		<div class='clear'> </div>
		    	<div class='menu_container'>
						
						<p class='menu_head'>About Product<span class='plusminus'></span></p>
							
							
							<p>$pro_desc</p>
							
							
							<br>
							<br>
							<p class='menu_head'>Recommended Accessories<span class='plusminus'></span></p>
							
					</div>
			</div>
			
		    	</div>
		
		
		";
	
	}
	}
?>

<div class='content-grids'>
             <div class='clear'> </div>
		    	<div class='menu_container'>
							<br>
							<p class='menu_head'>Recommended Accessories<span class='plusminus'>+</span></p>
							
							<?php recomAcc(); ?>
							
							
					</div>
			
						

             
	  	    
             <div class='clear'> </div>
		    	<div class='menu_container'>
					
							<br>
							<p class='menu_head'>Recommended Products<span class='plusminus'>+</span></p>
							
							<?php recom(); ?>
							
							
					</div>
			</div>

				
							
				





		    	<div class="content-sidebar">
				<?php cart1(); ?>
				
		    		
		    	</div>
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

