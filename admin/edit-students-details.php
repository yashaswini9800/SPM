<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['trmsaid']==0)) {
  header('location:logout.php');
  } else{}
    if(isset($_POST['submit']))
  {
$eid=$_GET['editid'];
$students=$_POST['students'];

 $sql="update tblstudents set Stdname=:students where ID=:eid";

$query = $dbh->prepare($sql);
$query->bindParam(':students',$students,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
    $query->execute();

    echo '<script>alert("Students has been updated")</script>';

  }
  ?>

<!doctype html>
<html class="no-js" lang="en">

<head>
   
    <title>Update Students</title>

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
                        <h1>Update Students</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="manage-students.php">Update Students</a></li>
                            <li class="active">Update</li>
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
                            <div class="card-header"><strong>Student</strong><small> Detail</small></div>
                            <form name="" method="post" action="">
                                
                            <div class="card-body card-block">
 <?php
$eid=$_GET['editid'];
$sql="SELECT * from  tblstudents where ID=$eid";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                <div class="form-group"><label for="company" class=" form-control-label">Student Name</label><input type="text" name="students" value="<?php  echo $row->Stdname;?>" class="form-control" id="students" required="true" autocomplete="off"></div>
                                   
                                        
                                            
                                                    
                                                    </div>
                                                   <?php $cnt=$cnt+1;}} ?> 
                                                     <div class="card-footer">
                                                       <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                                                            <i class="fa fa-dot-circle-o"></i> Update
                                                        </button></p>
                                                        
                                                    </div>
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
    <script src="assets/js/main.js"></script>

    <script src="assets/js/widgets.js"></script>
</body>
</html>
