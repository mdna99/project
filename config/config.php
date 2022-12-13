<?php
$username_db = "root";
$password_db = "root";
$host_db = "localhost";
$nama_db = "project";

$koneksi = mysqli_connect($host_db,$username_db,$password_db,$nama_db);

session_start();