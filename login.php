<?php

	// Establish connection using the connect.php fiel.
	include("./includes/connect.php");

	// Escaping special charactesrs in the strings.
	$reg_no = mysqli_real_escape_string($connection, $_POST['reg_no']);
	$password = mysqli_real_escape_string($connection, $_POST['password']);

	// Required query for login.
	$query = "SELECT * FROM studentmaster where reg_no='$reg_no' and password='$password'";

	// Fetching results.
	$results = mysqli_query($connection, $query);

	// Check for a match and redirect accordingly.
	if(mysqli_num_rows($results) > 0)
	{
		session_start();
		$_SESSION['userid'] = $reg_no;

		if($reg_no == "20134171")
		{
			$_SESSION['is_admin'] = 1;
		}
		else
		{
			$_SESSION['is_admin']=0;
		}
		header("location: ./dashboard.php");
	}
	else
	{
		header("location: ./index.php?invalid=1");
	}

?>