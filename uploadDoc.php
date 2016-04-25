<?php

session_start();
if(!isset($_SESSION['reg_no']))
{
    header("location: ./");
}
else
    $reg_no = $_SESSION['reg_no'];

include("./includes/connect.php");
 
define ("filesplace","./docs/");

if (is_uploaded_file($_FILES['doc']['tmp_name']))
{
	if ($_FILES['doc']['type'] != "application/pdf") 
	{
		echo "<p>Document should be in PDF format</p>";
	} 
	else 
	{
		$query = "SELECT * FROM document";
		$docs = mysqli_query($connection, $query);
		$docCount = mysqli_num_rows($docs);
		$docCount = $docCount + 1;
		$name = (string)$docCount;
		$docType = $_POST['application_type'];
		$currDate = (string)date("Y-m-d");
		$result = move_uploaded_file($_FILES['doc']['tmp_name'], filesplace."/$name.pdf");
		if ($result == 1)
		{
			$query = "INSERT INTO document (`doc_id`, `application_type`, `date_of_upload`) VALUES ('$name', '$docType', '$currDate')";header('Location: user.php');
			//echo $query;
			mysqli_query($connection, $query);
			header('Location: user.php');
		}
		else echo "<p>Sorry, Error happened while uploading . </p>";
	} 
}

?>