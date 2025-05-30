<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// DB connection
include('config.php');

$bid=intval($_GET['bid']);
$query=mysqli_query($con,"select * from tblbookings where id='$bid'");
$cnt=1;
while($result=mysqli_fetch_array($query)){

    // PHPMailer
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'apollomnlph@gmail.com';
        $mail->Password   = 'tdmr wkya rhlr qnuw'; 
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('apollomnlph@gmail.com', 'Apollo');
        $mail->addAddress($result['emailId'], $result['fullName']);

        $mail->isHTML(true);
        $mail->Subject = 'Apollo Manila Reservation Status';
        $mail->Body    = 'Hello ' .$result['fullName'].', your booking status is updated to '.$result['boookingStatus']. '. Your table is '.$result['tableId'].'.';

        $mail->send();

    } catch (Exception $e) {
        echo "Message could not be sent. Error: {$mail->ErrorInfo}<br>";
    }
    if ($query) {
        echo '<script>alert("Successfully sent.");</script>';
        echo "<script type='text/javascript'>document.location = 'booking-details.php?bid=" . $result['id'] . "';</script>";
    }
}
$con->close();
?>