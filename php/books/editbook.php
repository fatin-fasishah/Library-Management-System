<?php
session_start();
include("connect.php");
 
$id         = isset($_POST['bookreserveid']) ? (int)$_POST['bookreserveid'] : 0;
$fullname   = $conn->real_escape_string(isset($_POST['fullname'])   ? $_POST['fullname']   : '');
$studentid  = $conn->real_escape_string(isset($_POST['studentid'])  ? $_POST['studentid']  : '');
$email      = $conn->real_escape_string(isset($_POST['email'])      ? $_POST['email']      : '');
$pickupdate = $conn->real_escape_string(isset($_POST['pickupdate']) ? $_POST['pickupdate'] : '');
$returndate = $conn->real_escape_string(isset($_POST['returndate']) ? $_POST['returndate'] : '');
 
$sql = "UPDATE mybookreserve SET fullname='$fullname', studentid='$studentid', email='$email',
        pickupdate='$pickupdate', returndate='$returndate'
        WHERE bookreserveid=$id";
 
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Book reservation updated!'); window.location='/librarymanagementsystem/viewbook.html';</script>";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>