<?php
include_once("functions.php");
$mahasiswa = query("SELECT * FROM db_mhs");

// jika tombol cari ditekan'
if( isset($_POST["cari"]) ) {
    $mahasiswa = cari($_POST["keyword"]);
}

// var_dump(cari($_POST["keyword"]));
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Latihan</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body>
    <div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
            <!-- Topbar Search -->
            <form action="" method="post"
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2" name="keyword" size="30" autofocus autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" name="cari">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
            <a href="tambah.php" class="btn btn-success btn-sm d-none d-sm-inline-block me-2 ">
                Tambah
            </a>
        </div>
        
        <br>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIM</th>
                                        <th>Jurusan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <!-- <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Nama</th>
                                        <th rowspan="1" colspan="1">Lembaga</th>
                                    </tr>
                                </tfoot> -->
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach( $mahasiswa as $mhs) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $mhs["nama"]; ?></td>
                                        <td><?= $mhs["nim"]; ?></td>
                                        <td><?= $mhs["jurusan"]; ?></td>
                                        <td>
                                            <a href="ubah.php?id=<?= $mhs["id"];  ?>">ubah</a>
                                            <a href="hapus.php?id=<?= $mhs["id"]; ?>" onclick="return confirm('Apakah anda yakin?')">hapus</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

</body>
</html>