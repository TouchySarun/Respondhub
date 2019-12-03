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

<!DOCTYPE html>
<html>
<head>
	

	<title>Do Q</title>
	 <link rel="stylesheet" type="text/css" href="css/doquestion.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
<body><div class="header">
		<div onclick="window.location.href='student.php'"class="hub">hub</div>
		<div onclick="window.location.href='student.php'"class="respond">Respond</div>
	</div>

</head>
<body>
	

<form action="checkDoQ.php?" method="get">
 
 	Teacher ID : <input type="text" name="tname" style="width:316px; position:relative;left:0px;" ><br>
 	<?php 
        if(isset($_GET['error']))
        {
    	if($_GET['error']=='addteacher')
    	{
    	   
    		echo '<span style="color:red; font-size:18px;"> *You should add teacher first!</span>'."<br>";
    	}
    }?>
	Question ID : <input type="text" name="qlid" style="width:310px"><br>
	 <?php 
    if(isset($_GET['error']))
    {
    	if($_GET['error']=='wrongqlid')
    	{
    	    
    		echo '<span style="color:red; font-size:18px;"> *Wrong question id!</span>'."<br>";
    	}
    	
    }?>
    <div><input class="btn2" type='submit' style="text-decoration:none;color:white;" value="Add"></div>
												
</form>	

    
	<p>
		<a style=" position: fixed;bottom: 0;right: 20px;" href="student.php">
			<img border="0" alt="home" src="css/Home.png" width="75" height="75">
		</a>
	</p>

</body>
</html>


<?php 
