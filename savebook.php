<?php
session_start();
include("connect.php");

$fullname   = $_POST['fullname'];
$studentid  = $_POST['studentid'];
$email      = $_POST['email'];
$pickupdate = $_POST['pickupdate'];
$returndate = $_POST['returndate'];

$sql = "INSERT INTO mybookreserve
        (fullname,studentid,email,pickupdate,returndate)
        VALUES ('$fullname','$studentid','$email','$pickupdate','$returndate')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Book reservation saved successfully!');
          window.location='viewbook.html';</script>";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>