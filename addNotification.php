<?php

	session_start();
    if(!isset($_SESSION['reg_no']))
    {
        header("location: ./");
    }
    else
        $reg_no = $_SESSION['reg_no'];

    $id = $_GET['id'];
    $description = $_GET['description'];
    $issue_date = $_GET['issue_date'];

    include("./includes/connect.php");

    $query = "INSERT INTO notifications (`id`, `description`, `issue_date`) VALUES('$id', '$description', '$issue_date')";
    echo $query;
    mysqli_query($connection, $query);

?>