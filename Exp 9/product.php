<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$host = "localhost";
$user = "root";
$password = "";
$db = "gadget_store";

$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch products
$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Products - GadgetStore</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 0; background-color: #f5f5f5;}
    header { background-color: #212121; color: #fff; padding: 20px; display: flex; justify-content: space-between; align-items: center; }
    header h1 { margin: 0; }
    header nav a { color: #fff; margin-left: 20px; text-decoration: none; }
    .container { max-width: 1200px; margin: 40px auto; padding: 20px; display: flex; flex-wrap: wrap; gap: 20px; justify-content: center; }
    .product { background: #fff; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); width: 280px; text-align: center; padding: 20px; }
    .product img { width: 100%; height: 200px; object-fit: cover; border-radius: 5px; }
    .product h3 { margin: 10px 0; }
    .product p { color: #555; }
    .product .price { font-size: 20px; color: #ff9800; }
    .product form button { margin-top: 10px; background-color: #ff9800; border: none; color: white; padding: 10px 20px; border-radius: 5px; cursor: pointer;}
    .product form button:hover { background-color: #e65100; }
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
    <?php while ($row = $result->fetch_assoc()): ?>
      <div class="product">
        <img src="<?= htmlspecialchars($row['image_url']) ?>" alt="<?= htmlspecialchars($row['name']) ?>">
        <h3><?= htmlspecialchars($row['name']) ?></h3>
        <p><?= htmlspecialchars($row['description']) ?></p>
        <div class="price">$<?= htmlspecialchars($row['price']) ?></div>
        <form action="cart.php" method="POST">
          <input type="hidden" name="product_id" value="<?= $row['id'] ?>">
          <button type="submit">Add to Cart</button>
        </form>
      </div>
    <?php endwhile; ?>
  </div>
</body>
</html>

<?php
$conn->close();
?>