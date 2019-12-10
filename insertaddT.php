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
<?php
	if(!empty($_GET['tname']))
	{
		$stdid = $_SESSION['idST'];
		$stdname = $_SESSION['name'];
		$tname = $_GET['tname'];
    	$qryinput="INSERT INTO tstd(tid,stdname,stdid) values('$tname', '$stdname','$stdid')";
    	$mysqli->query($qryinput);
	}
?>
 <?php 	echo "<script>location='student.php'</script>"; ?>