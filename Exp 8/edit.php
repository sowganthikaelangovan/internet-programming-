<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "connection1";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM hospital1 WHERE id = $id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $conn->real_escape_string($_POST['fullname']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $department = $conn->real_escape_string($_POST['department']);
    $appointment_date = $conn->real_escape_string($_POST['appointment_date']);
    $time_slot = $conn->real_escape_string($_POST['time_slot']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "UPDATE hospital1 SET 
        fullname='$fullname',
        email='$email',
        phone='$phone',
        department='$department',
        appointment_date='$appointment_date',
        time_slot='$time_slot',
        message='$message'
        WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Update failed: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Appointment</title>
    <link rel="stylesheet" href="styling.css">
</head>
<body>
<div class="form-container">
    <h2>Edit Appointment</h2>
    <form method="POST">
        <input type="text" name="fullname" value="<?= $row['fullname'] ?>" required>
        <input type="email" name="email" value="<?= $row['email'] ?>" required>
        <input type="tel" name="phone" value="<?= $row['phone'] ?>" required>
        <select name="department" required>
            <option <?= $row['department']=='Cardiology' ? 'selected' : '' ?>>Cardiology</option>
            <option <?= $row['department']=='Orthopedics' ? 'selected' : '' ?>>Orthopedics</option>
            <option <?= $row['department']=='Pediatrics' ? 'selected' : '' ?>>Pediatrics</option>
            <option <?= $row['department']=='General' ? 'selected' : '' ?>>General</option>
        </select>
        <input type="date" name="appointment_date" value="<?= $row['appointment_date'] ?>" required>
        <select name="time_slot" required>
            <option <?= $row['time_slot']=='09:00 AM - 10:00 AM' ? 'selected' : '' ?>>09:00 AM - 10:00 AM</option>
            <option <?= $row['time_slot']=='10:00 AM - 11:00 AM' ? 'selected' : '' ?>>10:00 AM - 11:00 AM</option>
            <option <?= $row['time_slot']=='11:00 AM - 12:00 PM' ? 'selected' : '' ?>>11:00 AM - 12:00 PM</option>
            <option <?= $row['time_slot']=='02:00 PM - 03:00 PM' ? 'selected' : '' ?>>02:00 PM - 03:00 PM</option>
            <option <?= $row['time_slot']=='03:00 PM - 04:00 PM' ? 'selected' : '' ?>>03:00 PM - 04:00 PM</option>
        </select>
        <textarea name="message" rows="4"><?= $row['message'] ?></textarea>
        <button type="submit">Update Appointment</button>
    </form>
</div>
</body>
</html>

<?php $conn->close(); ?>
