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
	<title>Reward</title>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/reward.css">
</head>
<body>

	  <?php if($_SESSION['role']=='teacher'){?>
<div class="header">
		<div onclick="window.location.href='teacher.php'"class="hub">hub</div>
		<div onclick="window.location.href='teacher.php'"class="respond">Respond</div>

	</div>
<?php } ?>
<?php if($_SESSION['role']=='student'){?>
<div class="header">
		<div onclick="window.location.href='student.php'"class="hub">hub</div>
		<div onclick="window.location.href='student.php'"class="respond">Respond</div>

	</div>
	
<?php } ?>
<b><div style='font-size:60px;top:-30px;position:relative;'>
    ...Reward...<br>
    </div></b>
<?php if($_SESSION['role']=='teacher'){?>

<input type="button" class="addrew"value="+" onclick="window.location.href='addreward.php'" /><br>

<?php 
$ses = $_SESSION['idST'];
$qryinput="SELECT * FROM reward WHERE tid = $ses";
     $result= $mysqli->query($qryinput);
     	
        while ($row = $result->fetch_array())
         {echo "<div class='stdbox'>";
             $id = $row['id'];
         $detail = $row['detail'];
         echo $detail.'</div>'.'<a class="delrew" href="javascript:AlertIt('.$id.')">X</a>'.'<br>';

        }
        
?>

    <?php } ?>

    
<?php if($_SESSION['role']=='student'){?>

<?php 
$ses = $_SESSION['idST'];
$qryinput="SELECT detail,users.name FROM reward JOIN tstd ON tstd.tid = reward.tid JOIN users ON tstd.tid = users.idST WHERE tstd.stdid =$ses ORDER BY users.idST ASC";
     $result= $mysqli->query($qryinput);

        while ($row = $result->fetch_array())
         {echo "<div class='stdbox'>";
         $detail = $row['detail'];
         $tname = $row['name'];
         echo '<b>'.$tname."</b>: ".$detail.'<br>';
         echo "</div><br>";
        }
?>

    <?php } ?>









    <?php if($_SESSION['role']=='teacher'){?>
<a style=" position: fixed;bottom: 0;right: 20px;" href="teacher.php">
            <img border="0" alt="home" src="css/Home.png" width="75" height="75">
<?php } ?>
<?php if($_SESSION['role']=='student'){?>
<a style=" position: fixed;bottom: 0;right: 20px;" href="student.php">
            <img border="0" alt="home" src="css/Home.png" width="75" height="75">
<?php } ?>

</body>
</html>
<script>
function AlertIt($id) 
	{
	
		var answer = confirm ("Comfirm Delete...")
		if (answer)
		{
			$.get( "delr.php", { rid : $id } );
		window.location="./reward.php";
		}else
		{
			window.location="./reward.php";
		}
	}
	</script>