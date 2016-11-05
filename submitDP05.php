<?php

session_start();
if(!isset($_SESSION['reg_no']))
{
    header("location: ./");
}
else
    $reg_no = $_SESSION['reg_no'];

include("./includes/connect.php");
$reason = $_POST['reason'];
$date_of_modification = date('Y-m-d');
$comment = "";
$status = "pending";
$progress = "Supervisor";
$reg_status = "Part-Time";
$query = "INSERT INTO `partfullstatus` (`reg_no`, `reg_status`, `date_of_modification`, `reason`, `supervisor_comment`, `progress`, `status`) VALUES ('$reg_no', '$reg_status', '$date_of_modification', '$reason', '$comment', '$progress', '$status')";
$result = mysqli_query($connection, $query);

if (!$result)
{
	die("Unsuccessful".mysqli_error($connection));
	echo $result;
} else {
	 header("location: ./printDP05.php?reason=".$reason);
	 exit();
}
?>
