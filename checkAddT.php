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
    $check = false;
    $check2 = false;
	$qryinput="SELECT* FROM users";
    $result= $mysqli->query($qryinput);
    while ($row = $result->fetch_array())
     {
	  if($_GET['tname']==$row['idST'])
	  {
        if($row['role']=='teacher')
        {
              $check = true;
              break;
        }  
	    }
     }    

     if($check == true)
     {
        $qryinput2="SELECT* FROM tstd";
        $result2= $mysqli->query($qryinput2);
        while ($row2 = $result2->fetch_array())
         {
          if($_GET['tname']==$row2['tid'])
          {
            if($row2['stdid']==$ses)
            {
                  $check2 = true;
                  break;
            }  
            }
         }      
         if($check2==true)
        {
        echo "<script>location='addteacher.php?error=exist'</script>";
        }
     }

     else if($check==false)
     {
        echo "<script>location='addteacher.php?error=nothave'</script>";
     }
  
     if($check2 == false)
     {
        echo "<script>location='insertaddT.php?tname=$tid'</script>";
     }

   
     
     
 


?>