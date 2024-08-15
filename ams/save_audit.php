<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ensure all POST variables are set
$required_fields = ['audit-username', 'group', 'room-number', 'email', 'audit-password', 'audit-datetime'];
foreach ($required_fields as $field) {
    if (!isset($_POST[$field])) {
        die("Error: Missing field $field");
    }
}

// $serial_number = $_POST['serial-number'];
$audit_username = $_POST['audit-username'];
$group = $_POST['group'];
$room_number = $_POST['room-number'];
$email = $_POST['email'];
$audit_password = $_POST['audit-password'];
$audit_datetime = $_POST['audit-datetime'];

// Escape variables for security
$serial_number = $conn->real_escape_string($serial_number);
$audit_username = $conn->real_escape_string($audit_username);
$group = $conn->real_escape_string($group);
$room_number = $conn->real_escape_string($room_number);
$email = $conn->real_escape_string($email);
$audit_password = $conn->real_escape_string($audit_password);
$audit_datetime = $conn->real_escape_string($audit_datetime);

$sql = "INSERT INTO audits (serial_number, audit_username, group_name, room_number, email, audit_password, audit_datetime) 
        VALUES ('$serial_number', '$audit_username', '$group', '$room_number', '$email', '$audit_password', '$audit_datetime')";

if ($conn->query($sql) === TRUE) {
    echo "<p>New audit record created successfully</p>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
