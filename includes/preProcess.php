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
    {
            $is_admin = 1;
            $name = "ADMIN";
            $url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
            $user['name'] = "ADMIN";
            $escaped_url = htmlspecialchars( $url, ENT_QUOTES, 'UTF-8' );
    }else if(! strcmp($_SESSION['role'], "student"))
    {
        $query = "SELECT * FROM studentmaster WHERE reg_no='$reg_no'";
        $results = mysqli_query($connection, $query);
        $user = mysqli_fetch_array($results);
        if(empty($user['photo_path']))
        {
            $user['photo_path']='./images/default.jpg';
        }
        $query = "SELECT date_of_reg FROM studentregistration WHERE reg_no ='$reg_no' ORDER BY sem_no ASC";
        $results = mysqli_query($connection, $query);
        $arr = mysqli_fetch_array($results);
        $date_of_reg = $arr['date_of_reg'];
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
