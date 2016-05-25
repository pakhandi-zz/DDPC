<?php

	session_start();
    if(!isset($_SESSION['reg_no']))
    {
        header("location: ./");
    }
    else
        $reg_no = $_SESSION['reg_no'];

	include("./includes/connect.php");
    $target_dir = "images/";
	$target_file = $target_dir . $reg_no . ".jpg";
	//echo $target_file;
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["photo"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}
	// Check if file already exists
	/*if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    $uploadOk = 0;
	}*/
	// Check file size
	if ($_FILES["photo"]["size"] > 500000) {
	    echo "Sorry, your file is too large.";
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
	        $user['photo_path']="./".$target_file;
	        echo $user['photo_path'];
	        $path= mysqli_real_escape_string($connection, $user['photo_path']);
	        $query = "UPDATE studentmaster SET photo_path = '$path' WHERE reg_no = '$reg_no' ";
	        $queryRan = mysqli_query($connection, $query); 
	echo $query;
	//print_r($queryRan);
	if($queryRan){
		;
	}
	else{
		echo "Unknown Error Occured";
	}

	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}


	header('Location: user.php');

?>