<?php include("connection.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Your Bookings | SkyReserve</title>
  <link rel="stylesheet" href="flight-style.css">
</head>
<body>
<header>
  <h1>Your Flight Bookings</h1>
  <nav>
    <a href="index.html">Home</a>
    <a href="book.html">Book Flight</a>
    <a href="view.php">Your Bookings</a>
    <a href="contact.html">Contact</a>
  </nav>
</header>

<main>
  <section>
    <h2>Booked Flights</h2>
    <table>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>From</th>
        <th>To</th>
        <th>Date</th>
        <th>Class</th>
        <th>Action</th>
      </tr>
      <?php
        $result = $conn->query("SELECT * FROM flights");
        while($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>{$row['id']}</td>
                  <td>{$row['fullname']}</td>
                  <td>{$row['from_city']}</td>
                  <td>{$row['to_city']}</td>
                  <td>{$row['journey_date']}</td>
                  <td>{$row['flight_class']}</td>
                  <td><a href='delete.php?id={$row['id']}' class='btn small'>Cancel</a></td>
                </tr>";
        }
      ?>
    </table>
  </section>
</main>
</body>
</html>
