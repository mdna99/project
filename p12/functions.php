<?php
$username_db = "root";
$password_db = "root";
$host_db = "localhost";
$nama_db = "latihan";

$conn = mysqli_connect($host_db,$username_db,$password_db,$nama_db);


function query($query) {
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    global $conn;

    $nama = htmlspecialchars($_POST["nama"]);
    $nim = htmlspecialchars($_POST["nim"]);
    $jurusan = htmlspecialchars($_POST["jurusan"]);

    $query = "INSERT INTO `db_mhs` (`id`, `nama`, `nim`, `jurusan`, `username`, `password`, `level`) 
                VALUES 
            (NULL, '$nama', '$nim', '$jurusan', '', '', '1');
            ";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn); 
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM db_mhs WHERE id = $id");
    return mysqli_affected_rows($conn); 
}


function ubah($data) {
    global $conn;

    $id = $data["id"];
    $nama = htmlspecialchars($_POST["nama"]);
    $nim = htmlspecialchars($_POST["nim"]);
    $jurusan = htmlspecialchars($_POST["jurusan"]);

    $query = "UPDATE db_mhs SET 
                nama = '$nama',
                nim = '$nim',
                jurusan = '$jurusan'
            WHERE id = $id;
            ";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn); 
}


function cari($keyword) {
    $query = "SELECT * FROM db_mhs
                WHERE
            nama LIKE '%$keyword%' OR
            nim LIKE '%$keyword%' OR
            jurusan LIKE '%$keyword%'
            ";

    return query($query);
}

?>