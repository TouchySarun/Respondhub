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
	<title>Result</title>
	<link rel="stylesheet" type="text/css" href="css/result.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<style type="text/css">
		pre
		{
		   font-family: 'THSarabunNew', sans-serif;
		   margin:0em ;
		}
	</style>
</head>
<body style="background: #ffe699;">
	<div class="header">
		<div onclick="window.location.href='student.php'"class="hub">hub</div>
		<div onclick="window.location.href='student.php'"class="respond">Respond</div>
	</div>
		<div style="position:relative;top:0px;font-size: 100px;">Result</div>
<?php
        $qlid= $_GET['qlid'];
        $finish =$_GET['finish'];
        $qryinput="SELECT* FROM qlid where qlid = '$qlid'";
       $result= $mysqli->query($qryinput);
       
     while ($row = $result->fetch_array())
    	{
          
            $s = $row['s'];
            $e = $row['e'];
            $qlname =$row['qlname'];
            $tid =$row['teacher'];
        
        } 
     	echo "<div style='width: 600px;margin: 0px auto;padding: 20px;background: #bf9000;font-size: 28px;color: white;'>";
        echo $qlname."<br>";
        echo "</div>";
        if($s==0&&$e==1&&$finish=='now')
        {
            $qryinput2="SELECT* FROM question where qlname = '$qlname'";
            $result2= $mysqli->query($qryinput2);
        echo "<div style=' width: 600px;max-height: 350px;margin: 0px auto; padding: 20px; border: 1px solid #B0C4DE;background: white; overflow: scroll;text-align:left;font-size:25px;'>";    
          while ($row2 = $result2->fetch_array())
             {
                echo "<pre> 			   ";
                echo "<b>";
                echo $row2['question']."</pre>";
                echo "</b>";   
                echo "<pre>			       ";	
                echo "<img style='width:15px;height:15px;' src='css/Person.png'>";
                echo "x";    
                echo $row2['cA']." A. ".$row2['A'];
           		
                if("A"==$row2['answer'])
                {
                    echo "<-----This is correct"."<br>";
                    echo "</pre>";
                }  
                else{
                    echo "<br>";
                }
                echo "<pre>			       ";
                echo "<img style='width:15px;height:15px;' src='css/Person.png'>";
                echo "x";
                echo $row2['cB']." B. ".$row2['B'];
                
                if("B"==$row2['answer'])
                {
                    echo "<-----This is correct"."<br>";
                    echo "</pre>";
                }  
                else{
                    echo "<br>";
                }
                echo "<pre>			       ";
                echo "<img style='width:15px;height:15px;' src='css/Person.png'>";
                echo "x";
                echo $row2['cC']." C. ".$row2['C'];
                
                if("C"==$row2['answer'])
                {
                    echo "<-----This is correct"."<br>";
                    echo "</pre>";
                } 
                else{
                    echo "<br>";
                } 
                echo "<pre>			       ";
                echo "<img style='width:15px;height:15px;' src='css/Person.png'>";
                echo "x";
                echo $row2['cD']." D. ".$row2['D'];
                
                if("D"==$row2['answer'])
                {
                    echo "<-----This is correct"."<br>";
                    echo "</pre>";
                }  
                else{
                    echo "<br>";
                }
             
             } echo "</div>";
             echo "<div style='width: 600px;margin: 0px auto;padding: 20px;background: #bf9000;font-size: 28px;color: white;'>";
             echo '<a href="ranking.php?qlid='.$qlid.'&tid='.$tid.'">Ranking</a>';
             echo "</div>";
        }else
        {
        	echo "<span style='color:red;'>";
            echo "Wait for teacher click Stop then, press F5 or Refresh page";
            echo "</span>";
        }
                                
    ?>
    <p>
    <?php if($_SESSION['role']=='teacher'){?>
<a style=" position: fixed;bottom: 0;right: 20px;" href="teacher.php">
            <img border="0" alt="home" src="css/Home.png" width="75" height="75">
<?php } ?>
<?php if($_SESSION['role']=='student'){?>
<a style=" position: fixed;bottom: 0;right: 20px;" href="student.php">
            <img border="0" alt="home" src="css/Home.png" width="75" height="75">
<?php } ?>
	</p>
</body>
</html>
