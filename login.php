<?php
session_start();
include ('dbconnect.php');

// username and password sent from the login form 
$username=$_POST['username']; 
$password=$_POST['password']; 

// To protect MySQL injection (more detail about MySQL injection)
$msername = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
$result=mysql_query("SELECT * FROM `users` WHERE `username`='$username' AND `password`='$password'");
$result=mysql_num_rows($result);

 //If result matched $username and $password, table row must be 1 row
if($result==1){
	 //Register $myusername, $mypassword and redirect to file "login_success.php"
	$_SESSION["myusername"]="";
	$_SESSION["mypassword"]=""; 
	header("location: login_success.html");
}
	else {
		header('location: login_failure.html');   
	}
?>