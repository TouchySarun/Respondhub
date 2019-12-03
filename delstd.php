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
$stdid = $_GET['stdid'];

  $qryinput4="SELECT qlid FROM qlid WHERE teacher = '$ses' ";
  $result4 = $mysqli->query($qryinput4);
  
  while ($row4 = $result4->fetch_array())
  {
   $qlid = $row4['qlid'];
   
   $qryinput="DELETE FROM ans WHERE qlid=$qlid && stdid=$stdid";
   $mysqli->query($qryinput);

  } 
  $qryinput2="DELETE FROM score WHERE tid=$ses && stdid=$stdid";
   $mysqli->query($qryinput2);

   $qryinput3="DELETE FROM tstd WHERE tid=$ses && stdid=$stdid";
   $mysqli->query($qryinput3);

?>



