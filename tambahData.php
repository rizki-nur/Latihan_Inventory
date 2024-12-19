<?php 
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "latihan_inventory");

//cek apakah tombol submit sudah ditekan
// if( isset($_POST["submit"]) ) {
//     // var_dump($_POST);
//     //ambil data dari setiap elemen dalam form
//     $nama = $_POST["nama"];
//     $umur = $_POST["umur"];
//     $npm = $_POST["npm"];

//     //query insert data
//     $query = "INSERT INTO mahasiswa VALUES
//             ('', $nama', '$umur', '$npm')";
//     mysqli_query($conn, $query);
// } // ERROR, SYNTAX BEDA VERSI

//koneksi ke database
$conn = new mysqli("localhost", "root", "", "latihan_inventory");

//logic tambah data
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $nama = $_POST['nama'];
    $umur = $_POST['umur'];
    $npm = $_POST['npm'];

    $query = "INSERT INTO mahasiswa (nama, umur, npm)
              VALUES ('$nama', '$umur', '$npm')";

    if ($conn->query($query) === TRUE) {
        echo "
            <script>
                alert('Data Berhasil Ditambah');
                document.location.href = 'tambahData.php';
            </script>
        ";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

// ADD DATA DALAM FUNGSI
// function tambahData($data) {
//     global $conn;

//     $nama = $data['nama'];
//     $umur = $data['umur'];
//     $npm = $data['npm'];

//     $query = "INSERT INTO mahasiswa (nama, umur, npm)
//                VALUES ('$nama', '$umur', '$npm')";

//     if ($conn->query($query) === TRUE) {
//         echo "
//             <script>
//                 alert('Data Berhasil Ditambah');
//                 document.location.href = 'tambahData.php';
//             </script>
//         ";
//         } else {
//             echo "Error: " . $query . "<br>" . $conn->error;
//         }
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data Mahasiswa</title>
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="umur">Umur : </label>
                <input type="text" name="umur" id="umur">
            </li>
            <li>
                <label for="npm">NPM : </label>
                <input type="text" name="npm" id="npm">
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>