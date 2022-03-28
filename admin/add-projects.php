<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['trmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$trmsaid=$_SESSION['trmsaid'];
$sname=$_POST['sname'];
$email=$_POST['email'];
$mobnum=$_POST['mobilenumber'];
$projname=$_POST['projname'];
$projdescription=$_POST['projdescription'];
$address=$_POST['address'];
$rdate=$_POST['rdate'];
$sdate=$_POST['submissiondate'];
$propic=$_FILES["propic"]["name"];
$extension = substr($propic,strlen($propic)-4,strlen($propic));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Profile Pics has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{

$propic=md5($propic).time().$extension;
 move_uploaded_file($_FILES["propic"]["tmp_name"],"images/".$propic);
}
$stmt = $dbh->prepare("insert into tblprojects(Name,Picture,Email,MobileNumber,ProjName,ProjDescription,Address,SubmissionDate,RegDate) values(:var1,:var2,:var3,:var4,:var5,:var6,:var7,:var8,:var9)");



$status = $stmt->execute([
'var1'=>$sname,
'var2'=>$propic,
'var3'=>$email,
'var4'=>$mobnum,
'var5'=>$projname,
'var6'=>$projdescription,
'var7'=>$address,
'var8'=>$sdate,
'var9'=>$rdate
]);
  
}
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
   
    <title>Add Projects</title>
 
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
                        <h1>Project Details</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="add-projects.php">Project Details</a></li>
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
                            <div class="card-header"><strong>Project </strong><small> Details</small></div>
                            <form name="" method="post" action="" enctype="multipart/form-data">
                                
                            <div class="card-body card-block">
 
                                <div class="form-group"><label for="company" class=" form-control-label">Student Name</label><input type="text" name="sname" value="" class="form-control" id="sname" required="true" autocomplete="off"></div>
                                <div class="form-group"><label for="company" class=" form-control-label">Student Pic</label><input type="file" name="propic" value="" class="form-control" id="propic" autocomplete="off"></div>
                                                                          
                                        <div class="form-group"><label for="street" class=" form-control-label">Student Email ID</label><input type="text" name="email" value="" id="email" class="form-control" required="true" autocomplete="off"></div>

                                                    <div class="row form-group">
                                                    <div class="col-12">
                                                    <div class="form-group"><label for="city" class=" form-control-label">Mobile Number</label><input type="text" name="mobilenumber" id="mobilenumber" value="" class="form-control" required="true" maxlength="10" pattern="[0-9]+" autocomplete="off"></div>
                                                    </div>
                                        
                                                    
                                                    </div>
                                             
                                                   
                                                    
                                                    </div>
                                                    <div class="row form-group">
                                                    <div class="col-12">
                                                    <div class="form-group"><label for="city" class=" form-control-label">Project Name</label><input type="text" name="projname" id="projname" value="" class="form-control" required="true" autocomplete="off">
                                                    </div>
                                                    </div>
                                               
                                                    </div>

                                                    <div class="row form-group">
                                                    <div class="col-12">
                                                    <div class="form-group"><label for="city" class=" form-control-label">Project Description</label><input type="text" name="projdescription" id="projdescription" value="" class="form-control" required="true" autocomplete="off">
                                                    </div>
                                                    </div>
                                               
                                                    </div>


                                                    <div class="row form-group">
                                                    <div class="col-12">
                                                    <div class="form-group"><label for="city" class=" form-control-label">Student Address</label><textarea type="text" name="address" id="address" value="" class="form-control" rows="4" cols="12" required="true" autocomplete="off"></textarea>
                                                    </div>
                                                    </div>


                                                    </div>

                                                    <div class="col-12">
                                                    <div class="form-group"><label for="city" class=" form-control-label">Registration Date</label><input type="date" name="rdate" id="rdate" value="" class="form-control" required="true" autocomplete="off"></div>
                                                    </div>

                                                    <div class="col-12">
                                                    <div class="form-group"><label for="city" class=" form-control-label">Submission Date</label><input type="date" name="submissiondate" id="submissiondate" value="" class="form-control" required="true" autocomplete="off"></div>
                                                    </div>
                                                    
                                                    </div>
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
<?php } ?>