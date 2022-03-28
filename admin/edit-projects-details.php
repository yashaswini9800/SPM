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
$sname=$_POST['sname'];
$email=$_POST['email'];
$mobnum=$_POST['mobilenumber'];
$pname=$_POST['projectname'];
$pdesc=$_POST['projectdescription'];
$address=$_POST['address'];
$sdate=$_POST['submissiondate'];

 $sql="update tblprojects set Name=:sname,Email=:email,MobileNumber=:mobilenumber,ProjName=:projectname,ProjDescription=:projectdescription,Address=:address,SubmissionDate=:submissiondate where ID=:eid";

$query = $dbh->prepare($sql);
$query->bindParam(':sname',$sname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobilenumber',$mobnum,PDO::PARAM_STR);
$query->bindParam(':projectname',$pname,PDO::PARAM_STR);
$query->bindParam(':projectdescription',$pdesc,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':submissiondate',$sdate,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
    $query->execute();

    echo '<script>alert("Project detail has been updated")</script>';

  }
  ?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
   
    <title>Update Project</title>
   
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
                        <h1>Update Project Detail</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="manage-projects.php">Update Project</a></li>
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
                            <div class="card-header"><strong>Project</strong><small> Detail</small></div>
                            <form name="" method="post" action="" enctype="multipart/form-data">
                                
                            <div class="card-body card-block">
 <?php
$eid=$_GET['editid'];
$sql="SELECT * from  tblprojects where ID=$eid";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>

<div class="form-group">
<label for="company" class=" form-control-label">Student Name</label>
<input type="text" name="sname" value="<?php  echo $row->Name;?>" class="form-control" id="sname" required="true" autocomplete="off">
</div>

<div class="form-group">
<label for="company" class=" form-control-label">Student Pic</label> &nbsp;<img src="images/<?php echo $row->Picture;?>" width="100" height="100" value="<?php  echo $row->Picture;?>">
<a href="changeimage.php?editid=<?php echo $row->ID;?>"> &nbsp; Edit Image</a>
</div>

<div class="form-group">
<label for="street" class=" form-control-label">Student Email ID</label>
<input type="text" name="email" value="<?php  echo $row->Email;?>" id="email" class="form-control" required="true" autocomplete="off">
</div>

<div class="row form-group">
<div class="col-12">
<div class="form-group"><label for="city" class=" form-control-label">Mobile Number</label><input type="text" name="mobilenumber" id="mobilenumber" value="<?php  echo $row->MobileNumber;?>" class="form-control" required="true" maxlength="10" pattern="[0-9]+" autocomplete="off">
</div>
</div>
</div>

<div class="row form-group">
<div class="col-12">
<div class="form-group">
<label for="city" class=" form-control-label">Project Name</label>
<input type="text" name="projectname" id="projectname" value="<?php  echo $row->ProjName;?>" class="form-control" required="true" autocomplete="off">
</div>
</div>
</div>

<div class="row form-group">
<div class="col-12">
<div class="form-group">
<label for="city" class=" form-control-label">Project Description</label>
<input type="text" name="projectdescription" id="projectdescription" value="<?php  echo $row->ProjDescription;?>" class="form-control" required="true" autocomplete="off">
</div>
</div>
</div>

<div class="row form-group">
<div class="col-12">
<div class="form-group"><label for="city" class=" form-control-label">Address</label><textarea type="text" name="address" id="address" class="form-control" rows="5" cols="12" required="true" autocomplete="off"><?php  echo $row->Address;?></textarea>
</div>
</div>


<div class="col-12">
<div class="form-group"><label for="city" class=" form-control-label">Submission Date</label><input type="date" name="submissiondate" id="submissiondate" value="<?php  echo $row->SubmissionDate;?>" class="form-control" required="true" autocomplete="off"></div>
</div>
</div>

</div>
<?php $cnt=$cnt+1;
}}
?>

<p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit"><i class="fa fa-dot-circle-o"></i> Update</button></p> 
                                                     
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
