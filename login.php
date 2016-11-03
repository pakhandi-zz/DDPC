<?php
	
	if(isset($_POST['login']))
	{
		include("./includes/connect.php");
		$reg_no = mysqli_real_escape_string($connection, $_POST['reg_no']);
		$password = mysqli_real_escape_string($connection, $_POST['password']);
		$query = "SELECT * FROM studentmaster where reg_no='$reg_no' and password='$password'";
		$results = mysqli_query($connection, $query);
		if(mysqli_num_rows($results) == 1)
		{
			session_start();
			$_SESSION['reg_no'] = $reg_no;
			$_SESSION['role'] = "student";
			if($reg_no == "20134171")
			{
				$_SESSION['is_admin'] = 1;
			}
			header("location: ./dashboard.php");
		}
		else
		{
			$query = "SELECT * FROM faculty where faculty_id='$reg_no' and password='$password'";
			$results = mysqli_query($connection, $query);
			if(mysqli_num_rows($results) == 1)
			{
				$query = "SELECT * FROM members WHERE member_id='$reg_no'";
				$results = mysqli_query($connection, $query);
				if(mysqli_num_rows($results) == 1)
				{
					session_start();
					$_SESSION['reg_no'] = $reg_no;
					$result = mysqli_fetch_array($results);
					$_SESSION['role'] = $result['member_type'];
					header("location: ./dashboard.php");
				}	
				else
				{
					header("location: ./index.php?invalid=1");
				}
			}
			else
			{
				header("location: ./index.php?invalid=1");
			}
		}
	}
	else
	{
		header("location: 404error.html");
	}
?>