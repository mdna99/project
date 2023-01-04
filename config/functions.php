<?php
$username_db = "root";
$password_db = "root";
$host_db = "localhost";
$nama_db = "project";

$koneksi = mysqli_connect($host_db,$username_db,$password_db,$nama_db);

function query($query) {
    global $koneksi;
    $result = mysqli_query($koneksi,$query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data) {
    global $koneksi;

    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $jam_mulai = $_POST['jam_mulai'];
    $jam_berakhir = $_POST['jam_berakhir'];
    $tanggal = $_POST['tanggal'];
    $keterangan = htmlspecialchars($_POST['keterangan']);

    $query = "INSERT INTO `peminjaman` (`id_peminjaman`, `id_user`, `jam_mulai`, `jam_berakhir`, `tanggal`, `keterangan`, `status_peminjaman`)
	VALUES
(NULL, '$id_user', '$jam_mulai', '$jam_berakhir', '$tanggal', '$keterangan', '0')";
    mysqli_query($koneksi,$query);
    return mysqli_affected_rows($koneksi); 
}

function hapus($id) {
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM db_mhs WHERE id = $id");
    return mysqli_affected_rows($koneksi); 
}


function ubah($data) {
    global $koneksi;

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
    mysqli_query($koneksi,$query);
    return mysqli_affected_rows($koneksi); 
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


function registrasi($data) {
    global $koneksi;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($koneksi, "SELECT `username` FROM `user` WHERE `username` = '$username'");
    if ( mysqli_fetch_assoc($result) ) {
        echo "<script>
                alert('username sudah terdaftar!')
            </script>";
        return false;
    }
    // var_dump(mysqli_fetch_assoc($result));

    // cek konfirmasi password
    if($password !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai!');
            </script>";

            return false;
    }
    
    // enkripsi password
    $password = password_hash($password,  PASSWORD_DEFAULT);

    // tambahkan data baru e database
    mysqli_query($koneksi, "INSERT INTO `user` (`id`, `username`, `password`) 
                VALUES 
            (NULL, '$username', '$password');
            ");

    return mysqli_affected_rows($koneksi);

}