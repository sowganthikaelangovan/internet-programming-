<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "connection1";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM hospital1 WHERE id = $id");
    header("Location: admin.php");
    exit();
}

$result = $conn->query("SELECT * FROM hospital1 ORDER BY appointment_date DESC, time_slot ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - View Appointments</title>
    <link rel="stylesheet" href="styling.css">
    <style>
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #5a67d8;
            color: white;
        }
        a.delete-btn {
            color: red;
            text-decoration: none;
            font-weight: bold;
        }
        .container {
            max-width: 90%;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>All Appointments</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Department</th>
                <th>Date</th>
                <th>Time Slot</th>
                <th>Message</th>
                <th>Booked At</th>
                <th>Action</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['fullname']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['phone']) ?></td>
                <td><?= htmlspecialchars($row['department']) ?></td>
                <td><?= $row['appointment_date'] ?></td>
                <td><?= htmlspecialchars($row['time_slot']) ?></td>
                <td><?= htmlspecialchars($row['message']) ?></td>
                <td><?= $row['created_at'] ?></td>
                <td>
    <a href="edit.php?id=<?= $row['id'] ?>" class="edit-btn">Edit</a> |
    <a href="?delete=<?= $row['id'] ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
</td>


            </tr>
            <?php endwhile; ?>
        </table>
    </div>
    <div class="back-home">
    <a href="homepage.html"><button>🏠 Back to Homepage</button></a>
</div>

</body>
</html>
<?php $conn->close(); ?>
