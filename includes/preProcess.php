<?php

    session_start();
    if(!isset($_SESSION['reg_no']))
    {
        header("location: ./");
    }
    else
        $reg_no = $_SESSION['reg_no'];
    
    include("./includes/connect.php");

    $is_admin = 0;
    if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1)
        $is_admin = 1;

    if(! strcmp($_SESSION['role'], "student"))
    {
        $query = "SELECT * FROM studentmaster WHERE reg_no='$reg_no'";
        $results = mysqli_query($connection, $query);
        $user = mysqli_fetch_array($results);
        if(empty($user['photo_path']))
        {
            $user['photo_path']='./images/default.jpg';
        }

        $name = ucfirst(strtolower(explode(" ", $user['name'])[0])); 

        $url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

        $escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' ); 
    } else
    {
        $query = "SELECT * FROM faculty WHERE faculty_id = '$reg_no'";
        $results = mysqli_query($connection, $query);
        $user = mysqli_fetch_array($results);
         if(empty($user['photo_path']))
        {
            $user['photo_path']='./images/default.jpg';
        }
        $name = ucfirst(strtolower(explode(" ", $user['name'])[0])); 

        $url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

        $escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' ); 
    }
?>
