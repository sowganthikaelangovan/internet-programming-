<?php include("connection.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <title>View Orders | Sweet Treats</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
  <h1>Customer Orders</h1>
  <nav>
    <a href="index.html">Home</a>
    <a href="order.html">Order Cake</a>
    <a href="view.php">View Orders</a>
  </nav>
</header>

<main>
  <section>
    <h2>All Cake Orders</h2>
    <table>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Cake</th>
        <th>Size</th>
        <th>Delivery Date</th>
        <th>Action</th>
      </tr>
      <?php
        $result = $conn->query("SELECT * FROM orders");
        while($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>{$row['id']}</td>
                  <td>{$row['name']}</td>
                  <td>{$row['cake']}</td>
                  <td>{$row['size']}</td>
                  <td>{$row['delivery_date']}</td>
                  <td><a href='delete.php?id={$row['id']}' class='btn small'>Delete</a></td>
                </tr>";
        }
      ?>
    </table>
  </section>
</main>
</body>
</html>
