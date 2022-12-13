<?php

$nama = $_POST["namalengkap"];
$lembaga = $_POST["lembaga"];
$username = $_POST["username"];
$password = $_POST["password"];
//$password = md5($password);

//koneksi
include_once("../config/config.php");

//insert query
$query = "INSERT INTO db_user (nama_lengkap,nama_lembaga,username,password,level) VALUEs ('$nama','$lembaga','$username','$password','Peminjam')";

mysqli_query($koneksi,$query);


header("location: login.php");