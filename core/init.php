<?php
session_start(); //this functions starts the session on each page/ if the account is logged in or not
//error_reporting(0); //this will stop  displaying errors
require 'database/dbconnect.php';
require 'functions/general.php';
require 'functions/users.php';

if (logged_in()===true) {
	$session_user_id= $_SESSION['id_user'];
	$user_data= user_data($session_user_id, 'id_user','username','password','first_name', 'last_name', 'email');
}
$errors=array();
?>