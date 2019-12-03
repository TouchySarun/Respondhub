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
	<title>Stat</title>
    <link rel="stylesheet" type="text/css" href="css/stat.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	
</head>
<body>
	<div class="header">
		<div onclick="window.location.href='teacher.php'"class="hub">hub</div>
		<div onclick="window.location.href='teacher.php'"class="respond">Respond</div>
	</div>
	<div class="sl">Student list</div>
<?php
		$tid = $_SESSION['idST'];
        $qryinput="SELECT * FROM tstd where tid= '$tid' ORDER BY stdid ASC";
        $result= $mysqli->query($qryinput);
       echo '<form action="stdinfo.php?" method="get">';

     while ($row = $result->fetch_array())
    	{
          $std = $row['stdname'];
                  $stdid =$row['stdid'];  
            echo "<div>";                            
            echo "<br>".'<a style="text-decoration:none;" href="stdinfo.php?stdid='.$stdid.'" class="list">'.$stdid." ".$std.' </a>' ;
        
            echo "</div>";
					
        } 
        
         echo '</form>';                              
    ?>
    <p>
		<a style=" position: fixed;bottom: 0;right: 20px;" href="teacher.php">
			<img border="0" alt="home" src="css/Home.png" width="75" height="75">
		</a>
	</p>

</body>
</html>
