<?php
	session_start();
	if(isset($_SESSION['uname'])){
		$uname = $_SESSION['uname'];
		header("location: ./dashboard.php");
	}
	$invalid = 0;
	if(isset($_GET['invalid']))
	{
		$invalid = $_GET['invalid'];
		if($invalid == '1')
			echo "<script>alert('Invalid Details');</script>";
	}
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>MNNIT - DDPC</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Rancho&effect=3d">
	
	<link rel="stylesheet" href="css/fontawesome.css" />

	<!-- CSS Files -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/material-kit.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body id="inBody">

<!-- Navbar will come here -->


<!-- end navbar -->

<!-- Signer Button -->



<!-- Modal Core -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content background-image">
      <div class="modal-body">
      	<!-- <div class="col-md-6">
	        <form action="signup.php" method="post">
			  	<div class="form-group label-floating">
					<label class="control-label">Name</label>
					<input type="text" name="name" class="form-control">
				</div>
			  	<div class="form-group label-floating">
					<label class="control-label">Email</label>
					<input type="email" name="email" class="form-control">
				</div>
				<div class="form-group label-floating">
					<label class="control-label">Password</label>
					<input type="password" name="password" class="form-control">
				</div>
			  <button type="submit" name="signup" class="btn btn-default whiteColor" style="margin-left:50px;">Join For Free</button>
			</form>
		</div>
		<div style="background: #000;width:2px;height:200px;position: fixed;margin: 30px 0 0 275px;"></div> -->
		<div class="col-md-12" style="margin-top:30px;">
	        <form action="login.php" method="post">
	        	<?php if($invalid == '1')
	        		{
	        			echo "Invalid Credentials";
	        		}
	        	 ?>
			  <div class="form-group label-floating">
					<label class="control-label">Id</label>
					<input type="text" name="reg_no" class="form-control">
				</div>
				<div class="form-group label-floating">
					<label class="control-label">Password</label>
					<input type="password" name="password" class="form-control">
				</div>
			  <button type="submit" name="login" class="btn btn-default whiteColor" style="margin-left:200px;">Log In</button>
			</form>
		</div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
<!-- Signer Button  Ends-->

<div class="wrapper">
	
	<div class="main" id="mainBox">
		<div class="container" >

			<!-- here you can add your content -->
			
			<h1 class="font-effect-3d"></h1>
			<br><br>
			<p>
			<!-- complete solution to Real estate Troubles,<br><br>
			sell or rent directly without brokers<br><br> *without any trouble -->
			</p>

			<div class="col-md-offset-2">
				<a href="#" class="btn btn-raised" id="logger" data-toggle="modal" data-target="#myModal">
				  LogIn
				</a>
			</div>
		</div>
		<!-- Button trigger modal -->
	</div>
</div>


</body>

	<!--   Core JS Files   -->
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="js/material.min.js"></script>

	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="js/nouislider.min.js" type="text/javascript"></script>

	<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
	<script src="js/bootstrap-datepicker.js" type="text/javascript"></script>

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="js/material-kit.js" type="text/javascript"></script>


	<script type="text/javascript">
		$(".success-alert").fadeTo(2000, 500).slideUp(500, function(){
		    $(".success-alert").alert('close');
		});

	</script>
</html>
