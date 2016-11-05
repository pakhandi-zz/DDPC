<?php

    include("./includes/preProcess.php");
    if (!strcmp($_SESSION['role'], "Supervisor"))
    {
        $supervisor_id = $_SESSION['reg_no'];
        $s_query = "Select reg_no from supervisorhistory WHERE supervisor_id = '$supervisor_id'";
        $s_result = mysqli_query($connection, $s_query);
        $s_array = array();
        while($s_row = mysqli_fetch_array($s_result))
        {
            array_push($s_array, $s_row['reg_no']);
        }
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
    <!-- <script type="text/javascript">
        alert("hi");
    </script> -->
    

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

                $currentTab = "studentLeave";

                include("./includes/sideNav.php");

            ?>

        </div>
    </div>

    <!-- Top navbar panel -->
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
                                <h4 class="title">Leave Applications</h4>
                                <p class="category">List of leave application of all the students</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>Registration Number</th>
                                        <th>Reason</th>
                                        <th>From Date</th>
                                        <th>To Date</th>
                                        <th>Applied no. of days</th>
                                        <th>Leaves Left</th>
                                        <th>Status</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query = "SELECT * FROM groupx.leave ";
                                            $allStudents = mysqli_query($connection, $query);


                                            while( $thisStudent = mysqli_fetch_array($allStudents) )
                                            {
                                                if( $thisStudent['progress'] != $_SESSION['role'])
                                                {
                                                    continue;
                                                }
                                                else {
                                                    if (!strcmp($_SESSION['role'], "Supervisor") && !in_array($thisStudent['reg_no'], $s_array))
                                                    {
                                                        continue;
                                                    }
                                        ?>
                                                <tr>
                                                    <td>
                                                       <a href="./viewStudent.php?qwStudent=<?php echo $thisStudent['reg_no'] ?>">
                                                        <?php echo $thisStudent['reg_no'] ?>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                            $type = $thisStudent['leave_type'];
                                                            $query2 = "SELECT * FROM leavelookup WHERE leave_type = '$type'";
                                                            $result = mysqli_query($connection, $query2);
                                                            $leave_lookup = mysqli_fetch_array($result);
                                                            echo $leave_lookup['leave_name'];
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
                                                            $app_reg_no = $thisStudent['reg_no'];
                                                            $app_leave_type = $thisStudent['leave_type'];
                                                            $query3 = "SELECT SUM(no_of_days) AS days_left FROM groupx.leave WHERE leave_type = '$app_leave_type' AND reg_no = '$app_reg_no' AND status = 'approved'";
                                                            $result3 = mysqli_query($connection, $query3);
                                                            if($result3) {
                                                                $row = mysqli_fetch_array($result3);
                                                                $sum = $leave_lookup['no_of_days'] - $row['days_left'];
                                                                if ($sum > 0)
                                                                    echo $sum;
                                                                else
                                                                    echo "0";
                                                            } else
                                                                echo "hi";
                                                            
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $thisStudent['status']; ?>
                                                    </td>
                                                    <?php 
                                                        if (!strcmp($thisStudent['status'], "pending") && (strtotime($thisStudent['from_date']) > time())) 
                                                        {
                                                            if(!strcmp($_SESSION['role'],"HOD"))
                                                            {

                                                    ?>

                                                    <td>
                                                        <form method="post">
                                                        <input type="submit" name="submit" value="Approve" reg_no = "<?php echo $thisStudent['reg_no'] ?>" leave_type="<?php echo $thisStudent['leave_type'] ?>" from_date="<?php echo $thisStudent['from_date'] ?>" to_date="<?php echo $thisStudent['to_date'] ?>" status="approved" progress="HOD"/>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form method="post">
                                                        <input type="submit" name="submit" value="Deny" reg_no = "<?php echo $thisStudent['reg_no'] ?>" leave_type="<?php echo $thisStudent['leave_type'] ?>" from_date="<?php echo $thisStudent['from_date'] ?>" to_date="<?php echo $thisStudent['to_date'] ?>" status="denied" progress="HOD"/>
                                                        </form>
                                                    </td>
                                                    <?php    
                                                            } else if(!strcmp($_SESSION['role'],"Supervisor"))
                                                            {

                                                    ?>
                                                    <td>
                                                        <form method="post">
                                                        <input type="submit" name="submit" value="Recommended" reg_no = "<?php echo $thisStudent['reg_no'] ?>" leave_type="<?php echo $thisStudent['leave_type'] ?>" from_date="<?php echo $thisStudent['from_date'] ?>" to_date="<?php echo $thisStudent['to_date'] ?>" status="pending" progress="ConvenerDDPC"/>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form method="post">
                                                        <input type="submit" name="submit" value="Not Recommended" reg_no = "<?php echo $thisStudent['reg_no'] ?>" leave_type="<?php echo $thisStudent['leave_type'] ?>" from_date="<?php echo $thisStudent['from_date'] ?>" to_date="<?php echo $thisStudent['to_date'] ?>" status="denied" progress="Supervisor"/>
                                                        </form>
                                                    </td>
                                                    <?php
                                                        } else if(!strcmp($_SESSION['role'],"ConvenerDDPC"))
                                                        {
                                                    ?>
                                                    <td>
                                                        <form method="post">
                                                        <input type="submit" name="submit" value="Recommended" reg_no = "<?php echo $thisStudent['reg_no'] ?>" leave_type="<?php echo $thisStudent['leave_type'] ?>" from_date="<?php echo $thisStudent['from_date'] ?>" to_date="<?php echo $thisStudent['to_date'] ?>" status="pending" progress="HOD"/>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form method="post">
                                                        <input type="submit" name="submit" value="Not Recommended" reg_no = "<?php echo $thisStudent['reg_no'] ?>" leave_type="<?php echo $thisStudent['leave_type'] ?>" from_date="<?php echo $thisStudent['from_date'] ?>" to_date="<?php echo $thisStudent['to_date'] ?>" status="denied" progress="ConvenerDDPC"/>
                                                        </form>
                                                    </td>
                                                    <?php
                                                            } 
                                                        } else {


                                                    ?>
                                                    <td></td>
                                                    <td></td>
                                                    <?php
                                                            }
                                                    ?>  
                                                </tr>

                                        <?php
                                                }
                                            }
                                        ?>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <footer class="footer">
           
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
        }

         $("input[name='submit']").click(function(event){

            event.preventDefault();
            var formData = {  // Javascript object
                reg_no: $(this).attr('reg_no'),
                leave_type: $(this).attr('leave_type'),
                from_date: $(this).attr('from_date'),
                to_date: $(this).attr('to_date'),
                status: $(this).attr('status'),
                progress: $(this).attr('progress')
            };
            
            $.ajax({
                url:'./approveLeave.php',
                type:'post',
                data: formData,
                success: function(data){
                    // alert(data);
                    location.reload();
                },
                error: function(){
                    alert('failure');
                }
            });
        });
    </script>
</html>