<?php
$conn = new mysqli("localhost", "root", "1234", "inventory_db");

if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Koneksi ke database gagal!']));
}

$action = $_GET['action'] ?? '';

if ($action === 'list') {
    // Ambil semua kategori
    $query = "SELECT * FROM categories ORDER BY name";
    $result = $conn->query($query);
    $categories = [];
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }
    echo json_encode($categories);
} elseif ($action === 'add') {
    // Tambah kategori baru
    $category_name = $_POST['category_name'] ?? '';
    if ($category_name) {
        $query = $conn->prepare("INSERT INTO categories (name) VALUES (?)");
        $query->bind_param("s", $category_name);
        if ($query->execute()) {
            echo json_encode(['success' => true, 'message' => 'Kategori berhasil ditambahkan!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Gagal menambahkan kategori atau kategori sudah ada!']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Nama kategori tidak boleh kosong!']);
    }
}

$conn->close();
?>
