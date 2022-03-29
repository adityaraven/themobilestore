<?php
session_start();

session_destroy();

echo "<script>alert('You have successfully logout!!')</script>";
echo "<script>window.open('login.php?logged_out','_self')</script>";

?>