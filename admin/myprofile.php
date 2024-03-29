<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
//error_reporting(0);
if (strlen($_SESSION['uid']==0)) {
  header('location:logout.php');
} else {
  if(isset($_POST['submit'])) {
    $Id=$_SESSION['aid'];
    $Name=$_POST['Name'];
    $Email=$_POST['Email'];
    $query=mysqli_query($con, "update admin set name='$Name', email='$Email' where id='$Id'");
    if ($query) {
      $msg="Your profile has been updated.";
    } else {
      $msg="Something Went Wrong. Please try again.";
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

  <title>My Profile</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">
  <?php include_once('includes/header.php')?>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php include_once('includes/sidebar.php')?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="welcome.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">My Profile</li>
        </ol>

        <!-- Page Content -->
        <div class="card mb-3">
          <div class="card-body">
            <h1 class="h3 mb-4">My Profile</h1>

            <p style="font-size:16px; color:green" align="center">
              <?php if($msg) {
                echo $msg;
              } ?>
            </p>
            
            <form class="user" method="post" action="">
              <?php
                $Id=$_SESSION['aid'];
                $ret=mysqli_query($con,"select * from admin where id='$Id'");
                $cnt=1;
                while ($row=mysqli_fetch_array($ret)) { 
              ?>

              <div class="row">
                <div class="col-4 mb-3">Admin Name</div>
                <div class="col-8 mb-3">
                  <input type="text" name="Name" id="Name" class="form-control" required="required" autofocus="autofocus" value="<?php echo $row['name']; ?> ">
                </div>
              </div>
              <div class="row">
                <div class="col-4 mb-3">Email Address</div>
                <div class="col-8 mb-3">
                  <input type="email" name="Email" class="form-control" required="required" value="<?php echo $row['email']; ?>" readonly>
                </div>
              </div>
              <div class="row">
                <div class="col-4 mb-3">Admin Registration Date (yyyy-mm-dd)</div>
                <div class="col-8  mb-3">
                  <input type="text" name="regDate" class="form-control"  value="<?php echo $row['regdate']; ?>" readonly>
                </div>
              </div>

              <?php } ?>
              <div class="row" style="margin-top:2%">
                <div class="col-4"></div>
                <div class="col-4">
                  <input type="submit" name="submit" value="Update" class="btn btn-primary btn-user btn-block">
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <?php include_once('includes/footer.php');?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin.min.js"></script>

</body>

</html>
<?php } ?>