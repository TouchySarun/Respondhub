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
	<title>Add Q</title>
	 <link rel="stylesheet" type="text/css" href="css/addquestion.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>

<body><div class="header">
		<div onclick="window.location.href='teacher.php'"class="hub">hub</div>
		<div onclick="window.location.href='teacher.php'"class="respond">Respond</div>
	</div>
<?php

	$qlname = $_GET['qlname'];

	if($_GET['question']=='' || $_GET['A']==''|| $_GET['B']==''|| $_GET['C']==''|| $_GET['D']==''|| $_GET['answer']==''|| $_GET['pluspoint']==''|| $_GET['losepoint']=='')
	{
		echo "<script>location='createquestion.php?qlname=$qlname&error=empty'</script>";
	}
	else if(strlen($_GET['question'])>81 || strlen($_GET['A'])>81 || strlen($_GET['B'])>81 || strlen($_GET['C'])>81|| strlen($_GET['D'])>81)
	{
		echo "<script>location='createquestion.php?qlname=$qlname&error=longtext'</script>";
	}
	else if(($_GET['answer'] != 'A' && $_GET['answer'] != 'B' && $_GET['answer'] != 'C' && $_GET['answer'] != 'D'))
	{
		echo "<script>location='createquestion.php?qlname=$qlname&error=wrongans'</script>";
	}

	if(!empty($_GET['qlname'])&&!empty($_GET['question'])&&!empty($_GET['A'])&&!empty($_GET['B'])&&!empty($_GET['C'])&&!empty($_GET['D'])&&!empty($_GET['answer']))
{?>
<?php
	$qlname =mysqli_real_escape_string($mysqli,$_GET['qlname']);
	$question =mysqli_real_escape_string($mysqli,$_GET['question']);
	$A=mysqli_real_escape_string($mysqli,$_GET['A']);
	$B=mysqli_real_escape_string($mysqli,$_GET['B']);
	$C=mysqli_real_escape_string($mysqli,$_GET['C']);
	$D=mysqli_real_escape_string($mysqli,$_GET['D']);
	$answer=mysqli_real_escape_string($mysqli,$_GET['answer']);

	$pluspoint=$_GET['pluspoint'];
	$losepoint=$_GET['losepoint'];
	$ses = $_SESSION['idST'];
		$qryinput="INSERT INTO question(qlname,question,A,B,C,D,answer,pluspoint,losepoint,tid) VALUES ('$qlname','$question','$A','$B','$C','$D','$answer','$pluspoint','$losepoint','$ses')";
		$mysqli->query($qryinput);

?>
<?php } ?>
	
<form  method="get">
 	<a class="btn2"style="text-decoration:none;color:white" onclick="window.location.href='createquestion.php?qlname=<?php echo $_GET['qlname'];?> '">Add next</a> 
 	<a class="btn3"style="text-decoration:none;color:white;" onclick="window.location.href='insertarray.php?qlname=<?php echo $_GET['qlname'];?>'">Finish</a>
</form>
 
</body>
</html>