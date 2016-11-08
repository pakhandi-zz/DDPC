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
$leave_type = $_POST['leave_type'];
$from_date= $_POST['from_date'];
$to_date = $_POST['to_date'];
$status = $_POST['status'];
$progress = $_POST['progress'];

$query = "UPDATE leave SET status = '$status', progress = '$progress' WHERE reg_no = '$reg_no' AND leave_type = '$leave_type' AND from_date = '$from_date' AND to_date = '$to_date'";
$result = mysqli_query($connection, $query);

if (!$result)
{
	echo "Failure";
} else {
	echo $query;
}

?>
