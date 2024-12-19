<?php
$conn = new mysqli("localhost", "root", "", "inventory_db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_code = $_POST['product_code'];
    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $unit = $_POST['unit'];
    $purchase_price = $_POST['purchase_price'];
    $selling_price = $_POST['selling_price'];
    $stock = $_POST['stock'];

    $query = "INSERT INTO products (product_code, product_name, category, unit, purchase_price, selling_price, stock)
              VALUES ('$product_code', '$product_name', '$category', '$unit', '$purchase_price', '$selling_price', '$stock')";

    if ($conn->query($query) === TRUE) {
        echo "New product added successfully!";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>
