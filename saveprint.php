<?php
session_start();
include("connect.php");

$fullname    = isset($_POST['fullname'])   ? $_POST['fullname']   : '';
$studentid   = isset($_POST['studentid'])  ? $_POST['studentid']  : '';
$printtype   = isset($_POST['printtype'])  ? $_POST['printtype']  : '';
$pages       = isset($_POST['pages'])      ? (int)$_POST['pages'] : 0;
$copies      = isset($_POST['copies'])     ? (int)$_POST['copies']: 0;
$doublesided = isset($_POST['doublesided'])? 'Yes' : 'No';
$pickuptime  = isset($_POST['pickuptime']) ? $_POST['pickuptime'] : '';

// Calculation
$rate      = ($printtype == 'Color') ? 0.50 : 0.10;
$extra     = ($doublesided == 'Yes') ? 0.15 : 0.00;
$totalcost = ($rate + $extra) * $pages * $copies;

$sql = "INSERT INTO myprintrequest
        (fullname, studentid, printtype, pages, copies, doublesided, totalcost, pickuptime)
        VALUES ('$fullname', '$studentid', '$printtype', $pages, $copies,
                '$doublesided', $totalcost, '$pickuptime')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Print request saved! Total cost: RM " . number_format($totalcost,2) . "');
          window.location='printservice.html';</script>";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>