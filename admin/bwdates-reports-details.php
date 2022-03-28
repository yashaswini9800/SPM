<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['trmsaid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!doctype html>
<html class="no-js" lang="en">
<head>
   
    <title>Reports</title>
   

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">

 <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/style.css">



</head>

<body>

    <?php include_once('includes/sidebar.php');?>

    <div id="right-panel" class="right-panel">

        <?php include_once('includes/header.php');?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>View Projects</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="bwdates-report-ds.php">Date Reports</a></li>
                            <li class="active">Projects</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">View Projects</strong>
                            </div>
                            <div class="card-body">
<h4 class="m-t-0 header-title">Dates Reports</h4>
<?php

$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];

?>
<h5 align="center" style="color:blue">Report from 
    <?php echo $fdate ?>
     to 
     <?php echo $tdate ?>
          </h5>
          <table class="table">
              <thead>
            <tr>
            <tr>
                  <th>S.NO</th>

                  <th>Student Name</th>

                  <th>Project Name</th>

                  <th>Registration Date</th> 

                  <th>Action</th>
            </tr>
            </tr>
              </thead>
              <?php
              $sql="SELECT * from tblprojects where Date(RegDate) between '$fdate' and '$tdate'";

$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>   
              
                <tr>
                  <td>
                  <?php
                  echo htmlentities($cnt);?>
                  </td>
                  <td>
                  <?php 
                  echo htmlentities($row->Name);
                  ?> 
                  </td>
                  <td>
                  <?php  
                  echo htmlentities($row->ProjName);
                  ?>
                  </td>
                  <td>
                  <?php  
                  echo htmlentities($row->RegDate);
                  ?>
                  </td>
                  <td>
                  <a href="edit-projects-details.php?editid=<?php echo htmlentities ($row->ID);?>">Edit Details</a></td>
                </tr>
<?php 
$cnt=$cnt+1;
} }?>

                            </table>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  

    <script src="vendors/jquery/dist/jquery.min.js"></script>

    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>

    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <script src="assets/js/widgets.js"></script>
    
    <script src="assets/js/main.js"></script>


</body>

</html>
<?php }  ?>