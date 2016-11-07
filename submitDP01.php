<?php

session_start();
if(!isset($_SESSION['reg_no']))
{
    header("location: ./");
}
else
    $reg_no = $_SESSION['reg_no'];

include("./includes/connect.php");
$course1= $_POST['course1'];
$course2= $_POST['course2'];
$course3= $_POST['course3'];
$course4= $_POST['course4'];
$credits1 = $_POST['credits1'];
$credits2 = $_POST['credits2'];
$credits3 = $_POST['credits3'];
$credits4 = $_POST['credits4'];

$sem_no = $_POST['sem_no'];
$sem_type = $_POST['sem_type'];
$status = "pending";
$progress = "Supervisor";

$academic_year = date('Y');

$query = "INSERT INTO `courseregistration` (`reg_no`, `course_id`, `credits_enrolled`, `sem_no`, `sem_type`, `academic_year`, `progress`, `status`) VALUES ('$reg_no', '$course1', '$credits1', '$sem_no', '$sem_type', '$academic_year', '$progress', '$status')";
$result = mysqli_query($connection, $query);

if (!$result)
{
	die("Unsuccessful".mysqli_error($connection));
	echo $result;
} 
$query = "INSERT INTO `courseregistration` (`reg_no`, `course_id`, `credits_enrolled`, `sem_no`, `sem_type`, `academic_year`, `progress`, `status`) VALUES ('$reg_no', '$course2', '$credits2', '$sem_no', '$sem_type', '$academic_year', '$progress', '$status')";
$result = mysqli_query($connection, $query);
if (!$result)
{
	die("Unsuccessful".mysqli_error($connection));
	echo $result;
} 
$query = "INSERT INTO `courseregistration` (`reg_no`, `course_id`, `credits_enrolled`, `sem_no`, `sem_type`, `academic_year`, `progress`, `status`) VALUES ('$reg_no', '$course3', '$credits3', '$sem_no', '$sem_type', '$academic_year', '$progress', '$status')";
$result = mysqli_query($connection, $query);
if (!$result)
{
	die("Unsuccessful".mysqli_error($connection));
	echo $result;
} 
$query = "INSERT INTO `courseregistration` (`reg_no`, `course_id`, `credits_enrolled`, `sem_no`, `sem_type`, `academic_year`, `progress`, `status`) VALUES ('$reg_no', '$course4', '$credits4', '$sem_no', '$sem_type', '$academic_year', '$progress', '$status')";
$result = mysqli_query($connection, $query);
if (!$result)
{
	die("Unsuccessful".mysqli_error($connection));
	echo $result;
} 
?>
