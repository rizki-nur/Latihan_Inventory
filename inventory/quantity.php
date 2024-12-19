<?php
$conn = new mysqli("localhost", "root", "1234", "inventory_db");

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'] ?? '';
    $quantity = $_POST['quantity'] ?? 0;

    // Validasi input
    if (empty($product_name) || !is_numeric($quantity) || $quantity <= 0) {
        echo "Input tidak valid!";
        exit;
    }

    // Gunakan prepared statement untuk keamanan
    $query = $conn->prepare("SELECT stock FROM products WHERE product_name = ?");
    $query->bind_param("s", $product_name);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $new_stock = $row['stock'] + $quantity;

        // Update stock
        $update_query = $conn->prepare("UPDATE products SET stock = ? WHERE product_name = ?");
        $update_query->bind_param("is", $new_stock, $product_name);

        if ($update_query->execute()) {
            echo "Quantity berhasil ditambahkan!";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Produk tidak ditemukan!";
    }

    // Tutup prepared statement
    $query->close();
    $update_query->close();
}

// Tutup koneksi
$conn->close();
?>
