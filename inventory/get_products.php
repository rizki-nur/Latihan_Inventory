<?php
$conn = new mysqli("localhost", "root", "", "inventory_db");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$query = "SELECT product_name FROM products";
$result = $conn->query($query);

$products = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row['product_name'];
    }
}

header('Content-Type: application/json');
echo json_encode($products);

$conn->close();
?>
