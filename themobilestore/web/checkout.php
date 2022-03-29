<!DOCTYPE>
<?php 
session_start();
include("functions/function.php");
include("includes/db.php");
?>
<html>
	<head>
		<title>Checkout</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<meta name="keywords" content="Mobilestore for Nokia, Samsung, LG, Sony Ericsson, Motorola" />
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
	<!--start-image-slider---->
					
		    <div class="clear"> </div>
		    
			
			<div class="container">
			<?php 
				if(!isset($_SESSION['customer_email'])){
					
					echo "<a href='login.php'>Log in</a>";
				}
				else {
				echo "<div class='col span_2_of_3'>
				  <div class='contact-form'>
				  	<h2>Place Your Order</h2>
					    <form>
					    	<div>
						    	<span><label>Name</label></span>
						    	<span><input type='text' value=''name='f_name'></span>
						    </div>
						    <div>
						    	<span><label>City</label></span>
						    	<span><input type='text' value='' name='city'></span>
						    </div>
							<div>
						    	<span><label>Pincode</label></span>
						    	<span><input type='text' value='' maxlength='6' max='999999' name='pincode' onkeypress='return isNumber(event)'></span>
						    </div>
							<div>
						    	<span><label>State</label></span>
						    	<span><input type='text' value='' name='state'></span>
						    </div>
						    <div>
						     	<span><label>Mobile No.</label></span>
						    	<span><input type='text' id='phone' name='phone' maxlength='10' max='9999999999' onkeypress='return isNumber(event)' required></span>
						    </div>
						    <div>
						    	<span><label>Address</label></span>
						    	<span><textarea name='desc'> </textarea></span>
						    </div>
						   <div>
						   		<span><input type='submit' value='Place Order' name='submit'></span>
						  </div>
					    </form>
				    </div>
  				</div>	";
				
				
				}
				
				?>
			
			</div>
		    <div class="clear"> </div>
		    
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

if (isset($_GET["submit"])) {

		include_once("db.php");
		$name = $_GET['f_name'];
		$city = $_GET['city'];
		$state = $_GET['state'];
		$phone = $_GET['phone'];
		$pincode = $_GET['pincode'];
		$desc = $_GET['desc'];
		$query="SELECT * FROM `cart` WHERE `cust_mail`='$user'";
		
		$query2="INSERT INTO `orders` (`user_id`,`name`,`city`,`pincode`,`state`,`phone`,`desc`,`date`) VALUES('$user','$name','$city','$pincode','$state','$phone','$desc',CURDATE())";
		$last_id;
	
		if($runquery1=mysqli_query($con,$query2)){
		$last_id=mysqli_insert_id($con);
		}
$runquery=mysqli_query($con,$query);
$count1=mysqli_num_rows($runquery);
if($count1>=0){
while($row=mysqli_fetch_assoc($runquery)){
	
	$cust_mail=$row['cust_mail'];
	$p_id=$row['p_id'];
	$qty=$row['qty'];
	

	
	
		//Insert your order id query here 
		
	
	
	$query6="INSERT INTO `orderdetails` (`product_id`,`order_id`,quantity) VALUES('$p_id','$last_id','$qty')";
	if($runquery6=mysqli_query($con,$query6)){
		echo "";
	
		
		
		/*$orderid = mysqli_insert_id($con);
		
		$cart=unserialize(serialize ($_SESSION['cart']));
		for($i=0;$i<count($cart);$i++)
		{
			mysqli_query($con,'insert into orderdetails(product_id, order_id , quantity )
			values('.$cart[$i]->$p_id.','.$orderid.','.$cart[$i]->$qty.')');
	}*/
}



$query4="DELETE FROM `cart` WHERE `cust_mail`='$user' ";
if($runquery2=mysqli_query($con,$query4)){
	echo "";
}

$query8="SELECT * from `products` WHERE `product_id`='$p_id'";
$runquery8=mysqli_query($con,$query8);
$count4=mysqli_num_rows($runquery);
if($count4>=0){
while($row4=mysqli_fetch_assoc($runquery8)){
	
	$product_quantity=$row4['product_quantity'];
	echo "$product_quantity";
	
	$qty3=$product_quantity-1;
	$update_q= "update `products`  set product_quantity='$qty3' where product_id =$p_id";
if($runquery5=mysqli_query($con,$update_q)){
echo '';

}
}


}
}
}
echo "<script>alert('Order has been placed!')</script>";
echo "<script>window.open('index.php','_self')</script>";
}
/*unset($_SESSION['cart']);*/
?>