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
$sem_type = $_POST['sem_type'];
$reg_status = $_POST['status'];

if(isset($status) && !strcmp($status, "approved")){
	$query = "DELETE FROM courseregistration WHERE reg_no = '$reg_no' AND sem_no = '$sem_no' AND sem_type = '$sem_type' dropcourse = '1'";
$result = mysqli_query($connection, $query);
}

$query = "UPDATE courseregistration SET status = '$status', progress = '$progress' WHERE reg_no = '$reg_no' AND sem_no = '$sem_no'";
$result = mysqli_query($connection, $query);

if (!$result)
{
	echo "Failure";
} else {
	$nextNotifTo = $_POST['nextNotifTo'];
		$query = "SELECT * FROM notifications";
		$allnotifications = mysqli_query($connection, $query);
		$notificationsCount = mysqli_num_rows($allnotifications);
		$newNotificationId = $notificationsCount + 1;
		$description = "New DP04 application";
		$issue_date = date('Y-m-d');
		$target_group = "";
		$target_member = $nextNotifTo;

		$query = "INSERT INTO `notifications` (`id`, `description`, `issue_date`, `target_group`, `target_member`) VALUES('$newNotificationId', '$description', '$issue_date', '$target_group', '$target_member')";
		$result = mysqli_query($connection, $query);
}


?>

