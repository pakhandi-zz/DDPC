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
        $target_group = (string) NULL;
        $target_member = (string) NULL;
        $id = $_GET['id'];
        $description = $_GET['description'];
        $issue_date = $_GET['issue_date'];
        if(isset($_GET['target_group']))
            $target_group = $_GET['target_group'];
        if(isset($_GET['target_member']))
            $target_member = $_GET['target_member'];

        include("./includes/connect.php");

        $query = "INSERT INTO notifications (`id`, `description`, `issue_date`, `target_group`, `target_member`) VALUES('$id', '$description', '$issue_date', '$target_group', '$target_member')";
        echo $query;
        $result=mysqli_query($connection, $query); 
        if($result)
        {
            header("location: ./makeNotification.php?sent=1");
        }
    }

?>