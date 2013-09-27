<aside>
<!--the account information block-->
	<div id="block">
	<!--the box where the user can enter the credentials-->
	<div class="form-horizontal well">
		<p style="font-size:22px">Login</p>
		<form  action="login.php" method="POST">
		Username<br/><input  type="text" name="username" value=""/><br/>
		Password<br/><input type="password" name="password" value=""/><br/>
		<input type="checkbox" name="remember" value=""> Remember me<br/>
		<input id="buttons" class="button btn-primary" type="submit" name="submit" value="Login"/>
		</form>
	</div>
	
	<!--the box for creating new accounts-->
	<div class="form-horizontal well">
		<p style="font-size:18px">Create a New Account</p>
		<form action="signup.php" method="POST">
		<input class="button btn-success" type="submit" value="Sign Up"/>
		</form>
	</div>

	<!--for short memory persons who forget their login credentials-->
	<div class="form-horizontal well">
		<p style="font-size:18px">Recover <a  href="getusername.php">username</a><br/> or <a href="getpassword.php">password</a></p>
	</div>
	</div>
</aside>