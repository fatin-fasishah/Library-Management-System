
<?php
session_start();
include("connect.php");

$fullname    = isset($_POST['fullname'])    ? $_POST['fullname']    : '';
$studentid   = isset($_POST['studentid'])   ? $_POST['studentid']   : '';
$email       = isset($_POST['email'])       ? $_POST['email']       : '';
$roomnumber  = isset($_POST['roomnumber'])  ? $_POST['roomnumber']  : '';
$bookingdate = isset($_POST['bookingdate']) ? $_POST['bookingdate'] : '';
$starttime   = isset($_POST['starttime'])   ? $_POST['starttime']   : '';
$endtime     = isset($_POST['endtime'])     ? $_POST['endtime']     : '';
$purpose     = isset($_POST['purpose'])     ? $_POST['purpose']     : '';

// Calculate duration in hours
$start    = DateTime::createFromFormat('H:i', $starttime);
$end      = DateTime::createFromFormat('H:i', $endtime);

if ($start && $end) {
    $duration = ($end->getTimestamp() - $start->getTimestamp()) / 3600;
} else {
    $duration = 0;
}

$sql = "INSERT INTO mystudyroom
        (fullname, studentid, email, roomnumber, bookingdate,
         starttime, endtime, duration, purpose)
        VALUES ('$fullname', '$studentid', '$email', '$roomnumber',
                '$bookingdate', '$starttime', '$endtime', $duration, '$purpose')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Room booked successfully for $duration hour(s)!');
          window.location='bookstudyroom.html';</script>";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>