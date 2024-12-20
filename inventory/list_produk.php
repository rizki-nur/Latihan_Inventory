<?php
require 'hapus.php';

$conn = new mysqli("localhost", "root", "", "inventory_db");

$query = "SELECT * FROM products";
$result = $conn->query($query);

$products = [];
while ($row = $result->fetch_assoc()) {
    $products[] = $row; // menyimpan hasil query ke array $products
}
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
            <th>Aksi</th>
        </tr>
        <?php foreach ($products as $index => $row) : ?>
            <tr>
                <td><?= $index + 1; ?></td>
                <td><?= htmlspecialchars($row["product_code"]); ?></td>
                <td><?= htmlspecialchars($row["product_name"]); ?></td>
                <td><?= htmlspecialchars($row["category"]); ?></td>
                <td><?= htmlspecialchars($row["unit"]); ?></td>
                <td><?= htmlspecialchars($row["purchase_price"]); ?></td>
                <td><?= htmlspecialchars($row["selling_price"]); ?></td>
                <td><?= htmlspecialchars($row["stock"]); ?></td>
                <td>
                    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Anda ingin menghapus data?');">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>

        <?php if (empty($products)) : ?>
            <tr>
                <td colspan="9" style="text-align: center;">Data tidak tersedia</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>
