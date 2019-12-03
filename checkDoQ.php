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
    $tid = $_GET['tname'];
    $qlid =$_GET['qlid'];
    $check = false;
    $check2 = false;

    $qryinput="SELECT* FROM tstd";
     $result= $mysqli->query($qryinput);
        while ($row = $result->fetch_array())
         {
          if($_GET['tname']==$row['tid'])
          {
            if($row['stdid']==$ses)
            {
                  $check = true;
                  break;
            }  
        }
         }      


         $qryinput2="SELECT* FROM qlid";
         $result2= $mysqli->query($qryinput2);
            while ($row2 = $result2->fetch_array())
             {
                 if($row2['qlid']==$qlid)
                 {
                    if($_GET['tname']==$row2['teacher'])
                    {
                      $check2 = true;
            
                    }
                }
            }    






if($check==false)
{
    echo "<script>location='doquestion.php?error=addteacher'</script>";
}
if($check2==false)
{
    echo "<script>location='doquestion.php?error=wrongqlid'</script>";
}
     
if($check==true && $check2==true)
{
   
    $check3 = false;
   
    $qryinput3="SELECT* FROM score";
    $result3= $mysqli->query($qryinput3);
       while ($row3 = $result3->fetch_array())
        {
            if($row3['qlid']==$qlid && $row3['tid']==$tid && $row3['stdid']==$ses)
            {
              
                 $check3 = true;
       
               
           }
       }    
    if($check3==false)
    {
       $qryinput4="INSERT INTO score(qlid,tid,stdid) values('$qlid', '$tid','$ses')";
    $mysqli->query($qryinput4);
    }

 echo "<script>location='student.php?qlid=$qlid&tname=$tid'</script>";
}
   
     
     
 


?>