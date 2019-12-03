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
	<title>Home</title>
	
	<link rel="stylesheet" type="text/css" href="css/student.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
	<div class="header">
		<div onclick="window.location.href='student.php'"class="hub">hub</div>
		<div onclick="window.location.href='student.php'"class="respond">Respond</div>

	</div>
	<?php $qryinput="SELECT* FROM users";
    $result= $mysqli->query($qryinput);
    while ($row = $result->fetch_array())
     {
       if($row['idST'] ==$_SESSION['idST'])
        {
           $name = $row['name'];
        }
     }    
     ?>   
	 

    <div class="student">
	<div style="margin-left:auto;margin-right:auto;position: relative;top:-10px;left: 10px ;"><img style="width: 129px;height: 129px;" src="css/studentpic.png"></div>
	<div>
	<span style="position: relative;top: -127px;left: 190px;font-size: 27px;color:black;font-weight: bold;"><?php echo $name;?></span><br>
	<input type="button" style ="top:-32px;"class="addT" value="Add Teacher" onclick="window.location.href='addteacher.php'" />
	<input type="button" style ="top:10px;left:16px" class="Dq" value="Do Question" onclick="window.location.href='doquestion.php'" />
	<input type="button" style ="top:-72px;left:190px" class="addT" value="View Point" onclick="window.location.href='viewp.php'" />
	<input type="button" style ="top:-30px;left:-155px" class="Dq" value="Reward" onclick="window.location.href='reward.php'" />
	<a class="logout" href="student.php?logout='1'" style="color: red; font-size:30px;">logout</a> 
	</div>
	<?php 

if(!empty($_GET['qlid']) && !empty($_GET['tname']))
{
	$qlid = $_GET['qlid'];
    $tname = $_GET['tname'];

    $qryinput3="SELECT qno FROM qlid where qlid = '$qlid' && teacher = '$tname' && s='1'";
	$result3= $mysqli->query($qryinput3);
	
    while ($row3 = $result3->fetch_array())
     {
        $array = unserialize($row3['qno']); 
		
	 }
	 
	 if(!empty($array))
	 {
		 $count = count($array);
		
		 $i =0;
		 if(!empty($_GET['i']))
		 {
			 $i = $_GET['i'];
		 }
		
		 if($i<$count)
		 {
			$qid = $array[$i];
		 }
		
		 $i2= $i+1;
		 
		 if(!empty($qid)){
		 $qryinput4="SELECT * FROM question where id = '$qid'";
		 $result4= $mysqli->query($qryinput4);
		 }
		 if($i<$count){
			 
		echo  "<form action='' style='background:none; border:none;' >";

		 while ($row4 = $result4->fetch_array())
		 {
			 $qlname = $row4['question'];
			 $tid = $row4['tid'];
			echo "<div class='ql'>";
			echo "<pre>   Question $i2 : " .$row4['question']."<br></pre>";
			echo "</div>";
			echo "<a  style='font-weight:bold;text-align:center;color:white;display: block; margin: 15px 20px;padding:15px;background:#E21B3C;' href='insertAns.php?ans=A&qid=$qid&i=$i&qlid=$qlid&tname=$tid&qlname=$qlname'>
			A. "  .$row4['A']."</a>";
			echo "<a  style='font-weight:bold;text-align:center;color:white;display: block; margin: 15px 20px;padding:15px;background:#1368ce;'href='insertAns.php?ans=B&qid=$qid&i=$i&qlid=$qlid&tname=$tid&qlname=$qlname'>B. "  .$row4['B']."</a>";
			echo "<a  style='font-weight:bold;text-align:center;color:white;display: block; margin: 15px 20px;padding:15px;background:#d09f36;'href='insertAns.php?ans=C&qid=$qid&i=$i&qlid=$qlid&tname=$tid&qlname=$qlname'>C. "  .$row4['C']."</a>";
			echo "<a  style='font-weight:bold;text-align:center;color:white;display: block; margin: 15px 20px;padding:15px;background:#26890C;'href='insertAns.php?ans=D&qid=$qid&i=$i&qlid=$qlid&tname=$tid&qlname=$qlname'>D. "  .$row4['D']."</a>";
			echo "<span class='correct'>";
			echo "&nbsp;&nbsp;&nbsp;&nbsp;";
			echo "<img style='vertical-align: middle;width:50px;height:50px;' src='css/check.png'>";
			echo " ".$row4['pluspoint']."";
			echo "</span>";
			echo "<span class='correct'>";
			echo "&nbsp;&nbsp;&nbsp;";
			echo "<img style='vertical-align: middle;width:50px;height:50px;' src='css/cross.png'>";
			echo " -".$row4['losepoint']."";
			echo "</span>";
		 }
		 echo "</form>";
}
	





		 if($i==$count && empty($qid))
		 {
			
			echo "<script>location='result.php?qlid=$qlid&finish=now'</script>";
	
		 }
	 
	}else{
	
		echo "<span class='err' style='color:red;'>";
		echo "Wait for teacher click Start then, press F5 or Refresh page";
		echo "</span>";
	}

	

}
?>
	
	<p>
		<a style=" position: fixed;bottom: 0;right: 20px;" href="student.php">
			<img border="0" alt="home" src="css/Home.png" width="75" height="75">
		</a>
	</p>

</body>
</html>


