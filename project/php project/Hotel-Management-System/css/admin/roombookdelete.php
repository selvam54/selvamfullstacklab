<?php
include '../config.php';

// Debugging: Check if 'id' is set in the URL
if (!isset($_GET['id'])) {
    die("Error: ID not provided.");
}

$id = $_GET['id'];

// Debugging: Show received ID
if (!is_numeric($id)) {
    die("Error: Invalid ID format.");
}

// Prepared statement to prevent SQL injection
$stmt = $conn->prepare("DELETE FROM roombook WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header("Location: roombook.php");
} else {
    die("Error: Could not delete record.");
}

$stmt->close();
$conn->close();
?>
