<?php
	
	if(isset($_POST['login']))
	{
		include("./includes/connect.php");

		$reg_no = mysqli_real_escape_string($connection, $_POST['reg_no']);
		$password = mysqli_real_escape_string($connection, $_POST['password']);


		$query = "SELECT * FROM studentmaster where reg_no='$reg_no' and password='$password'";

		$results = mysqli_query($connection, $query);

		if(mysqli_num_rows($results) > 0)
		{
			session_start();
			$_SESSION['reg_no'] = $reg_no;
			header("location: ./dashboard.php");
		}
		else
		{
			header("location: ./index.php?invalid=1");
		}
	}
	else
	{
		header("location: 404error.html");
	}

?>