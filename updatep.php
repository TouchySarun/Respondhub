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

if(isset($_GET['stdid'])&&isset($_GET['newp'])&&isset($_GET['qlid']))
$point = $_GET['newp'];
$qlid =$_GET['qlid'];
$stdid = $_GET['stdid'];
		$qryinput="UPDATE score SET point=$point WHERE qlid=$qlid && stdid=$stdid";
		$result = $mysqli->query($qryinput);
	
	echo "<script>location='stdinfo.php?stdid=$stdid'</script>";

?>
