<?php

include("./includes/preProcess.php");
date_default_timezone_set("Asia/Kolkata");
$query = "SELECT * FROM courseregistration NATURAL JOIN course WHERE reg_no = '$reg_no' AND sem_no = (SELECT max(sem_no) FROM courseregistration WHERE reg_no='$reg_no')";
$results = mysqli_query($connection, $query);
$form = mysqli_fetch_assoc($results);
$sem_no = $form['sem_no'];
$sem_type = $form['sem_type'];

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
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link href="assets/css/themify-icons.css" rel="stylesheet">

 <link href="./css/myCss.css" rel="stylesheet">

</head>
<body>
  <a href="application.php" title="Home"><i class="glyphicon glyphicon-home"></i></a>&nbsp;&nbsp;
  <a href="dashboard.php" title="Print" onClick="window.print()"><i class="glyphicon glyphicon-print"></i></a>&nbsp;&nbsp; Status : <?php echo $form['status'];?>

  <div class="col-md-offset-10"> Form: DP-01</div>
  <div class="col-md-offset-10"> (Clause 4.2)</div>
  <center><h5><b>Motilal Nehru National Institute of Technology Allahabad</b></h5></center>
  <center><u><h5>ACADEMIC REGISTRATION</h5></u></center>
  <div class="col-md-offset-1" style="font-size:15px">
    <form class="form-inline" id="dp01" name="dp01" action="submitDP01.php" method="post">
    </b>
    Name of the Student : <b><?php echo $user['name']; ?></b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Reg. No. <b><?php echo $_SESSION['reg_no'];?> </b><br>
    Department : <b> Computer Science and Engineering </b><br>Date of First Registration: <b><?php echo $date_of_reg; ?></b><br>

    Sem-No:<b><?php echo $sem_no; ?></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sem-Type:<b><?php echo $sem_type; ?></b></div>
  </div>
  <br>
  <center><u><h5>DETAILS OF COURSES/RESEARCH-SEMINAR/MINI-PROJECT/COMPREHENSIVE EXAM/STATE-OF-ART SEMINAR/THESIS PERFORMANCE</h5></u></center><br><br><br>
  <div class="row col-md-offset-1">
    <div class="col-md-11" style="font-size:10px;">
      <table class="table table-bordered table-condensed">
        <thead>
          <th>SI. No.</th>
          <th>Course Name with Code</th>
          <th>Credit</th>
          <th>Department</th>
          <th>Course Coordinator</th>
        </thead>
        <tbody>
          <?php
          $results = mysqli_query($connection, $query);
          $i = 1;
          while($form = mysqli_fetch_assoc($results)) 
          {
            ?>
            <tr>
              <td><?php echo $i; $i = $i + 1; ?></td>
              <td><?php echo $form['course_id']. " - ". $form['course_name']; ?></td>
              <td><?php echo $form['credits_enrolled'];?></td>
              <td>Computer Science and Engineering</td>php
              <td><?php echo $form['course_coordinator']; ?></td>
            </tr>
            <?php
          }
          ?>


        </tbody>
      </table>
    </div>
  </div>
    <div style="font-size:15px" class="col-md-12">
      <div class="col-md-offset-1">Date:<b> <?php echo date('d-m-Y'); ?></b>&nbsp;&nbsp;&nbsp;&nbsp; Time: <b><?php echo date('H:i:s'); ?></b><br>
        <div class="col-md-offset-8">(Signature of the Student)</div><br>
        <div class="col-md-offset-1">Advised By: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Supervisor(s) </div><br>
        <div class="col-md-offset-1">Forwarded By: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Convener DDPC&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Head of Department</div><br><br>
        <div class="col-md-offset-1">Approved By: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chairman SDPC </div><br>



      </div>
    </form>
  </div>
</div>
</body>
</html>
