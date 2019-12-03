<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<link rel="stylesheet" type="text/css" href="css/stylelogin.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
	<div class="header">
		<div onclick="window.location.href='login.php'" class="hub">hub</div>
		<div onclick="window.location.href='login.php'" class="respond">Respond</div>

	</div>
	<!--Login form-->
	<form method="post" action="login.php">
		<?php include('errors.php'); ?>
		<div><img src="css/Person.png"></div>
		<div style="left: 100px ;font-size:50px;line-height: 0px;position: relative; top: -50px;">Sign-In</div>
		<div class="input-group">
			<label>Student/Teacher ID</label>
			<input style="width: 93%;height: 30px;" type="text" name="id" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input style="width: 93%;height: 30px;" type="password" name="password">
		</div>
			<div style="position: relative; width: 65px ; left: 4px ; top: 5px;">
	
			<button type="submit" class="btn" name="login_user">Login</button>
			</div>
	
		<div style="margin: 0px auto;top: -17px; left: 160px; position: relative; font-size: 25px;color: #1ABC9C;">
			Not a member? <a href="register.php">Sign up</a>
		</div>
	</form>
</body>
</html>