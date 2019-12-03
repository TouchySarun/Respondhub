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
$array = array();
if(!empty($_GET['qlname']))
{
    $qryinput="SELECT * FROM `question` ORDER BY `question`.`id` ASC";
    $result= $mysqli->query($qryinput);
    while ($row = $result->fetch_array())
     {
       if($row['qlname'] ==$_GET['qlname'])
        {
			$qlname = $_GET['qlname'];
			if(!empty($row['id'])){
			array_push($array, $row['id']);
			}
			
        }
     }      
$id=$_SESSION['idST'];
if(!empty($array)){
	$ql= serialize($array);
	
     $qryinput2="INSERT INTO qlid(qlname,qno,teacher) values('$qlname','$ql','$id')";
    $mysqli->query($qryinput2);
    
}
	
    
}
?>

 <?php 		echo "<script>location='teacher.php'</script>"; ?>