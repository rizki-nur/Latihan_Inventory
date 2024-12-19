<h3>variable scope</h3>
<?php 
$x = 10;
echo "Memanggil Variable secara langsung : ";
echo $x;
echo "<br>";
//lingkungan diluar function tidak bisa menyatu dengan dalam function
function tampilkanY(){
    $y = 20;
    echo $y;
}
echo "Memanggil Variable dengan function : ";
//panggil function :
tampilkanY();
echo "<br>";
//cara menampilkan variable dari luar ke dalam function :
function tampilkanX(){
    global $x; //untuk mencari variable $x diluar function   
    echo $x;
}
//memanggil function :
echo "Memanggil Variable dari luar, kedalam function : ";
tampilkanX();
echo "<br>";
?>

<h3>SUPERGLOBAL</h3>
<?php 
var_dump($_POST); echo "<br>"; //menampilkan isi $_POST
echo $_SERVER["SERVER_NAME"]; echo "<br>"; //menampilkan salahsatu isi  $_SERVER

?>

<br>
<h3>$_GET</h3>
<?php 
//$_GET["nama"] = "Felix"; //memasukan value nama ke dalam array $_GET
//$_GET["npm"] = "212310039";
var_dump($_GET);
?>

<h3>Menerima & Menangkap Data dari dataMahasiswa.php</h3>
<h4>Data Mahasiswa : </h4> <!-- Memanfaatkan SUPERGLOBALS $_GET -->
<ul>
    <li><?= $_GET["nama"]; ?></li> 
    <li><?= $_GET["umur"]; ?></li>
    <li><?= $_GET["npm"]; ?></li>
</ul>

<a href="dataMahasiswa_get.php">Lihat Daftar</a>

