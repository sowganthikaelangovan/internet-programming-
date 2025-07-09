<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "connection1";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$fullname = $conn->real_escape_string($_POST['fullname']);
$email = $conn->real_escape_string($_POST['email']);
$phone = $conn->real_escape_string($_POST['phone']);
$department = $conn->real_escape_string($_POST['department']);
$appointment_date = $conn->real_escape_string($_POST['appointment_date']);
$time_slot = $conn->real_escape_string($_POST['time_slot']);
$message = $conn->real_escape_string($_POST['message']);

$sql = "INSERT INTO hospital1 (fullname, email, phone, department, appointment_date, time_slot, message)
        VALUES ('$fullname', '$email', '$phone', '$department', '$appointment_date', '$time_slot', '$message')";

if ($conn->query($sql) === TRUE) {
    header("Location: success.html");
    exit();
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>
