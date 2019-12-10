<!--Insert User and check validation-->
<?php 
	//session_start();

	$errors = array(); 
	$_SESSION['success'] = "";
	$db = mysqli_connect('localhost', 'root', '', 'se');
	//$db = mysqli_connect('localhost', 'u358418471_same', '123456', 'u358418471_se');
	if (isset($_POST['reg_user'])) 
	{
		$name = mysqli_real_escape_string($db, $_POST['name']);
		$id = mysqli_real_escape_string($db, $_POST['id']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$role = mysqli_real_escape_string($db, $_POST['role']);
		
		
		if (empty($name))
		{ 
			array_push($errors, "Name is required"); 
		}

		if (empty($id))
		{ 
			array_push($errors, "Id is required"); 
		}
		else if($id==trim($id) && strpos($id,' ')==true)
		{
			array_push($errors, "Id mustn't have space"); 
		}
		

		if (empty($email)) 
		{ 
			array_push($errors, "Email is required"); 
		}
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			array_push($errors, "Invalid E-mail"); 
		}

		if (empty($password_1)) 
		{ 
			array_push($errors, "Password is required"); 
		}
		
		if (empty($role))
		{ 
			array_push($errors, "Role is required"); 
		}
		

		if ($password_1 != $password_2) 
		{
			array_push($errors, "The two passwords do not match");
		}
		
		$query = "SELECT * FROM users";
		$result = mysqli_query($db, $query);
		while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
		{
			if($row['idST']==$id)
			{
				array_push($errors, "Id exist");
				break;
			}
		}
		

		if (count($errors) == 0) 
		{
			$password = md5($password_1);
			$query = "INSERT INTO users (name,idST, email, password,role) 
					  VALUES('$name','$id', '$email', '$password','$role')";
			$result = mysqli_query($db, $query);
			
		
			echo "<script>location='login.php'</script>";
	
		}
	}

	if (isset($_POST['login_user'])) 
	{
		$id = mysqli_real_escape_string($db, $_POST['id']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
	
		if (empty($id)) 
		{
			array_push($errors, "Id is required");
		}
		if (empty($password)) 
		{
			array_push($errors, "Password is required");
		}
	
		if (count($errors) == 0) 
		{
			$password = md5($password);
			$query = "SELECT * FROM users WHERE idST='$id' AND password='$password'";
			$results = mysqli_query($db, $query);
			
			if (mysqli_num_rows($results) == 1) 
			{
				while($row = mysqli_fetch_array($results, MYSQLI_BOTH))
				{
					if($row['idST']==$id)
					{
						$_SESSION['name'] = $row['name'];
						$_SESSION['idST'] = $row['idST'];
						$_SESSION['role'] = $row['role'];
						$_SESSION['success'] = "You are now logged in";
						break;
					}
				}
				if($_SESSION['role']=="teacher"){
					echo "<script>location='teacher.php'</script>";
				}else
				{
					echo "<script>location='student.php'</script>";
				}
			}
			else
			{
				array_push($errors, "Wrong Id or password");
			}
		}
	
	}
?>