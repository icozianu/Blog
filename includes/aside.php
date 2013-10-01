<?php 
if (logged_in()==true){
	include 'widgets/loggedin.php';
	//Profile widget
}
else{
include 'widgets/loginbox.php'; 
include 'widgets/registerbox.php';
include 'widgets/recoverbox.php';
}
?>