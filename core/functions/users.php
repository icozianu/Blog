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

function logged_in() {
	return (isset($_SESSION['id_user'])) ? true:false;
}

function user_exists($username){
	$username=sanitize($username);
	return (mysql_result(mysql_query("SELECT COUNT(`id_user`) FROM `users` WHERE `username`='$username'"),0)==1)? true : false;
	
}	
function user_active($username){
	$username=sanitize($username);
	return (mysql_result(mysql_query("SELECT COUNT(`id_user`) FROM `users` WHERE `username`='$username' AND `active`=1"),0)==1)? true : false;
	
}
function user_id_from_username($username){
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