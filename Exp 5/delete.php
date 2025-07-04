<?php
include("connection.php");

if (isset($_GET['id'])) {
  $id = intval($_GET['id']);
  $conn->query("DELETE FROM flights WHERE id = $id");
}

header("Location: view.php");
?>
