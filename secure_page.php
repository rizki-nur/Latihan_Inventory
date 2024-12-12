<?php
session_start();

if (!isset($_SESSION['role'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Home</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['role']; ?>!</h1>
    <ul>
      <li><a href="logout.php" class="logout-btn">Log out</a></li>
        <li><a href="input.html">Input Produk</a></li>
        <li><a href="quantity.html">Tambah Quantity</a></li>
        <li><a href="list_produk.php">Daftar Produk</a></li>
    </ul>
</body>
</html>
