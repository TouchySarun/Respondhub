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
  $idqlid = $_GET['idbotdel'];
  $ses = $_SESSION['idST'];
  $qryinput="SELECT qlname FROM question WHERE id = '$idqlid' && tid = '$ses' ";
  $result = $mysqli->query($qryinput);
  while ($row = $result->fetch_array())
  {
    $qlname = $row['qlname'];
  }  

  $qryinput4="SELECT qlid FROM qlid WHERE qlname = '$qlname' && teacher = '$ses' ";
  $result4 = $mysqli->query($qryinput4);
  while ($row4 = $result4->fetch_array())
  {
    $qlid = $row4['qlid'];
  } 

  $qryinput5="DELETE FROM ans WHERE qlid=$qlid";
  $mysqli->query($qryinput5);

  $qryinput1="DELETE FROM score WHERE qlid=$qlid && tid = '$ses' ";
  $mysqli->query($qryinput1);

  $qryinput3="DELETE FROM question WHERE qlname = '$qlname' && tid = '$ses' ";
  $mysqli->query($qryinput3);
  
 
  $qryinput2="DELETE FROM qlid WHERE qlname = '$qlname' && teacher = '$ses' ";
  $mysqli->query($qryinput2);
?>



