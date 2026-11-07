<?php
session_start();
include("connect.php");

$studentid = $_POST['studentid'];
$fullname  = $_POST['username'];
$password  = $_POST['password'];
$gender    = $_POST['gender'];

$sql = "INSERT INTO mystudents (studentid,fullname,password,gender)
        VALUES ('$studentid','$fullname','$password','$gender')
        ON DUPLICATE KEY UPDATE fullname='$fullname'";

if ($conn->query($sql) === TRUE) {
    $_SESSION['studentid'] = $studentid;
    $_SESSION['fullname']  = $fullname;
    echo "<script>alert('Student saved successfully!');
          window.location='home.html';</script>";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>