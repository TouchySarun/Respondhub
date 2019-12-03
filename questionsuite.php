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
	<title>Questionsuite</title>
	<link rel="stylesheet" type="text/css" href="css/questionsuite.css">

	
</head>
<body><div class="header">
		<div onclick="window.location.href='teacher.php'"class="hub">hub</div>
		<div onclick="window.location.href='teacher.php'"class="respond">Respond</div>
	</div>
<form action="checkQsuite.php" method="get">
	
            										
	
	<div>
			<label>Question list name: </label>
			<input style="width: 300px;height: 30px;"type="text" name="qlname" >
            <?php if(isset($_GET['error']))
		{
			echo "<span class='err'>";
			
			if($_GET['error']=='empty')
			{
				echo "<br>"."Question list name can't empty!";
			}
			if($_GET['error']=='exist'){
				echo "<br>"."Question list name already exist!";}

				if($_GET['error']=='space'){
					echo "<br>"."Question list name mustn't contain space!";}
					if($_GET['error']=='special'){
						echo "<br>"."Question list name mustn't contain special character!";}
			

            echo "</span>";
		}
		?>
	</div>
    <div style="position: relative; width: 65px ; left: 4px ; top: 15px;">        																		
         <input type="submit" class="btn" value="create"> 
          
     </div>
	
        									</form> 
		    																		
       
											<a style=" position: fixed;bottom: 0;right: 20px;" href="teacher.php">
            <img border="0" alt="home" src="css/Home.png" width="75" height="75">
        </a> 

</html>