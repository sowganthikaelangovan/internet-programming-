<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$db = "gadget_store";

$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'])) {
  $_SESSION['cart'][] = $_POST['product_id'];
}

$cart_items = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Your Cart - GadgetStore</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 0; background-color: #f5f5f5;}
    header { background-color: #212121; color: #fff; padding: 20px; display: flex; justify-content: space-between; }
    header a { color: #fff; margin-left: 20px; text-decoration: none; }
    .container { max-width: 800px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);}
    h2 { text-align: center; color: #212121;}
    table { width: 100%; border-collapse: collapse; margin-top: 20px;}
    th, td { border: 1px solid #ddd; padding: 12px; text-align: left;}
    th { background-color: #ff9800; color: white;}
    tr:nth-child(even) { background-color: #f9f9f9;}
    .total { text-align: right; margin-top: 20px; font-size: 20px; color: #ff9800;}
  </style>
</head>
<body>
  <header>
    <h1>GadgetStore</h1>
    <nav>
      <a href="index.html">Home</a>
      <a href="products.php">Products</a>
      <a href="cart.php">Cart</a>
    </nav>
  </header>
  <div class="container">
    <h2>Your Shopping Cart</h2>
    <?php if (empty($cart_items)): ?>
      <p>Your cart is empty. <a href="products.php">Shop Now</a></p>
    <?php else: ?>
      <table>
        <tr>
          <th>Product</th>
          <th>Price</th>
        </tr>
        <?php
          $total = 0;
          foreach ($cart_items as $id) {
            $result = $conn->query("SELECT * FROM products WHERE id = $id");
            if ($row = $result->fetch_assoc()) {
              echo "<tr><td>".htmlspecialchars($row['name'])."</td><td>$".htmlspecialchars($row['price'])."</td></tr>";
              $total += $row['price'];
            }
          }
        ?>
      </table>
      <div class="total">Total: $<?= number_format($total, 2) ?></div>
    <?php endif; ?>
  </div>
</body>
</html>

<?php
$conn->close();
?>
 