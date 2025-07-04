<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "connection1"; 
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$seat = $_POST["seat"];
$date = $_POST["travel_date"];
$sql = "INSERT INTO bus1 (fullname, email, phone, seat_number, travel_date) 
        VALUES ('$name', '$email', '$phone', '$seat', '$date')";
if ($conn->query($sql) === TRUE) {
    header("Location: payment.html?seat=$seat&name=$name&email=$email");
    exit();
} else {
    echo "SQL Error: " . $conn->error;
}
$conn->close();
?>
