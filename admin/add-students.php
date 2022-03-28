<?php
session_start();
include('includes/dbconnection.php');

if (strlen($_SESSION['trmsaid']==0)) {
  header('location:logout.php');
  } else{ }
    if(isset($_POST['submit']))
  {

$trmsaid=$_SESSION['trmsaid'];

$student=$_POST['students'];
$stmt = $dbh->prepare("insert into tblstudents(Stdname) values(:var1)");
$status = $stmt->execute([
'var1'=>$student
]);

   if ($status) {
    echo '<script>alert("Student has been added.")</script>';
echo "<script>window.location.href ='add-students.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
  
}

?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
   
    <title>Add Students</title>

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
                        <h1>Students Details</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="add-students.php">Students Details</a></li>
                            <li class="active">Add</li>
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
                            <div class="card-header"><strong>Students </strong><small> Details</small></div>
                            <form name="" method="post" action="">
                                
                            <div class="card-body card-block">
 
                                <div class="form-group"><label for="company" class=" form-control-label">Student Name</label><input type="text" name="students" value="" class="form-control" id="students" required="true" autocomplete="off"></div>
                                              <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                                                            <i class="fa fa-dot-circle-o"></i>  Add
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
<?php ?>