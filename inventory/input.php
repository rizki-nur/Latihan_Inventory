<?php
$conn = new mysqli("localhost", "root", "", "inventory_db");

if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Koneksi ke database gagal!']));
}

// Tangkap data dari form
$product_code = $_POST['product_code'] ?? '';
$product_name = $_POST['product_name'] ?? '';
$category = $_POST['category'] ?? '';
$unit = $_POST['unit'] ?? '';
$purchase_price = $_POST['purchase_price'] ?? 0;
$selling_price = $_POST['selling_price'] ?? 0;
$stock = $_POST['stock'] ?? 0;

// Validasi kode barang
$query_code = $conn->prepare("SELECT * FROM products WHERE product_code = ?");
$query_code->bind_param("s", $product_code);
$query_code->execute();
$result_code = $query_code->get_result();

if ($result_code->num_rows > 0) {
    echo json_encode(['success' => false, 'message' => 'Kode barang sudah digunakan!']);
    exit;
}

// Validasi nama barang
$query_name = $conn->prepare("SELECT * FROM products WHERE product_name = ?");
$query_name->bind_param("s", $product_name);
$query_name->execute();
$result_name = $query_name->get_result();

if ($result_name->num_rows > 0) {
    echo json_encode(['success' => false, 'message' => 'Nama barang sudah digunakan!']);
    exit;
}

// Insert produk baru
$insert = $conn->prepare("INSERT INTO products (product_code, product_name, category, unit, purchase_price, selling_price, stock) VALUES (?, ?, ?, ?, ?, ?, ?)");
$insert->bind_param("ssssddi", $product_code, $product_name, $category, $unit, $purchase_price, $selling_price, $stock);

if ($insert->execute()) {
    echo json_encode(['success' => true, 'message' => 'Produk berhasil ditambahkan!']);
} else {
    echo json_encode(['success' => false, 'message' => 'Gagal menambahkan produk!']);
}

//$category_id = $_POST['category'] ?? null;

// Validasi kategori
//if (!$category_id) {
    //echo json_encode(['success' => false, 'message' => 'Kategori harus dipilih!']);
    //exit;

// Ambil nama kategori dari ID
// Ambil data produk dengan nama kategori
$query_products = $conn->prepare("
  SELECT p.product_name, c.category_name 
  FROM products p
  JOIN categories c ON p.category = c.category_id
");
$query_products->execute();
$result_products = $query_products->get_result();

while ($row = $result_products->fetch_assoc()) {
  echo "Product: " . $row['product_name'] . " - Category: " . $row['category_name'] . "<br>";
}


$conn->close();
?>
