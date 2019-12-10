<!--Check session user-->
<?php 

	if (!isset($_SESSION['name'])) 
	{
		$_SESSION['msg'] = "You must log in first";
		echo "<script>location='login.php'</script>";
	}
	if (isset($_GET['logout'])) 
	{
		session_destroy();
		unset($_SESSION['name']);
		unset($_SESSION['success']);
		unset($_SESSION['idST']);
		unset($_SESSION['role']);
		echo "<script>location='login.php'</script>";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add T</title>
	 <link rel="stylesheet" type="text/css" href="css/addteacher.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
<body>
	<div class="header">
		<div onclick="window.location.href='student.php'"class="hub">hub</div>
		<div onclick="window.location.href='student.php'"class="respond">Respond</div>
	</div>	
	<form action="checkAddT.php?" method="get"> 
    	Teacher ID : <input type="text" class="box" name="tname">
<?php
        if(isset($_GET['error']))
        {
    		if($_GET['error']=='exist')
    		{
    		echo '<span style="color:red; font-size:18px;"> *You already have this teacher!</span>'."<br>";
    		}
		
			if($_GET['error']=='nothave')
			{
				echo '<span style="color:red; font-size:18px;">*Wrong teacher id!</span>'."<br>";
			}
		}
?>
    	<input type="submit" class="btn2" value="Add" />	 											
	</form>	

	<p>
		<a style=" position: fixed;bottom: 0;right: 20px;" href="student.php">
			<img border="0" alt="home" src="css/Home.png" width="75" height="75">
		</a>
	</p>
</body>
</html>