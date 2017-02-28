	<?php

		include("./includes/preProcess.php");
		if (!strcmp($_SESSION['role'], "Supervisor"))
    	{
        $supervisor_id = $_SESSION['reg_no'];
        $s_query = "Select reg_no from currentsupervisor WHERE supervisor1_id = '$supervisor_id'";
        $s_result = mysqli_query($connection, $s_query);
        $s_array = array();
        while($s_row = mysqli_fetch_array($s_result))
        {
            array_push($s_array, $s_row['reg_no']);
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

			function nowsearch(reg_no)
			{
				
				var url='./fetch_student.php?reg_no=' + reg_no;
				var fname1, fname2;
				load_my_URL(url,function(data){
				var xml=parse_my_XMLdata(data);
				var students = xml.documentElement.getElementsByTagName("student");
				document.getElementById("reg_no").value = "";
				document.getElementById("date_of_reg").value = "";
				document.getElementById("dept").value = "";
				document.getElementById("AOR").value = "";
				document.getElementById("supervisor").value = "";
				document.getElementById("reg_no").value = students[0].getAttribute('reg_no');
				document.getElementById("date_of_reg").value = students[0].getAttribute('date_of_reg');
				document.getElementById("dept").value = "Computer Science and Engineering";
				document.getElementById("AOR").value = students[0].getAttribute('AOR');
				var fid1 = students[0].getAttribute('supervisor1_id')
				
				fname1 = students[0].getAttribute('supervisor1_id');
				fname2 = students[0].getAttribute('supervisor2_id');
				search_supervisor(fname1);
				search_supervisor(fname2);
				});
				
			}
			function search_supervisor(faculty_id)
			{
				
				var url='./fetch_faculty.php?faculty_id=' + faculty_id;
				var fname;
				load_my_URL(url,function(data){
				var xml=parse_my_XMLdata(data);
				var faculty = xml.documentElement.getElementsByTagName("faculty");
				document.getElementById("supervisor").value += "  " + faculty[0].getAttribute('name');
				});
			}
			function search_faculty(faculty_id, num)
			{
				
				var url='./fetch_faculty.php?faculty_id=' + faculty_id;
				var fname;
				load_my_URL(url,function(data){
				var xml=parse_my_XMLdata(data);
				var faculty = xml.documentElement.getElementsByTagName("faculty");

				var id1 = num + "1";
				var id2 = num + "2";

				document.getElementById(id1).innerHTML = faculty[0].getAttribute('designation');
				document.getElementById(id2).innerHTML = faculty[0].getAttribute('dept_name');

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
									<p style="display : none;">Stats</p>

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
								<div class="col-md-offset-10"> Form: DP-02</div>
								<div class="col-md-offset-10"> (Clause 4.3, 12.2)</div>
								<center><h3><b>Motilal Nehru National Institute of Technology Allahabad</b></h3></center>
								<center><u><h3>Student Research Committee(SRC)</h3></u></center><br><br><br>
								<div class="col-md-offset-1" style="font-size:20px">
								<form class="form-inline" id="dp02" name="dp02" action="submitDP02.php" method="post">
									</b>
									Name of the Student : <select class="form-control border-input" name="student_reg_no" 
										onchange="nowsearch(this.value);">
                                            <option selected disabled>Select</option>
                                       		<?php
                                                $query = "SELECT reg_no, name FROM studentmaster";
                                                $students = mysqli_query($connection, $query);
                                                
                                                while( $thisStudent = mysqli_fetch_array($students)  )
                                                {
                                                	if (!strcmp($_SESSION['role'], "Supervisor") && !in_array($thisStudent['reg_no'], $s_array))
                                                    {
                                                        continue;
                                                    }
                                            ?>
                                                <option value="<?php echo $thisStudent['reg_no'] ?>"><?php echo $thisStudent['reg_no']." - ".$thisStudent['name'] ?></option>
                                            <?php
                                                }
                                            ?>
                                       		</select>	 ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reg. No.: <b><input disabled type="text" class="form-control" id="reg_no" style="color:black;"></b>
                                    <div class ="row">
                                    	<div class="col-md-6">
											Department : <b><input disabled type="text" class="form-control" id="dept" name="student_dept" style="color:black;"></b>
										</div>
										<div class="col-md-6">
											Date of First Registration:<b> <input disabled type="text" class="form-control" id="date_of_reg" name="date_of_reg" style="color:black;"></b>
										</div>
									</div>
									<div class="row col-md-12">
									Area of Reasearch :<b><input disabled type="text" class="form-control" id="AOR" name="AOR" style="color:black;"></b><br>
									</div>
									<div class="row col-md-12">
									Supervisor(s) :<b><input disabled type="text" class="form-control" id="supervisor" name="supervisor" style="color:black;"><br></b>
									</div>
											
								</div>
								<br>
								<br><br><br>
								<div class="row col-md-offset-1">
								<table class="table table-bordered table-condensed">
								<thead>
									<th>SI. No.</th>
									<th>Role</th>
									<th>Name of Members</th>
									<th>Designation</th>
									<th>Department</th>
								</thead>
								<tbody>
									<tr>
										<td>1.</td>
										<td>Internal SRC Member</td>
										<td>
											<select class="form-control border-input" name="faculty1" 
										onchange="search_faculty(this.value, 1);">
                                            <option selected disabled>Select</option>
                                       		<?php
                                                $query = "SELECT * FROM faculty";
                                                $members = mysqli_query($connection, $query);
                                                
                                                while( $thisFaculty = mysqli_fetch_array($members)  )
                                                {
                                            ?>
                                                <option value="<?php echo $thisFaculty['faculty_id'] ?>"><?php echo $thisFaculty['faculty_id']." - ".$thisFaculty['name'] ?></option>
                                            <?php
                                                }
                                                
                                            ?>
                                       		</select>	
                                       	</td>
										<td id=11></td>
										<td id=12></td>
									</tr>
									<tr>
										<td>2.</td>
										<td>External SRC Member</td>
										<td>
											<select class="form-control border-input" name="faculty2" 
										onchange="search_faculty(this.value, 2);">
                                            <option selected disabled>Select</option>
                                       		<?php
                                                $query = "SELECT * FROM faculty";
                                                $members = mysqli_query($connection, $query);
                                                
                                                while( $thisFaculty = mysqli_fetch_array($members)  )
                                                {
                                            ?>
                                                <option value="<?php echo $thisFaculty['faculty_id'] ?>"><?php echo $thisFaculty['faculty_id']." - ".$thisFaculty['name'] ?></option>
                                            <?php
                                                }
                                                
                                            ?>
                                       		</select>	
                                       	</td>
										<td id=21></td>
										<td id=22></td>
									</tr>
									<tr>
										<td>3.</td>
										<td>Supervisor 1</td>
										<td>
											<select class="form-control border-input" name="faculty3" 
										onchange="search_faculty(this.value, 3);">
                                            <option selected disabled>Select</option>
                                       		<?php
                                                $query = "SELECT * FROM faculty";
                                                $members = mysqli_query($connection, $query);
                                                
                                                while( $thisFaculty = mysqli_fetch_array($members)  )
                                                {
                                            ?>
                                                <option value="<?php echo $thisFaculty['faculty_id'] ?>"><?php echo $thisFaculty['faculty_id']." - ".$thisFaculty['name'] ?></option>
                                            <?php
                                                }
                                                
                                            ?>
                                       		</select>	
                                       	</td>
										<td id=31></td>
										<td id=32></td>
									</tr>
									<tr>
										<td>4.</td>
										<td>Supervisor 2</td>
										<td>
											<select class="form-control border-input" name="faculty4" 
										onchange="search_faculty(this.value, 4);">
                                            <option selected disabled>Select</option>
                                       		<?php
                                                $query = "SELECT * FROM faculty";
                                                $members = mysqli_query($connection, $query);
                                                
                                                while( $thisFaculty = mysqli_fetch_array($members)  )
                                                {
                                            ?>
                                                <option value="<?php echo $thisFaculty['faculty_id'] ?>"><?php echo $thisFaculty['faculty_id']." - ".$thisFaculty['name'] ?></option>
                                            <?php
                                                }
                                                
                                            ?>
                                       		</select>	
                                       	</td>
										<td id=41></td>
										<td id=42></td>
									</tr>
								</tbody>
								</table>
								</div>
								<br><br><br>
								<div style="font-size:25px">
									<div class="col-md-offset-1">Proposed By: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Supervisor(s) </div><br><br>
									<div class="col-md-offset-1">Forwarded By: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Convener DDPC&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Head of Department</div><br><br>
									<div class="col-md-offset-1">Approved By: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chairman SDPC </div><br><br>
									


								</div>

								<div class="text-center">
									<button type="submit" class="btn btn-info btn-fill btn-wd">Propose</button>
								</div><br>
								</form>
								</div>
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