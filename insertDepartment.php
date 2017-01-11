<?php

	// Start the session.
	session_start();
	if(!isset($_SESSION['reg_no']))
	{
		header("location: ./");
	}
	else
		$reg_no = $_SESSION['reg_no'];

	// Establish the connection.
	include("./includes/connect.php");
	
	$dept_id = mysqli_real_escape_string($connection, $_POST['dept_id']);
	$dept_name = mysqli_real_escape_string($connection, $_POST['dept_name']);
	$HOD = mysqli_real_escape_string($connection, $_POST['HOD']);


	

	$query = "INSERT INTO `department` (`dept_id`, `dept_name`, `HOD`) VALUES ('$dept_id', '$dept_name', '$HOD')";
	$queryRan = mysqli_query($connection, $query);

	// If successful, then redirect. 
	if($queryRan)
	{
		
		header("location: ./adminDashboard.php");
	}
	else
	{
		echo "Unknown Error Occured";
	}
	

?>