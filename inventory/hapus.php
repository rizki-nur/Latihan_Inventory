<?php 
//koneksi database produk
$conn = mysqli_connect("localhost", "root", "", 
"inventory_db");

//logic hapus produk
function hapusProd($idProd){
    global $conn;

    //kode untuk hapus menggunakan query mysql
    mysqli_query($conn, "DELETE FROM products WHERE id = $idProd" );
    
    //update kondisi terkini setelah dihapus
    return mysqli_affected_rows($conn); 
}

//Validasi input id
$idProd = (isset($_GET["id"])) ? intval($_GET["id"]) : 0;

//Validari data terhapus
if ($idProd > 0) {
    if (hapusProd( $idProd ) > 0) {
        echo "
            <script>
                alert('Product Berhasil Dihapus');
                document.location.href = 'list_produk.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Product Gagal Dihapus');
                document.location.href = 'list_produk.php';
            </script>
        ";
    }
}
?>