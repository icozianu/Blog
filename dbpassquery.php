<?php
include('oheader.php');
include('dbconnect.php');
$username=$_POST['username'];
$query=mysql_query("SELECT `id_user` FROM `users` WHERE `username`='$username'");


if(mysql_num_rows($query) == 1 ) 
{
	echo "<font color=\"#FF3F00\" face=\"Verdana, Geneva, sans-serif\"><p>Login Successful</p></font>"; 
	header("location: recoverpwdemail.php");
}
	else
{
		echo "Username not found";
	}
	 include ('ofooter.php');
?>
