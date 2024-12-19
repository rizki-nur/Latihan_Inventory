<?php
$conn = new mysqli("localhost", "root", "", "inventory_db");

$query = "SELECT * FROM products";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Unit</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Stok</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            $no = 1;
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $no . "</td>
                    <td>" . $row["product_code"] . "</td>
                    <td>" . $row["product_name"] . "</td>
                    <td>" . $row["category"] . "</td>
                    <td>" . $row["unit"] . "</td>
                    <td>" . $row["purchase_price"] . "</td>
                    <td>" . $row["selling_price"] . "</td>
                    <td>" . $row["stock"] . "</td>
                </tr>";
                $no++;
            }
        }
        ?>
    </table>
</body>
</html>