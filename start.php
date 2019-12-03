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
	<title>Start</title>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/start.css">
</head>
<body>
	<div class="header">
		<div onclick="window.location.href='teacher.php'"class="hub">hub</div>
		<div onclick="window.location.href='teacher.php'"class="respond">Respond</div>


<?php
	$ses=	$_SESSION['idST'];
        $qryinput="SELECT* FROM question WHERE tid = $ses GROUP BY qlname";
       $result= $mysqli->query($qryinput);
       echo '<form action="viewq.php?" method="get">';
       echo "<label>Select to start: </label>";

     while ($row = $result->fetch_array())
    	{
          $qlname = $row['qlname'];
                   $id =$row['id'];   
            echo '	<input type="submit" name="qlname"  class="btn" value="'.$qlname.'">
					<a  class="btn1" href="stop.php?qlname='.$qlname.'">Start</a></input>
					<a  class="btn2" href="javascript:AlertIt('.$id.')">Delete</a>'."<br>";
			echo "<br>";

        } 
        
         echo '</form>';                              
    ?>
	
    </form>
	<a style=" position: fixed;bottom: 0;right: 20px;" href="teacher.php">
			<img border="0" alt="home" src="css/Home.png" width="75" height="75">
		</a> 
	

</body>
</html>
<script>
function AlertIt($id) 
	{
	
		var answer = confirm ("Comfirm Delete...")
		if (answer)
		{
			$.get( "delq.php", { idbotdel : $id } );
		window.location="./start.php";
		}else
		{
			window.location="./start.php?";
		}
	}
	</script>