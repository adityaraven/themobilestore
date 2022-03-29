<!DOCTYPE>
<?php 
session_start();
$ua=$_SESSION['customer_email'];
include("functions/function.php");
include("includes/db.php");
?>
<html>
	<head>
		<title>Mobilestore</title>
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
			<?php cart(); ?>
		    					
				<div class="section group">
		    	
				<form action="" method="post" enctype="multipart/form-data">
			
				<table align="center" width="1050" bgcolor="#9ACD32">
					
					<tr align="center">
						<th>Remove</th>
						<th>Product(S)</th>
						<th>Quantity</th>
						<th>Total Price</th>
					</tr>
					</br>
					
		<?php 

		$total = 0;
		
		global $con; 
		
		$ip = getIp(); 
		
		
		$sel_price = "select * from cart where cust_mail='$ua' AND ip_addr='$ip'";
		//echo $sel_price;
		$run_price = mysqli_query($con, $sel_price); 
		
		while($p_price=mysqli_fetch_array($run_price)){
			
			$pro_id = $p_price['p_id']; 
			
			//echo $pro_id;
			if($pro_id<1000)
			{
			
			$pro_price = "select * from products where product_id='$pro_id'";
			}
			else
			{
				$pro_price = "select * from accessories where acc_id='$pro_id'";
			}
			
			$run_pro_price = mysqli_query($con,$pro_price); 
			
			while ($pp_price = mysqli_fetch_array($run_pro_price)){
				
				if($pro_id<1000) {
			
			$product_price = array($pp_price['product_price']);
			
			$product_title = $pp_price['product_title'];
			
			$product_image = $pp_price['product_image']; 
			
			$single_price = $pp_price['product_price'];
			
			
				}
			 else {
					$product_price = array($pp_price['acc_price']);
			
			$product_title = $pp_price['acc_title'];
			
			$product_image = $pp_price['acc_image']; 
			
			$single_price = $pp_price['acc_price'];
					
				}
				$values = array_sum($product_price); 
			
			$total += $values; 
					
					?>
					
					
					<tr align="center">
						<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"/></td>
						<td><?php echo $product_title; ?><br>
						<img src="images/<?php echo $product_image;?>" width="60" height="60"/>
						</td>
						<td><input type="text" size="4" name="qty" /></td>
						<?php 
						if(isset($_POST['update_cart'])){
						    
							if($_POST['qty']) {
							$qty = $_POST['qty'];
							 }
							 else
							 {
								 $qty='1';
							 }
							
							$update_qty = "update cart set qty='$qty'";
							
							$run_qty = mysqli_query($con, $update_qty); 
							
							
							
							$total = $total*$qty;
						}
						
						
						?>
						
						
						<td><?php echo "₹" . $single_price; ?></td>
					</tr>
					
			        <?php } } ?>		
				
				
				<tr>
						<td colspan="4" align="right"><b>Sub Total:</b></td>
						<td><?php echo "₹" . $total;?></td>
					</tr>
					
					
					<tr align="center">
						<td><input type="submit" name="update_cart" value="Update Cart"/></td></span>
						<td colspan="2"><input type="submit" name="continue" value="Continue Shopping" /></td>
						<td colspan="3"><input type ="submit" name="checkout" value="checkout"/></td>
						
						
					</tr>
					
					</table> 
			
			</form>
					
					
					
				
			
	<?php 
		
	function updatecart(){
		global $con;
		
		
		
		
		global $con; 
		
		$ip = getIp();
		
		if(isset($_POST['update_cart'])){
		
			foreach($_POST['remove'] as $remove_id){
			
			$delete_product = "delete from cart where p_id='$remove_id' AND ip_addr='$ip'";
			
			$run_delete = mysqli_query($con, $delete_product); 
			
			if($run_delete){
			
			echo "<script>window.open('cart.php','_self')</script>";
			
			}
			
			}
		
		}
		if(isset($_POST['continue'])){
		
		echo "<script>window.open('index.php','_self')</script>";
		
		}
		if(isset($_POST['checkout'])){
		
		echo "<script>window.open('checkout.php','_self')</script>";
		
		}
	
	}
	echo @$up_cart = updatecart();
	
	?>

				
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

