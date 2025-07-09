<?php include("connection.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <title>View Bookings - SwiftRail</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
  <h1>Your Bookings</h1>
  <nav>
    <a href="index.html">Home</a>
    <a href="book.php">Book Ticket</a>
    <a href="view.php">View Bookings</a>
  </nav>
</header>

<main>
  <section>
    <h2>All Booked Tickets</h2>
    <table border="1" width="100%" cellpadding="10">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>From</th>
        <th>To</th>
        <th>Date</th>
      </tr>
      <?php
      $result = $conn->query("SELECT * FROM bookings");
      while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['from_station']}</td>
                <td>{$row['to_station']}</td>
                <td>{$row['journey_date']}</td>
              </tr>";
      }
      ?>
    </table>
  </section>
</main>
</body>
</html>
