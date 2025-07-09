<?php
include("connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $cake = $_POST['cake'];
  $size = $_POST['size'];
  $date = $_POST['delivery_date'];

  $sql = "INSERT INTO orders (name, cake, size, delivery_date)
          VALUES ('$name', '$cake', '$size', '$date')";

  if ($conn->query($sql)) {
    header("Location: view.php");
  } else {
    echo "Error: " . $conn->error;
  }
}
?>
