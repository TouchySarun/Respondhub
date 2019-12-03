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

if(!empty($_GET['qlname']))
{
    $qlname = $_GET['qlname'];
    $tname = $_SESSION['idST'];


    $qryinput3="SELECT *FROM qlid where qlname = '$qlname' && teacher ='$tname'";
    $result3= $mysqli->query($qryinput3);
    while ($row3 = $result3->fetch_array())
     {
        $qlid = $row3['qlid'];
        $tid = $row3['teacher'];
     }
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Start2</title>
 
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/start2.css">
</head>
<body>  
	<div class="header">
		<div onclick="window.location.href='teacher.php'"class="hub">hub</div>
		<div onclick="window.location.href='teacher.php'"class="respond">Respond</div>
		<form action="start2.php?" method="get">

			Teacher ID : <?php echo $tid;?> <br>
            Question ID : <?php echo $qlid; ?> <br>

          <?php if(empty($_GET['start'])&&empty($_GET['end'])){?>
			<a style="text-decoration: none;" class="btn" href="start3.php?qlname=<?php echo $qlname;?>&start=now">Start </a>
		<?php }?>
		<?php if(empty($_GET['end'])){?>
        	<a style="text-decoration: none;" class="btn2"href="start3.php?qlname=<?php echo $qlname;?>&end=now">Stop </a>
			<?php }?>
		<?php if(!empty($_GET['end'])){?>
			<a style="text-decoration: none;" class="btn3"href="result.php?qlid=<?php echo $qlid;?>&finish=now">Result </a>
			
		<?php }?>

			<?php if(!empty($_GET['start']))
			{
				echo "<br>"."<span style='color:green;'>State : Question Begin!!</span>";
			}
			if(!empty($_GET['end']))
			{
				echo "<br>"."<span style='color:red;'>State : Question End!!</span>";
			}
			if(empty($_GET['start']) && empty($_GET['end']))
			{
				echo '<script>alert("ATTENTION : Wait for students join before start!!")</script>';
			    echo "<br>"."<span style='color:red;'>State : Wait for students join before start!!</span>";
			}
			
			?>
			 </form> 
			 <a style="position: fixed;bottom: 0;right: 20px;" href="teacher.php">
			<img border="0" alt="home" src="css/Home.png" width="75" height="75">
		</a> 
	
	
											</body>
						</html>

						<script>
