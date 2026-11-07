<?php
session_start();
include("connect.php");

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id > 0) {
    $sql = "DELETE FROM myprintrequest WHERE printid=$id";
    echo $conn->query($sql) ? "Print request #$id deleted." : "Error: " . $conn->error;
} else {
    echo "Invalid ID.";
}
$conn->close();
?>
