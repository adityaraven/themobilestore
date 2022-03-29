
<!DOCTYPE html>
<?php 
session_start();

?>

<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="css/login_style.css" media="all" />
</head>
<body>
	
	<div class="login-screen">
  <div class="left-item">
    <div class="login-panel">
      <div class="inner-login-panel">
        <div class="content-panel">
          <h3 class="title">Admin Login</h3>
          <form method="post" action="login.php">
            <input type="email" placeholder="EMAIL" name="email" required="required" />
            <input type="password" placeholder="PASSWORD" name="password" required="required" />
            <button type="submit" value="login" name="login">Let's Go</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="right-item">
    <div class="slider-panel">
      <div class="inner-slider-panel">
        <h1>Mobile Store</h1>
        <p>Sign in to acess your account.</p>
      </div>
    </div>
  </div>
</div>

</body>
</html>

<?php

 include("includes/db.php");

  if(isset($_POST['login'])){

  	$email=$_POST['email'];
  	$pass=$_POST['password'];


  	$sel_user="select * from admins where user_email='$email' AND user_pass='$pass'";
  	$run_user=mysqli_query($con,$sel_user);
  	$check_user=mysqli_num_rows($run_user);

  	if($check_user==0){
  		echo "<script>alert('Password or Email is Wrong, Try Again!')</script>";
  	}
  	else
  	{
  		$_SESSION['user_email']=$email;
  		echo "<script>window.open('index.php?logged_in=You have Successfuly Logged in!','_self')</script>";
  	}
  }


?>