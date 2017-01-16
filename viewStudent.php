<?php

    include("./includes/preProcess.php");

    //echo $_GET['qwStudent'];

    $qwStudent = $_GET['qwStudent'];

    $query = "SELECT * FROM studentmaster WHERE reg_no='$qwStudent'";
    $results = mysqli_query($connection, $query);
    $qwUser = mysqli_fetch_array($results);

    $name = ucfirst(strtolower(explode(" ", $qwUser['name'])[0]));

    $query2 = "SELECT sem_no, course.course_id, course_name, credits_enrolled, course_coordinator FROM courseregistration JOIN course ON courseregistration.course_id = course.course_id WHERE reg_no = '$qwStudent' Order by sem_no desc, courseregistration.course_id";
    $result2 = mysqli_query($connection, $query2);

    $query3 = "SELECT * FROM studentthesisdetails WHERE reg_no = '$qwStudent'";
    $result3 = mysqli_query($connection, $query3);
    $thesis = mysqli_fetch_array($result3);

    $query4 = "SELECT * FROM studentprogramdetails WHERE reg_no = '$qwStudent'";
    $result4 = mysqli_query($connection, $query4);
    $program = mysqli_fetch_array($result4);

    $query5 = "SELECT sem_no, courseresultmaster.course_id, course_name, credits_earned, grade, result FROM courseresultmaster JOIN course ON courseresultmaster.course_id = course.course_id WHERE reg_no = '$qwStudent' ORDER BY sem_no DESC";
    $query_result = mysqli_query($connection, $query5);

    function check_date($arg)
    {
        if(strtotime($arg)=="")
            return "-";
        else
            return $arg;
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

                $currentTab = "viewStudents";

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
                            <a href="stats.php">
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
                    <div class="col-lg-4 col-md-5">
                        <div class="card card-user">
                            <div class="image">
                                <img src="assets/img/background.jpg" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                  <img class="avatar border-white" src="<?php echo $qwUser['photo_path']; ?>" alt="..."/>
                                  <h4 class="title"><?php echo $name; ?><br />
                                  </h4><br>
                                  <form method="POST" action="updateQwPic.php" enctype="multipart/form-data">
                                        <center><input type="file" name="photo" id="photo"></center><br>
                                        <input type="submit" name="submit" value="Upload Image">
                                        <input type="hidden" class="form-control border-input" placeholder="reg_no" name="qwUser" value="<?php echo $_GET['qwStudent'] ?>">
                                  </form>
                                  
                                </div>
                            </div>
                            <hr>
                    </div>
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Personal Profile</h4>
                            </div>
                            <div class="content">
                                <form method="GET" action="updateQwProfile.php">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Registration Number</label>
                                                <input type="text" class="form-control border-input" readonly placeholder="reg_no" name="qwUser" value="<?php echo $qwUser['reg_no']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control border-input" readonly placeholder="name" value="<?php echo $qwUser['name'] ?>" name="name">
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control border-input" placeholder="mail_id" value="<?php echo $qwUser['mail_id'] ?>" name="mail_id">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Contact Number</label>
                                                <input type="text" class="form-control border-input" placeholder="contact_no" value="<?php echo $qwUser['contact_no'] ?>" name="contact_no">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control border-input" placeholder="Home Address" value="<?php echo $qwUser['address'] ?>" name="address">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Father's Name</label>
                                                <input type="text" class="form-control border-input" placeholder="Father's Name" value="<?php echo $qwUser['father_name'] ?>" name = "father_name">
                                            </div>
                                        </div>
                                    </div>


                                    </div> 
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button>
                                    </div>
                                    <br>
                                    <div class="clearfix"></div>
                                </form>
                                
                            </div>
                             <p>
                                    <?php
                                        if(isset($_GET['status'])&&$_GET['status']==1)
                                        {
                                            echo "Updated successfully!";
                                        }
                                ?></p> 

                        </div>
                            
                    </div>
                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Courses Registered</h4>
                            </div>

                            <div class="content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <table class="table table-striped">
                                                <?php
                                                    $max_sem = 0;
                                                    while($course_details = mysqli_fetch_array($result2) )
                                                    {
                                                        if ($max_sem == $course_details['sem_no'])
                                                        {
                                                        ?>
                                                            <tr>
                                                                <td></td>
                                                                <td><?php echo $course_details['course_id'];?></td>
                                                                <td><?php echo $course_details['course_name'];?></td>
                                                                <td><?php echo $course_details['credits_enrolled'];?></td>
                                                                <td><?php echo $course_details['course_coordinator'];?></td>
                                                            </tr> 
                                                        <?php 
                                                        } else {
                                                            $max_sem = $course_details['sem_no'];
                                                        ?>
                                                            <th>Semester <?php echo $max_sem; ?></th>
                                                            <th>Course Id</th>
                                                            <th>Course Name</th>
                                                            <th>Credits Enrolled</th>
                                                            <th>Course Coordinator</th>
                                                                <tr>
                                                                <td></td>
                                                                <td><?php echo $course_details['course_id'];?></td>
                                                                <td><?php echo $course_details['course_name'];?></td>
                                                                <td><?php echo $course_details['credits_enrolled'];?></td>
                                                                <td><?php echo $course_details['course_coordinator'];?></td>
                                                                </tr>   
                                                        <?php
                                                        }
                                                    }
                                                ?>
                                                </table>

                                            </div>
                                        </div>
                                        
                                    </div>

                                    

                                    </div> 
            </div>
        </div>
        <div class="col-md-4">
        <div class="card">
            <div class="header">
                <h4 class="title">Thesis Details</h4>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
 
                            <h5><b>Area Of Interest</b></h5> <?php echo $thesis['AOR']; ?> 
                            <h5><b>Proposed Topic</b></h5> <?php echo $thesis['proposed_topic']; ?> <br>
                            <h5><b>Final Topic</b></h5> <?php echo $thesis['final_topic']; ?> <br>

                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Program Details</h4>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-6">
 
                            <h5><b>Date of completion of course work</b></h5> <?php echo check_date($program['date_of_comp_of_course_work']); ?>
                            <h5><b>Credits earned through course work</b></h5><?php echo $program['credit_earn_course_work']; ?>
                            <h5><b>Credits earned through thesis work</b></h5><?php echo $program['credit_earn_thesis']; ?>
                            <h5><b>Date of comprehension</b></h5> <?php echo check_date($program['date_of_comp']); ?>
                            <h5><b>Date of SOA</b></h5><?php echo check_date($program['date_of_soa']); ?>

                    </div>
                    <div class="col-md-6">

                            <h5><b>Date of Open</b></h5><?php echo check_date($program['date_of_open']); ?>
                            <h5><b>Date of Final Viva</b></h5><?php echo check_date($program['date_of_final_viva']); ?>
                            <h5><b>Date of thesis submission</b></h5><?php echo check_date($program['date_thesis_submission']); ?>
                            <h5><b>Date of termination</b></h5><?php echo check_date($program['date_of_termination']); ?>

                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Result</h4>
                            </div>

                            <div class="content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <table class="table table-striped">
                                                <?php
                                                    $max_sem = 0;
                                                    while($results = mysqli_fetch_array($query_result) )
                                                    {
                                                        if ($max_sem == $results['sem_no'])
                                                        {
                                                        ?>
                                                            <tr>
                                                                <td></td>
                                                                <td><?php echo $results['course_id'];?></td>
                                                                <td><?php echo $results['course_name'];?></td>
                                                                <td><?php echo $results['credits_earned'];?></td>
                                                                <td><?php echo $results['grade'];?></td>
                                                                <td><?php echo $results['result'];?></td>
                                                            </tr> 
                                                        <?php 
                                                        } else {
                                                            $max_sem = $results['sem_no'];
                                                        ?>
                                                            <th>Semester <?php echo $max_sem; ?></th>
                                                            <th>Course Id</th>
                                                            <th>Course Name</th>
                                                            <th>Credits Earned</th>
                                                            <th>Grade</th>
                                                            <th>Result</th>
                                                                <tr>
                                                                <td></td>
                                                                <td><?php echo $results['course_id'];?></td>
                                                                <td><?php echo $results['course_name'];?></td>
                                                                <td><?php echo $results['credits_earned'];?></td>
                                                                <td><?php echo $results['grade'];?></td>
                                                                <td><?php echo $results['result'];?></td>
                                                            </tr> 
                                                        <?php
                                                        }
                                                    }
                                                ?>
                                                </table>

                                            </div>
                                        </div>
                                        
                                    </div>
        <footer class="footer">
            <!-- <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                        <li>
                            <a href="http://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                               Blog
                            </a>
                        </li>
                        <li>
                            <a href="http://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
				<div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>
                </div>
            </div> -->
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
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

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

    <script type="text/javascript">

        function removeNot() {

            $('.notificationAlert').css({
                'display': 'none'
            });

            xmldata = new XMLHttpRequest();

            var el = document.getElementById('notid').innerHTML;

            var urltosend = "set_cookie.php?notid="+el;
            console.log(el);
            xmldata.open("GET", urltosend,false);
            xmldata.send(null);
            if(xmldata.responseText != ""){
                toPrint = xmldata.responseText;
            }

            console.log(toPrint);


            // body...
        }
    </script>

</html>
