<?php
session_start();
include("connect.php");

$id          = isset($_POST['printid'])     ? (int)$_POST['printid']                         : 0;
$fullname    = $conn->real_escape_string(isset($_POST['fullname'])   ? $_POST['fullname']    : '');
$studentid   = $conn->real_escape_string(isset($_POST['studentid'])  ? $_POST['studentid']   : '');
$printtype   = $conn->real_escape_string(isset($_POST['printtype'])  ? $_POST['printtype']   : '');
$pages       = isset($_POST['pages'])   ? (int)$_POST['pages']   : 0;
$copies      = isset($_POST['copies'])  ? (int)$_POST['copies']  : 0;
$doublesided = $conn->real_escape_string(isset($_POST['doublesided']) ? $_POST['doublesided'] : 'No');
$pickuptime  = $conn->real_escape_string(isset($_POST['pickuptime'])  ? $_POST['pickuptime']  : '');

$rate      = ($printtype == 'Color') ? 0.50 : 0.10;
$extra     = ($doublesided == 'Yes') ? 0.15 : 0.00;
$totalcost = ($rate + $extra) * $pages * $copies;

$sql = "UPDATE myprintrequest SET fullname='$fullname', studentid='$studentid', printtype='$printtype',
        pages=$pages, copies=$copies, doublesided='$doublesided', totalcost=$totalcost,
        pickuptime='$pickuptime' WHERE printid=$id";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Print request updated! Total: RM " . number_format($totalcost,2) . "'); window.location='/librarymanagementsystem/printservice.html';</script>";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>
