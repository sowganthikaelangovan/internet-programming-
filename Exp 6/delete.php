<?php
include("connection.php");
if (isset($_GET['id'])) {
  $id = intval($_GET['id']);
  $conn->query("DELETE FROM orders WHERE id = $id");
}
header("Location: view.php");
?>
