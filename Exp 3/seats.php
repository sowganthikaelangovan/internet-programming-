<?php
include 'connections.php'; 
$date = $_GET['date'];
$bookedSeats = [];

$result = $conn->query("SELECT seat_number FROM bus1 WHERE travel_date = '$date'");
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $bookedSeats[] = $row['seat_number'];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Select Seat - SwiftBus</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .seat-grid {
            display: grid;
            grid-template-columns: repeat(4, 60px);
            gap: 10px;
            justify-content: center;
            margin-top: 20px;
        }
        .seat {
            padding: 15px;
            background: #ccc;
            text-align: center;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }
        .seat.selected {
            background: #388e3c;
            color: white;
        }
        .seat.occupied {
            background: #d32f2f;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <header><h1>Select Your Seat - SwiftBus</h1></header>
    <section class="form-section">
        <form action="register.html" method="GET" onsubmit="return validateSeat()">
            <input type="hidden" name="seat" id="seat" required>
            <input type="hidden" name="date" value="<?php echo $date; ?>">

            <div class="seat-grid">
                <?php
                for ($i = 1; $i <= 16; $i++) {
                    $class = in_array((string)$i, $bookedSeats) ? 'seat occupied' : 'seat';
                    $onclick = $class === 'seat' ? "onclick='selectSeat(this)'" : '';
                    echo "<div class=\"$class\" $onclick>$i</div>";
                }
                ?>
            </div>

            <button type="submit">Continue</button>
        </form>
    </section>

    <script>
        let selectedSeat = null;
        function selectSeat(seatElement) {
            if (seatElement.classList.contains('occupied')) return;
            if (selectedSeat) selectedSeat.classList.remove('selected');
            seatElement.classList.add('selected');
            selectedSeat = seatElement;
            document.getElementById("seat").value = seatElement.innerText;
        }

        function validateSeat() {
            if (!selectedSeat) {
                alert("Please select a seat.");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
