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
<!--Coneect DB-->
<?php include "connect.php"; ?>

<!DOCTYPE html>
<html>
<head>
<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/teacher.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
	<div class="header">
		<div onclick="window.location.href='teacher.php'"class="hub">hub</div>
		<div onclick="window.location.href='teacher.php'"class="respond">Respond</div>

	</div>
	<div style="margin-left:auto;margin-right:auto;position: relative;top:-55px;left: -400px ;"><img src="css/teacher.png"></div>
	<div style="position: relative;top:-200px;left: 0px;"><img style="width: 500px;height: 175px;" src="css/ISNE.png"></div>
	<div style="position: relative;top:-200px;left: 0px;"><img style="width: 500px;height: 175px;" src="css/abcd.png"></div>
	
	<?php 
	$qryinput="SELECT* FROM users";
    $result= $mysqli->query($qryinput);
    while ($row = $result->fetch_array())
     {
       if($row['idST'] ==$_SESSION['idST'])
        {
           $name = $row['name'];
        }
	 }    
	 ?>  
	<div style="left: -400px ;font-size:40px;line-height: 0px;position: relative; top: -400px;color: white;"><?php echo $name;?></div>
	<a class="logout"href="teacher.php?logout='1'" style="color: red;">logout</a>
	<input type="button" class="create"value="Create question" onclick="window.location.href='questionsuite.php'" />
    <input type="button" class="reward"value="Rewards" onclick="window.location.href='reward.php'" />
    <input type="button" class="ql"value="Question list" onclick="window.location.href='start.php'" />
    <input type="button" class="ss"value="Student statistical" onclick="window.location.href='stat.php?'" />
	<p>
		<a style=" position: fixed;bottom: 0;right: 20px;" href="teacher.php">
			<img border="0" alt="home" src="css/Home.png" width="75" height="75">
		</a>
	</p>
</body>
</html>
