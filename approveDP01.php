<?php

session_start();
if(!isset($_SESSION['reg_no']))
{
    header("location: ./");
}
else
    $reg_no = $_SESSION['reg_no'];

include("./includes/connect.php");
$reg_no = $_POST['reg_no'];
$status = $_POST['status'];
$progress = $_POST['progress'];
$sem_no = $_POST['sem_no'];
$reg_status = $_POST['status'];

$query = "UPDATE courseregistration SET status = '$status', progress = '$progress' WHERE reg_no = '$reg_no' AND sem_no = '$sem_no'";
$result = mysqli_query($connection, $query);

if (!$result)
{
	echo "Failure";
} else {
	echo $query;
}

?>