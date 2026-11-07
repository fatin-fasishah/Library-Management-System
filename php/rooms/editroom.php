<?php
session_start();
include("connect.php");

$id          = isset($_POST['roomid'])      ? (int)$_POST['roomid']                          : 0;
$fullname    = $conn->real_escape_string(isset($_POST['fullname'])    ? $_POST['fullname']    : '');
$studentid   = $conn->real_escape_string(isset($_POST['studentid'])   ? $_POST['studentid']   : '');
$email       = $conn->real_escape_string(isset($_POST['email'])       ? $_POST['email']       : '');
$roomnumber  = $conn->real_escape_string(isset($_POST['roomnumber'])  ? $_POST['roomnumber']  : '');
$bookingdate = $conn->real_escape_string(isset($_POST['bookingdate']) ? $_POST['bookingdate'] : '');
$starttime   = $conn->real_escape_string(isset($_POST['starttime'])   ? $_POST['starttime']   : '');
$endtime     = $conn->real_escape_string(isset($_POST['endtime'])     ? $_POST['endtime']     : '');
$purpose     = $conn->real_escape_string(isset($_POST['purpose'])     ? $_POST['purpose']     : '');

$start    = DateTime::createFromFormat('H:i', $starttime);
$end      = DateTime::createFromFormat('H:i', $endtime);
$duration = ($start && $end) ? ($end->getTimestamp() - $start->getTimestamp()) / 3600 : 0;

$sql = "UPDATE mystudyroom SET fullname='$fullname', studentid='$studentid', email='$email',
        roomnumber='$roomnumber', bookingdate='$bookingdate', starttime='$starttime',
        endtime='$endtime', duration=$duration, purpose='$purpose'
        WHERE roomid=$id";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Reservation updated successfully!'); window.location='/librarymanagementsystem/bookstudyroom.html';</script>";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>
