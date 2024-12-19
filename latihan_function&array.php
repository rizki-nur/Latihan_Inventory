//Build in Function
<?php 

//mengirim parameter berupa variable $nama 👇 
function salam($nama = "Rizki"){ // variable &nama diberi isian default "Rizki"
    return "Ini Latihan Function, $nama";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Function</title>
</head>
<br>
    <h1><?= salam("Broo"); ?></h1>

    <h3>Buat Array</h3>
    <?php 
    $hari = ["senin", "selasa", "rabu"];
    print_r($hari); //menampilkan array cara 1
    echo "<br>"; 
    var_dump($hari); //menampilkan array cara 2
    echo "<br>";
    ?>
    
    <h3>Membuat Array dan menampilkannya secara normal</h3>
    <?php $angka = [1,2,3,4,5,6,7,8]; ?>
    <?php for($i = 0; $i < count($angka); $i++) : ?>
        <?= "$angka[$i]" ?>
    <?php endfor; ?>

    <h3>Foreach (lebih fleksibel digunakan)</h3> 
    <?php foreach ($angka as $a) : ?>
        <div style="float:left"><?php echo $a; ?></div>
    <?php endforeach; ?>
    <br>
    
    <h4>Datadiri</h4>
    <?php $datadiri = ["Nama : Jhon", "Umur : 20", "Lahir : 17-09-2002", "Alamat : Bogor"]?>
    //untuk menampilkan array tunggal
    <ul>
        <?php foreach ($datadiri as $data) : ?>
            <li><?php echo $data; ?></li>        
        <?php endforeach; ?>
    </ul>
    <br>

    <h4>DataMahasiswa</h4>
    <?php $data_mahasiswa = [
        [
            "Nama : Ray", 
            "Prodi : TI", 
            "Angkatan : 2022" 
        ],
        [
            "Nama : Zian", 
            "Prodi : SI", 
            "ANgkatan : 2021"
        ], 
        [
            "Nama : Rafi", 
            "Prodi : AKN", 
            "Angkatan : 2021"
        ]
    ]?>
    //untuk menampilkan array banyak
    <?php foreach ($data_mahasiswa as $mhs) : ?>
        <ul>
            <li><?= $mhs[0]; ?></li>
            <li><?= $mhs[1]; ?></li>
            <li><?= $mhs[2]; ?></li>
        </ul>
    <?php endforeach; ?>
    
    <h3>Assosiatif Array</h3>
    <?php
    $hari = array("senin", "selasa", "Rabu");
    $bulan = ["januari", "februari", "maret"];
    $arr = [100, "string", true];
    //menampilkan array versi debugging
    var_dump($hari);
    echo "<br>";
    print_r($bulan);
    echo "<br>";
    //menampilkan sati elemen pada array
    echo $arr[0];
    ?>

    <h3>Wujud Aseli Assosiative Array</h3>
    <?php 
    //definisinya sama seperti array nummerik, kecuali
    //key-nya adalah string yang dibuat sendiri :
    $dataArr = [
        "nama" => "John Doe",
        "umur" => "21",
        "alamat" => "bogor" 
    ];
    //menampilkan data ArrayAssosiative
    echo $dataArr["nama"]; //John Doe
    echo "<br>";
    //menampilkan data yang banyak / multidimensi
    $arrMulti = [
        [
            "nama" => "Rani",
            "umur" => "19",
            "alamat" => "Jakarta"
        ],
        [
            "nama" => "Hana",
            "umur" => "17",
            "alamat" => "Jakarta"
        ]
    ];
    //menampilkan data Array Assosiative Multidimensi
    echo $arrMulti[1]["nama"]; //cetak sub-array ke 1 index nama (Hana)
    echo "<br>";
    echo "<br>";
    
    ?>
    
    <h4>Menampilkan Semua Data Array Assosiative</h4>
    <?php foreach ($arrMulti as $arrMlt) : ?>
        <ul>
            <li> <?= $arrMlt["nama"] ?> </li>
            <li> <?= $arrMlt["umur"] ?> </li>
            <li> <?= $arrMlt["alamat"] ?> </li>
        </ul>
    <?php endforeach; ?>

    <h3>Mencetak Array Multidimensi</h3>
    <h4>Tanpa Foreach</h4>
    <?php 
    $Array = [[1,2,3],[4,5,6],[7,8,9]];
    //mengambil nilai array
    echo $Array[1][0]; //menampilkan kolom ke 2 index ke 1 
    ?>

    <h4>Dengan Foreach</h4>
    <?php foreach ($Array as $i) : ?>
        <?php foreach ($i as $j) : ?>
            <div style="float:left"> <?= $j; ?> </div>
        <?php endforeach; ?>
    <?php endforeach; ?>
    //Logika
    //1. Inisialisasi Array: $Array adalah array multidimensi yang berisi tiga sub-array dengan tiga elemen angka masing-masing.
    //2. Foreach Loop Pertama: foreach ($Array as $i) mengulangi setiap sub-array dalam $Array. Variabel $i mewakili setiap sub-array.
    //3. Foreach Loop Kedua: foreach ($i as $j) mengulangi setiap elemen dalam sub-array $i. Variabel $j mewakili setiap elemen angka.
    //4. Pengeluaran: "<div style="float:left"><?= $j ?></div>" menampilkan setiap angka $j dalam elemen <div> dengan gaya CSS float:left, sehingga angka-angka tersebut ditampilkan secara horizontal.


</body>
</html>