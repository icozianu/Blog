<?php
function user_data($id_user){
 $data=array();
 $user_id=(int)$id_user;
 $func_num_args=func_num_args();
 $func_get_args=func_get_args();
 
 if ($func_num_args > 1) {
	unset($func_get_args[0]);
	$fields='`'.implode('`, `',$func_get_args). '`';
	$data=mysql_fetch_assoc(mysql_query("SELECT $fields FROM `users` WHERE `id_user`='$id_user'"));
	return $data;
 }
}

function register_user($register_data){
	array_walk($register_data,'array_sanitize');
	$register_data['password']=md5($register_data['password']);
	
	$fields='`'.implode('`, `',$register_data).'`'; //column names
	$data='\''.implode('\', \'', $register_data). '\''; //values to be inserted under the columns
	
	mysql_query("INSERT INTO `users` ($fields) VALUES ($data)");  //inserts the values above in the database
	//email($username,$email,$email_code,$first_name)include function to send activation email to user
}

function logged_in() { //checks if a user is logged in
	return (isset($_SESSION['id_user'])) ? true:false;  //verifies if the session has been initialized = user logged in
}

function user_exists($username){ //checks if a username exists in the database
	$username=sanitize($username);
	return (mysql_result(mysql_query("SELECT COUNT(`id_user`) FROM `users` WHERE `username`='$username'"),0)==1)? true : false;
	
}	

function email_exists($email){ //checks if an email address exists in the database
	$email=sanitize($email);
	return (mysql_result(mysql_query("SELECT COUNT(`id_user`) FROM `users` WHERE `email`='$email'"),0)==1)? true : false;
	
}
	
function user_active($username){ //checks if the 'active' flag is set to 1 for a user id
	$username=sanitize($username);
	return (mysql_result(mysql_query("SELECT COUNT(`id_user`) FROM `users` WHERE `username`='$username' AND `active`=1"),0)==1)? true : false;
	
}
function user_id_from_username($username){ // checks the user id of a registered account passing the username
	$username=sanitize($username);
	return mysql_result(mysql_query("SELECT `id_user` FROM `users` WHERE `username`='$username'"),0, 'id_user');
}

function login ($username, $password){
	$user_id=user_id_from_username($username);
	$username=sanitize($username);
	$password=md5($password);
	return(mysql_result(mysql_query("SELECT COUNT(`id_user`) FROM `users` WHERE `username`='$username' AND `password`='$password'"),0)==1) ? $user_id : false;
}
?>