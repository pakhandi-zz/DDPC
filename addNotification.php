<?php

	session_start();
    if(!isset($_SESSION['reg_no']))
    {
        header("location: ./");
    }
    else
        $reg_no = $_SESSION['reg_no'];
    if(empty($_GET['description']))
        echo "add description";
    else if(empty($_GET['issue_date']))
        echo "add issue date";
    else
    {

        $id = $_GET['id'];
        $description = $_GET['description'];
        $issue_date = $_GET['issue_date'];

        include("./includes/connect.php");

        $query = "INSERT INTO notifications (`id`, `description`, `issue_date`) VALUES('$id', '$description', '$issue_date')";
        echo $query;
        $result=mysqli_query($connection, $query); 
        if($result)
        {
            header("location: ./makeNotification.php?sent=1");
        }
    }

?>