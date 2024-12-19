<?php 

//koneksi database
$conn = mysqli_connect("localhost", "root", "", 
"latihan_inventory");

function query($query) {
    global $conn; //ngambil variable diluar function
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}

function hapusDat($id){
    global $conn;

    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function formSearch($keyword) {
    $query = "SELECT * FROM mahasiswa 
                WHERE 
            nama LIKE '%$keyword%' OR
            umur LIKE '%$keyword%' OR
            npm LIKE '%$keyword%'
    "; //atribut "LIKE" dan "%" digunakan agar bisa mencari dengan sepatah kata

    return query($query);
}
?>