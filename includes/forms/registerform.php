<div id="blogpost" class="well"> 
<h3><b>Register</b></h3>
<?php
	if (isset($_GET['success'])){
		echo 'You\'ve been registered succesfully! Please check your email in order to activate your account';
	} else {
			if (empty($_POST)===false && empty($errors)===true) {
				$register_data=array(
				'username'=>$_POST['username'],
				'password'=>$_POST['password'],
				'first_name'=>$_POST['first_name'],
				'last_name'=>$_POST['last_name'],
				'email'=>$_POST['email'],
				'email_code'=>md5($_POST['username']+microtime())
			);		
			register_user($register_data);
			header('Location: register.php?success'); //redirect when succesfully registered the account
			exit(); //exit
			} else if (empty($errors)===false){
				echo output_errors($errors);// output errors
			}
	
?>
<form style="font-size: 14px" action="" method="POST">
	<ul>
		<li>Username*</br><input  type="text" name="username" size="50"><br/><br/></li>
		<li>Password*</br><input type="password" name="password" size="50"><br/><br/></li>
		<li>Repeat Password*</br><input type="password" name="password_again" size="50"><br/><br/></li>
		<li>First Name*</br><input type="text" name="first_name" size="50"><br/><br/></li>
		<li>Last Name</br><input type="text" name="last_name" size="50"><br/><br/></li>
		<li>E-mail Address*</br><input type="email" name="email" size="50"><br/><br/></li>
		<li><input id="buttons" class="button btn-primary" type="submit" value="Create Account"/></li>
	</ul>
		
</form>
</div>
<?php
}
?>