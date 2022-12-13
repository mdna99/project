<?php
//jika diakses langsung maka akan tampil halaman kosong
// if(!defined('INDEX')) die("");


// daftar nama file
$halaman = array(
    "dashboard","peminjam_tambah","peminjam_insert","peminjam_edit","peminjam_update",
    "peminjam_hapus","datapeminjam","jadwal","pengajuan"
);

// $adminmenu = array(
//     "Dashboard", "Data Pegawai", "Data Jabatan"
// );

if (isset($_GET['hal'])) $hal = $_GET['hal'];
else $hal = "dashboard";

foreach($halaman as $h) {
    if($hal == $h) {
        include "content/$h.php";
        break;
    }
}

?>