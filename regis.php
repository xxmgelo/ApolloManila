<?php
include_once('config.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['submit'])) {

    $fname = $_POST['name'];
    $emailid = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $bookingdate_raw = $_POST['bookingdate'];
    $date_obj = DateTime::createFromFormat('m/d/Y', $bookingdate_raw);
    $bookingdate = $date_obj ? $date_obj->format('Y-m-d') : null;
    $bookingtime = $_POST['bookingtime'];
    $guest = $_POST['guest'];
    $boookingStatus = $_POST['boookingStatus'];
    $tableId = !empty($_POST['tableId']) ? intval($_POST['tableId']) : null; // Handle empty tableId
    $adminremark = $_POST['adminremark'];
    $bno = mt_rand(100000000, 9999999999);

    if (!$bookingdate) {
        echo "<script>alert('Invalid date format. Please enter a valid date.');</script>";
        exit;
    }

    $query = mysqli_query($con, "INSERT INTO tblbookings(bookingNo, fullName, emailId, phoneNumber, bookingDate, bookingTime, guest, boookingStatus, tableId, adminremark)
                                  VALUES('$bno', '$fname', '$emailid', '$phonenumber', '$bookingdate', '$bookingtime', '$guest', '$boookingStatus', ".($tableId ? $tableId : 'NULL').", '$adminremark')");

    if ($query) {
        echo '<script>alert("Your order was sent successfully. Booking number is: '.$bno.'");</script>';
        echo "<script type='text/javascript'>document.location = 'check-status.php';</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again.');</script>";
        echo "SQL Error: " . mysqli_error($con);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Booking Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <link href="css/wickedpicker.css" rel="stylesheet" type='text/css' media="all" />
    <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="shortcut icon" href="pics/logo.png" type="image/x-icon">
</head>

<body>
<?php include('header.php'); ?>

<div class="rcontainer">
    <form action="#" method="post">
        <div class="personal">
            <div class="main">
                <h1 class="header-w3ls">Booking Form</h1>
                <div class="form-left-w3l">
                    <input type="text" class="top-up" name="name" placeholder=" Name" required>
                </div>
                <div class="form-left-w3l">
                    <input type="email" name="email" placeholder=" Email" required>
                    <input class="buttom" type="text" name="phonenumber" placeholder=" Phone Number" required>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="information">
            <div class="main">
                <div class="form-left-w3l">
                    <input id="datepicker" name="bookingdate" type="text" placeholder=" Booking Date" required><br>
                    <select class="form-control" name="bookingtime" required>
                        <option value="">Time</option>
                        <option value="11:00AM">11:00AM</option>
                        <option value="1:00PM">1:00PM</option>
                        <option value="6:00PM">6:00PM</option>
                        <option value="8:00PM">8:00PM</option>
                    </select>
                </div>
            </div>

            <div class="main">
                <div class="form-left-w3l">
                    <select class="form-control" name="guest" required>
                        <option value="">Number of Guests</option>
                        <?php for ($i = 1; $i <= 10; $i++) echo "<option value='$i'>$i</option>"; ?>
                    </select>
                </div>
            </div>
        </div>
	<div><input type="hidden" name="boookingStatus" value="Pending"></div>
    <div><input type="hidden" name="tableId" value="No table"></div>
    <div><input type="hidden" name="adminremark" value="Please wait for the update."></div>
        <div class="btn">
            <input type="submit" value="Reserve a Table" name="submit" class="button">
        </div>
    </form>
</div>
<div class="no-overflow">
</div>

<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script>
    $(function () {
        $("#datepicker").datepicker({ minDate: 0 });
    });
</script>
</body>
</html>
