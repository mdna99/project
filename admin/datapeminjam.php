<?php
include_once("../template/head.php");
include_once("../template/bodyA.php");
$pengguna = squery("SELECT * FROM db_user");
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users</h1>
    </div>
    <div class="card shadow mb-4">
        <!-- Card Header -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-beetween">
            <div class="col-sm-6">
                <h4 class="m-0 font-weight-bold text-primary">Kelola Data Pengguna</h4>
            </div>
            <div class="col-sm-6">
                <a href="tambah.php" class="btn btn-success btn-sm d-none d-sm-inline-block me-2 float-sm-right">
                    Tambah
                </a>
            </div>
        </div>
        <!-- Card Body -->
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
                                        <th>Lembaga</th>
                                        <th>Level</th>
                                        <th>Opsi</th>
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
                                    <?php foreach( $pengguna as $pg) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $pg[nama_lengkap]; ?></td>
                                        <td><?= $pg[nama_lembaga]; ?></td>
                                        <td><?= $pg[level]; ?></td>
                                        <td>
                                            <a href="hapus?id=<?= $pg[id_user]; ?>" class="badge badge-danger" onclick="return confirm('Apakah anda yakin?')">hapus</a>
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
<!-- /.container-fluid -->

<?php
include_once("../template/bodyAa.php");
include_once("../template/foot.php");
?>