<?php
	function getFacultyName($faculty_id){
		include("connect.php");
		$query = "SELECT name FROM faculty WHERE faculty_id ='$faculty_id'";
		$result = mysqli_query($connection, $query);
		$faculty = mysqli_fetch_assoc($result);
		$faculty_name = $faculty['name'];
		return $faculty_name;
	}

	// type 1 for individual notification
	// type 2 for group notification
	function sendNotification($notificationMessage, $notificationTarget, $notificationType)
	{
		// get new notification id
		include("connect.php");
		$query = "SELECT * FROM notifications";
		$allnotifications = mysqli_query($connection, $query);
		$notificationsCount = mysqli_num_rows($allnotifications);
		$newNotificationId = $notificationsCount + 1;

		// get the date
		$issue_date = date('Y-m-d');

		if($notificationType == 1)
		{
			$target_group = "";
			$query = "INSERT INTO notifications (`id`, `description`, `issue_date`, `target_group`, `target_member`) VALUES('$newNotificationId', '$notificationMessage', '$issue_date', '$target_group', '$notificationTarget')";
			$result = mysqli_query($connection, $query);
			return 1;
		}
		else
		{
			return 0;
		}

		return 0;
	}

	//get the sem number from the course id
	function getSemNumber($courseId)
	{
		$semNo = 0;
		$semNo = (int)$courseId[3];
		$semNo *= 10;
		$semNo = $semNo + ((int)$courseId[4]);

		return $semNo;
	}
?>

