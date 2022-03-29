<!DOCTYPE>
<?php 
session_start();
include("functions/function.php");
include("includes/db.php");
?>
<html>
	<head>
		<title>Mobilestore</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		
		<link href='//fonts.googleapis.com/css?family=Londrina+Solid|Coda+Caption:800|Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/responsiveslides.css">
		
		
		</head>
	<body>
		<div class="wrap">
		<!----start-Header---->
		<div class="header">
			<div class="search-bar">
				<form method="get" action="results.php" enctype="multipart/form-data">
					<input type="text" name="user_query" placeholder="Search a Product"><input type="submit" name="search" value="Search"/>
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
					<li><?php
					if(!isset($_SESSION['customer_email'])){
					echo "";
					}
					else{
						echo "<a href='delivery.php'>Orders</a>";
					}
					?></li>
					<li><?php
					if(!isset($_SESSION['customer_email'])){
					echo "<a href='login.php'>Checkout</a>";
					}
					else{
						$get_items = "select * from cart where cust_mail='$user'";
		
		$run_items = mysqli_query($con, $get_items); 
		
		$count_items = mysqli_num_rows($run_items);
		
						if($count_items>0)
						{
						echo "<a href='checkout.php'>Checkout</a>";
						}
						else
						{
							echo "<a href='store.php'>Checkout</a>";
							
					}}
					?></li>
					<li><?php
					if(!isset($_SESSION['customer_email'])){
					echo "";
					}
					else{
						echo "<a href='customer/my_account.php'>My account</a>";
					}
					?></li>
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
		<div class="container">
			<br />
			<br />
			<br />
			<h2 align="center">Comparison Table</h2><br />
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">Search</span>
					<input type="text" name="search_text" id="search_text" placeholder="Search Phone" class="form-control" />
				</div>
			</div>
			<br />
			<div id="result"></div>
			
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">Search</span>
					<input type="text" name="search_text2" id="search_text2" placeholder="Search Phone" class="form-control" />
				</div>
			</div>
			<br />
			<div id="result2"></div>
			
		
		<br />
		
		<br />
		<br />
		<br />

</div>
		<div style="clear:both"></div>
		
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


<script>
$(document).ready(function(){
	
	
	$('#search_text').keyup(function(){
		var txt = $(this).val();
		if(txt != '')
		{
			$.ajax({
			url:"fetch.php",
			method:"post",
			data:{search:txt},
			dataType:"text",
			success:function(data)
			{
				$('#result').html(data);
			}		
		});
		}
		else
		{
			$('#result').html('');
				
		}
	});
});
</script>

<script>
$(document).ready(function(){
	/* load_data();
	function load_data(query)
	{
		$.ajax({
			url:"fetch.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	} */
	
	$('#search_text2').keyup(function(){
		var txt2 = $(this).val();
		if(txt2 != '')
		{
			$.ajax({
			url:"fetch2.php",
			method:"post",
			data:{search2:txt2},
			dataType:"text",
			success:function(data)
			{
				$('#result2').html(data);
			}		
		});
		}
		else
		{
			$('#result2').html('');
				
		}
	});
});
</script>




