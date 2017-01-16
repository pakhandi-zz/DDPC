<?php

session_start();
if(!isset($_SESSION['reg_no']))
{
    header("location: ./");
}
else
    $reg_no = $_SESSION['reg_no'];

include("./includes/connect.php");
$faculty1= $_POST['faculty1'];
$faculty2= $_POST['faculty2'];
$faculty3= $_POST['faculty3'];
$faculty4= $_POST['faculty4'];
$student_reg_no = $_POST['student_reg_no'];

$status = "pending";
$progress = "ConvenerDDPC";

$academic_year = date('Y');

$query = "INSERT INTO `src` (`reg_no`, `src_int_id`, `src_ext_id`, `supervisor1_id`, `supervisor2_id`, `status`, `progress`) VALUES ('$student_reg_no', '$faculty1', '$faculty2', '$faculty3', '$faculty4', '$status', '$progress')";
$result = mysqli_query($connection, $query);

if (!$result)
{
	die("Unsuccessful".mysqli_error($connection));
	echo $result;
} 
header("location: ./dashboard.php");
?>
