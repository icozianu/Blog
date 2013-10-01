<?php 
include 'core/init.php';
include 'includes/overall/oheader.php';
	if (empty($_POST)===false){
		$required_fields=array('username','password','password_again','first_name','email');
		foreach ($_POST as $key=>$value) {
			if (empty($value) && in_array($key, $required_fields)===true){
				$errors[]='Fields marked with an asterisk are required';
				break 1;
			}
		}
		if (empty($errors)===true){
			if (user_exists($_POST['username'])===true){
				$errors[]='Sorry, the username \''. $_POST['username'].'\' is already taken.';
			}
			if (preg_match("/\\s/", $_POST['username'])==true){
				$errors[]='Your username must not contain any spaces';
			}
			if (strlen($_POST['password']<6) && strlen($_POST['password']>32)) {
				$errors[]='Your password must be at least 6 characters and should not exceed 32 characters';
			}
			if ($_POST['password']!== $_POST['password_again']){
				$errors[]='Your passwords do not match';
			}
			if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)===false){
				$errors[]='A valid email address is required';
			}
			if (email_exists($_POST['email'])===true){
				$errors[]='Sorry, the email address \''. $_POST['email'] .'\' is already in use';
			}
	}
}
include 'includes/forms/registerform.php';
include 'includes/overall/ofooter.php'; ?>