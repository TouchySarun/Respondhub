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
	$check = false;
	$qryinput="SELECT* FROM question where tid ='$ses'";
    $result= $mysqli->query($qryinput);
    while ($row = $result->fetch_array())
     {
	  if($_GET['qlname']==$row['qlname'])
	  {
		  $check = true;
	  }
     }    

	 if($check==true)
	 {
		echo "<script>location='questionsuite.php?error=exist'</script>";
	 }


    if($_GET['qlname']=='')
    {
	
        echo "<script>location='questionsuite.php?error=empty'</script>";
	}
	else if($_GET['qlname']==trim($_GET['qlname']) && strpos($_GET['qlname'],' ')==true)
	{
			echo "<script>location='questionsuite.php?error=space'</script>";
	}
		else if (!ctype_alnum($_GET['qlname']))
		{
			echo "<script>location='questionsuite.php?error=special'</script>";
		}
	else
	{
		$qlname = $_GET['qlname'];
		echo "<script>location='createquestion.php?qlname=$qlname'</script>";
	}



?>