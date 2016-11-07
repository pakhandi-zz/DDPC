	<?php

		include("./includes/preProcess.php");

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
			function nowsearch(course_id, num)
			{
				var url='./fetch_course.php?course_id=' + course_id;
				load_my_URL(url,function(data){
				var xml=parse_my_XMLdata(data);
				var mCourses = xml.documentElement.getElementsByTagName("course");
					if (mCourses[0].hasAttribute("total_credits"))
					{

						var course_name = mCourses[0].getAttribute("course_name");
						var course_coordinator = mCourses[0].getAttribute("course_coordinator");
						var total_credits = mCourses[0].getAttribute("total_credits");
						var id1 = num + "1";
						var id2 = num + "2";
						var id3 = num + "3";
						document.getElementById(id1).setAttribute("min", total_credits);
						document.getElementById(id1).setAttribute("max", total_credits);
						document.getElementById(id1).value = total_credits;
						document.getElementById(id2).innerHTML = "Computer Science and Engineering";
						document.getElementById(id3).innerHTML = course_coordinator;

					} else {

						var course_name = mCourses[0].getAttribute('course_name');
						var course_coordinator = mCourses[0].getAttribute('course_coordinator');
						var min_credits = mCourses[0].getAttribute("min_credits");
						var max_credits = mCourses[0].getAttribute("max_credits");
						var id1 = num + "1";
						var id2 = num + "2";
						var id3 = num + "3";
						document.getElementById(id1).setAttribute("min", min_credits);
						document.getElementById(id1).setAttribute("max", max_credits);
						document.getElementById(id1).value = min_credits;
						document.getElementById(id2).innerHTML = "Computer Science and Engineering";
						document.getElementById(id3).innerHTML = course_coordinator;
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
							<li>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="ti-panel"></i>
									<p>Stats</p>
								</a>
							</li>
							<?php include('./includes/notifications.php'); ?>
							<li>
								<a href="./logout.php">
									<i class="ti-settings"></i>
									<p>LogOut</p>
								</a>
							</li>
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
								<div class="col-md-offset-10"> Form: DP-01</div>
								<div class="col-md-offset-10"> (Clause 4.2)</div>
								<center><h3><b>Motilal Nehru National Institute of Technology Allahabad</b></h3></center>
								<center><u><h3>ACADEMIC REGISTRATION</h3></u></center><br><br><br>
								<div class="col-md-offset-1" style="font-size:20px">
								<form class="form-inline" id="dp01" name="dp01" action="submitDP01.php" method="post">
									</b>
									Name of the Student : <b><?php echo $user['name']; ?></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reg. No. <b><?php echo $_SESSION['reg_no'];?> </b><br>
									Department : <b> Computer Science and Engineering </b><br>Date of First Registration: <b><?php echo $date_of_reg; ?></b><br>
									Status : <select name="status" class="form-control border-input">
                                            <option selected disabled>Select</option>
                                       		<option>Regular</option>
                                       		<option>Part-Time</option>
                                       		</select>		
								</div>
								<br>
								<center><u><h4>DETAILS OF COURSES/RESEARCH-SEMINAR/MINI-PROJECT/COMPREHENSIVE EXAM/STATE-OF-ART SEMINAR/THESIS PERFORMANCE</h4></u></center><br><br><br>
								<div class="row col-md-offset-1">
								<table class="table table-bordered table-condensed">
								<thead>
									<th>SI. No.</th>
									<th>Course Name with Code</th>
									<th>Credit</th>
									<th>Department</th>
									<th>Course Coordinator</th>
								</thead>
								<tbody>
									<tr>
										<td>1.</td>
										<td><select class="form-control border-input" name="course1" 
										onchange="nowsearch(this.value, 1);">
                                            <option selected disabled>Select</option>
                                       		<?php
                                                $query = "SELECT * FROM course NATURAL JOIN theorycourses";
                                                $courses = mysqli_query($connection, $query);
                                                
                                                while( $thisCourse = mysqli_fetch_array($courses)  )
                                                {
                                            ?>
                                                <option value="<?php echo $thisCourse['course_id'] ?>"><?php echo $thisCourse['course_id']." - ".$thisCourse['course_name'] ?></option>
                                            <?php
                                                }
                                                $query = "SELECT * FROM course NATURAL JOIN othercourses";
                                                $courses = mysqli_query($connection, $query);
                                                
                                                while( $thisCourse = mysqli_fetch_array($courses)  )
                                                {
                                            ?>
                                                <option value="<?php echo $thisCourse['course_id'] ?>"><?php echo $thisCourse['course_id']." - ".$thisCourse['course_name'] ?></option>
                                            <?php
                                                }
                                            ?>
                                       		</select>	
                                       	</td>
										<td><input id="11" name="credits1" class ="form-control border-input" type="number" min="10" max="20"/></td>
										<td id=12></td>
										<td id=13></td>
									</tr>
									<tr>
										<td>2.</td>
										<td><select class="form-control border-input" name="course2" 
										onchange="nowsearch(this.value, 2);">
                                            <option selected disabled>Select</option>
                                       		<?php
                                                $query = "SELECT * FROM course NATURAL JOIN theorycourses";
                                                $courses = mysqli_query($connection, $query);
                                                
                                                while( $thisCourse = mysqli_fetch_array($courses)  )
                                                {
                                            ?>
                                                <option value="<?php echo $thisCourse['course_id'] ?>"><?php echo $thisCourse['course_id']." - ".$thisCourse['course_name'] ?></option>
                                            <?php
                                                }
                                                $query = "SELECT * FROM course NATURAL JOIN othercourses";
                                                $courses = mysqli_query($connection, $query);
                                                
                                                while( $thisCourse = mysqli_fetch_array($courses)  )
                                                {
                                            ?>
                                                <option value="<?php echo $thisCourse['course_id'] ?>"><?php echo $thisCourse['course_id']." - ".$thisCourse['course_name'] ?></option>
                                            <?php
                                                }
                                            ?>
                                       		</select>	
                                       	</td>
										<td><input id="21" name="credits2" class ="form-control border-input" type="number" min="10" max="20"/></td>
										<td id=22></td>
										<td id=23></td>
									</tr>
									<tr>
										<td>3.</td>
										<td><select class="form-control border-input" name="course3" 
										onchange="nowsearch(this.value, 3);">
                                            <option selected disabled>Select</option>
                                       		<?php
                                                $query = "SELECT * FROM course NATURAL JOIN theorycourses";
                                                $courses = mysqli_query($connection, $query);
                                                
                                                while( $thisCourse = mysqli_fetch_array($courses)  )
                                                {
                                            ?>
                                                <option value="<?php echo $thisCourse['course_id'] ?>"><?php echo $thisCourse['course_id']." - ".$thisCourse['course_name'] ?></option>
                                            <?php
                                                }
                                                $query = "SELECT * FROM course NATURAL JOIN othercourses";
                                                $courses = mysqli_query($connection, $query);
                                                
                                                while( $thisCourse = mysqli_fetch_array($courses)  )
                                                {
                                            ?>
                                                <option value="<?php echo $thisCourse['course_id'] ?>"><?php echo $thisCourse['course_id']." - ".$thisCourse['course_name'] ?></option>
                                            <?php
                                                }
                                            ?>
                                       		</select>	
                                       	</td>
										<td><input id="31" name="credits3" class ="form-control border-input" type="number" min="10" max="20"/></td>
										<td id=32></td>
										<td id=33></td>
									</tr>
									<tr>
										<td>4.</td>
										<td><select class="form-control border-input" name="course4" 
										onchange="nowsearch(this.value, 4);">
                                            <option selected disabled>Select</option>
                                       		<?php
                                                $query = "SELECT * FROM course NATURAL JOIN theorycourses";
                                                $courses = mysqli_query($connection, $query);
                                                
                                                while( $thisCourse = mysqli_fetch_array($courses)  )
                                                {
                                            ?>
                                                <option value="<?php echo $thisCourse['course_id'] ?>"><?php echo $thisCourse['course_id']." - ".$thisCourse['course_name'] ?></option>
                                            <?php
                                                }
                                                $query = "SELECT * FROM course NATURAL JOIN othercourses";
                                                $courses = mysqli_query($connection, $query);
                                                
                                                while( $thisCourse = mysqli_fetch_array($courses)  )
                                                {
                                            ?>
                                                <option value="<?php echo $thisCourse['course_id'] ?>"><?php echo $thisCourse['course_id']." - ".$thisCourse['course_name'] ?></option>
                                            <?php
                                                }
                                            ?>
                                       		</select>	
                                       	</td>
										<td><input id="41" name="credits4" class ="form-control border-input" type="number" min="10" max="20"/></td>
										<td id=42></td>
										<td id=43></td>
									</tr>
								</tbody>
								</table>
								<div class="row">
								Sem-No:<input name="sem_no" class="form-control border-input" style="width:20%;" type="number" min="1" max="6" placeholder="1"/>Sem-Type:<select name="sem_type" class="form-control border-input" style="width:20%;">
                                            <option selected disabled>Select</option>
                                       		<option value ="0">Even</option>
                                       		<option value ="1">Odd</option>
                                       		</select>
                                </div>
								</div>
								<div style="font-size:25px">
								<div class="col-md-offset-8">(Signature of the Student)</div><br><br><br>
									<div class="col-md-offset-1">Advised By: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Supervisor(s) </div><br><br>
									<div class="col-md-offset-1">Forwarded By: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Convener DDPC&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Head of Department</div><br><br>
									<div class="col-md-offset-1">Approved By: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chairman SDPC </div><br><br>
									


								</div>

								<div class="text-center">
									<button type="submit" class="btn btn-info btn-fill btn-wd">Submit</button>
								</div><br>
								</form>
								</div>
							</div>
						</div>
					<div>
					<?php
						if(isset($_GET['submit'])&&$_GET['submit']==1)
							{
					?>
					<p class="title">Leave applied successfully.</p>
					<?php
						}
						else if(isset($_GET['submit'])&&$_GET['submit']==0)
						{
					?>
					<p class="title">Error! Leave not submitted successfully.</p>
					<?php
						}
					?>
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

			  $("#from_datepicker").datepicker({
				  minDate: 0,
				  dateFormat: 'yy-mm-dd',
				  onSelect: function(date) {
					$("#to_datepicker").datepicker('option', 'minDate', date);
				  }
				});

			  $("#to_datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
			  $('#to_datepicker').change(function () {
                var diff = $('#from_datepicker').datepicker("getDate") - $('#to_datepicker').datepicker("getDate");
                $('#diff').val((diff / (1000 * 60 * 60 * 24) * -1) + 1);
            });
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