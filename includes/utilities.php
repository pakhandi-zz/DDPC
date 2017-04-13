<?php
	function getFacultyName($faculty_id){
		include("connect.php");
		$query = "SELECT name FROM faculty WHERE faculty_id ='$faculty_id'";
		$result = mysqli_query($connection, $query);
		$faculty = mysqli_fetch_assoc($result);
		$faculty_name = $faculty['name'];
		return $faculty_name;
	}

	function getStudentName($studentRegNo)
	{
		include("connect.php");
		$query = "SELECT name FROM studentmaster WHERE reg_no ='$studentRegNo'";
		$result = mysqli_query($connection, $query);
		$student = mysqli_fetch_array($result);
		$studentName = $student['name'];
		return $studentName;
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

	function getSupervisor($studnetRegNo, $supervisorNum)
	{
		include("connect.php");
		$query = "SELECT * FROM currentsupervisor WHERE reg_no='$studnetRegNo'";
		$result = mysqli_query($connection, $query);
		$result = mysqli_fetch_array($result);

		$ret = "";

		if($supervisorNum == 1)
		{
			return $result['supervisor1_id'];
		}
		else if($supervisor2_id == 2)
		{
			return $result['supervisor2_id'];
		}
		else
		{
			return $ret;
		}
	}
?>

