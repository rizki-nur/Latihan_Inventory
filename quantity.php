<?php
$conn = new mysqli("localhost", "root", "", "inventory_db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_code = $_POST['product_code'];
    $quantity = $_POST['quantity'];

    // Get the current stock of the product
    $query = "SELECT stock FROM products WHERE product_code='$product_code'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $new_stock = $row['stock'] + $quantity;

        // Update the stock quantity
        $update_query = "UPDATE products SET stock='$new_stock' WHERE product_code='$product_code'";
        if ($conn->query($update_query) === TRUE) {
            echo "Quantity berhasil ditambahkan!";
        } else {
            echo "Error: " . $update_query . "<br>" . $conn->error;
        }
    } else {
        echo "Produk tidak ditemukan!";
    }
}
?>
