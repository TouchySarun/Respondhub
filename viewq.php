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
	<title>ViewQ</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/viewq.css">
</head>
<body>
	<div class="header">
		<div onclick="window.location.href='teacher.php'"class="hub">hub</div>
		<div onclick="window.location.href='teacher.php'"class="respond">Respond</div>
	</div>
<?php
		$qlname = $_GET['qlname'];
        $qryinput="SELECT* FROM question where qlname = '$qlname'";
       	$result= $mysqli->query($qryinput);
       	echo "<div class='sl'>";
    	echo 'Question list name : '.$qlname.'<br>';
    	echo "</div>";
    	echo "<form>";
     	while ($row = $result->fetch_array())
    	{          
            echo "<h3>";       
            echo $row['question'].'<br>';
            echo "</h3>";
            echo "&nbsp;&nbsp;&nbsp;&nbsp;";
            if($row['answer']=='A')
    	    {
    	            echo 'A. '.$row['A'].'<----This is correct<br>';
    	    }else
    	    {
    	            echo 'A. '.$row['A'].'<br>';
    	    }
            echo "&nbsp;&nbsp;&nbsp;&nbsp;";
             if($row['answer']=='B')
    	    {
    	            echo 'B. '.$row['B'].'<----This is correct<br>';
    	    }else
    	    {
    	            echo 'B. '.$row['B'].'<br>';
    	    }
            echo "&nbsp;&nbsp;&nbsp;&nbsp;";
            if($row['answer']=='C')
    	    {
    	            echo 'C. '.$row['C'].'<----This is correct<br>';
    	    }else
    	    {
    	            echo 'C. '.$row['C'].'<br>';
    	    }
            echo "&nbsp;&nbsp;&nbsp;&nbsp;";
          if($row['answer']=='D')
    	    {
    	            echo 'D. '.$row['D'].'<----This is correct<br>';
    	    }else
    	    {
    	            echo 'D. '.$row['D'].'<br>';
    	    }
            echo "&nbsp;&nbsp;&nbsp;&nbsp;";
            echo  " [+".$row['pluspoint'].", -".$row['losepoint']."]"."<br>";
            echo "<br>";
        } 
        echo "</form>";                         
    ?>
    </form>
	<a style=" position: fixed;bottom: 0;right: 20px;" href="teacher.php">
			<img border="0" alt="home" src="css/Home.png" width="75" height="75">
	</a> 
</body>
</html>
