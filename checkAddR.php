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
    if(isset($_GET['detail'])){

    
    if($_GET['detail']=="")
    {
        echo "<script>location='addreward.php?error=empty'</script>";
    }
    else if(strlen($_GET['detail'])> 101)
    {
        echo "<script>location='addreward.php?error=morethan'</script>";
    }else
    {
        $detail = mysqli_real_escape_string($mysqli,$_GET['detail']);
        $qryinput="INSERT INTO reward(tid,detail) values('$ses', '$detail')";
        $mysqli->query($qryinput);

    }
    echo "<script>location='reward.php'</script>";
 }

?>