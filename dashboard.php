<?php session_start();

include('config.php');

if(strlen($_SESSION['aid'])==0)
  { 
header('location:index.php');
}
else{ ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">

  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">

  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <link rel="shortcut icon" href="pics/logo.png" type="image/x-icon">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<?php include_once('navbar.php');?>

<?php include_once('sidebar.php');?>

  <div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Apollo Manila Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Apollo Manila Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container-fluid">

        <div class="row">

          <?php if($_SESSION['utype']==1):?>
          <div class="col-lg-4 col-6">

            <div class="small-box bg-info">
              <div class="inner">
<?php $query=mysqli_query($con,"select id from tbladmin where UserType=0");
$subadmincount=mysqli_num_rows($query);
?>


                <h3><?php echo $subadmincount;?></h3>
                <p>Sub Admins</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="manage-subadmins.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <?php endif;?>

          <div class="col-lg-4 col-6">

            <div class="small-box bg-primary">
              <div class="inner">
<?php $query1=mysqli_query($con,"select * from tblbookings");
$allbookings=mysqli_num_rows($query1);
?>

                <h3><?php echo $allbookings;?></h3>

                <p>All bookings</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="all-bookings.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-6">

            <div class="small-box bg-warning">
              <div class="inner">
 <?php $query3=mysqli_query($con,"select * from tblbookings where (boookingStatus='Pending')");
$newbookings=mysqli_num_rows($query3);
?>               
                <h3><?php echo $newbookings;?></h3>

                <p>New Bookings</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="new-bookigs.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

<hr />

          <div class="col-lg-4 col-6">
            <div class="small-box bg-success">
              <div class="inner">
<?php $query11=mysqli_query($con,"select * from tblbookings where (boookingStatus='Accepted')");
$acceptedbookings=mysqli_num_rows($query11);
?>
                <h3><?php echo $acceptedbookings;?></h3>
                <p>Accepted Bookings</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="accepted-bookings.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
<?php $query12=mysqli_query($con,"select * from tblbookings where (boookingStatus='Rejected')");
$rejectedbookings=mysqli_num_rows($query12);
?>

                <h3><?php echo $rejectedbookings;?></h3>

                <p>Rejected/No Show Bookings</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="rejected-bookings.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php include_once('footer.php');?>
</div>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="plugins/sparklines/sparkline.js"></script>
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="dist/js/adminlte.js"></script>
<script src="dist/js/demo.js"></script>
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
<?php } ?>