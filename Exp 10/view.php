<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "feedback_db";

$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM feedback ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
  <title>View Feedback</title>
  <style>
    body { font-family: Arial; background-color: #f0f8ff; padding: 40px; text-align: center; }
    table { margin: auto; border-collapse: collapse; background: #fff; box-shadow: 0 4px 8px rgba(0,0,0,0.2); }
    th, td { border: 1px solid #ccc; padding: 12px; }
    th { background-color: #4CAF50; color: white; }
    tr:nth-child(even) { background-color: #f9f9f9; }
    a { text-decoration: none; color: #4CAF50; }
  </style>
</head>
<body>
  <h2>All Feedback Entries</h2>
  <table>
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Course</th>
      <th>Feedback</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?= $row['id'] ?></td>
      <td><?= htmlspecialchars($row['name']) ?></td>
      <td><?= htmlspecialchars($row['course']) ?></td>
      <td><?= htmlspecialchars($row['feedback']) ?></td>
    </tr>
    <?php endwhile; ?>
  </table>
  <p><a href="feedback.html">Submit New Feedback</a></p>
</body>
</html>

<?php
$conn->close();
?>

