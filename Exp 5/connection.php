<?php
$conn = new mysqli("localhost", "root", "", "flight_db");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
