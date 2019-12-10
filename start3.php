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
 	$qlname = $_GET['qlname'];
    $tname =$_SESSION['idST'];
	if(!empty($_GET['start']))
	{
   		$qry1="UPDATE qlid SET s = '1',e='0' where qlname = '$qlname' && teacher ='$tname' ";
	   	$result1= $mysqli->query($qry1); 
	   	echo "<script>location='start2.php?qlname=$qlname&start=now'</script>";
	}

	if(!empty($_GET['end']))
	{
		$qry2="UPDATE qlid SET s = '0' ,e='1' where qlname = '$qlname' && teacher ='$tname' ";
		$result1= $mysqli->query($qry2);  
		echo "<script>location='start2.php?qlname=$qlname&end=now'</script>";
	}
 ?>

