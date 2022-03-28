<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login'])) 
  {
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $sql ="SELECT ID FROM users WHERE UserName=:username and Password=:password";
    $query=$dbh->prepare($sql);
    $query-> bindParam(':username', $username, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
{
foreach ($results as $result) {
$_SESSION['trmsaid']=$result->ID;
}
$_SESSION['login']=$_POST['username'];
print_r($_SESSION);
header('Location: dashboard.php');
} else{
echo "<script>alert('Invalid Details');</script>";
}
}

?>
    
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    
    <title>Login</title>  

    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="style1.css">

</head>

<body class="bg-dark" style=" background-image: url('img1.jpg');">
    <div class="class_a" >
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <h3 style="color:black">Project Management System </h3>
                    <hr  color="red"/>
                </div>
                <div class="login-form">
                    <div class="header">
    <h2>Login</h2>
  </div>
    <form method="post" action="">

    <div class="input-group">
        <label>Username</label>
        <input type="text" name="username" required="true" autocomplete="off">
    </div>
    <div class="input-group">
        <label>Password</label>
        <input type="password" name="password" required="true" autocomplete="off">
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="login">Login</button>
    </div>
    <p>
        Not yet a member? <a href="register.php">Sign up</a>
    </p>
                             </form>
                         </div>                              
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
