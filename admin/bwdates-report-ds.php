<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['trmsaid']==0)) {
  header('location:logout.php');
  } else{


  ?>

<!DOCTYPE html>
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
                        <h1>Date Reports</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="bwdates-report-ds.php">Date Reports</a></li>
                            <li class="active">Reports</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-6">
                   
                    </div>

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header"><strong>Date</strong><small> Reports</small></div>
                            <form name="bwdatesreport"  action="bwdates-reports-details.php" method="post">
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                            <div class="card-body card-block">
 
                                <div class="form-group"><label for="company" class=" form-control-label">From Date</label><input type="date" name="fromdate" id="fromdate" class="form-control" required="true" autocomplete="off"></div>
                                    <div class="form-group"><label for="vat" class=" form-control-label">To Date</label><input type="date" name="todate"  class="form-control" required="true" autocomplete="off"></div>
                                        
                                                    </div>
                                                   <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                                                            <i class="fa fa-dot-circle-o"></i> Submit
                                                        </button></p>
                                                  
                                                </div>
                                                </form>
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