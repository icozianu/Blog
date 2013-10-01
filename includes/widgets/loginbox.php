<!--the account information block-->
	<div id="block">
	<!--the box where the user can enter the credentials-->
	<div class="form-horizontal well">
		<p style="font-size:22px">Login</p>
		<form  method="POST" action="login.php">
		Username<br/><input  type="text" name="username"/><br/>
		Password<br/><input type="password" name="password" /><br/>
		<input type="checkbox" name="remember" value=""> Remember me<br/>
		<input id="buttons" class="button btn-primary" type="submit" value="Log in"/>
		</form>
	</div>