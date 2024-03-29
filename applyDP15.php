	<?php

		include("./includes/preProcess.php");
		$prevPageLink = "application.php";
		$student_reg_no = $_GET['student_reg_no'];
		$query = "SELECT * FROM studentmaster NATURAL JOIN currentsupervisor WHERE reg_no='$student_reg_no'";
		$results = mysqli_query($connection, $query);
		$student = mysqli_fetch_array($results);
		$query = "SELECT date_of_reg FROM studentregistration WHERE reg_no ='$reg_no' ORDER BY sem_no ASC";
		$results = mysqli_query($connection, $query);
		$arr = mysqli_fetch_array($results);
		$date_of_reg = $arr['date_of_reg'];
		if($date_of_reg === null) {
			$date_of_reg = date('Y-m-d');
		}
		$query = "SELECT sem_no FROM studentregistration WHERE reg_no ='$reg_no' ORDER BY sem_no DESC";
		$results = mysqli_query($connection, $query);
		if(mysqli_num_rows($results) == 0)
		{
		 $current_sem_no = 0;
		}
		else
		{
		    $arr = mysqli_fetch_array($results);
		    $current_sem_no = $arr['sem_no'];
		}
		$sem_no = $current_sem_no + 1;

		$thisQuery = "SELECT member_id FROM `members` WHERE role='ConvenerDDPC'";
		$thisResult = mysqli_query($connection, $thisQuery);
		$thisResult = mysqli_fetch_array($thisResult);
		$nextNotifTo = $thisResult['member_id'];

		function getFacultyName($faculty_id){
		include("./includes/connect.php");
		$query = "SELECT name FROM faculty WHERE faculty_id ='$faculty_id'";
		$result = mysqli_query($connection, $query);
		$faculty = mysqli_fetch_assoc($result);
		$faculty_name = $faculty['name'];
		return $faculty_name;
	}
	?> 
	<!doctype html>
	<html lang="en">
	<head>
		<meta charset="utf-8" />
		<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
		<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>MNNIT - DDPC</title>

		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
		<meta name="viewport" content="width=device-width" />


		<!-- Bootstrap core CSS     -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />

		<!-- Animation library for notifications   -->
		<link href="assets/css/animate.min.css" rel="stylesheet"/>

		<!--  Paper Dashboard core CSS    -->
		<link href="assets/css/paper-dashboard.css" rel="stylesheet"/>

		<!--  Fonts and icons     -->
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
		<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
		<link href="assets/css/themify-icons.css" rel="stylesheet">

		<link href="./css/myCss.css" rel="stylesheet">

		<link href="assets/css/datepicker.css" rel="stylesheet" />
		<script type="text/javascript">
			function nowsearch(faculty_id, num)
			{
				var url='./fetch_faculty.php?faculty_id=' + faculty_id;
				load_my_URL(url,function(data){
				var xml=parse_my_XMLdata(data);
				var Faculty = xml.documentElement.getElementsByTagName("faculty");
				var name = Faculty[0].getAttribute("name");
				var contact = Faculty[0].getAttribute("contact");
				var mail_id = Faculty[0].getAttribute("mail_id");
				var address = Faculty[0].getAttribute("address");
				var id0 = "0" + num;
				var id1 = "1" + num;
				var id2 = "2" + num;
				document.getElementById(id0).innerHTML = address;
				document.getElementById(id1).innerHTML = contact;
				document.getElementById(id2).innerHTML = mail_id;
				var dept_id = Faculty[0].getAttribute("dept_id");
				var student_dept_id = <?php echo $student['dept_id'] ?>;
				var id3 = "3" + num;
				if(dept_id == student_dept_id) {
					document.getElementById(id3).value = "Internal";
				} else {
					document.getElementById(id3).value = "External";
				}
				});
			}
			function load_my_URL(url, do_func)
			{
				var my_req = window.ActiveXObject ? new ActiveXObject('Microsoft.XMLHTTP') : new XMLHttpRequest;
				my_req.onreadystatechange = function()
				{
					if (my_req.readyState == 4)
					{
						my_req.onreadystatechange = no_func;
						do_func(my_req.responseText, my_req.status);
					}
				};
				my_req.open('GET', url, true);
				my_req.send(null);
			}
			function parse_my_XMLdata(data)
			{
				if (window.ActiveXObject)
				{
					var doc = new ActiveXObject('Microsoft.XMLDOM');
					doc.loadXML(data);
					return doc;
				}
				else if (window.DOMParser)
				{
					return (new DOMParser).parseFromString(data, 'text/xml');
				}

			}
			function no_func() {}
			
		</script>

	</head>
	<body>
		<div class="wrapper">
			<div class="sidebar" data-background-color="black" data-active-color="warning">

		<!--
			Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
			Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
		-->
		<div class="sidebar-wrapper">
			<div class="logo">
				<?php include('./includes/topleft.php') ?>
			</div>

			<?php

			$currentTab = "application";

			include("./includes/sideNav.php");

			?>

		</div>
	</div>

	<div class="main-panel">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<?php include('./includes/logo.php'); ?>
				</div>
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav navbar-right">

                        <?php include("./includes/topright.php") ?>

                    </ul>

				</div>
			</div>
		</nav>
		<div class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<b>
								<div class="col-md-offset-10"> Form: DP-15</div>
								<div class="col-md-offset-10"> (Clause 12.4)</div>
								<center><h5><b>Motilal Nehru National Institute of Technology Allahabad</b></h5></center>
								<center><u><h5>List of Suggested Examiners for Ph.D Thesis Evaluation Board</h5></u></center><br>
								<div class="col-md-offset-1" style="font-size:15px">
									<form class="form-inline" id="dp02" name="dp02" action="submitDP15.php" method="post">


									</b>
									Name of the Student : <b><?php echo $student['name']; ?></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reg. No. <b><?php echo $student['reg_no'];?> </b><br>
									Department : <b> Computer Science and Engineering </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of First Registration : <b><?php echo $date_of_reg ?></b><br>
									Date of Comprehensive Exam : Date of State-of-Art Seminar : <br>
									Date of Open Seminar : <br>
									Thesis : <b></b><br><br>
								</div>
								
								<div class="row col-md-offset-1">
									<div class="col-md-11" style="font-size:10px;">
										<table class="table table-bordered table-condensed" style="font-size:15px">
											<div style="font-size: 20px;"><b><u>Name of Examiners with Address/Fax/Phone/Email:</u></b></div>
											<thead>
												<th>SI. No.</th>
												<th>Name</th>
												<th>Address</th>
												<th>Phone/Fax</th>
												<th>Email</th>
											</thead>
											<tbody>
												<?php
													$query = "SELECT * FROM faculty";
													$faculty = mysqli_query($connection, $query);
													$thisFaculty = array();
													while ( $row = mysqli_fetch_array($faculty) ){
													    $thisFaculty[] = $row;
													}
													for( $i = 0; $i < 6; $i++){
														$j = $i + 1;
														?>
														<tr>
															<td><?php echo $j ?></td>
															<td><select class="form-control border-input" name="faculty<?php echo $j ?>" 
														onchange="nowsearch(this.value, <?php echo $j ?>);" required>
														<option value="">Select</option>
														<?php

														foreach ($thisFaculty as $key=>$obj) {
														
														?>
															<option value="<?php echo $obj['faculty_id'] ?>"><?php echo $obj['name'] ?></option>
															<?php
														}
														?>
																</select>	
															</td>
														<td><p id=0<?php echo $j ?> ></p></td>
														<td><p id=1<?php echo $j ?> ></p></td>
														<td><p id=2<?php echo $j ?> ></p></td>
														<input id=3<?php echo $j ?> type="hidden" name="role<?php echo $j ?>" value="" />
													</tr>
												<?php
													}
												?>
									
							<input type="text" name="nextNotifTo" value="<?php echo $nextNotifTo ?>" style="display: none;">
							<input type="text" name="student_reg_no" value="<?php echo $student_reg_no ?>" style="display: none;">

						</tbody>
					</table>
					<table class="table table-bordered table-condensed" style="font-size:15px">
											<div style="font-size: 20px;"><b><u>Name(s) and communication details of Supervisor(s):</u></b></div>
											<thead>
												<th>SI. No.</th>
												<th>Name</th>
												<th>Address</th>
												<th>Phone/Fax</th>
												<th>Email</th>
											</thead>
											<tbody>
												<?php
													for( $i = 6; $i < 8; $i++){
														$j = $i + 1;
														$k = $i - 5;
														$query = "SELECT * FROM currentsupervisor INNER JOIN faculty ON currentsupervisor.supervisor".$k."_id = faculty.faculty_id WHERE reg_no = '$student_reg_no'";
														$faculty = mysqli_query($connection, $query);
														if(mysqli_num_rows($faculty) < 1){
															break;
														}
														$row = mysqli_fetch_assoc($faculty);
														?>

														<tr>
															<td><?php echo $j - 6 ?></td>
															<td><?php echo $row['name'] ?></td>
															<td><?php echo $row['address'] ?></td>
															<td><?php echo $row['contact'] ?></td>
															<td><?php echo $row['mail_id'] ?></td>
													</tr>
												<?php
													}
												?>
									
							<input type="text" name="nextNotifTo" value="<?php echo $nextNotifTo ?>" style="display: none;">
							<input type="text" name="student_reg_no" value="<?php echo $student_reg_no ?>" style="display: none;">

						</tbody>
					</table>
				</div>
			</div>
			<div style="font-size:15px">
				<div class="col-md-offset-1">Proposed By: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Thesis Supervisor(s) </div><br>
				<div class="col-md-offset-1">Forwarded By: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Convener DDPC&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Head of Department</div><br>
				<div class="col-md-offset-1">Approved By: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chairman SDPC </div><br>



			</div>

			<div class="text-center">
				<button type="submit" class="btn btn-info btn-fill btn-wd">Submit</button>
			</div><br>
			<h5 class="text-center" id="msg" style="color:red;"></h5>
		</form>
	</div>
</div>
<div>
</div>
</div>

</div>

</div>


<footer class="footer">
</footer>
</div>
</div>
<p></p>

</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/jquery-1.10.4.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="assets/js/bootstrap-checkbox-radio.js"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="assets/js/paper-dashboard.js"></script>


<!-- Javascript for Datepicker -->
<!-- <script src="assets/js/datepicker.js"></script> -->

<script type="text/javascript">
	function removeNot() {

		$('.notificationAlert').css({
			'display': 'none'
		});

		xmldata = new XMLHttpRequest();

		var el = document.getElementById('notid').innerHTML;

		var urltosend = "set_cookie.php?notid="+el;

		xmldata.open("GET", urltosend,false);
		xmldata.send(null);
		if(xmldata.responseText != ""){
			toPrint = xmldata.responseText;
		}
	}

</script>


</html> 