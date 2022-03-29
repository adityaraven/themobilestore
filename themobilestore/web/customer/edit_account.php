
<?php
					include("db.php");
					if(isset($_GET['edit_account'])){
				  $user =$_SESSION['customer_email'];
				  $get_user = "select * from customers where customer_email='$user'";
				  $run_user = mysqli_query($con , $get_user);
				  $row_user = mysqli_fetch_array($run_user);
				  $u_id= $row_user['customer_id'];
				  $u_fname= $row_user['customer_fname'];
				   $u_lname= $row_user['customer_lname'];
				   $u_country= $row_user['customer_country'];
				    $u_city= $row_user['customer_city'];
				    $u_phone= $row_user['customer_phone'];
					}
				?>
<form action=''>
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
        <input type='text' id='fname' name="fname" value='<?php echo $u_fname; ?>'>
      </div>
    </div>
	
     <div class='row'>
      <div class='col-25'>
        <label for='lname'>Last Name</label>
      </div>
      <div class='col-75'>
        <input type='text' id='lname' name="lname" value='<?php echo $u_lname; ?>' >
      </div>
    </div>
	<div class='row'>
      <div class='col-25'>
        <label for='fname'>Email</label>
      </div>
      <div class='col-75'>
        <input type='text' id='email' name="email" value='<?php echo $user; ?>' disabled>
      </div>
    </div>
     <div class='row'>
      <div class='col-25'>
        <label for='country'>Country</label>
      </div>
      <div class='col-75'>
         <input type='text' id='country' name="country" value='<?php echo $u_country; ?>'>
      </div>
    </div>
	 <div class='row'>
      <div class='col-25'>
        <label for='city'>City</label>
      </div>
      <div class='col-75'>
         <input type='text' id='city' name="city" value='<?php echo $u_city; ?>' >
      </div>
    </div>
    <div class='row'>
      <div class='col-25'>
        <label for='phone'>Phone</label>
      </div>
      <div class='col-75'>
        <input type='text' id='phone' name="phone" value='<?php  echo $u_phone;?>'>
      </div>
    </div><br>
	<div class="row2">
						<input type="submit" name="update" value="Update"  />
					  </div>
	  </form><br>
	  <br>
	  <br>
	  <?php 
	if(isset($_POST['update'])){
		$ip = getIp();
		$cust_id = $u_id;
		$cust_fname = $_POST['fname'];
		$cust_lname = $_POST['lname'];
		$cust_country = $_POST['country'];
		$cust_city = $_POST['city'];
		$cust_phone = $_POST['phone'];
		
		
		
		  $update_c = "update customers set customer_fname='$cust_fname', customer_lname='$cust_lname',customer_city='$cust_city', customer_country='$cust_country', customer_phone='$cust_phone' where customer_id='$cust_id'";
	
		$run_update = mysqli_query($con, $update_c); 
		
		if($run_update){
		
		echo "<script>alert('Your account successfully Updated')</script>";
		echo "<script>window.open('my_account.php','_self')</script>";
		
		}
	}



?>

