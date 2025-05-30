<?php include_once('config.php');

if(isset($_POST['submit'])){

$fname=$_POST['name'];
$emailid=$_POST['email'];
$phonenumber=$_POST['phonenumber'];
$bookingdate=$_POST['bookingdate'];
$bookingtime=$_POST['bookingtime'];
$guest=$_POST['guest'];
$bno=mt_rand(100000000,9999999999);

}

?>
<!DOCTYPE html>
<html lang="en">

<head>	
	<title>Check Status</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<script type="application/x-javascript">
		addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
	</script>
	<link rel="stylesheet" href="style.css">
	<link rel="shortcut icon" href="pics/logo.png" type="image/x-icon">
	
</head>

<body>
<?php include ('header.php') ?>
<div class="rcontainer">
	<form action="search-result.php" method="post">
		<div class="personal">
			<h1 class="header-w3ls">Check Status</h1>			
			<div class="main">
				<div class="form-left-w3l">
					<input type="text" class="top-up" name="searchdata" placeholder="Insert Booking no." required=""></div>					
									
			<div class="btnn">
				<input type="submit" value="Search" name="submit" class="button"></div></br>
			</div>	
		</div>	
	</form>
	<script type='text/javascript' src='js/jquery-2.2.3.min.js'></script>

	<script src="js/jquery-ui.js"></script>
	<script>
		$(function () {
			$("#datepicker,#datepicker1,#datepicker2,#datepicker3").datepicker();
		});
	</script>

	<script type="text/javascript" src="js/wickedpicker.js"></script>
	<script type="text/javascript">
		$('.timepicker,.timepicker1').wickedpicker({ twentyFour: false });
	</script>

</div>
<div class="no-overflow">
</div>
</body>
</html>