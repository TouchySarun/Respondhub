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
	<title>CreateQ</title>
 <link rel="stylesheet" type="text/css" href="css/createquestion.css"> 
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>

<div class="header">
		<div onclick="window.location.href='teacher.php'"class="hub">hub</div>
		<div onclick="window.location.href='teacher.php'"class="respond">Respond</div>

	</div>
<?php
if(!empty($_GET['qlname']))
{?>

 <form action="addquestion.php?" method="get">
 <?php 
	 if(isset($_GET['error'])){
	 	echo "<div class='err1'>";
	if($_GET['error']=='empty'){
	 echo "Any input mustn't empty! "."<br>";
	}
	   echo "</div>";
	   echo "<div class='err1'>";
	   if($_GET['error']=='longtext'){
		   echo "Input must less than 80 alphabets! "."<br>";
		  }
			  echo "</div>";
 }
 ?>
 Question: <input style="width:336px;" type="text" name="question" placeholder="ex. What is Respond hub?"><br>
			<div class="cen">
					A : <input type="text" name="A" placeholder="ex. Q/A system"><br>
            		B : <input type="text" name="B" placeholder="ex. Bus system"><br>
            		C : <input type="text" name="C" placeholder="ex. Enrollment system"><br>
					D : <input type="text" name="D" placeholder="ex. Airport system"><br>
</div>
										<div class="cen1">
													Correct answer: <input type="text" name="answer" placeholder="ex. A" ><br>
                                                    <?php 
										 if(isset($_GET['error'])){
										 	echo "<div class='err2'>";
										if($_GET['error']=='wrongans'){
											echo "Correct answer must be A,B,C,D only! "."<br>";
										   }
										   	echo "</div>";
										 }

										 
										 ?>
</div>
									<div class="cen2">
												if correct answer gain <input type="number" name="pluspoint" placeholder="ex. 1000" > points<br>
												if wrong answer lose <input type="number" name="losepoint" placeholder="ex. 500"> points<br>
</div>
												<input type="hidden" name="qlname" value="<?php echo $_GET['qlname'];?>"> 
            										<input type="submit" class="btn2" value="Add"> 
											
											</form>	
									
												<input type="submit" class="btn3"value="Cancle" onclick="window.location.href='insertarray.php?qlname=<?php echo $_GET['qlname'];?>'" />

<?php } ?>

<a style=" position: fixed;bottom: 0;right: 20px;" href="teacher.php">
			<img border="0" alt="home" src="css/Home.png" width="75" height="75">
		</a> 
 
											</body>
						</html>