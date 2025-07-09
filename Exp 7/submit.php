<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $service = $_POST['service'];
  $date = $_POST['date'];
  $time = $_POST['time'];

  $sql = "INSERT INTO appointments (name, service, date, time)
          VALUES ('$name', '$service', '$date', '$time')";

  if ($conn->query($sql)) {
    header("Location: appointments.php");
  } else {
    echo "Error: " . $conn->error;
  }
}
?>
