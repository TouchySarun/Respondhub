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
	<title>ViewP</title>

    <link rel="stylesheet" type="text/css" href="css/viewp.css">

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<!-- <link rel="stylesheet" type="text/css" href="css/viewp.css"> -->
</head>
<body>
<div class="header">
        <div onclick="window.location.href='teacher.php'"class="hub">hub</div>
        <div onclick="window.location.href='teacher.php'"class="respond">Respond</div>
        

<?php 
$ses = $_SESSION['idST'];
$qryinput="SELECT qlid.qlid, point, qlname, users.name 
FROM score 
JOIN qlid 
ON score.qlid = qlid.qlid 
JOIN users 
ON users.idST = qlid.teacher 
WHERE  score.stdid=$ses ORDER BY qlid.teacher ASC";
        $result= $mysqli->query($qryinput);

     echo "<div class='sl' style='color:white;'>";
     
        echo 'Each question list points'.'<br>'; 

       echo "</div>";
       echo '<form action="">';

        while ($row = $result->fetch_array())
    	{
            $qlname=$row['qlname'];
            $point =$row['point'];
       
            $tname =$row['name'];
            if(!empty($qlname)&&!empty($point)){
            echo '<b>'.$qlname.'</b> by '.$tname.': <b>'.$point.'</b> point(s)'.'<br>';
       
            }
        }   
        echo '</form>'."<br>";



?>

    
<p>
		<a style=" position: fixed;bottom: 0;right: 20px;" href="student.php">
			<img border="0" alt="home" src="css/Home.png" width="75" height="75">
		</a>
	</p>
</body>
</html>

