<?php
include 'core/init.php';


if (){ //if nothing is typed under the username and password field 
	$username=$_POST['username'];
	$password=$_POST['password'];
	if ()){ // if nothing is typed under username or password field
		$errors[]='You haven\'t entered your username or password';
	} else if (){ // if username doesn't exists in the database
		$errors[]='This username doesn\'t exist. Have you registered?';
	} else if () { // if the account isn't active=1 in the database
		$errors[]='You haven\'t activated your account!';
	}	else {
			$login=login ($username, $password);
			if ($login===false){
			$errors[]= 'Username/password combination is incorrect';
			} else {
				 $_SESSION['id_user']=$login;
				 header('Location: index.php');
				 exit();
			}
	} 
}else {
	$errors[]='No data received';
}
include 'includes/overall/oheader.php';
if (empty($errors)===false) {
?>
<div id="blogpost" class="well">
<h3><b> We tried to log you in but...</b></h3></br>

<?php echo output_errors($errors);//print errors on the page containing the template 

}?>
</div>
<?php include 'includes/overall/ofooter.php'; ?>