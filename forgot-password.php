<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['submit'])) {
  $Email=$_POST['Email'];

  $query=mysqli_query($con,"select empId from employees where empEmail='$Email' ");
  $ret=mysqli_fetch_array($query);
  if($ret>0) {
    $_SESSION['email']=$Email;
    //echo "<script>alert('".$_SESSION['email']."');</script>";
    header('location:resetpassword.php');
  } else {
    $msg="Invalid Details. Please try again.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Forgot Password</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Reset Password</div>
      <div class="card-body">
        <div class="text-center mb-4">
          <h4>Forgot your password?</h4>
          <p>Enter your email address and we will instruct you on how to reset your password.</p>
        </div>
          <p style="font-size:16px; color:red"> 
            <?php if($msg){
              echo $msg;
            } ?> 
          </p>
        <form action="" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" name="Email" id="inputEmail" class="form-control" placeholder="Enter email address" required="required" autofocus="autofocus">
              <label for="inputEmail">Enter email address</label>
            </div>
          </div>
          <input type="submit" class="btn btn-primary btn-block" name="submit" value="Reset Password">
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
          <a class="d-block small" href="login.php">Login Page</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
