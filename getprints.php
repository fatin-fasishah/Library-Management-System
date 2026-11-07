<?php
session_start();
header('Content-Type: application/json');

$conn = new mysqli("localhost", "root", "", "library_db");
if ($conn->connect_error) {
    echo json_encode(["error" => "DB connection failed: " . $conn->connect_error]);
    exit;
}

$q = isset($_GET['q']) ? $conn->real_escape_string(trim($_GET['q'])) : '';
if ($q !== '') {
    $sql = "SELECT * FROM myprintrequest WHERE fullname LIKE '%$q%' OR studentid LIKE '%$q%' ORDER BY printid DESC";
} else {
    $sql = "SELECT * FROM myprintrequest ORDER BY printid DESC";
}

$result = $conn->query($sql);
if (!$result) {
    echo json_encode(["error" => "Query failed: " . $conn->error]);
    exit;
}

$rows = [];
while ($row = $result->fetch_assoc()) $rows[] = $row;
echo json_encode($rows);
$conn->close();
?>