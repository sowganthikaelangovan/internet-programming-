<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "feedback_db";

// Connect
$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$course = $_POST['course'];
$feedback = $_POST['feedback'];

// Insert
$sql = "INSERT INTO feedback (name, course, feedback) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $course, $feedback);
$stmt->execute();
$stmt->close();
$conn->close();

echo "<h2 style='text-align:center;color:green;'>Feedback Submitted!</h2>";
echo "<p style='text-align:center;'><a href='feedback.html'>Submit Another</a> | <a href='view_feedback.php'>View Feedback</a></p>";
?>
