<?php session_start();
error_reporting(0);
// Database Connection
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Search Details</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="shortcut icon" href="pics/logo.png" type="image/x-icon">
</head>
<body>
<section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Result for '<?php echo $_POST['searchdata'];?>'</h1>
          </div>
        </div>
      </div>
</section>

<section>
      <div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Search Details</h3>
              </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Bookings No</th>
                    <th>Name</th>
                    <th>No. Guest</th>
                    <th>Booking Date/Time</th>
                    <th>Posting Date</th>
                    <th>Remarks</th>
                    <th>Table No.</th> 
                    <th>Status</th>
                  </tr>
                </thead>
<tbody>
<?php 
$sdata=$_POST['searchdata'];
$query=mysqli_query($con,"select * from tblbookings where bookingNo like '%$sdata%'");
$cnt=1;
while($result=mysqli_fetch_array($query)){
?>
                  <tr>
    <td><?php echo $cnt; ?></td>
    <td><?php echo $result['bookingNo']; ?></td>
    <td><?php echo $result['fullName']; ?></td>
    <td><?php echo $result['guest']; ?></td>
    <td><?php echo $result['bookingDate'] . '/' . $result['bookingTime']; ?></td>
    <td><?php echo $result['postingDate']; ?></td>
    <td><?php echo $result['adminremark']; ?></td>
    <td><?php echo $result['tableId']; ?></td>
    <td>
        <?php 
        $bookingStatus = $result['boookingStatus'];

        // Output the badge for each status
        switch ($bookingStatus) {
            case 'Accepted':
                echo '<span class="badge badge-primary">Accepted</span>';
                break;
            case 'Rejected':
                echo '<span class="badge badge-danger">Rejected</span>';
                break;
            case 'No Show':
                echo '<span class="badge badge-warning">No Show</span>';
                break;
            case 'Done':
                echo '<span class="badge badge-success">Done</span>';
                break;
            default:
                echo '<span class="badge badge-secondary">Pending</span>';
                break;
        }
        ?> 
    </td>
</tr>
                  <?php 
$query = mysqli_query($con, "SELECT * FROM tblbookings");
$cnt = 1;

while ($result = mysqli_fetch_array($query)) {
    
}
?>
                  <?php $cnt++;} ?>
                  </tbody>
                </table><a href="index.php" name="Back">Back</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

</body>
</html>
