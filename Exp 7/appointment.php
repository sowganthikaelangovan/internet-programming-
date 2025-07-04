<?php include("connection.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Appointments | GlowUp Studio</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
  <h1>All Appointments</h1>
  <nav>
    <a href="index.html">Home</a>
    <a href="book.html">Book Appointment</a>
    <a href="appointments.php">View Appointments</a>
  </nav>
</header>

<main>
  <section>
    <h2>Customer Bookings</h2>
    <table>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Service</th>
        <th>Date</th>
        <th>Time</th>
        <th>Action</th>
      </tr>
      <?php
        $result = $conn->query("SELECT * FROM appointments");
        while($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>{$row['id']}</td>
                  <td>{$row['name']}</td>
                  <td>{$row['service']}</td>
                  <td>{$row['date']}</td>
                  <td>{$row['time']}</td>
                  <td><a href='delete.php?id={$row['id']}' class='btn small'>Delete</a></td>
                </tr>";
        }
      ?>
    </table>
  </section>
</main>
</body>
</html>
