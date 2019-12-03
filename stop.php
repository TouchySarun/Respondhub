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
$ses = $_SESSION['idST'];

if(isset($_GET['qlname'])){
$qlname =$_GET['qlname'];

 	$qryinput="UPDATE question SET cA=0,cB=0,cC=0,cD=0 where tid = '$ses'";
    $mysqli->query($qryinput);
	echo "<script>location='start2.php?qlname=$qlname'</script>";
}

?>

