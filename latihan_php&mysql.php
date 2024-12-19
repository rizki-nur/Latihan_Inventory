<?php 

    require 'functionUntukPhpMySql.php';
    $mahasiswa = query("SELECT * FROM mahasiswa ORDER BY id ASC");

    //tombol search ditekan
    if ( isset($_POST["formSearch"]) ) {
        $mahasiswa = formSearch($_POST["keyword"]);
    }

    //ambil dari table mahasiswa
    //$result = mysqli_query($conn, "SELECT * FROM dataMahasiswa");
    // jangan mencetak output $result langsung menggunakan echo

    //fetch data mahasiswa dari objek result
    //mysqli_fetch_row() hanya array numerik
    //mysqli_fetch_assoc() hanya array assosiatif
    //mysqli_fetch_array() keduanya
    //mysqli_fetch_object() objek

    //menampilkan salahsatu nama
    // echo "menampilkan salah satu nama : <br>";
    // $mhs = mysqli_fetch_assoc($result);
    // var_dump($mhs["nama"]);

    echo "<br>";

    //menampilkan beberapa nama sekaligus
    // echo "menampilkan data nama-nama sekaligus : <br>";
    // while ($mhs = mysqli_fetch_assoc($result)) {
    //     var_dump($mhs["nama"]); 
        //["nama"] digunakan sebagai objek yang akan dikeluarkan
        //jika ["nama"] nya dihapus maka semua value selain nama akan keluar 
    // }

    echo "<br>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

    
    <h1>Daftar Mahasiswa</h1>
    <p>Belajar PHP MySQL</p>

    <a href="tambahData.php">Tambah Data Mahasiswa</a>
    <br><br>

    <form action="" method="post">

        <input type="text" name="keyword" size="30" autofocus placeholder="search..." autocomplete="off">
        <button type="submit" name="formSearch">cari</button>

    </form>

    <table border="1" cellpadding="10" cellspacing="0">
        
        <tr>
            <td>No.</td>
            <td>Aksi</td>
            <td>Nama</td>
            <td>Umur</td>
            <td>NPM</td>
        </tr>

        <?php $i = 1; ?> 
        <?php foreach ($mahasiswa as $row) : ?>
        <tr>
            <td><?= $i ?></td>
            <td>
                <a href="">Ubah</a> |
                <a href="hapusData.php?id=<?= $row["id"]; ?>" onclick=" //memberi konfirmasi pada user
                return confirm('Anda ingin menghapus data?');">Hapus</a> 
            </td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["umur"]; ?></td>
            <td><?= $row["npm"]; ?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>

    </table>

</body>
</html>