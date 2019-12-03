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
	<title>Ranking</title>
	<link rel="stylesheet" type="text/css" href="css/ranking.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
</body>
<div class="header">
		<div onclick="window.location.href='student.php'"class="hub">hub</div>
		<div onclick="window.location.href='student.php'"class="respond">Respond</div>

	</div> 
	<b><div style='font-size:70px;top:-30px;position:relative;'>
    Ranking<br>
    </div></b>
<?php
if(!empty($_GET['qlid']))
{
$qlid =$_GET['qlid'];
$tid =$_GET['tid'];

 

$qryinput="SELECT point,name,idST FROM score 
JOIN users
ON stdid = idST
WHERE score.qlid=$qlid && score.tid=$tid
ORDER BY point DESC";
$result= $mysqli->query($qryinput);
echo "<div class='rank'>";
$i=1;
while ($row = $result->fetch_array())
 {
	 	if($i==1)
		{
			 $point = $row['point'];
		     $name = $row['name'];
		     $id = $row['idST'];
			 echo "<img style='vertical-align: middle;width:100px;height:100px;' src='css/Crow.png'>";
			 echo "&nbsp;";
			 echo "<img style='vertical-align: middle;width:100px;height:100px;' src='css/studentpic.png'>";
		     echo "<span style='font-size:65px;margin-left: 0.4em;color:white;'><b style='color:#FEE101;'>".$i."st</b> ".$name."";
		     echo "<input  disabled value=".$point.">  points";
		     echo "</span><br>";
		}if ($i==2)
		{
			 $point = $row['point'];
	     $name = $row['name'];
	     $id = $row['idST'];
	     echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	     echo "<img style='vertical-align: middle;width:50px;height:50px;' src='css/studentpic.png'>";
	     echo "<span style='margin-left: 1em;color:white;'><b style='color:#D7D7D7;'>".$i."nd</b> ".$name."";
	     echo "<input  disabled value=".$point.">  points";
	     echo "</span><br>";
		}if ($i==3)
		{
			$point = $row['point'];
	     $name = $row['name'];
	     $id = $row['idST'];
	     echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	     echo "<img style='vertical-align: middle;width:50px;height:50px;' src='css/studentpic.png'>";
	     echo "<span style='margin-left: 1em;color:white;'><b style='color:#824A02;'>".$i."rd</b> ".$name."";
	     echo "<input  disabled value=".$point.">  points";
	     echo "</span><br>";
		}
		else if($i!=1&&$i!=2&&$i!=3){
	     $point = $row['point'];
	     $name = $row['name'];
	     $id = $row['idST'];
	     echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	     echo "<img style='vertical-align: middle;width:50px;height:50px;' src='css/studentpic.png'>";
	     echo "<span style='margin-left: 1em;color:white;'><b>".$i."th</b> ".$name."";
	     echo "<input  disabled value=".$point.">  points";
	     echo "</span><br>";
	    
		 } 
		 $i++;
	 }
echo "</div>";
}    

?>

<?php if($_SESSION['role']=='teacher'){?>
<a style=" position: fixed;bottom: 0;right: 20px;" href="teacher.php">
            <img border="0" alt="home" src="css/Home.png" width="75" height="75">
<?php } ?>
<?php if($_SESSION['role']=='student'){?>
<a style=" position: fixed;bottom: 0;right: 20px;" href="student.php">
            <img border="0" alt="home" src="css/Home.png" width="75" height="75">
<?php } ?>


</html>