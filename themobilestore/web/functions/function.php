<?php
$con = mysqli_connect("localhost","root","","mobilestore");


if (mysqli_connect_errno())
  {
  echo "The Connection was not established: " . mysqli_connect_error();
  }
   // getting the user IP address
  function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}
  
  function cart(){
	  
	  $ua=$_SESSION['customer_email'];

if(isset($_GET['add_cart'])){

	global $con; 
	
	$ip = getIp();
	
	
	
	
	
	$pro_id = $_GET['add_cart'];

	$check_pro = "select * from cart where p_id='$pro_id' AND cust_mail='$ua'";
	
	$run_check = mysqli_query($con, $check_pro); 
	
	if(mysqli_num_rows($run_check)>0){

	echo "";
	
	}
	else {
		
		
		
	
	$insert_pro = "insert into cart (cust_mail,p_id,ip_addr,qty) values ('$ua','$pro_id','$ip','1')";
	
	$run_pro = mysqli_query($con, $insert_pro); 
	
	echo "<script>window.open('index.php','_self')</script>";
	}
	
}

}

 function cart1(){

 $ua=$_SESSION['customer_email'];
if(isset($_GET['add_cart'])){

	global $con; 
	
	$ip = getIp();
	
	
	$pro_id = $_GET['add_cart'];

	$check_pro = "select * from cart where p_id='$pro_id' AND cust_mail='$ua'";
	
	$run_check = mysqli_query($con, $check_pro); 
	
	if(mysqli_num_rows($run_check)>0){

	echo "";
	
	}
	else {
	
	$insert_pro = "insert into cart (cust_mail,p_id,ip_addr,qty) values ('$ua','$pro_id','$ip','1')";
	
	$run_pro = mysqli_query($con, $insert_pro); 
	
	echo "<script>window.open('single.php?pro_id=$pro_id','_self')</script>";
	}
	
}

}

function cart2(){
	$ua=$_SESSION['customer_email'];

if(isset($_GET['acc_cart'])){

	global $con; 
	
	$ip = getIp();
	
	
	$pro_id = $_GET['acc_cart'];

	$check_pro = "select * from cart where ip_addr='$ip' AND p_id='$pro_id' AND cust_name='$ua'";
	
	$run_check = mysqli_query($con, $check_pro); 
	
	if(mysqli_num_rows($run_check)>0){

	echo "";
	
	}
	else {
	
	$insert_pro = "insert into cart (cust_mail,p_id,ip_addr,qty) values ('$ua','$pro_id','$ip','1')";
	
	$run_pro = mysqli_query($con, $insert_pro); 
	
	echo "<script>window.open('single.php?acc_id=$pro_id','_self')</script>";
	}
	
}

}


	
	
function total_items(){
	$ua=$_SESSION['customer_email'];
 
	if(isset($_GET['add_cart'])){
	
		global $con; 
		
		
		
		$ip = getIp(); 
		
		$get_items = "select * from cart where cust_mail='$ua' AND cust_mail='$ua'";
		
		$run_items = mysqli_query($con, $get_items); 
		
		$count_items = mysqli_num_rows($run_items);
		
		}
		
		else {
		
		global $con; 
		
		$ip = getIp(); 
		
		$get_items = "select * from cart where cust_mail='$ua' AND ip_addr='$ip'";
		
		$run_items = mysqli_query($con, $get_items); 
		
		$count_items = mysqli_num_rows($run_items);
		
		}
	
	echo $count_items;
	}
  
function total_price(){
	$ua=$_SESSION['customer_email'];
	
		$total = 0;
		
		global $con; 
		
		$ip = getIp(); 
		
		$sel_price = "select * from cart where cust_mail='$ua' AND ip_addr='$ip'";
		
		$run_price = mysqli_query($con, $sel_price); 
		
		while($p_price=mysqli_fetch_array($run_price)){
			
			$pro_id = $p_price['p_id']; 
			
			if($pro_id>1000)
			{
				$pro_price = "select * from accessories where acc_id='$pro_id'";
			}
			else
			{
			$pro_price = "select * from products where product_id='$pro_id'";
			}
			$run_pro_price = mysqli_query($con,$pro_price); 
			
			while ($pp_price = mysqli_fetch_array($run_pro_price)){
				if($pro_id>1000)
				{
					$product_price=array($pp_price['acc_price']);
				}
				else
				{
			
			$product_price = array($pp_price['product_price']);
				}
			
			$values = array_sum($product_price);
			
			$total +=$values;
			
			}
		
		
		}
		
		echo "₹" . $total;
		
	
	}

	
function getCats(){
	
	global $con; 
	
	$get_cats = "select * from categories";
	
	$run_cats = mysqli_query($con, $get_cats);
	
	while ($row_cats=mysqli_fetch_array($run_cats)){
	
		$cat_id = $row_cats['cat_id']; 
		$cat_title = $row_cats['cat_title'];
	
	echo "<li><a href='store.php?cat=$cat_id'>$cat_title</a></li>";
	
	
	}


}


function getBrands(){
	
	
	global $con; 
	
	$get_brands = "select * from brands";
	
	$run_brands = mysqli_query($con, $get_brands);
	
	while ($row_brands=mysqli_fetch_array($run_brands)){
	
		$brand_id = $row_brands['brand_id']; 
		$brand_title = $row_brands['brand_title'];
	
	echo "<li><a href='store.php?brand=$brand_id'>$brand_title</a></li>";
	
	
	
	}
}


function getPro(){

	if(!isset($_GET['cat'])){
		if(!isset($_GET['brand'])){

	global $con; 
	
	$get_pro = "select * from products order by product_title";

	$run_pro = mysqli_query($con, $get_pro); 
	/*$get_brand='select * from brands where brand_id=$pro_brand';
		$run_brand=mysqli_query($con,$get_brand);
		$row_brand=mysqli_fetch_array($run_brand);
		$brandd=$row_brand['brand_title'];*/
		
	
	while($row_pro=mysqli_fetch_array($run_pro)){
	
		$pro_id = $row_pro['product_id'];
		$pro_cat = $row_pro['product_cat'];
		$pro_brand = $row_pro['product_brand'];
		$pro_title = $row_pro['product_title'];
		$pro_price = $row_pro['product_price'];
		$pro_image = $row_pro['product_image'];
		
	
		echo "
				
				<div class='grid_1_of_4 images_1_of_4 products-info'>
					<h3>$pro_title</h3>
					 <a href='single.php?pro_id=$pro_id'><img src='images/$pro_image' height=200px width=140px ></a>
					 <h3>₹ $pro_price</h3>
					 <ul>
					 	<li><a  class='cart' href='index.php?add_cart=$pro_id'> </a></li>
					 	<li><a  class='i' href='single.php?pro_id=$pro_id'> </a></li>
					 	<li><a  class='Compar' href='single.php?pro_id=$pro_id'> </a></li>
					 	
					 </ul>
				</div>
		
		
		";
	
	}
	}
}
}

function getBrPro(){

	
		if(isset($_GET['brand'])){
			$br_id=$_GET['brand'];

	global $con; 
	
	$get_br_pro = "select * from products where product_brand=$br_id";

	$run_br_pro = mysqli_query($con, $get_br_pro); 
	/*$get_brand='select * from brands where brand_id=$pro_brand';
		$run_brand=mysqli_query($con,$get_brand);
		$row_brand=mysqli_fetch_array($run_brand);
		$brandd=$row_brand['brand_title'];*/
		$count_brand = mysqli_num_rows($run_br_pro);
	
	if($count_brand==0){
	
	echo "<h2 style='padding:20px;'>No products where found Associated to this Brand!</h2>";
	
	}
		
	
	while($row_br_pro=mysqli_fetch_array($run_br_pro)){
	
		$pro_id = $row_br_pro['product_id'];
		$pro_cat = $row_br_pro['product_cat'];
		$pro_brand = $row_br_pro['product_brand'];
		$pro_title = $row_br_pro['product_title'];
		$pro_price = $row_br_pro['product_price'];
		$pro_image = $row_br_pro['product_image'];
		
	
		echo "
				
				<div class='grid_1_of_4 images_1_of_4 products-info'>
					<h3>$pro_title</h3>
					 
					 <a href='single.php?pro_id=$pro_id'><img src='images/$pro_image' height=200px width=140px ></a>
					 <h3>₹ $pro_price</h3>
					 <ul>
					 	<li><a  class='cart' href='single.php?add_id=$pro_id'> </a></li>
					 	<li><a  class='i' href='single.php?pro_id=$pro_id'> </a></li>
					 	<li><a  class='Compar' href='single.php?pro_id=$pro_id'> </a></li>
					 	
					 </ul>
				</div>
		
		
		";
	
	}
	}

}

function getCatPro(){

	
		if(isset($_GET['cat'])){
			$cat_id=$_GET['cat'];

	global $con; 
	
	$get_cat_pro = "select * from products where product_cat=$cat_id";

	$run_cat_pro = mysqli_query($con, $get_cat_pro); 
	/*$get_brand='select * from brands where brand_id=$pro_brand';
		$run_brand=mysqli_query($con,$get_brand);
		$row_brand=mysqli_fetch_array($run_brand);
		$brandd=$row_brand['brand_title'];*/
		$count_cat = mysqli_num_rows($run_cat_pro);
	
	if($count_cat==0){
	
	echo "<h2 style='padding:20px;'>No products where found Associated to this Category!</h2>";
	
	}
		
	
	while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
	
		$pro_id = $row_cat_pro['product_id'];
		$pro_cat = $row_cat_pro['product_cat'];
		$pro_brand = $row_cat_pro['product_brand'];
		$pro_title = $row_cat_pro['product_title'];
		$pro_price = $row_cat_pro['product_price'];
		$pro_image = $row_cat_pro['product_image'];
		
	
		echo "
				
				<div class='grid_1_of_4 images_1_of_4 products-info'>
					<h3>$pro_title</h3>
					 
					 <a href='single.php?pro_id=$pro_id'><img src='images/$pro_image' height=200px width=140px ></a>
					 <h3>₹ $pro_price</h3>
					 <ul>
					 	<li><a  class='cart' href='single.php?pro_id=$pro_id'> </a></li>
					 	<li><a  class='i' href='single.php?pro_id=$pro_id'> </a></li>
					 	<li><a  class='Compar' href='single.php?pro_id=$pro_id'> </a></li>
					 	
					 </ul>
				</div>
		
		
		";
	
	}
	}

}

function recomAcc() {

if(isset($_GET['pro_id'])){
		
		$product_id = $_GET['pro_id'];
		global $con;
		
		$get_pro = "select * from accessories where acc_prod='$product_id'";
		$run_pro = mysqli_query($con, $get_pro);
		
		while($row_pro=mysqli_fetch_array($run_pro)){
	
		$pro_id = $row_pro['acc_prod'];
		$acc_id = $row_pro['acc_id'];
		$pro_cat = $row_pro['acc_cat'];
		$pro_brand = $row_pro['acc_prod'];
		$pro_title = $row_pro['acc_title'];
		$pro_price = $row_pro['acc_price'];
		$pro_image = $row_pro['acc_image'];
		echo "
				
				<div class='grid_1_of_4 images_1_of_4 products-info'>
					<h3>$pro_title</h3>
					 <a href='single.php?acc_id=$acc_id'><img src='images/$pro_image' height=200px width=140px ></a>
					 <h3>₹ $pro_price</h3>
					 <ul>
					 	<li><a  class='cart' href='single.php?add_cart=$acc_id'> </a></li>
					 	<li><a  class='i' href='single.php?acc_id=$acc_id'> </a></li>
					 	<li><a  class='Compar' href='single.php?acc_id=$acc_id'> </a></li>
					 	
					 </ul>
					 
				</div>
		
		
		";
	
	}
		
	}
}

function recom() {
if(isset($_GET['pro_id'])){
		
		$product_id = $_GET['pro_id'];
		global $con;
		
		$get_pro = "select * from products where product_id='$product_id'";
		
		$run_pro = mysqli_query($con, $get_pro);
		
		while($row_pro=mysqli_fetch_array($run_pro)){
	
		$product_battery = $row_pro['product_battery'];
		$product_ram=$row_pro['product_ram'];
		$product_rom=$row_pro['product_rom'];
		$product_processor=$row_pro['product_processor'];
		
	}
	$pro_bat="select * from products where product_id<>'$product_id' AND (product_ram='$product_ram' OR product_processor='$product_processor')";
	$run_product = mysqli_query($con, $pro_bat);
		
		
		while($row_product=mysqli_fetch_array($run_product)){
	
		$pro_id = $row_product['product_id'];
		$pro_cat = $row_product['product_cat'];
		$pro_brand = $row_product['product_brand'];
		$pro_title = $row_product['product_title'];
		$pro_price = $row_product['product_price'];
		$pro_image = $row_product['product_image'];
		$pro_battery=$row_product['product_battery'];
		echo "
				
				<div class='grid_1_of_4 images_1_of_4 products-info'>
					<h3>$pro_title</h3>
					 <a href='single.php?pro_id=$pro_id'><img src='images/$pro_image' height=200px width=140px ></a>
					 <h3>₹ $pro_price</h3>
					 <ul>
					 	<li><a  class='cart' href='single.php?add_cart=$pro_id'> </a></li>
					 	<li><a  class='i' href='single.php?pro_id=$pro_id'> </a></li>
					 	<li><a  class='Compar' href='single.php?pro_id=$pro_id'> </a></li>
					 	
					 </ul>
				</div>
		
		
		";
	
	}
		
		
	}
}





?>