<?php
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
   
    <title>PMS Search</title>
    
</head>

<body>
    <?php include_once('includes/sidebar.php');?>

    <div id="right-panel" class="right-panel">

        <?php include_once('includes/header.php');?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Search Project</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="search.php">Search Project</a></li>
                            <li class="active">Project</li>
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
                                <strong class="card-title">Search Project</strong>
                            </div>

<form name="search" method="post" style="padding-top: 20px" >
                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                   
                                   
                                       <div class="form-group row">
                                                        <label class="col-4 col-form-label" for="example-email" style="padding-left: 50px"><strong>Search by Student Name or Project Name</strong></label>
                                                        <div class="col-6">
                                                            <input id="searchdata" type="text" name="searchdata" required="true" autocomplete="off"class="form-control">
                                                        </div>
                                                    </div>
                                                    <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="search" id="submit">
                                                            <i class="fa fa-dot-circle-o"></i> Search
                                                        </button></p> 

                                                    </div> 
                                    
       </form>


<?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
  <h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4> 


                            <div class="card-body">
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

$sql="SELECT * from tblprojects where Name like '%$sdata%' || ProjName like  '%$sdata%'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>   
              
                <tr>
                  <td><?php echo htmlentities($cnt);?></td>
            <td><?php  echo htmlentities($row->Name);?></td>
                  <td><?php  echo htmlentities($row->ProjName);?></td>
                  <td><?php  echo htmlentities($row->RegDate);?></td>
                  <td><a href="edit-projects-details.php?editid=<?php echo htmlentities ($row->ID);?>">Edit Details</a></td>
                </tr>
                 <?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
   
<?php } }?>

                                </table>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
    <script src="vendors/jquery/dist/jquery.min.js"></script>


</body>

</html>
<?php }  ?>