<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['fullname'];
  $from = $_POST['from'];
  $to = $_POST['to'];
  $date = $_POST['journey_date'];
  $class = $_POST['class'];

  $sql = "INSERT INTO flights (fullname, from_city, to_city, journey_date, flight_class)
          VALUES ('$name', '$from', '$to', '$date', '$class')";

  if ($conn->query($sql) === TRUE) {
    header("Location: view.php");
  } else {
    echo "Error: " . $conn->error;
  }
}
?>
