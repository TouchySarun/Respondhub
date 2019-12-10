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
	<title>Stdinfo</title>
    <link rel="stylesheet" type="text/css" href="css/stdinfo.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
<?php         
    $stdid = $_GET['stdid'];
    $qryinput="SELECT* FROM users";
    $result= $mysqli->query($qryinput);
    while ($row = $result->fetch_array())
    {
       if($row['idST'] ==$_SESSION['idST'])
        {
           $name = $row['name'];
        }
    }   
     ?> 
     
    <div class="header">
        <div onclick="window.location.href='teacher.php'"class="hub">hub</div>
        <div onclick="window.location.href='teacher.php'"class="respond">Respond</div>
        <div style="left: -500px ;font-size:50px;line-height: 164px;position: relative; top: 16px;color:#ffffff"> Students statistical… </div>
        <div style="margin-left:auto;margin-right:auto;position: relative;top:-36px;left: -540px ;"><img src="css/teacher.png" >  </div>
        <div style="left: -530px ;font-size:50px;line-height: 0px;position: relative; top: -15px ;color:#ffffff ;"><?php echo $name;?></div>

<?php
        $ses = $_SESSION['idST'];
        $qryinput2="SELECT * FROM users where idST = '$stdid'";
        $result2= $mysqli->query($qryinput2);

        $qryinput4="SELECT qlid.qlid, point, qlname FROM score JOIN qlid ON score.qlid = qlid.qlid WHERE score.tid=$ses && score.stdid=$stdid";
        $result4= $mysqli->query($qryinput4);

        echo "<div class='sl' style='color:white;'>";
        echo 'Each question list points'; 
        echo "</div>";
       
        echo '<form action="">';
        while ($row4 = $result4->fetch_array())
    	{
            $qlname2=$row4['qlname'];
            $point =$row4['point'];
            $qlid =$row4['qlid'];
            if(!empty($qlname2)&&!empty($point)){
            echo '<b>'.$qlname2.'</b> '.$point."  points"."<a class='edit' href='editp.php?stdid=$stdid&qlid=$qlid&point=$point'> edit</a>"."<br>";
            }
        }   
        echo '</form>'."<br>";

        echo "<div class='sl'>";
        while ($row2 = $result2->fetch_array())
    	{
            $name=$row2['name'];
            echo '<span style="color:white;"">';
            echo $name;
            echo "</span>";
        }   
        echo '<a class="remove" href="javascript:AlertIt('.$stdid.')">X</a>'."<br>";
        echo "</div>";
        
        $qryinput="SELECT * FROM ans where stdid = '$stdid' ORDER BY qlid";
        $result= $mysqli->query($qryinput);
        echo '<form action="stdinfo.php?" method="get">';

        while ($row = $result->fetch_array())
    	{
           
            $qlid = $row['qlid'];
            $q=$row['qlname'];
            $ans = $row['ans'];
            $qryinput3="SELECT * FROM qlid where qlid = '$qlid'";
            $result3= $mysqli->query($qryinput3);
         while ($row3 = $result3->fetch_array())
        {
            $qlname2 = $row3['qlname'];
            echo '<b>'.$qlname2.'</b>: ';
        } 
            echo $q ." answer ". $ans."<br>"; 
        } 
        echo '</form>';
 ?>
	
    <a style=" position: fixed;bottom: 0;right: 20px;" href="teacher.php">
            <img border="0" alt="home" src="css/Home.png" width="75" height="75">
    </a> 
</body>
</html>
<script>
function AlertIt($stdid) 
{
	var answer = confirm ("Comfirm Delete...")
	if (answer)
	{
			$.get( "delstd.php", { stdid : $stdid } );
		    window.location="./stat.php";
	}
    else
	{
			window.location="./stdinfo.php?stdid=<?php echo $stdid;?>";
	}
}
</script>