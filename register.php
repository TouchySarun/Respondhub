<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="css/stylelogin.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
	<div class="header">
		<div onclick="window.location.href='login.php'" class="hub">hub</div>
		<div onclick="window.location.href='login.php'" class="respond">Respond</div>
	</div>
	<!--Register form-->
	<form method="post" action="register.php">

		<?php include('errors.php'); ?>
		<div><img src="css/Person.png"></div>
		<div style="left: 100px ;font-size:50px;line-height: 0px;position: relative; top: -50px;">Sign-Up</div>
		<div class="input-group">
			
			<div>
			<label>Name</label>
			<input style="width: 93%;height: 30px;"type="text" name="name" >
		</div>
			
		<div class="input-group">
			<label>Student/Teacher ID</label>
			<input style="width: 93%;height: 30px;"type="text" name="id" >
		</div>


			<div class="input-group">
			<label>Email</label>
			<input style="width: 93%;height: 30px;"type="email" name="email" >
		</div>
		
		
		
		<div class="input-group">
			<label>Password</label>
			<input style="width: 93%;height: 30px;"type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm Password</label>
			<input style="width: 93%;height: 30px;"type="password" name="password_2">
		</div>
		
		<div style="position: relative;">
		<input style="width: 29px;height: 30px;"type="checkbox" name="role" onclick="onlyOne(this)" value="teacher"><br>
		<div style="position: relative;top: -40px;left: 40px;font-size: 25px;">Teacher</div>
		</div>
		<div style="position: relative;right: -100px;top: -76px;">
		<input style="width: 31px;height: 30px;"type="checkbox" name="role" onclick="onlyOne(this)" value="student" checked><br>
		<div style="position: relative;top: -40px;left: 40px;font-size: 25px;">Student</div>
		</div>
		<div style="position: relative; width: 65px ; left: 4px ; top: -100px;">
			<button type="submit" class="btn" name="reg_user">Register</button>
		</div>
		<div style="margin: 0px auto;top: -153px; left: 180px; position: relative; font-size: 25px;">
			<a href="login.php">Sign in</a>
		</div>
	</form>
</body>
</html>
<script>
function onlyOne(checkbox) {
    var checkboxes = document.getElementsByName('role')
    checkboxes.forEach((item) => {
        if (item !== checkbox) item.checked = false
    })
}
</script>