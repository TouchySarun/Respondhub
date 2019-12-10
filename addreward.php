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
	<title>Add R</title>
	<link rel="stylesheet" type="text/css" href="css/addreward.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
	<div class="header">
		<div onclick="window.location.href='student.php'"class="hub">hub</div>
		<div onclick="window.location.href='student.php'"class="respond">Respond</div>
	</div>
	
 	<form action="checkAddR.php?" method="get"> 
		Detail : <input type="text" class="box" name="detail" placeholder="ex. If student gain more than 500 points get KFC!"><br>
<?php 
		if(isset($_GET['error']))
		{
    		if($_GET['error']=='empty')
    		{
        	echo '<span style="color:red; font-size:18px;">*Detail must not empty'.'</span><br>';
    		}
    		if($_GET['error']=='morethan')
    		{
        	echo '*<span style="color:red; font-size:18px;">Detail must not more than 100 alphabets'.'</span><br>';
    		}
		}
?>
		<input type="submit" class="add" value="Add">
		<a class="cancel" href="reward.php?>">Cancel</a>
	</form>	
	<p>
		<a style=" position: fixed;bottom: 0;right: 20px;" href="teacher.php">
			<img border="0" alt="home" src="css/Home.png" width="75" height="75">
		</a>
	</p>
</body>
</html>

