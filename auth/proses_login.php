<?php

$username = $_POST["username"];
$password = $_POST["password"];
//$password = md5($password);

//koneksi
include_once("../config/config.php");

//insert query
$query = "SELECT * FROM db_user WHERE username = '".$username."' AND password = '".$password."'";

$hasil = mysqli_query($koneksi,$query);
$akun = mysqli_num_rows($hasil);


if ($akun>0){
    //session
    $user =mysqli_fetch_array($hasil,MYSQLI_ASSOC);
    $data_user = [
        "username" => $user['username'],
        "level" => $user['level']
    ];
    $_SESSION["data_user"] = $data_user;

    // echo "<script>document.location='../template/dashboard.php'</script>";
    
    if($data_user['level']== 'Admin'){
        header("location: ../admin/admin.php");
    }else{
        header("location: ../peminjam/home.php");
    }
    echo "<script>alert('Berhasil login!');</script>";
    session_start();

    //echo $user['level'];
    // $_SESSION["level"]=$user['level'];
}
else
{
    echo "<script>alert('Username atau Password salah!');</script>";
    header("location: login.php");
}

