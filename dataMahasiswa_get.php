<?php 
$dataMahasiswa = [
    [
        "nama" => "Rani",
        "umur" => "19",
        "npm" => "212310001"
    ],
    [
        "nama" => "Hana",
        "umur" => "17",
        "npm" => "212310002"
    ],
    [
        "nama" => "Yasir",
        "umur" => "17",
        "npm" => "212310003"
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Data Mahasiswa Untuk Dikirim</h1>
    <ul>
        <?php foreach($dataMahasiswa as $dataMhs) : ?>
            <li>
                <a href="latihan_get-post.php?
                nama=<?= $dataMhs["nama"]; ?>
                &umur=<?= $dataMhs["umur"]; ?>
                &npm=<?= $dataMhs["npm"]; ?>
                "><?= $dataMhs["nama"]; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>