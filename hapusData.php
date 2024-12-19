<?php 
require 'functionUntukPhpMySql.php';

// Validasi input id
$id = isset($_GET["id"]) ? intval($_GET["id"]) : 0;

if ($id > 0) {
    if (hapusDat($id) > 0) {
        echo "
            <script>
                alert('Data Berhasil Dihapus');
                document.location.href = 'latihan_php&mysql.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Gagal Dihapus');
                document.location.href = 'latihan_php&mysql.php';
            </script>
        ";
    }
} else {
    echo "
        <script>
            alert('ID tidak valid!');
            document.location.href = 'latihan_php&mysql.php';
        </script>
    ";
}
?>
