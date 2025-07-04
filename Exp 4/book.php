<?php include("connection.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Book Train - SwiftRail</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
  <h1>Book Ticket</h1>
  <nav>
    <a href="index.html">Home</a>
    <a href="book.php">Book Ticket</a>
    <a href="view.php">View Bookings</a>
  </nav>
</header>

<main>
  <section>
    <h2>Enter Journey Details</h2>
    <form method="POST">
      <label>Passenger Name:</label><br>
      <input type="text" name="name" required><br><br>

      <label>From:</label><br>
      <input type="text" name="from_station" required><br><br>

      <label>To:</label><br>
      <input type="text" name="to_station" required><br><br>

      <label>Date:</label><br>
      <input type="date" name="date" required><br><br>

      <input type="submit" name="submit" value="Book Now" class="btn">
    </form>
  </section>
</main>

<?php
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $from = $_POST['from_station'];
  $to = $_POST['to_station'];
  $date = $_POST['date'];

  $sql = "INSERT INTO bookings (name, from_station, to_station, journey_date)
          VALUES ('$name', '$from', '$to', '$date')";

  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Booking Successful');</script>";
  } else {
    echo "Error: " . $conn->error;
  }
}
?>
</body>
</html>
