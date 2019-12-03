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
	<title>Edit</title>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/editp.css">
</head>
<body>
<div class="header">
		<div onclick="window.location.href='teacher.php'"class="hub">hub</div>
		<div onclick="window.location.href='teacher.php'"class="respond">Respond</div>

	</div>
<?php if(isset($_GET['point'])&&isset($_GET['qlid'])&&isset($_GET['stdid'])){



$newp=$_GET['point'];
$qlid=$_GET['qlid'];
$stdid=$_GET['stdid'];
?>


<?php 
 
 $qryinput="SELECT* FROM qlid WHERE qlid=$qlid";
     $result= $mysqli->query($qryinput);
        while ($row = $result->fetch_array())
         {
          $qlname = $row['qlname'];
        }




?>


<form action="updatep.php?" method="get">
<b>Student ID :</b><?php echo $stdid;?> <br>
<b>Question List name:</b> <?php echo $qlname;?> <br>
<b>Point:</b> <input type='number' name="newp" value="<?php echo $newp;?>"> <br>
<input type='hidden' name="stdid" value="<?php echo $stdid;?>"> 
<input type='hidden' name="qlid" value="<?php echo $qlid;?>">
<input class='edit' type='submit'  value="edit"> 
		
		<a class="cancel" href="stdinfo.php?stdid=<?php echo $stdid;?>">Cancel</a>	
</form> 

<?php } ?>
    
<p>
		<a style=" position: fixed;bottom: 0;right: 20px;" href="teacher.php">
			<img border="0" alt="home" src="css/Home.png" width="75" height="75">
		</a>
	</p>
</body>
</html>

