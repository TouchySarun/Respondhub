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
	$ans = mysqli_real_escape_string($mysqli,$_GET['ans']);
	$i = mysqli_real_escape_string($mysqli,$_GET['i']);
	$i2=$i+1;
	$qlid=mysqli_real_escape_string($mysqli,$_GET['qlid']);
	$tname= mysqli_real_escape_string($mysqli,$_GET['tname']);
	$qlname= mysqli_real_escape_string($mysqli,$_GET['qlname']);
	$stdid = $_SESSION['idST'];
 	$qid=mysqli_real_escape_string($mysqli,$_GET['qid']);
	if($ans=='A'||$ans=='B'||$ans=='C'||$ans=='D')
	{
		$qryinput2="SELECT * from question where id =$qid";
		$result = $mysqli->query($qryinput2);
		while ($row = $result->fetch_array())
    	{
			 $cA= $row['cA'];
             $cB= $row['cB'];
			 $cC= $row['cC'];
             $cD= $row['cD'];
		} 
		if($ans=='A')
		{
			$cA = $cA+1;
		}
		if($ans=='B')
		{
			$cB =$cB+1;
		}
		if($ans=='C')
		{
			$cC=$cC+1;
		}
		if($ans=='D')
		{
			$cD=$cD+1;
		}
		$qryinput3="UPDATE question SET cA=$cA,cB=$cB,cC=$cC,cD=$cD where id =$qid";
		$mysqli->query($qryinput3);		
	}

	$check=false;
	$qryinput6="SELECT * FROM ans WHERE qlid=$qlid && stdid=$stdid && qid=$qid";
	$result6 = $mysqli->query($qryinput6);

	while ($row6 = $result6->fetch_array())
	{
		if($row6['stdid']==$stdid)
		{
	   		$check=true;
		}
	 } 

	if($check==false)
	{
		$qryinput="INSERT INTO ans(qlid,stdid,qid,ans,qlname) values('$qlid','$stdid','$qid','$ans','$qlname')";
		$mysqli->query($qryinput);
	}else
	{
		$qryinput="UPDATE ans SET ans='$ans' WHERE qid=$qid";
		$mysqli->query($qryinput);
	}

	$qryinput2="SELECT * FROM ans WHERE qlid=$qlid && stdid=$stdid && qid=$qid";
	$result2 = $mysqli->query($qryinput2);
	
	while ($row2 = $result2->fetch_array())
	{
	  $ans2 =$row2['ans'];
	} 

	$qryinput3="SELECT * FROM question WHERE id=$qid";
	$result3 = $mysqli->query($qryinput3);
    
	while ($row3 = $result3->fetch_array())
	{
	  $trueans =$row3['answer'];
	  $plusp =$row3['pluspoint'];
	  $losep =$row3['losepoint'];
	} 

	$qryinput4="SELECT * FROM score WHERE qlid=$qlid && stdid=$stdid";
	$result4 = $mysqli->query($qryinput4);
	while ($row4 = $result4->fetch_array())
	{
		$point =$row4['point'];
	} 

	if($ans2==$trueans)
	{
		$point = $point+$plusp;
	}
	else
	{
		$point = $point -$losep;
	}

		$qryinput5="UPDATE score SET point=$point WHERE qlid=$qlid && stdid=$stdid";
		$result5 = $mysqli->query($qryinput5);	
	echo "<script>location='student.php?qlid=$qlid&i=$i2&tname=$tname'</script>";
?>
