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

                    $currentTab = "applyLeave";

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
                                    <div class="header">
                                        <h4 class="title">Apply for Leave</h4>
                                    </div>
                                    <hr style="background-color: #111">
                                    <div class="content">
                                        <form action="submitLeave.php" method="post">
                                        Leave Type : <select name="leave_type" class="required" >
                                            <option selected disabled value="">Select</option>
                                            <?php
                                                $query = "SELECT * FROM leavelookup";
                                                $leaveTypes = mysqli_query($connection, $query);
                                                
                                                while( $thisLeaveType = mysqli_fetch_array($leaveTypes)  )
                                                {
                                            ?>
                                                <option value="<?php echo $thisLeaveType['leave_type'] ?>"><?php echo $thisLeaveType['leave_name'] ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                        <br><br>
                                        From: <input type="text" id="from_datepicker" name="from_datepicker"/>
                                        To: <input type="text" id="to_datepicker" name="to_datepicker"/>
                                        <br><br>
                                        <input type="submit" name="submit" value="Apply" />
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">Previously applied leaves</h4>
                                    </div>
                                    <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>Registration Number</th>
                                        <th>Reason</th>
                                        <th>From Date</th>
                                        <th>To Date</th>
                                        <th>Applied no. of days</th>
                                        <th>Status</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $reg_no = $_SESSION['userid'];
                                            $query = "SELECT * FROM groupx.leave WHERE reg_no = '$reg_no'";
                                            $allStudents = mysqli_query($connection, $query);


                                            while( $thisStudent = mysqli_fetch_array($allStudents) )
                                            {
                                        ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $thisStudent['reg_no'] ?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                            $type = $thisStudent['leave_type'];
                                                            $query2 = "SELECT leave_name FROM leavelookup WHERE leave_type = '$type'";
                                                            $result = mysqli_query($connection, $query2);
                                                            $leave_names = mysqli_fetch_array($result);
                                                            echo $leave_names['leave_name'];
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $thisStudent['from_date'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $thisStudent['to_date'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $thisStudent['no_of_days'] ?>
                                                    </td>
                                                     <td>
                                                        <?php 
                                                            if ($thisStudent['approved'] == 0) {
                                                                echo "Not approved";
                                                            } else {
                                                                echo "Approved";
                                                            }
                                                        ?>
                                                    </td>
                                                </tr>
                                        <?php
                                            }
                                        ?>

                                    </tbody>
                                </table>
                                </div>
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
